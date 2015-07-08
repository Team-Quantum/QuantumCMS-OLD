<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:41:45
         compiled from "/home/vagrant/Code/QuantumCMS/application/templates/pages/login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1718021900559d2899b6d8c9_30266511%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8d4585573cab063661f1ca557787b36d708cbf35' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/application/templates/pages/login.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1718021900559d2899b6d8c9_30266511',
  'variables' => 
  array (
    'system_path' => 0,
    'errors' => 0,
    'error' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d2899bb2697_07636371',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d2899bb2697_07636371')) {
function content_559d2899bb2697_07636371 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';
if (!is_callable('smarty_function_recaptcha')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/function.recaptcha.php';

$_smarty_tpl->properties['nocache_hash'] = '1718021900559d2899b6d8c9_30266511';
?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Login">
    <?php
$foreach_0_error_sav['s_item'] = isset($_smarty_tpl->tpl_vars['error']) ? $_smarty_tpl->tpl_vars['error'] : false;
$_from = $_smarty_tpl->tpl_vars['errors']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['error'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['error']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['error']->value) {
$_smarty_tpl->tpl_vars['error']->_loop = true;
$foreach_0_error_sav['item'] = $_smarty_tpl->tpl_vars['error'];
?>
        <div class="error"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</div>
    <?php
$_smarty_tpl->tpl_vars['error'] = $foreach_0_error_sav['item'];
}
if ($foreach_0_error_sav['s_item']) {
$_smarty_tpl->tpl_vars['error'] = $foreach_0_error_sav['s_item'];
}
?>
    <label for="username"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.login.username<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label><br />
    <input name="username" id="username" type="text" size="35" /><br />
    <label for="password"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.login.password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label><br />
    <input name="password" id="password" type="password" size="35" /><br /><br />
    <?php echo smarty_function_recaptcha(array(),$_smarty_tpl);?>

    <input name="login" type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.login.doLogin<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
    <input type="hidden" name="action" value="system-login" />
</form><?php }
}
?>