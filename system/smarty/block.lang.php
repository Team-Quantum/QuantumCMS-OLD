<?php

function smarty_block_lang($params, $content, Smarty_Internal_Template $template, &$repeat) {
    if(!$repeat) {
        if(isset($content)) {
            return \Quantum\Core::getInstance()->getTranslator()->translate($content);
        }
    }

    return '';
}
