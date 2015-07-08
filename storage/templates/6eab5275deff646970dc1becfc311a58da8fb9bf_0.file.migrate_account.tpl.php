<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 14:08:08
         compiled from "/home/vagrant/Code/QuantumCMS/application/templates/pages/migrate_account.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1024550070559d2ec8904e92_23516979%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6eab5275deff646970dc1becfc311a58da8fb9bf' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/application/templates/pages/migrate_account.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1024550070559d2ec8904e92_23516979',
  'variables' => 
  array (
    'disable' => 0,
    'system_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d2ec89b2e43_12937009',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d2ec89b2e43_12937009')) {
function content_559d2ec89b2e43_12937009 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';

$_smarty_tpl->properties['nocache_hash'] = '1024550070559d2ec8904e92_23516979';
?>
<h2><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.migrate.title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h2>
<?php if (!$_smarty_tpl->tpl_vars['disable']->value) {?>
<div class="info">
    <?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.migrate.desc<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

</div>
<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
MigrateAccount">
    <label for="visible_name"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.register.field.visible_name<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</label><br />
    <input name="visible_name" id="visible_name" type="text" size="35" /><br />
    <input name="login" type="submit" value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.button.submit<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
" />
    <input type="hidden" name="action" value="system-migrate-account" />
</form>
<?php } else { ?>
    <div class="error">
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.migrate.error<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>

    </div>
<?php }
}
}
?>