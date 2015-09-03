<?php


namespace App\Pages\Admin\Import;


use Quantum\BasePage;
use Quantum\Core;
use Smarty;

class ItemProto extends BasePage {

    /**
     * Automatic called before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @throws \Exception
     */
    public function preRender($core, $smarty) {
        $smarty->assign('system_admin_menu_active', 'Import/ItemProto');

        $em = $core->getInternalDatabase()->getEntityManager();

        $display = '';
        if(isset($_POST['upload'])) {
            // Check both files and import if exists and correct
            if(isset($_FILES['itemProto']) && $_FILES['itemProto']['size'] > 0) {
                $file = fopen($_FILES['itemProto']['tmp_name'], 'r');
                if(!is_resource($file))
                    throw new \Exception("Failed to open uploaded file!");

                $itemProto = fread($file, filesize($_FILES['itemProto']['tmp_name']));
                $itemProtoRows = explode(PHP_EOL, $itemProto);

                // First row is header -> save first row data and use this array for mapping
                $rowDescription = null;
                $currentLine = 0;
                $indexOfVnum = -1;
                $indexOfType = -1;
                $indexOfSize = -1;

                foreach($itemProtoRows as $row) {
                    $currentLine++;

                    $itemData = explode("\t", $row);
                    if ($rowDescription == null) {
                        $rowDescription = $itemData;

                        $indexOfVnum = $this->getIndexOfColumn($rowDescription, 'item');
                        $indexOfType = $this->getIndexOfColumn($rowDescription, 'item_type');
                        $indexOfSize = $this->getIndexOfColumn($rowDescription, 'size');

                        if ($indexOfVnum == -1 || $indexOfSize == -1 || $indexOfType == -1) {
                            $display .= 'Missing columns in item_proto.txt\\n';
                            break;
                        }

                        continue;
                    }

                    // Check if the count match the header if not ignore
                    if (count($rowDescription) != count($itemData)) {
                        continue;
                    }

                    // Process row data (everything is validated)
                    $item = $em->find('\\Quantum\\DBO\\ItemProto', $itemData[$indexOfVnum]);
                    if ($item == null) {
                        $item = new \Quantum\DBO\ItemProto();
                    }
                    $item->setId($itemData[$indexOfVnum]);
                    $item->setType($itemData[$indexOfType]);
                    $item->setSize($itemData[$indexOfSize]);

                    $em->persist($item);
                }
            }

            if(isset($_FILES['itemNames']) && $_FILES['itemNames']['size'] > 0) {
                $file = fopen($_FILES['itemNames']['tmp_name'], 'r');
                if(!is_resource($file))
                    throw new \Exception("Failed to open uploaded file!");

                $itemProto = fread($file, filesize($_FILES['itemNames']['tmp_name']));
                $itemProtoRows = explode(PHP_EOL, $itemProto);

                // First row is header -> save first row data and use this array for mapping
                $rowDescription = null;
                $currentLine = 0;
                $indexOfVnum = -1;
                $indexOfName = -1;

                foreach($itemProtoRows as $row) {
                    $currentLine++;

                    $itemData = explode("\t", $row);
                    if ($rowDescription == null) {
                        $rowDescription = $itemData;
                        $display = count($rowDescription) . '\\n';

                        $indexOfVnum = $this->getIndexOfColumn($rowDescription, 'vnum');
                        $indexOfName = $this->getIndexOfColumn($rowDescription, 'locale_name');

                        if ($indexOfVnum == -1 || $indexOfName == -1) {
                            $display .= 'Missing columns in item_names.txt\\n';
                            break;
                        }

                        continue;
                    }

                    // Check if the count match the header if not ignore
                    if (count($rowDescription) != count($itemData)) {
                        continue;
                    }

                    // Process row data (everything is validated)
                    /** @var $item \Quantum\DBO\ItemProto */
                    $item = $em->find('\\Quantum\\DBO\\ItemProto', $itemData[$indexOfVnum]);
                    if ($item == null) {
                        continue;
                    }
                    $item->setName($itemData[$indexOfName]);
                    $em->persist($item);
                }
            }
        }

        $em->flush();

        if($display != '') {
            echo '<script type="text/javascript">alert("' . $display . '");</script>';
        }
    }

    /**
     * Automatic called after preRender and before smarty display is called
     * @param $core Core
     * @param $smarty Smarty
     * @return string template file for page content
     */
    public function getTemplate($core, $smarty) {
        return 'pages/admin/import/item_proto.tpl';
    }

    /**
     * Automatic called after smarty display is called. Example usage: clean up cache
     * @param $core Core
     * @param $smarty Smarty
     * @return void
     */
    public function postRender($core, $smarty) {

    }

    /**
     * @param $rowDetails array
     * @param $columnName string
     * @return int
     */
    private function getIndexOfColumn($rowDetails, $columnName) {
        for($i = 0; $i < count($rowDetails); $i++) {
            if(strpos(strtolower($rowDetails[$i]), strtolower($columnName)) !== false) {
                return $i;
            }
        }

        return -1;
    }
}