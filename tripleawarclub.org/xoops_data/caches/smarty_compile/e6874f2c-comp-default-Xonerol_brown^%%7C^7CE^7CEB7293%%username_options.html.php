<?php /* Smarty version 2.6.28, created on 2016-03-10 16:14:18
         compiled from file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/username_options.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/username_options.html', 3, false),array('function', 'cycle', 'file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/username_options.html', 6, false),)), $this); ?>
<div class="htmltooltip">
	<table class="outer">
	<tr><th colspan="2"><?php echo $this->_tpl_vars['name']; ?>
's <?php echo ((is_array($_tmp=@_COMP_OPTIONS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th></tr>
	<?php $_from = $this->_tpl_vars['options']['rules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['rulefor'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['rulefor']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['rule']):
        $this->_foreach['rulefor']['iteration']++;
?>
	<?php if ($this->_tpl_vars['rule']['name'] != '5th'): ?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td><img style="height:24px;" src="images/dogtags/<?php echo $this->_tpl_vars['rule']['name']; ?>
.png"></td>
			<td style="vertical-align:middle"><?php echo $this->_tpl_vars['rule']['desc']; ?>
</td>
		</tr>
	<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['options']['luck']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['luckfor'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['luckfor']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['luck']):
        $this->_foreach['luckfor']['iteration']++;
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td><img style="height:24px;" src="images/dogtags/<?php echo $this->_tpl_vars['luck']['name']; ?>
.png"></td>
			<td style="vertical-align:middle"><?php echo $this->_tpl_vars['luck']['desc']; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['options']['mode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['modefor'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['modefor']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['mode']):
        $this->_foreach['modefor']['iteration']++;
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td><img style="height:24px;" src="images/dogtags/<?php echo $this->_tpl_vars['mode']['name']; ?>
.png"></td>
			<td style="vertical-align:middle"><?php echo $this->_tpl_vars['mode']['desc']; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>

<?php if ($this->_tpl_vars['local_status'] != 0): ?>
<?php echo $this->_tpl_vars['name']; ?>
 (retired)
<?php else: ?>
<a style="vertical-align:middle
<?php if ($this->_tpl_vars['global_status'] != 0): ?>
	;color:red
<?php endif; ?>
" href="profile.php?uid=<?php echo $this->_tpl_vars['uid']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
</a>
<?php endif; ?>