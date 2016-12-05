<?php /* Smarty version 2.6.28, created on 2016-02-13 22:39:00
         compiled from db:players.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:players.html', 20, false),array('modifier', 'lower', 'db:players.html', 74, false),array('function', 'cycle', 'db:players.html', 71, false),)), $this); ?>
<script type="text/javascript" src="<?php echo @XOOPS_URL; ?>
/modules/comp/include/jquery-1.2.2.pack.js"></script>

<style type="text/css">

div.htmltooltip{
position: absolute; /*leave this and next 3 values alone*/
z-index: 1000;
left: -1000px;
top: -1000px;
background: white;
color: black;
padding: 3px;
width: 250px; /*width of tooltip*/
}

</style>

<script type="text/javascript" src="<?php echo @XOOPS_URL; ?>
/modules/comp/include/htmltooltip.js"></script>

<h2 class="siteheader"><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h2>

<p>Below is the listing of all current players in the <?php echo ((is_array($_tmp=$this->_tpl_vars['params']['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
.</p>
<br>

<table border=0 cellpadding=0 cellspacing=0 width="100%">
	<tr><td>
		<h3 class="comp">Player Listing</h3>
	</td><td width="250" style="text-align:right;width:275px;">
				<form action="players.php" method="GET">
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

				<?php echo ((is_array($_tmp=@_COMP_PLAYERS_PER_PAGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:
		<select name="pppg" size = "1">
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
	</td></tr>
</table>

<table border=0 cellpadding=0 cellspacing=0>
<thead>
	<tr>
		<th> </th>
		<th style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_PLAYER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_POINTS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_RANK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_PLAYER_KARMA)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<?php if ($this->_tpl_vars['xoops_isuser']): ?>
			<th style="text-align:left;"><?php echo @_COMP_EMAIL; ?>
</th>
		<?php endif; ?>
	</tr>
</thead>

<tbody>

	<?php unset($this->_sections['playerssection']);
$this->_sections['playerssection']['name'] = 'playerssection';
$this->_sections['playerssection']['start'] = (int)$this->_tpl_vars['params']['start_player'];
$this->_sections['playerssection']['loop'] = is_array($_loop=$this->_tpl_vars['params']['end_player']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['playerssection']['show'] = true;
$this->_sections['playerssection']['max'] = $this->_sections['playerssection']['loop'];
$this->_sections['playerssection']['step'] = 1;
if ($this->_sections['playerssection']['start'] < 0)
    $this->_sections['playerssection']['start'] = max($this->_sections['playerssection']['step'] > 0 ? 0 : -1, $this->_sections['playerssection']['loop'] + $this->_sections['playerssection']['start']);
else
    $this->_sections['playerssection']['start'] = min($this->_sections['playerssection']['start'], $this->_sections['playerssection']['step'] > 0 ? $this->_sections['playerssection']['loop'] : $this->_sections['playerssection']['loop']-1);
if ($this->_sections['playerssection']['show']) {
    $this->_sections['playerssection']['total'] = min(ceil(($this->_sections['playerssection']['step'] > 0 ? $this->_sections['playerssection']['loop'] - $this->_sections['playerssection']['start'] : $this->_sections['playerssection']['start']+1)/abs($this->_sections['playerssection']['step'])), $this->_sections['playerssection']['max']);
    if ($this->_sections['playerssection']['total'] == 0)
        $this->_sections['playerssection']['show'] = false;
} else
    $this->_sections['playerssection']['total'] = 0;
if ($this->_sections['playerssection']['show']):

            for ($this->_sections['playerssection']['index'] = $this->_sections['playerssection']['start'], $this->_sections['playerssection']['iteration'] = 1;
                 $this->_sections['playerssection']['iteration'] <= $this->_sections['playerssection']['total'];
                 $this->_sections['playerssection']['index'] += $this->_sections['playerssection']['step'], $this->_sections['playerssection']['iteration']++):
$this->_sections['playerssection']['rownum'] = $this->_sections['playerssection']['iteration'];
$this->_sections['playerssection']['index_prev'] = $this->_sections['playerssection']['index'] - $this->_sections['playerssection']['step'];
$this->_sections['playerssection']['index_next'] = $this->_sections['playerssection']['index'] + $this->_sections['playerssection']['step'];
$this->_sections['playerssection']['first']      = ($this->_sections['playerssection']['iteration'] == 1);
$this->_sections['playerssection']['last']       = ($this->_sections['playerssection']['iteration'] == $this->_sections['playerssection']['total']);
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">
			
			<td class="country">
			<?php if (((is_array($_tmp=$this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)) != ""): ?>
			<img src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['country']; ?>
">
			<?php endif; ?>
			</td>
			
			<td class="players">

	   	<a href="" rel="htmltooltip"><img style="vertical-align:middle;" align="absmiddle" src='images/dogtags/dogtags.png'></a>			

			         <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/username_options.html", 'smarty_include_vars' => array('uid' => $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['uid'],'name' => $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['uname'],'status' => $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['global_status'],'options' => $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
						<?php if ($this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['gameimage']): ?>
				<img style="height:32px;vertical-align:middle" src="images/dogtags/<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['gameimage']; ?>
.png">
			<?php endif; ?>
			</td>

						<td><?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['rating']; ?>
</td>

						<td><?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['rank']; ?>
</td>

						<td>
				<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['karma_rating']; ?>
%
				(+<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['num_positive']; ?>
,
				<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['num_neutral']; ?>
,
				-<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['num_negative']; ?>
)
			</td>

			<?php if ($this->_tpl_vars['xoops_isuser']): ?>
				<?php if ($this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['user_viewemail'] || ( $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['uid'] == $this->_tpl_vars['xoops_userid'] )): ?>
					<td class="email"><a href="mailto:<?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['email']; ?>
"><?php echo $this->_tpl_vars['params']['players'][$this->_sections['playerssection']['index']]['email']; ?>
</a></td>
				<?php endif; ?>
			<?php endif; ?>
		</tr>
		
	<?php endfor; endif; ?>
	</tbody>
</table>