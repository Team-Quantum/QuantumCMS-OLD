<?php

require_once('vendor/autoload.php');

$core = new \Quantum\Core();

if(!array_key_exists('type', $_GET)) {
    echo '<a href="tools.php?type=import">Import languages</a><br />';
    echo '<a href="tools.php?type=export">Export languages</a>';
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
                            array("key" => $key, "lang" => $lang)
                        );
                        if($translation == null) {
                            $translation = new \Quantum\DBO\Translation($key, $lang, $translated);
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
            fwrite($handles[$lang], $translation->getKey() . ' = "' . $translation->getTranslated() . '"' . PHP_EOL);
        }

        foreach($handles as $handle) {
            fclose($handle);
        }

        echo 'Done';
    }
}