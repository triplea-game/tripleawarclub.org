<?php /* Smarty version 2.6.28, created on 2016-03-10 16:09:28
         compiled from db:challenges.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:challenges.html', 15, false),array('modifier', 'lower', 'db:challenges.html', 84, false),array('modifier', 'date_format', 'db:challenges.html', 105, false),array('function', 'cycle', 'db:challenges.html', 62, false),)), $this); ?>
<h2 class="siteheader">Challenges</h2>
<p>Below is the list of all active and completed challenges.</p>
<p>Looking to <a href="matches.php?op=search&uid=<?php echo $this->_tpl_vars['params']['user_id']; ?>
">find an opponent</a>? To have a challenge deleted, please <a href="http://www.tripleawarclub.org/modules/newbb/index.php?cat=2">post here</a>.</p>
<br>
<table class="outer">
	<tr>
		<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?>
		<td colspan="11">
		<?php else: ?>
		<td colspan="8">
		<?php endif; ?>
		
		<table border=0 cellpadding=0 cellspacing=0>
<tr><td>
<h3 class="comp"><?php echo ((is_array($_tmp=@_COMP_CHALLENGES)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>
</td><td width="275" style="text-align:right">
<form action="challenges.php" method="GET">
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

<?php echo ((is_array($_tmp=@_COMP_CHALLENGES_PER_PAGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:
<select name="cppg" size = "1">
	<option value="20">20</option>
	<option value="50">50</option>
	<option value="100">100</option>
	<option value="0">All</option>
</select>
<input type="hidden" name="lid" value="<?php echo $this->_tpl_vars['params']['comp_id']; ?>
">
<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?>
<input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['params']['user_id']; ?>
">
<?php endif; ?>
<input type="submit" value="<?php echo ((is_array($_tmp=@_COMP_SUBMIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
">
</form>
</td></tr>
</table>
		
		</td>
	</tr>
	<tr>
		<th></th>
		<th>ID</th>
		<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?><th>SlowPlay</th><?php endif; ?>
		<th></th>
		<th style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_CHALLENGER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th></th>
		<th style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_CHALLENGED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_STATUS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_CHALLENGE_DATE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?>
		<th>Axis Game</th>
		<th>Allies Game</th>
		<?php endif; ?>
	</tr>
	<?php unset($this->_sections['challsection']);
$this->_sections['challsection']['name'] = 'challsection';
$this->_sections['challsection']['start'] = (int)$this->_tpl_vars['params']['start_challenge'];
$this->_sections['challsection']['loop'] = is_array($_loop=$this->_tpl_vars['params']['end_challenge']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['challsection']['show'] = true;
$this->_sections['challsection']['max'] = $this->_sections['challsection']['loop'];
$this->_sections['challsection']['step'] = 1;
if ($this->_sections['challsection']['start'] < 0)
    $this->_sections['challsection']['start'] = max($this->_sections['challsection']['step'] > 0 ? 0 : -1, $this->_sections['challsection']['loop'] + $this->_sections['challsection']['start']);
else
    $this->_sections['challsection']['start'] = min($this->_sections['challsection']['start'], $this->_sections['challsection']['step'] > 0 ? $this->_sections['challsection']['loop'] : $this->_sections['challsection']['loop']-1);
if ($this->_sections['challsection']['show']) {
    $this->_sections['challsection']['total'] = min(ceil(($this->_sections['challsection']['step'] > 0 ? $this->_sections['challsection']['loop'] - $this->_sections['challsection']['start'] : $this->_sections['challsection']['start']+1)/abs($this->_sections['challsection']['step'])), $this->_sections['challsection']['max']);
    if ($this->_sections['challsection']['total'] == 0)
        $this->_sections['challsection']['show'] = false;
} else
    $this->_sections['challsection']['total'] = 0;
if ($this->_sections['challsection']['show']):

            for ($this->_sections['challsection']['index'] = $this->_sections['challsection']['start'], $this->_sections['challsection']['iteration'] = 1;
                 $this->_sections['challsection']['iteration'] <= $this->_sections['challsection']['total'];
                 $this->_sections['challsection']['index'] += $this->_sections['challsection']['step'], $this->_sections['challsection']['iteration']++):
$this->_sections['challsection']['rownum'] = $this->_sections['challsection']['iteration'];
$this->_sections['challsection']['index_prev'] = $this->_sections['challsection']['index'] - $this->_sections['challsection']['step'];
$this->_sections['challsection']['index_next'] = $this->_sections['challsection']['index'] + $this->_sections['challsection']['step'];
$this->_sections['challsection']['first']      = ($this->_sections['challsection']['iteration'] == 1);
$this->_sections['challsection']['last']       = ($this->_sections['challsection']['iteration'] == $this->_sections['challsection']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">
			<td>

			<?php if ($this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['comp_id'] == 6): ?>
				AA50
			<?php else: ?>
			   Revised
			<?php endif; ?>
			
			</td>
			<td><?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenge_id']; ?>
</td>
			<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?><td>
			[
			<?php if ($this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['chall_status'] == 0): ?>
			<a href="challenges.php?op=slowplay&lid=<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['comp_id']; ?>
&uid=<?php echo $this->_tpl_vars['params']['user_id']; ?>
&cid=<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenge_id']; ?>
">SP</a>
			<?php else: ?>
			SP
			<?php endif; ?>
			]
			</td><?php endif; ?>
			<td class="country">
			<?php if ($this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenger_country'] != ""): ?>
			<img style="vertical-align:middle" src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenger_country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenger_country']; ?>
">
			<?php endif; ?>
			</td>
			<td class="players">
				<a href="profile.php?uid=<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenger_id']; ?>
"><?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenger_name']; ?>
</a>
			</td>
			<td class="country">
			<?php if ($this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenged_country'] != ""): ?>
			<img style="vertical-align:middle" src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenged_country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenged_country']; ?>
">
			<?php endif; ?>
			</td>
			<td class="players">
				<a href="profile.php?uid=<?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenged_id']; ?>
"><?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['challenged_name']; ?>
</a>
			</td>
			<td>
				<?php if ($this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['chall_status'] == 0): ?>
					<?php echo ((is_array($_tmp=@_COMP_ACTIVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

				<?php else: ?>
					<?php echo ((is_array($_tmp=@_COMP_COMPLETED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

				<?php endif; ?>
			</td>
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['chall_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
			<?php if ($this->_tpl_vars['params']['isPlayer'] == true): ?>
			<td><?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['axis']; ?>
</td>
			<td><?php echo $this->_tpl_vars['params']['challenges'][$this->_sections['challsection']['index']]['allies']; ?>
</td>
			<?php endif; ?>
		</tr>
	<?php endfor; endif; ?>
</table>

<?php if ($this->_tpl_vars['invitations'] == 'yes'): ?>
	<p>
	<h2 style="text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_INVITATION_INVITATIONS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h2>
	<table class="outer">
		<tr>
			<th><?php echo @_COMP_INVITATION_ID; ?>
</th>
			<th><?php echo ((is_array($_tmp=@_COMP_INVITATION_INVITER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
			<th><?php echo ((is_array($_tmp=@_COMP_INVITATION_DATE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
			<th colspan=2><?php echo ((is_array($_tmp=@_COMP_INVITATION_OPTIONS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>

		</tr>
	

		<?php $_from = $this->_tpl_vars['inv_data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
			<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">

				<td><?php echo $this->_tpl_vars['row']['invitation_id']; ?>
</td>
				<td><a href="profile.php?uid=<?php echo $this->_tpl_vars['row']['inviter_id']; ?>
"><?php echo $this->_tpl_vars['row']['uname']; ?>
</a></td>
				<td><?php echo ((is_array($_tmp=$this->_tpl_vars['row']['invitation_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
				<td><a href="challenges.php?op=accept_invitation&lid=<?php echo $this->_tpl_vars['params']['comp_id']; ?>
&inv_id=<?php echo $this->_tpl_vars['row']['invitation_id']; ?>
"><?php echo @_COMP_INVITATION_ACCEPT; ?>
</a></td>
				<td><a href="challenges.php?op=delete_invitation&lid=<?php echo $this->_tpl_vars['params']['comp_id']; ?>
&inv_id=<?php echo $this->_tpl_vars['row']['invitation_id']; ?>
"><?php echo @_COMP_INVITATION_DENY; ?>
</a></td>

			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>