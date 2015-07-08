<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 15:10:59
         compiled from "/home/vagrant/Code/QuantumCMS/app/templates/pages/downloads.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1394530340559d3d83e06561_34714840%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ce2c1726e59e02e2982a429ea7c2e0d038a8090' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/app/templates/pages/downloads.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1394530340559d3d83e06561_34714840',
  'variables' => 
  array (
    'page_file_downloads' => 0,
    'system_path' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d3d83e782e9_89641135',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d3d83e782e9_89641135')) {
function content_559d3d83e782e9_89641135 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1394530340559d3d83e06561_34714840';
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