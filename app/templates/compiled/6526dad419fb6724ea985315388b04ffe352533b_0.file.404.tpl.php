<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:20:49
         compiled from "/home/vagrant/Code/QuantumCMS/templates/404.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1195805838559d23b18188b0_77946951%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6526dad419fb6724ea985315388b04ffe352533b' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/templates/404.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1195805838559d23b18188b0_77946951',
  'variables' => 
  array (
    'system_path' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d23b1861d11_18778113',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d23b1861d11_18778113')) {
function content_559d23b1861d11_18778113 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';

$_smarty_tpl->properties['nocache_hash'] = '1195805838559d23b18188b0_77946951';
?>
<div id="404_wrapper">
    <div id="404_head">
        <h3><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.404.head<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</h3>
    </div>
    <div id="404_content">
       <!-- <p><span>Der Razador war mal wieder<br/> st&auml;rker als du..</span></p> -->
        <p><span><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.404.msg1<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<br/><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.404.msg2<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</span></p>
        <img id="404_img" width="30%" height="40%" src="http://metin2wiki.de/images/thumb/6/68/Razador.png/424px-Razador.png"/>
    </div>
    <div id="404_foot">
        <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Home"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.main.backToHome<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a> |
        <a href="javascript:history.back()"><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
system.main.backToLastPage<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</a>
    </div>
</div><?php }
}
?>