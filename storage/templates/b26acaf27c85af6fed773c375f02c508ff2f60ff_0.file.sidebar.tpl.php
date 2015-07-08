<?php /* Smarty version 3.1.28-dev/26, created on 2015-07-08 13:37:55
         compiled from "/home/vagrant/Code/QuantumCMS/application/templates/plugins/stats/sidebar.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:891082526559d27b3062537_76278283%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b26acaf27c85af6fed773c375f02c508ff2f60ff' => 
    array (
      0 => '/home/vagrant/Code/QuantumCMS/application/templates/plugins/stats/sidebar.tpl',
      1 => 1436360623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '891082526559d27b3062537_76278283',
  'variables' => 
  array (
    'serverstatues' => 0,
    'serverstatuses' => 0,
    'channel' => 0,
    'playerOnlineNow' => 0,
    'playerOnlineLastDay' => 0,
    'accounts' => 0,
    'players' => 0,
    'guilds' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/26',
  'unifunc' => 'content_559d27b312e8d7_23740797',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_559d27b312e8d7_23740797')) {
function content_559d27b312e8d7_23740797 ($_smarty_tpl) {
if (!is_callable('smarty_block_lang')) require_once '/home/vagrant/Code/QuantumCMS/system/smarty/block.lang.php';
if (!is_callable('smarty_modifier_date_format')) require_once '/home/vagrant/Code/QuantumCMS/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';

$_smarty_tpl->properties['nocache_hash'] = '891082526559d27b3062537_76278283';
?>
<div id="server_statistic">
    <!-- Server Statistic -->
    <ul class="column_result2">
        <li class="result_column"><span><b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.server.title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</b></span></li>
        <?php if (isset($_smarty_tpl->tpl_vars['serverstatues']->value[0])) {?>
            <li><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.updated<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
: <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['serverstatuses']->value[0]->getLastCheck(),"%H:%M:%S");?>
 h</li>
        <?php }?>

        <?php
$foreach_0_channel_sav['s_item'] = isset($_smarty_tpl->tpl_vars['channel']) ? $_smarty_tpl->tpl_vars['channel'] : false;
$_from = $_smarty_tpl->tpl_vars['serverstatuses']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['channel'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['channel']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['channel']->value) {
$_smarty_tpl->tpl_vars['channel']->_loop = true;
$foreach_0_channel_sav['item'] = $_smarty_tpl->tpl_vars['channel'];
?>
            <li class="<?php if ($_smarty_tpl->tpl_vars['channel']->value->isStatus()) {?>online<?php } else { ?>offline<?php }?>"><b><?php echo $_smarty_tpl->tpl_vars['channel']->value->getName();?>
</b></li>
        <?php
$_smarty_tpl->tpl_vars['channel'] = $foreach_0_channel_sav['item'];
}
if ($foreach_0_channel_sav['s_item']) {
$_smarty_tpl->tpl_vars['channel'] = $foreach_0_channel_sav['s_item'];
}
?>

    </ul>
    <ul class="column_result2">
        <li class="result_column"><span><b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.player.title<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</b></span></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['playerOnlineNow']->value == 0) {?>offline<?php } else { ?>online<?php }?>"><span>
                <b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.player.online.now<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</b> <?php echo $_smarty_tpl->tpl_vars['playerOnlineNow']->value;?>
</span></li>
        <li class="<?php if ($_smarty_tpl->tpl_vars['playerOnlineLastDay']->value == 0) {?>offline<?php } else { ?>online<?php }?>"><span>
                <b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.player.online.day<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
</b> <?php echo $_smarty_tpl->tpl_vars['playerOnlineLastDay']->value;?>
</span></li>
        <li class="online"><span><b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.accounts<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</b> <?php echo $_smarty_tpl->tpl_vars['accounts']->value;?>
</span></li>
        <li class="online"><span><b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.players<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</b> <?php echo $_smarty_tpl->tpl_vars['players']->value;?>
</span></li>
        <li class="online"><span><b><?php $_smarty_tpl->smarty->_tag_stack[] = array('lang', array()); $_block_repeat=true; echo smarty_block_lang(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
plugin.stats.guilds<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_block_lang(array(), $_block_content, $_smarty_tpl, $_block_repeat);  } array_pop($_smarty_tpl->smarty->_tag_stack);?>
:</b> <?php echo $_smarty_tpl->tpl_vars['guilds']->value;?>
</span></li>
    </ul>
</div><?php }
}
?>