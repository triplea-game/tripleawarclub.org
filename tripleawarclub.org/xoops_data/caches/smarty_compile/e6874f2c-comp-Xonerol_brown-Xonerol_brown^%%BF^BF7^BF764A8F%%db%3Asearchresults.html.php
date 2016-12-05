<?php /* Smarty version 2.6.28, created on 2016-02-14 07:36:43
         compiled from db:searchresults.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:searchresults.html', 32, false),array('modifier', 'lower', 'db:searchresults.html', 44, false),array('function', 'cycle', 'db:searchresults.html', 39, false),)), $this); ?>
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

<h2 class="siteheader">Find Opponents</h2>
<p><?php echo @_COMP_SENT_CHALLENGES1; ?>
 <b> <?php echo $this->_tpl_vars['difference']; ?>
 </b> <?php echo @_COMP_SENT_CHALLENGES2; ?>
.</p>
<p><?php echo @_COMP_VALID_CHALLENGE_DIFFERENCE; ?>
.</p>
<p>To view a players preferred gaming options, mouse-over their dogtags.</p><br>
<?php if ($this->_tpl_vars['show'] == 'yes'): ?>
	<h3 class="comp"><?php echo @_COMP_SEARCH_RESULT_PLAYERS; ?>
:</h3>

		<table class="outer">
		<tr>

			<th> </th>
			<th style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_PLAYER)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
			<th><?php echo ((is_array($_tmp=@_COMP_POINTS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</th>
			<th><?php echo @_COMP_SEND_CHALLENGE; ?>
</th>
			<th style="text-align:left;"><?php echo ((is_array($_tmp=@_COMP_RATINGS_CHANGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 *</th>
		</tr>
	
	<?php $_from = $this->_tpl_vars['content']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
		<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
_comp">

						<td class="country">
			<?php if ($this->_tpl_vars['row']['country'] != ""): ?>
			<img style="vertical-align:middle" src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['row']['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['row']['country']; ?>
">
			<?php endif; ?>
			</td>
			<td class="players">
						
				<a href="" rel="htmltooltip"><img style="vertical-align:middle;" align="absmiddle" src='images/dogtags/dogtags.png'></a>			
		
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/username_options.html", 'smarty_include_vars' => array('uid' => $this->_tpl_vars['row']['xoops_user_id'],'name' => $this->_tpl_vars['row']['uname'],'status' => $this->_tpl_vars['row']['global_status'],'options' => $this->_tpl_vars['row']['options'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
								<?php if ($this->_tpl_vars['player']['gameimage']): ?>
					<img style="height:32px;vertical-align:middle" src="images/dogtags/<?php echo $this->_tpl_vars['player']['gameimage']; ?>
.png">
				<?php endif; ?>
			
			</td>
			
			<td><?php echo $this->_tpl_vars['row']['rating']; ?>
</td>
			<td>[<a style="color:red;" href="matches.php?op=sendchallenge&lid=<?php echo $this->_tpl_vars['row']['comp_id']; ?>
&uid=<?php echo $this->_tpl_vars['row']['xoops_user_id']; ?>
" title="<?php echo @_COMP_CHALLENGE_PLAYER_ALT; ?>
"><?php echo @_COMP_CHALLENGE_PLAYER; ?>
</a>]</td>

			<td style="text-align:left;">
			Win: <?php echo $this->_tpl_vars['row']['pointsGain']['win']; ?>
, Draw: <?php echo $this->_tpl_vars['row']['pointsGain']['draw']; ?>
, Lose: <?php echo $this->_tpl_vars['row']['pointsGain']['lose']; ?>

			</td>
			
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
	(*) - Ratings change calculations are done at the time of reporting. For more information, see the competition rules.
<?php endif; ?>

<?php if ($this->_tpl_vars['error'] == 'no_players'): ?>
	<b><?php echo @_COMP_ERRORS_NO_PLAYERS_FOUND; ?>
</b>
<?php endif; ?>