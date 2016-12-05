<?php /* Smarty version 2.6.28, created on 2016-03-10 16:14:50
         compiled from file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/ratings_table.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/ratings_table.html', 3, false),array('function', 'cycle', 'file:/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/templates/ratings_table.html', 9, false),)), $this); ?>
<table class="outer">
	<tr>
		<th><?php echo ((is_array($_tmp=@_COMP_RATING)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_PLAYER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_RATING)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_DATE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_COMMENT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
	</tr>
	<?php unset($this->_sections['rate']);
$this->_sections['rate']['name'] = 'rate';
$this->_sections['rate']['loop'] = is_array($_loop=$this->_tpl_vars['params']['ratings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['rate']['max'] = (int)$this->_tpl_vars['max'];
$this->_sections['rate']['show'] = true;
if ($this->_sections['rate']['max'] < 0)
    $this->_sections['rate']['max'] = $this->_sections['rate']['loop'];
$this->_sections['rate']['step'] = 1;
$this->_sections['rate']['start'] = $this->_sections['rate']['step'] > 0 ? 0 : $this->_sections['rate']['loop']-1;
if ($this->_sections['rate']['show']) {
    $this->_sections['rate']['total'] = min(ceil(($this->_sections['rate']['step'] > 0 ? $this->_sections['rate']['loop'] - $this->_sections['rate']['start'] : $this->_sections['rate']['start']+1)/abs($this->_sections['rate']['step'])), $this->_sections['rate']['max']);
    if ($this->_sections['rate']['total'] == 0)
        $this->_sections['rate']['show'] = false;
} else
    $this->_sections['rate']['total'] = 0;
if ($this->_sections['rate']['show']):

            for ($this->_sections['rate']['index'] = $this->_sections['rate']['start'], $this->_sections['rate']['iteration'] = 1;
                 $this->_sections['rate']['iteration'] <= $this->_sections['rate']['total'];
                 $this->_sections['rate']['index'] += $this->_sections['rate']['step'], $this->_sections['rate']['iteration']++):
$this->_sections['rate']['rownum'] = $this->_sections['rate']['iteration'];
$this->_sections['rate']['index_prev'] = $this->_sections['rate']['index'] - $this->_sections['rate']['step'];
$this->_sections['rate']['index_next'] = $this->_sections['rate']['index'] + $this->_sections['rate']['step'];
$this->_sections['rate']['first']      = ($this->_sections['rate']['iteration'] == 1);
$this->_sections['rate']['last']       = ($this->_sections['rate']['iteration'] == $this->_sections['rate']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
			<td><a href="profile.php?uid=<?php echo $this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rater_id']; ?>
"><?php echo $this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rater_name']; ?>
</a></td>
			<td
				<?php if ($this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rating'] == 1): ?>
					style="color:green"><?php echo ((is_array($_tmp=@_COMP_POSITIVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

				<?php elseif ($this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rating'] == -1): ?>
					style="color:red"><?php echo ((is_array($_tmp=@_COMP_NEGATIVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

				<?php elseif ($this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rating'] == 0): ?>
					><?php echo ((is_array($_tmp=@_COMP_NEUTRAL)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

				<?php endif; ?>
			</td>
			<td><?php echo $this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rating_date']; ?>
</td>
			<td><?php echo $this->_tpl_vars['params']['ratings'][$this->_sections['rate']['index']]['rating_comment']; ?>
</td>
		</tr>
	<?php endfor; endif; ?>
</table>