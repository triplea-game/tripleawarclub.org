<?php /* Smarty version 2.6.28, created on 2016-02-28 19:32:41
         compiled from db:system_help.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_help.html', 9, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<table>
	<tr>
		<td class="width20">
			<?php if ($this->_tpl_vars['help']): ?>
				<div class="xo-help-menu">
					<h2 class="head"><?php echo $this->_tpl_vars['modname']; ?>
</h2>
					<?php $_from = $this->_tpl_vars['help']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['help']):
?>
						<div class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
"><a href="<?php echo $this->_tpl_vars['help']['link']; ?>
"><?php echo $this->_tpl_vars['help']['name']; ?>
</a></div>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['list_mods']): ?>
				<div class="xo-help-menu">
					<?php $_from = $this->_tpl_vars['list_mods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
						<h2 class="head"><?php echo $this->_tpl_vars['row']['name']; ?>
</h2>
						<?php $_from = $this->_tpl_vars['row']['help_page']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['list']):
?>
							<div class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
" title="<?php echo $this->_tpl_vars['list']['name']; ?>
"><a href="<?php echo $this->_tpl_vars['list']['link']; ?>
"><?php echo $this->_tpl_vars['list']['name']; ?>
</a></div>
						<?php endforeach; endif; unset($_from); ?>
					<?php endforeach; endif; unset($_from); ?>
				</div>
			<?php endif; ?>
		</td>
		<td>
			<div id="help-content">
	         <?php echo $this->_tpl_vars['helpcontent']; ?>

			</div>
		</td>
	</tr>
</table>			