<?php /* Smarty version 2.6.28, created on 2016-03-10 16:14:50
         compiled from file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/recordhalf.html */ ?>
<td style="vertical-align:middle">
	<?php if ($this->_tpl_vars['local_status'] == 0): ?>
	<a href="matches.php?lid=<?php echo $this->_tpl_vars['comp_id']; ?>
&uid=<?php echo $this->_tpl_vars['uid']; ?>
&side=<?php echo $this->_tpl_vars['side']; ?>
">
	<?php endif; ?>
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
 <?php echo $this->_tpl_vars['matches']; ?>
)</td>
		</tr></table>
		<?php if ($this->_tpl_vars['local_status'] == 0): ?></a><?php endif; ?>
	
</td>