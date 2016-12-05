<?php /* Smarty version 2.6.28, created on 2016-02-13 23:39:57
         compiled from db:standings.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:standings.html', 20, false),array('modifier', 'lower', 'db:standings.html', 49, false),array('function', 'cycle', 'db:standings.html', 41, false),)), $this); ?>
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
<p>Below is the standings for the <?php echo $this->_tpl_vars['params']['name']; ?>
.</p>
<p>Players that are in the Provisional Class are listed at the bottom section of the standings.</p>
<p>(Recall until a player has played a match, they are not displayed.)</p>
<br>

<h3 class="comp"><?php echo ((is_array($_tmp=@_COMP_STANDINGS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>
<table>
	<tr>
		<th colspan="3"><?php echo ((is_array($_tmp=@_COMP_PLAYER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_POINTS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_RANK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_RECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_AXISRECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_ALLIESRECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
		<th><?php echo ((is_array($_tmp=@_COMP_PLAYER_KARMA)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
	</tr>
	<?php if ($this->_tpl_vars['count'] == 0): ?>
	<tr><td colspan="9" style="padding:6px;color:#333;"><?php echo ((is_array($_tmp=@_COMP_NOPLAYERSFOUND)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td></tr>
	<?php endif; ?>
	<?php $_from = $this->_tpl_vars['params']['standings']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['standingfor'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['standingfor']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['player']):
        $this->_foreach['standingfor']['iteration']++;
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">

						<td><?php echo $this->_foreach['standingfor']['iteration']; ?>
</td>

						<td class="country">
			<?php if ($this->_tpl_vars['player']['country'] != ""): ?>
				<img src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['player']['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['player']['country']; ?>
">
			<?php endif; ?>
			</td>
			
			<td class="players">

	   	  <a href="" rel="htmltooltip"><img style="vertical-align:middle;" align="absmiddle" src='images/dogtags/dogtags.png'></a>			
		
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/username_options.html", 'smarty_include_vars' => array('uid' => $this->_tpl_vars['player']['xoops_user_id'],'name' => $this->_tpl_vars['player']['uname'],'global_status' => $this->_tpl_vars['player']['global_status'],'local_status' => $this->_tpl_vars['player']['status'],'options' => $this->_tpl_vars['player']['options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					
								<?php if ($this->_tpl_vars['player']['gameimage']): ?>
					<img style="height:32px;vertical-align:middle" src="images/dogtags/<?php echo $this->_tpl_vars['player']['gameimage']; ?>
.png">
				<?php endif; ?>
				
			</td>

						<td><?php echo $this->_tpl_vars['player']['rating']; ?>
</td>

						<td><?php echo $this->_tpl_vars['player']['rank']; ?>
</td>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/record.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'both','wins' => $this->_tpl_vars['player']['wins'],'matches' => $this->_tpl_vars['player']['matches'],'winpercent' => $this->_tpl_vars['player']['winpercent'],'losspercent' => $this->_tpl_vars['player']['losspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'axis','wins' => $this->_tpl_vars['player']['axiswins'],'matches' => $this->_tpl_vars['player']['axismatches'],'winpercent' => $this->_tpl_vars['player']['axiswinpercent'],'losspercent' => $this->_tpl_vars['player']['axislosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'allies','wins' => $this->_tpl_vars['player']['allieswins'],'matches' => $this->_tpl_vars['player']['alliesmatches'],'winpercent' => $this->_tpl_vars['player']['allieswinpercent'],'losspercent' => $this->_tpl_vars['player']['allieslosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<td>
				<?php echo $this->_tpl_vars['player']['karma_rating']; ?>
%<br>
				(+<?php echo $this->_tpl_vars['player']['num_positive']; ?>
, <?php echo $this->_tpl_vars['player']['num_neutral']; ?>
,-<?php echo $this->_tpl_vars['player']['num_negative']; ?>
)
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
		<tr>
		<th colspan="9" style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_PROVISIONAL)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
	</tr>

	<?php if ($this->_tpl_vars['countProv'] == 0): ?>
	<tr><td colspan="9" style="padding:6px;color:#333;"><?php echo ((is_array($_tmp=@_COMP_NOPLAYERSFOUND)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td></tr>
	<?php endif; ?>	
	
	<?php $_from = $this->_tpl_vars['paramsProv']['standingsProvisional']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['standingforProv'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['standingforProv']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['player']):
        $this->_foreach['standingforProv']['iteration']++;
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">

						<td><!--<?php echo $this->_foreach['standingforProv']['iteration']; ?>
--> </td>

						<td class="country">
				<?php if ($this->_tpl_vars['player']['country'] != ""): ?>
				<img src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['player']['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['player']['country']; ?>
">
				<?php endif; ?>
			</td>
			
			<td class="players">
			
				<a href="" rel="htmltooltip"><img style="vertical-align:middle;" align="absmiddle" src='images/dogtags/dogtags.png'></a>			
		
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/username_options.html", 'smarty_include_vars' => array('uid' => $this->_tpl_vars['player']['xoops_user_id'],'name' => $this->_tpl_vars['player']['uname'],'global_status' => $this->_tpl_vars['player']['global_status'],'local_status' => $this->_tpl_vars['player']['status'],'options' => $this->_tpl_vars['player']['options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					
								<?php if ($this->_tpl_vars['player']['gameimage']): ?>
					<img style="height:32px;vertical-align:middle" src="images/dogtags/<?php echo $this->_tpl_vars['player']['gameimage']; ?>
.png">
				<?php endif; ?>				
				
			</td>

						<td><?php echo $this->_tpl_vars['player']['rating']; ?>
</td>

						<td style="font-size:10px;"><?php echo $this->_tpl_vars['player']['rank']; ?>
</td>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/record.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'both','wins' => $this->_tpl_vars['player']['wins'],'matches' => $this->_tpl_vars['player']['matches'],'winpercent' => $this->_tpl_vars['player']['winpercent'],'losspercent' => $this->_tpl_vars['player']['losspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'axis','wins' => $this->_tpl_vars['player']['axiswins'],'matches' => $this->_tpl_vars['player']['axismatches'],'winpercent' => $this->_tpl_vars['player']['axiswinpercent'],'losspercent' => $this->_tpl_vars['player']['axislosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['player']['comp_id'],'uid' => $this->_tpl_vars['player']['xoops_user_id'],'local_status' => $this->_tpl_vars['player']['status'],'side' => 'allies','wins' => $this->_tpl_vars['player']['allieswins'],'matches' => $this->_tpl_vars['player']['alliesmatches'],'winpercent' => $this->_tpl_vars['player']['allieswinpercent'],'losspercent' => $this->_tpl_vars['player']['allieslosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<td style="font-size:11px;">
				<?php echo $this->_tpl_vars['player']['karma_rating']; ?>
%<br>
				(+<?php echo $this->_tpl_vars['player']['num_positive']; ?>
, <?php echo $this->_tpl_vars['player']['num_neutral']; ?>
,-<?php echo $this->_tpl_vars['player']['num_negative']; ?>
)
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>