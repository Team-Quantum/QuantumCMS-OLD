<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:37:54
         compiled from "/home/vagrant/Code/QuantumCMS/application/templates/topNav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:928097350559d27b2e4a1b4_58036509%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd94c7a0971bb226857303dbd25af32a83de9328' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/application/templates/topNav.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '928097350559d27b2e4a1b4_58036509',
  'variables' => 
  array (
    'system_currentUser' => 0,
    'system_path' => 0,
    'system_userManager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d27b2ef1404_15641462',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d27b2ef1404_15641462')) {
function content_559d27b2ef1404_15641462 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';

$_smarty_tpl->properties['nocache_hash'] = '928097350559d27b2e4a1b4_58036509';
?>
<div class="navleft">
    <?php if ($_smarty_tpl->tpl_vars['system_currentUser']->value == null) {?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.main.welcome<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.main.guest<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</b>.
        <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Login"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.login<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> |
        <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Register"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.register<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
    <?php } else { ?>
        <?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.main.welcome<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
 <b><?php echo $_smarty_tpl->tpl_vars['system_currentUser']->value->getLogin();?>
</b>.

        <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
User/Home"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.user<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> |

        <?php if ($_smarty_tpl->tpl_vars['system_userManager']->value->hasPrivilege('system_admin')) {?>
            <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Admin/Home"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.admin<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> |
        <?php }?>

        <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Logout"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.page.logout<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
    <?php }?>
</div>
<div class="navright">
    <a class="blue" href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
">Home</a>
    <a class="blue" href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Board">Board</a>
    <a class="blue" href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Wiki">Wiki</a>
    <a class="blue" href="ts3server://5.39.44.183">Teamspeak</a>
</div><?php }
}
?>