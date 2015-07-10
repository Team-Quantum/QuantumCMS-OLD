<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-11 01:00:01
         compiled from "C:\Users\Jan\PhpstormProjects\QuantumCMS\QuantumCMS\App\templates\topNav.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:641555a04e711e9f37_70513477%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e90eb083f238edd430847a16a5731924d75f031' => 
    array (
      0 => 'C:\\Users\\Jan\\PhpstormProjects\\QuantumCMS\\QuantumCMS\\App\\templates\\topNav.tpl',
      1 => 1436560038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '641555a04e711e9f37_70513477',
  'variables' => 
  array (
    'system_currentUser' => 0,
    'system_path' => 0,
    'system_userManager' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_55a04e7130eef1_30898403',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a04e7130eef1_30898403')) {
function content_55a04e7130eef1_30898403 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once 'C:\\Users\\Jan\\PhpstormProjects\\QuantumCMS\\QuantumCMS\\System\\Smarty\\block.lang.php';

$_smarty_tpl->properties['nocache_hash'] = '641555a04e711e9f37_70513477';
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