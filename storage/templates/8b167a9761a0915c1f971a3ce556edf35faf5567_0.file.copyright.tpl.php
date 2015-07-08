<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 14:54:29
         compiled from "/home/vagrant/Code/QuantumCMS/app/templates/copyright.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:552222332559d39a5eb1266_02571318%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8b167a9761a0915c1f971a3ce556edf35faf5567' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/app/templates/copyright.tpl',
      1 => 1436357017,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '552222332559d39a5eb1266_02571318',
  'variables' => 
  array (
    'system_year' => 0,
    'system_pageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d39a5ec8203_59787631',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d39a5ec8203_59787631')) {
function content_559d39a5ec8203_59787631 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '552222332559d39a5eb1266_02571318';
?>
<div id="footer_copyright">
    Copyright &copy; <?php echo $_smarty_tpl->tpl_vars['system_year']->value;?>
 by <?php echo $_smarty_tpl->tpl_vars['system_pageTitle']->value;?>
.
    Created with &hearts; by <a href='https://github.com/Team-Quantum'><b>Team Quantum</b></a>.
    <br/>Coded by <a href='http://metin2dev.org/board/index.php?/profile/1-devchucknorris/' target='_blank'>DevChuckNorris</a> & <a href='http://metin2dev.org/board/index.php?/profile/527-%E1%B4%85%E1%B4%80-%CA%80%E1%B4%87%E1%B4%80%CA%9F-po%E1%B4%8C%E1%B4%8Cu%E1%B6%8D/' target='_blank'>.PolluX</a>.
    Inspired by <a href='https://github.com/iseries/MT2cms' target='_blank'>Ayaka</a>. Designed by <a href="#" target="_blank">Unknown</a>.
</div><?php }
}
?>