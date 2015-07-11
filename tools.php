<?php

require_once('vendor/autoload.php');

session_start();

$core = new \Quantum\Core();

if(!array_key_exists('type', $_GET)) {
    echo '<a href="tools.php?type=import">Import languages</a><br />';
    echo '<a href="tools.php?type=export">Export languages</a><br />';
    echo '<a href="tools.php?type=importPrivileges">Import privileges</a><br />';
    echo '<a href="tools.php?type=exampleData">Generate Example Data</a><br />';
} else {
    if($_GET['type'] == 'import') {
        // Step 1: Read all files in install/languages
        $dir = ROOT_DIR . 'install' . DS . 'languages' . DS;
        $internal = $core->getInternalDatabase()->getEntityManager();
        $translationsRepo = $internal->getRepository('Quantum\\DBO\\Translation');
        if($handle = opendir($dir)) {
            while(false !== ($entry = readdir($handle))) {
                if($entry != '.' && $entry != '..') {
                    // Step 2: Import
                    echo 'Import ' . $entry . '<br />';
                    $lang = explode('.', $entry)[0];
                    $lang = strtoupper($lang);
                    $keys = parse_ini_file($dir . $entry);
                    foreach($keys as $key => $translated) {
                        $translation = $translationsRepo->findOneBy(
                            array("trans" => $key, "lang" => $lang)
                        );
                        if($translation == null) {
                            $translation = new \Quantum\DBO\Translation($key, $lang, utf8_encode($translated));
                        }
                        $translation->setTranslated($translated);
                        $internal->persist($translation);
                    }
                }
            }
        }
        $internal->flush();

        echo 'Done';
    } else if($_GET['type'] == 'export') {
        $dir = ROOT_DIR . 'install' . DS . 'languages' . DS;
        $internal = $core->getInternalDatabase()->getEntityManager();
        $translationsRepo = $internal->getRepository('Quantum\\DBO\\Translation');
        $handles = array();

        /** @var $translation \Quantum\DBO\Translation */
        foreach($translationsRepo->findAll() as $translation) {
            $lang = $translation->getLang();
            if(!array_key_exists($lang, $handles)) {
                $handles[$lang] = fopen($dir . $lang . '.ini', 'w+');
            }
            fwrite($handles[$lang], $translation->getTrans() . ' = "' . $translation->getTranslated() . '"' . PHP_EOL);
        }

        foreach($handles as $handle) {
            fclose($handle);
        }

        echo 'Done';
    } else if($_GET['type'] == 'importPrivileges') {
        $data = json_decode(file_get_contents(ROOT_DIR . 'install' . DS . 'privileges' . DS . 'privileges.json'));
        $privileges = $data->{'Privileges'};
        $em = $core->getInternalDatabase()->getEntityManager();

        foreach($privileges as $privilege) {
            // Check if database entry exists
            $tmp = $em->getRepository('\\Quantum\\DBO\\Privilege')->findOneBy(array(
                'technicalName' => $privilege->{'TechnicalName'}
            ));
            if($tmp === null) {
                $tmp = new \Quantum\DBO\Privilege();
                $tmp->setTechnicalName($privilege->{'TechnicalName'});
            }

            $tmp->setName($privilege->{'Name'});
            $tmp->setCategory($privilege->{'Category'});
            $tmp->setDescription($privilege->{'Description'});

            $em->persist($tmp);
        }
        $em->flush();
        echo 'Done';
    } else if($_GET['type'] == 'exampleData') {
        $coreStatuses = array();
        $coreStatuses[] = new \Quantum\DBO\CoreStatus("MySQL", '127.0.0.1', 3306, false, time());
        for($i = 1; $i <= 8; $i++) {
            $coreStatuses[] = new \Quantum\DBO\CoreStatus("Channel " . $i, '127.0.0.1', 79 + $i, false, time());
        }

        $internal = $core->getInternalDatabase()->getEntityManager();
        foreach($coreStatuses as $coreStatus) {
            $internal->persist($coreStatus);
        }
        $internal->flush();
    }
}