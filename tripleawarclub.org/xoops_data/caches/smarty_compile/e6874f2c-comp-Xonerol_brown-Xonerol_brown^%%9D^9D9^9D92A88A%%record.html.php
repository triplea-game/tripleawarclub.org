<?php /* Smarty version 2.6.28, created on 2016-02-13 22:39:06
         compiled from file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/record.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/record.html', 22, false),)), $this); ?>
<td style="vertical-align:middle">
	<?php if ($this->_tpl_vars['local_status'] == 0): ?><a href="matches.php?lid=<?php echo $this->_tpl_vars['comp_id']; ?>
&uid=<?php echo $this->_tpl_vars['uid']; ?>
&side=<?php echo $this->_tpl_vars['side']; ?>
"><?php endif; ?>
		<table><tr>
			<td style="border:none;background-color:
			<?php if ($this->_tpl_vars['side'] == 'both'): ?>
				blue
			<?php elseif ($this->_tpl_vars['side'] == 'axis'): ?>
				grey
			<?php else: ?>
				green
			<?php endif; ?>;width:<?php echo $this->_tpl_vars['winpercent']; ?>
px;padding:0px"></td>

			<td style="border:none;background-color:
			<?php if ($this->_tpl_vars['side'] == 'both'): ?>
				lightblue
			<?php elseif ($this->_tpl_vars['side'] == 'axis'): ?>
				lightgrey
			<?php else: ?>
				lightgreen
			<?php endif; ?>;width:<?php echo $this->_tpl_vars['losspercent']; ?>
px;padding:0px"></td>

			<td style="border:none;text-align:center;padding:0px;font-size:10px;"><?php echo $this->_tpl_vars['winpercent']; ?>
%<br>(<?php echo $this->_tpl_vars['wins']; ?>
 <?php echo @_COMP_OF; ?>
 <?php echo smarty_function_math(array('equation' => "x * y",'x' => $this->_tpl_vars['matches'],'y' => 2), $this);?>
)</td>
		</tr></table>
	<?php if ($this->_tpl_vars['local_status'] == 0): ?></a><?php endif; ?>
</td>