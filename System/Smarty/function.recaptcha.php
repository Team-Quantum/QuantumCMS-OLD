<?php

function smarty_function_recaptcha($params, Smarty_Internal_Template $template) {
    return \Quantum\Core::getInstance()->getRecaptchaHtml();
}
