<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:20:49
         compiled from "/home/vagrant/Code/QuantumCMS/templates/pages/downloads.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1889847939559d23b126fce7_97363686%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62597b91656fab1492cf2bd790d2ca27d91a91bf' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/templates/pages/downloads.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1889847939559d23b126fce7_97363686',
  'variables' => 
  array (
    'page_file_downloads' => 0,
    'system_path' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d23b12ca7d7_95131025',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d23b12ca7d7_95131025')) {
function content_559d23b12ca7d7_95131025 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1889847939559d23b126fce7_97363686';
$foreach_0_file_sav['s_item'] = isset($_smarty_tpl->tpl_vars['file']) ? $_smarty_tpl->tpl_vars['file'] : false;
$_from = $_smarty_tpl->tpl_vars['page_file_downloads']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['file'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['file']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['file']->value) {
$_smarty_tpl->tpl_vars['file']->_loop = true;
$foreach_0_file_sav['item'] = $_smarty_tpl->tpl_vars['file'];
?>
    <div class="download_button"><a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
dl/<?php echo $_smarty_tpl->tpl_vars['file']->value->getFile();?>
" target="_blank">
            <?php echo $_smarty_tpl->tpl_vars['file']->value->getDisplayName();?>
</a>
    </div>
<?php
$_smarty_tpl->tpl_vars['file'] = $foreach_0_file_sav['item'];
}
if ($foreach_0_file_sav['s_item']) {
$_smarty_tpl->tpl_vars['file'] = $foreach_0_file_sav['s_item'];
}
}
}
?>