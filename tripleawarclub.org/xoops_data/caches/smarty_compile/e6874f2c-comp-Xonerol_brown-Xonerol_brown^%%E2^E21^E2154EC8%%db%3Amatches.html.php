<?php /* Smarty version 2.6.28, created on 2016-02-13 22:59:59
         compiled from db:matches.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:matches.html', 1, false),array('modifier', 'lower', 'db:matches.html', 68, false),array('modifier', 'date_format', 'db:matches.html', 77, false),array('function', 'cycle', 'db:matches.html', 59, false),)), $this); ?>
<h2 class="siteheader"><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h2>

<p>Below is a listing of all played matches.</p><br>

<table class="outer">
<tr>

<?php if ($this->_tpl_vars['params']['comp_id'] == 6): ?>
<td colspan="10">
<?php else: ?>
<td colspan="7">
<?php endif; ?>

<table border=0 cellpadding=0 cellspacing=0>
<tr><td>
<h3 class="comp"><?php echo ((is_array($_tmp=@_COMP_MATCHES_PLAYED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>
</td><td width="250" style="text-align:right">
<form action="matches.php" method="GET">
<?php echo ((is_array($_tmp=@_COMP_PAGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:
<select name="pagenum" size="1">
	<?php unset($this->_sections['pagenumsection']);
$this->_sections['pagenumsection']['name'] = 'pagenumsection';
$this->_sections['pagenumsection']['start'] = (int)1;
$this->_sections['pagenumsection']['loop'] = is_array($_loop=$this->_tpl_vars['params']['num_pages']+1) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['pagenumsection']['show'] = true;
$this->_sections['pagenumsection']['max'] = $this->_sections['pagenumsection']['loop'];
$this->_sections['pagenumsection']['step'] = 1;
if ($this->_sections['pagenumsection']['start'] < 0)
    $this->_sections['pagenumsection']['start'] = max($this->_sections['pagenumsection']['step'] > 0 ? 0 : -1, $this->_sections['pagenumsection']['loop'] + $this->_sections['pagenumsection']['start']);
else
    $this->_sections['pagenumsection']['start'] = min($this->_sections['pagenumsection']['start'], $this->_sections['pagenumsection']['step'] > 0 ? $this->_sections['pagenumsection']['loop'] : $this->_sections['pagenumsection']['loop']-1);
if ($this->_sections['pagenumsection']['show']) {
    $this->_sections['pagenumsection']['total'] = min(ceil(($this->_sections['pagenumsection']['step'] > 0 ? $this->_sections['pagenumsection']['loop'] - $this->_sections['pagenumsection']['start'] : $this->_sections['pagenumsection']['start']+1)/abs($this->_sections['pagenumsection']['step'])), $this->_sections['pagenumsection']['max']);
    if ($this->_sections['pagenumsection']['total'] == 0)
        $this->_sections['pagenumsection']['show'] = false;
} else
    $this->_sections['pagenumsection']['total'] = 0;
if ($this->_sections['pagenumsection']['show']):

            for ($this->_sections['pagenumsection']['index'] = $this->_sections['pagenumsection']['start'], $this->_sections['pagenumsection']['iteration'] = 1;
                 $this->_sections['pagenumsection']['iteration'] <= $this->_sections['pagenumsection']['total'];
                 $this->_sections['pagenumsection']['index'] += $this->_sections['pagenumsection']['step'], $this->_sections['pagenumsection']['iteration']++):
$this->_sections['pagenumsection']['rownum'] = $this->_sections['pagenumsection']['iteration'];
$this->_sections['pagenumsection']['index_prev'] = $this->_sections['pagenumsection']['index'] - $this->_sections['pagenumsection']['step'];
$this->_sections['pagenumsection']['index_next'] = $this->_sections['pagenumsection']['index'] + $this->_sections['pagenumsection']['step'];
$this->_sections['pagenumsection']['first']      = ($this->_sections['pagenumsection']['iteration'] == 1);
$this->_sections['pagenumsection']['last']       = ($this->_sections['pagenumsection']['iteration'] == $this->_sections['pagenumsection']['total']);
?>
		<option value="<?php echo $this->_sections['pagenumsection']['index']; ?>
">
		<?php echo $this->_sections['pagenumsection']['index']; ?>
</option>
	<?php endfor; endif; ?>
</select>

<?php echo ((is_array($_tmp=@_COMP_MATCHES_PER_PAGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:
<select name="mppg" size = "1">
	<option value="20">20</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="0">All</option>
</select>
<input type="hidden" name="lid" value="<?php echo $this->_tpl_vars['params']['comp_id']; ?>
">
<input type="submit" value="<?php echo ((is_array($_tmp=@_COMP_SUBMIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
">
</form>
</td></tr></table>

</td>
</tr>
<tr>
<th>ID</th>

<?php if ($this->_tpl_vars['params']['comp_id'] == 6): ?>
<th>Map</th>
<th>NOs</th>
<th>Luck</th>
<?php endif; ?>

<th colspan=2>Opponent</th>
<th>As Allies</th>
<th>As Axis</th>
<th>Rating Change</th>
<th>Date</th>
</tr>
	<?php $_from = $this->_tpl_vars['params']['matches']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['matchinfo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['matchinfo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['match']):
        $this->_foreach['matchinfo']['iteration']++;
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">
			<td><?php echo $this->_tpl_vars['k']; ?>
</td>
			<?php if ($this->_tpl_vars['params']['comp_id'] == 6): ?>
			<td><?php echo $this->_tpl_vars['match']['map']; ?>
</td>
			<td><?php echo $this->_tpl_vars['match']['nos']; ?>
</td>
			<td><?php echo $this->_tpl_vars['match']['luck']; ?>
</td>
			<?php endif; ?>
			<td class="country">
			<?php if ($this->_tpl_vars['match']['opponent_country'] != ""): ?>
			<img style="vertical-align:middle" src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['match']['opponent_country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['match']['opponent_country']; ?>
">
			<?php endif; ?>
			</td>
			<td class="players">		
				<a href="profile.php?uid=<?php echo $this->_tpl_vars['match']['opponent_id']; ?>
"><?php echo $this->_tpl_vars['match']['opponent_uname']; ?>
</a>
			</td>
			<td><?php echo $this->_tpl_vars['match']['allies_result']; ?>
</td>
			<td><?php echo $this->_tpl_vars['match']['axis_result']; ?>
</td>
			<td><?php echo $this->_tpl_vars['match']['ratingchange']; ?>
</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['match']['match_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>