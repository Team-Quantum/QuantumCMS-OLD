<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-11 01:00:01
         compiled from "C:\Users\Jan\PhpstormProjects\QuantumCMS\QuantumCMS\App\templates\copyright.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2550955a04e71339e80_34354463%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ee82acb4e88b92995a329df1929640e3b8058828' => 
    array (
      0 => 'C:\\Users\\Jan\\PhpstormProjects\\QuantumCMS\\QuantumCMS\\App\\templates\\copyright.tpl',
      1 => 1436560038,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2550955a04e71339e80_34354463',
  'variables' => 
  array (
    'system_year' => 0,
    'system_pageTitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_55a04e71370992_79168876',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55a04e71370992_79168876')) {
function content_55a04e71370992_79168876 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2550955a04e71339e80_34354463';
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