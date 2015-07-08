<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:41:43
         compiled from "/home/vagrant/Code/QuantumCMS/application/templates/pages/register.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:844082110559d2897de83a6_91071344%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '829d3b333c7910424e838cb761b8d922215a0ea3' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/application/templates/pages/register.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '844082110559d2897de83a6_91071344',
  'variables' => 
  array (
    'system_path' => 0,
    'errors' => 0,
    'error' => 0,
    'register_success' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d2897eea2a2_60053467',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d2897eea2a2_60053467')) {
function content_559d2897eea2a2_60053467 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';
if (!is_callable('smarty_function_recaptcha')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/function.recaptcha.php';

$_smarty_tpl->properties['nocache_hash'] = '844082110559d2897de83a6_91071344';
?>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Register">
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
    <?php if ($_smarty_tpl->tpl_vars['register_success']->value) {?>
        <div class="success"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.success<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</div>
    <?php }?>
    <input value="" name="acc_name" type="text" min="8" maxlength="16" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.acc_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="visible_name" type="text" min="8" maxlength="16" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.visible_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="password" type="password" min="8" maxlength="16" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="check_password" type="password" min="8" maxlength="16" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.check_password<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="mailaddress" type="email" maxlength="50" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.mailaddress<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="check_mailaddress" type="email" maxlength="50" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.check_mailaddress<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/>
    <input value="" name="deletecode" type="text" min="7" maxlength="7" required="required" placeholder="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.deletecode<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"/><br/><br/>
    <?php echo smarty_function_recaptcha(array(),$_smarty_tpl);?>

    <input name="do_reg" type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.button.submit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
    <input type="reset" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.button.reset<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
    <input type="hidden" name="action" value="system-register" />
</form><?php }
}
?>