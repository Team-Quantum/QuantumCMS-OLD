<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 14:54:29
         compiled from "/home/vagrant/Code/QuantumCMS/app/templates/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:1789060301559d39a5bab193_32745767%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c9541c1ac8ff238793195bef054498f028cce725' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/app/templates/index.tpl',
      1 => 1436362233,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1789060301559d39a5bab193_32745767',
  'variables' => 
  array (
    'system_pageTitle' => 0,
    'system_path' => 0,
    'system_slogan' => 0,
    'pageTemplate' => 0,
    'system_sidebar_right' => 0,
    'tpl' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d39a5c983c0_96577595',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d39a5c983c0_96577595')) {
function content_559d39a5c983c0_96577595 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1789060301559d39a5bab193_32745767';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $_smarty_tpl->tpl_vars['system_pageTitle']->value;?>
</title>
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
assets/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
assets/css/wiki.css" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,400,700" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrapper">
        <!--<iframe width="1px" height="1px" src="https://www.youtube.com/embed/5CLFwCUyWqY?autoplay=1&loop=1" frameborder="0" allowfullscreen></iframe>-->
        <div id="headerlogo">
            <div id="headertitle">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
" target="_self">
                    <?php echo $_smarty_tpl->tpl_vars['system_pageTitle']->value;?>
 - <span class="headertext"><?php echo $_smarty_tpl->tpl_vars['system_slogan']->value;?>
</span>
                </a>
            </div>
            <div id="download_button">
                <a href="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
Downloads" class="download">DOWNLOADS<br><span class="download_dec">go to our Download page</span></a>
            </div>
        </div>
        <div id="left">
            <div id="box">
                
                <?php echo $_smarty_tpl->getSubTemplate ("topNav.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </div>

            <div id="box">
                
                <?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['pageTemplate']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </div>

            <div id="box">
                <div id="foot_links_main">
                    
                    <div id="footer_backlinks">
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
assets/img/icons/footer/youtube.png"/>
                        </a>
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
assets/img/icons/footer/fb.png"/>
                        </a>
                        <a href="#" target="_blank">
                            <img height="32px" width="32px" src="<?php echo $_smarty_tpl->tpl_vars['system_path']->value;?>
assets/img/icons/footer/twitter.png"/>
                        </a>
                    </div>
                    <a href="#" target="_blank">Impressum</a> |
                    <a href="http://www.elitepvpers.com" target="_blank">Elitepvpers</a> |
                    <a href="http://www.metin2dev.org" target="_blank">Metin2dev</a> |
                    <a href="#" target="_blank">AGB's</a> |
                    <a href="#" target="_blank">Contact</a>
                </div>
            </div>


            
            <div id="box">
                <?php echo $_smarty_tpl->getSubTemplate ("copyright.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

            </div>
        </div>
        <div id="right">
            <div id="box">
                <div class="info">
                    Welcome! <?php echo $_smarty_tpl->tpl_vars['system_pageTitle']->value;?>
 is a FREE-to-play massive online world packed with intense action and
                    brutal fighting.
                </div>
            </div>
            <?php
$foreach_0_tpl_sav['s_item'] = isset($_smarty_tpl->tpl_vars['tpl']) ? $_smarty_tpl->tpl_vars['tpl'] : false;
$_from = $_smarty_tpl->tpl_vars['system_sidebar_right']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['tpl'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['tpl']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['tpl']->value) {
$_smarty_tpl->tpl_vars['tpl']->_loop = true;
$foreach_0_tpl_sav['item'] = $_smarty_tpl->tpl_vars['tpl'];
?>
                <div id="box"><?php echo $_smarty_tpl->getSubTemplate ($_smarty_tpl->tpl_vars['tpl']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>
</div>
            <?php
$_smarty_tpl->tpl_vars['tpl'] = $foreach_0_tpl_sav['item'];
}
if ($foreach_0_tpl_sav['s_item']) {
$_smarty_tpl->tpl_vars['tpl'] = $foreach_0_tpl_sav['s_item'];
}
?>
        </div>
    </div>
</body>
</html><?php }
}
?>