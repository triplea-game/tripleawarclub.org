<?php /* Smarty version 2.6.28, created on 2016-02-13 22:39:06
         compiled from db:profile.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:profile.html', 3, false),array('modifier', 'lower', 'db:profile.html', 47, false),array('modifier', 'date_format', 'db:profile.html', 53, false),array('function', 'cycle', 'db:profile.html', 223, false),)), $this); ?>

<h2 class="siteheader"><?php echo $this->_tpl_vars['params']['profile']['uname']; ?>
's <?php echo ((is_array($_tmp=@_COMP_PROFILE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h2>
<br/>
<table bgcolor="#FFFFFF"><tr>

		<td style="width:75%"><table class="outer">
	<tr>
		<td colspan="2">
		
		<h3 class="comp">
		Player Information
		<?php if ($this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid']): ?>
			[<a href="<?php echo @XOOPS_URL; ?>
/edituser.php?uid=<?php echo $this->_tpl_vars['params']['profile']['uid']; ?>
&lid=<?php echo $_GET['lid']; ?>
&ref=comp"><?php echo ((is_array($_tmp=@_COMP_EDIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>]
		<?php endif; ?>
		</h3>
		
		</td>
	</tr>

	<tr>
				<td style="width:70px;text-align:center;font-size:11px;">
		<img style="width:64px" src="<?php echo @XOOPS_URL; ?>
/uploads/<?php echo $this->_tpl_vars['params']['profile']['user_avatar']; ?>
" ><br>
		[<a href="http://www.tripleawarclub.org/edituser.php?op=avatarform&lid=<?php echo $_GET['lid']; ?>
&ref=comp">Edit</a>]
		</td>

				<td style="border-right:1px dotted #d7863e;"><table>
		<?php if ($this->_tpl_vars['xoops_isuser']): ?>
			<tr class="even"><td><?php echo @_COMP_EMAIL; ?>
</td><td>
			<?php if ($this->_tpl_vars['params']['profile']['user_viewemail'] || ( $this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid'] )): ?>
				<a href="mailto:<?php echo $this->_tpl_vars['params']['profile']['email']; ?>
"><?php echo $this->_tpl_vars['params']['profile']['email']; ?>
</a>
			<?php endif; ?>
			</td>
			</tr>
			<tr class="odd"><td><?php echo ((is_array($_tmp=@_COMP_HOMEPAGE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td><td><a href="<?php echo $this->_tpl_vars['params']['profile']['url']; ?>
" target="_blank"><?php echo $this->_tpl_vars['params']['profile']['url']; ?>
</a></td></tr>
			<tr class="even"><td><?php echo @_COMP_ICQ; ?>
</td><td><?php echo $this->_tpl_vars['params']['profile']['user_icq']; ?>
</td></tr>
			<tr class="odd"><td><?php echo @_COMP_AIM; ?>
</td><td><?php echo $this->_tpl_vars['params']['profile']['user_aim']; ?>
</td></tr>
			<tr class="even"><td><?php echo @_COMP_YAHOO; ?>
</td><td><?php echo $this->_tpl_vars['params']['profile']['user_yim']; ?>
</td></tr>
			<tr class="odd"><td><?php echo @_COMP_MSN; ?>
</td><td><?php echo $this->_tpl_vars['params']['profile']['user_msnm']; ?>
</td></tr>
			<tr class="even"><td><a href='#' onclick='javascript:openWithSelfMain("<?php echo @XOOPS_URL; ?>
/pmlite.php?send2=1&amp;to_userid=<?php echo $this->_tpl_vars['params']['profile']['uid']; ?>
","pmlite",450,380);'><img src="<?php echo @XOOPS_URL; ?>
/images/icons/pm.gif"></a></td><td>Send a Private Message</td></tr>
		<?php endif; ?>
		<tr class="odd">
			<td><?php echo ((is_array($_tmp=@_COMP_COUNTRY)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
			<td><img src="images/flags/<?php echo ((is_array($_tmp=$this->_tpl_vars['params']['profile']['country'])) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)); ?>
.gif" alt="<?php echo $this->_tpl_vars['params']['profile']['country_name']; ?>
"> <?php echo $this->_tpl_vars['params']['profile']['country_name']; ?>

				<?php if ($this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid']): ?>
					[<a href="editglobalprofile.php?uid=<?php echo $this->_tpl_vars['params']['profile']['uid']; ?>
"><?php echo ((is_array($_tmp=@_COMP_EDIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>]
				<?php endif; ?>
			</td>
		</tr>
		<tr class="even"><td style="width:10%"><?php echo ((is_array($_tmp=@_COMP_JOINED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['profile']['user_regdate'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td></tr>
		<tr class="odd">
			<td><?php echo ((is_array($_tmp=@_COMP_PLAYER_KARMA)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
			<td style="vertical-align:middle">
				<?php echo $this->_tpl_vars['params']['profile']['karma_rating']; ?>
%
				(+<?php echo $this->_tpl_vars['params']['profile']['num_positive']; ?>
, <?php echo $this->_tpl_vars['params']['profile']['num_neutral']; ?>
,-<?php echo $this->_tpl_vars['params']['profile']['num_negative']; ?>
)
			</td>
		</tr>
		<tr class="even">
			<td><?php echo ((is_array($_tmp=@_COMP_STATUS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
			<?php if ($this->_tpl_vars['params']['profile']['status'] == 0): ?>
				<td style="color:green"><?php echo ((is_array($_tmp=@_COMP_STATUS_ACTIVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

			<?php elseif ($this->_tpl_vars['params']['profile']['status'] == 1): ?>
				<td style="color:red"><?php echo ((is_array($_tmp=@_COMP_STATUS_INACTIVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

			<?php endif; ?>
			<?php if ($this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid']): ?>
				[<a href="editglobalprofile.php?uid=<?php echo $this->_tpl_vars['params']['profile']['uid']; ?>
"><?php echo ((is_array($_tmp=@_COMP_EDIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>]
			<?php endif; ?>
			</td>
		</tr>
		<?php if ($this->_tpl_vars['params']['profile']['status'] == 1): ?>
			<tr class="odd"><td>Return Date</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['params']['profile']['return_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td></tr>
		<?php endif; ?>
		</table></td>
	</tr>
	</table></td>

		<td><table class="outer">
		<tr><td><h3 class="comp">Recent Posts</h3></td></tr>
		
		<?php $_from = $this->_tpl_vars['params']['posts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['i']):
?>
			<tr><td class="recent_post">
			<a href="<?php echo @XOOPS_URL; ?>
/modules/newbb/viewtopic.php?forum=<?php echo $this->_tpl_vars['i']['forum_id']; ?>
&post_id=<?php echo $this->_tpl_vars['i']['post_id']; ?>
#forumpost<?php echo $this->_tpl_vars['i']['post_id']; ?>
"><?php echo $this->_tpl_vars['i']['subject']; ?>
</a>
			<br>
			<i>Posted <?php echo ((is_array($_tmp=$this->_tpl_vars['i']['post_time'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</i>
			</td></tr>
		<?php endforeach; endif; unset($_from); ?>

	</table></td>
</tr></table>

<br>


<h3 class="comp"><?php echo ((is_array($_tmp=@_COMP_COMPETITIONS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</h3>

<table>

		<?php $_from = $this->_tpl_vars['params']['profile']['competitions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comp']):
?>
		<tr><td><br/><table class="outer">
			<tr><th colspan="2" style="text-align:left;padding-left:5px;"><?php echo ((is_array($_tmp=$this->_tpl_vars['comp']['comp_name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

			</th></tr>

			<tr>
						<td style="width:50%"><table>
				<tr class="odd">
					<td style="width:40%"><?php echo ((is_array($_tmp=@_COMP_CHALLENGESLOT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<?php if ($this->_tpl_vars['comp']['challengeslot'] == 0): ?>
						<td><span style="color:green"><?php echo ((is_array($_tmp=@_COMP_CHALLENGESLOT_OPEN)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

					<?php elseif ($this->_tpl_vars['comp']['challengeslot'] == 1): ?>
						<td><span style="color:red"><?php echo ((is_array($_tmp=@_COMP_CHALLENGESLOT_CLOSED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>

					<?php endif; ?></span><?php if ($this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid']): ?>
				[<a href="editlocalprofile.php?uid=<?php echo $this->_tpl_vars['comp']['xoops_user_id']; ?>
&lid=<?php echo $this->_tpl_vars['comp']['comp_id']; ?>
"><?php echo ((is_array($_tmp=@_COMP_EDIT)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>]
			<?php endif; ?>
					</td>
				</tr>
				<tr class="even"><td><?php echo ((is_array($_tmp=@_COMP_POINTS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 (<?php echo ((is_array($_tmp=@_COMP_RANK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
)</td><td><?php echo $this->_tpl_vars['comp']['rating']; ?>
 (<?php echo $this->_tpl_vars['comp']['rank']; ?>
)</td></tr>
				<tr class="odd">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_RULES)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<td><ul>
						<?php $_from = $this->_tpl_vars['comp']['options']['rules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rule']):
?>
							<li><?php echo $this->_tpl_vars['rule']['desc']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>	
					</ul></td>
				</tr>
				<?php if ($this->_tpl_vars['comp']['comp_id'] == 6): ?>
				<tr class="even">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_MAP)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<td><ul>
						<?php $_from = $this->_tpl_vars['comp']['options']['map']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['map']):
?>
							<li><?php echo $this->_tpl_vars['map']['desc']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul></td>
				</tr>
				<!--<tr class="even">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_NOS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<td><ul>
						<?php $_from = $this->_tpl_vars['comp']['options']['nos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['nos']):
?>
							<li><?php echo $this->_tpl_vars['nos']['desc']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul></td>
				</tr>-->
				<?php endif; ?>
				<tr class="odd">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_LUCK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<td><ul>
						<?php $_from = $this->_tpl_vars['comp']['options']['luck']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['luck']):
?>
							<li><?php echo $this->_tpl_vars['luck']['desc']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul></td>
				</tr>
				<tr class="even">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_MODE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<td><ul>
						<?php $_from = $this->_tpl_vars['comp']['options']['mode']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['mode']):
?>
							<li><?php echo $this->_tpl_vars['mode']['desc']; ?>
</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul></td>
				</tr>
				<tr class="odd">
				<td> </td><td>
				<?php if ($this->_tpl_vars['params']['profile']['uid'] == $this->_tpl_vars['xoops_userid']): ?>
				[<a href="editlocalprofile.php?uid=<?php echo $this->_tpl_vars['comp']['xoops_user_id']; ?>
&lid=<?php echo $this->_tpl_vars['comp']['comp_id']; ?>
">Edit your Rules/Options</a>]
				<?php endif; ?><br></td>
				</tr>
				<tr class="even">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_RECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/record.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['comp']['comp_id'],'uid' => $this->_tpl_vars['comp']['xoops_user_id'],'side' => 'both','wins' => $this->_tpl_vars['comp']['wins'],'matches' => $this->_tpl_vars['comp']['matches'],'winpercent' => $this->_tpl_vars['comp']['winpercent'],'losspercent' => $this->_tpl_vars['comp']['losspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</tr>
				<tr class="odd">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_AXISRECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['comp']['comp_id'],'uid' => $this->_tpl_vars['comp']['xoops_user_id'],'side' => 'axis','wins' => $this->_tpl_vars['comp']['axiswins'],'matches' => $this->_tpl_vars['comp']['axismatches'],'winpercent' => $this->_tpl_vars['comp']['axiswinpercent'],'losspercent' => $this->_tpl_vars['comp']['axislosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</tr>
				<tr class="even">
					<td style="vertical-align:middle"><?php echo ((is_array($_tmp=@_COMP_ALLIESRECORD)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/recordhalf.html", 'smarty_include_vars' => array('comp_id' => $this->_tpl_vars['comp']['comp_id'],'uid' => $this->_tpl_vars['comp']['xoops_user_id'],'side' => 'allies','wins' => $this->_tpl_vars['comp']['allieswins'],'matches' => $this->_tpl_vars['comp']['alliesmatches'],'winpercent' => $this->_tpl_vars['comp']['allieswinpercent'],'losspercent' => $this->_tpl_vars['comp']['allieslosspercent'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</tr>
				<tr class="odd">
					<td><?php echo ((is_array($_tmp=@_COMP_STREAK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td>
					<?php if ($this->_tpl_vars['comp']['streakwins'] > 0): ?><td style="color:green"><?php echo $this->_tpl_vars['comp']['streakwins']; ?>

					<?php elseif ($this->_tpl_vars['comp']['streaklosses'] > 0): ?><td style="color:red">-<?php echo $this->_tpl_vars['comp']['streaklosses']; ?>

					<?php else: ?><td>0
					<?php endif; ?>
					</td>
				</tr>
				<tr class="even"><td><?php echo ((is_array($_tmp=@_COMP_LONGEST)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_STREAK)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_WINS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 / <?php echo ((is_array($_tmp=@_COMP_LOSSES)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td><td><?php echo $this->_tpl_vars['comp']['longest_winstreak']; ?>
 / <?php echo $this->_tpl_vars['comp']['longest_lossstreak']; ?>
</td></tr>
				<tr class="odd"><td><?php echo ((is_array($_tmp=@_COMP_POINTS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_MAX)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 / <?php echo ((is_array($_tmp=@_COMP_MIN)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</td><td><?php echo $this->_tpl_vars['comp']['highest_rating']; ?>
 / <?php echo $this->_tpl_vars['comp']['lowest_rating']; ?>
</td></tr>
			</table></td>

						<td style="padding-top:5px;">
			<h3 class="comp">Recent Games [<a href="matches.php?uid=<?php echo $this->_tpl_vars['comp']['xoops_user_id']; ?>
&lid=<?php echo $this->_tpl_vars['comp']['comp_id']; ?>
" class="viewAll">View All</a>]</h3>
			<table class="outer" style="text-align:center;">
				<tr><th>Winner</th><th>Loser</th><th>Winning Side</th><th>Date</th></tr>
				<?php unset($this->_sections['match']);
$this->_sections['match']['name'] = 'match';
$this->_sections['match']['loop'] = is_array($_loop=$this->_tpl_vars['comp']['played_matches']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['match']['max'] = (int)5;
$this->_sections['match']['show'] = true;
if ($this->_sections['match']['max'] < 0)
    $this->_sections['match']['max'] = $this->_sections['match']['loop'];
$this->_sections['match']['step'] = 1;
$this->_sections['match']['start'] = $this->_sections['match']['step'] > 0 ? 0 : $this->_sections['match']['loop']-1;
if ($this->_sections['match']['show']) {
    $this->_sections['match']['total'] = min(ceil(($this->_sections['match']['step'] > 0 ? $this->_sections['match']['loop'] - $this->_sections['match']['start'] : $this->_sections['match']['start']+1)/abs($this->_sections['match']['step'])), $this->_sections['match']['max']);
    if ($this->_sections['match']['total'] == 0)
        $this->_sections['match']['show'] = false;
} else
    $this->_sections['match']['total'] = 0;
if ($this->_sections['match']['show']):

            for ($this->_sections['match']['index'] = $this->_sections['match']['start'], $this->_sections['match']['iteration'] = 1;
                 $this->_sections['match']['iteration'] <= $this->_sections['match']['total'];
                 $this->_sections['match']['index'] += $this->_sections['match']['step'], $this->_sections['match']['iteration']++):
$this->_sections['match']['rownum'] = $this->_sections['match']['iteration'];
$this->_sections['match']['index_prev'] = $this->_sections['match']['index'] - $this->_sections['match']['step'];
$this->_sections['match']['index_next'] = $this->_sections['match']['index'] + $this->_sections['match']['step'];
$this->_sections['match']['first']      = ($this->_sections['match']['iteration'] == 1);
$this->_sections['match']['last']       = ($this->_sections['match']['iteration'] == $this->_sections['match']['total']);
?>
					<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
						<td><?php echo $this->_tpl_vars['comp']['played_matches'][$this->_sections['match']['index']]['winner_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['comp']['played_matches'][$this->_sections['match']['index']]['loser_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['comp']['played_matches'][$this->_sections['match']['index']]['side_name']; ?>
</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['comp']['played_matches'][$this->_sections['match']['index']]['match_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					</tr>
				<?php endfor; endif; ?>
			</table>
			<br>
			
			<h3 class="comp">Current Challenges [<a href="challenges.php?uid=<?php echo $this->_tpl_vars['comp']['xoops_user_id']; ?>
&lid=<?php echo $this->_tpl_vars['comp']['comp_id']; ?>
" class="viewAll">View All</a>]</h3>
			<table class="outer" style="text-align:center;">
				<tr><th>Challenger</th><th>Challenged</th><th>Challenge Date</th></tr>
				<?php unset($this->_sections['chall']);
$this->_sections['chall']['name'] = 'chall';
$this->_sections['chall']['loop'] = is_array($_loop=$this->_tpl_vars['comp']['challenges']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['chall']['max'] = (int)5;
$this->_sections['chall']['show'] = true;
if ($this->_sections['chall']['max'] < 0)
    $this->_sections['chall']['max'] = $this->_sections['chall']['loop'];
$this->_sections['chall']['step'] = 1;
$this->_sections['chall']['start'] = $this->_sections['chall']['step'] > 0 ? 0 : $this->_sections['chall']['loop']-1;
if ($this->_sections['chall']['show']) {
    $this->_sections['chall']['total'] = min(ceil(($this->_sections['chall']['step'] > 0 ? $this->_sections['chall']['loop'] - $this->_sections['chall']['start'] : $this->_sections['chall']['start']+1)/abs($this->_sections['chall']['step'])), $this->_sections['chall']['max']);
    if ($this->_sections['chall']['total'] == 0)
        $this->_sections['chall']['show'] = false;
} else
    $this->_sections['chall']['total'] = 0;
if ($this->_sections['chall']['show']):

            for ($this->_sections['chall']['index'] = $this->_sections['chall']['start'], $this->_sections['chall']['iteration'] = 1;
                 $this->_sections['chall']['iteration'] <= $this->_sections['chall']['total'];
                 $this->_sections['chall']['index'] += $this->_sections['chall']['step'], $this->_sections['chall']['iteration']++):
$this->_sections['chall']['rownum'] = $this->_sections['chall']['iteration'];
$this->_sections['chall']['index_prev'] = $this->_sections['chall']['index'] - $this->_sections['chall']['step'];
$this->_sections['chall']['index_next'] = $this->_sections['chall']['index'] + $this->_sections['chall']['step'];
$this->_sections['chall']['first']      = ($this->_sections['chall']['iteration'] == 1);
$this->_sections['chall']['last']       = ($this->_sections['chall']['iteration'] == $this->_sections['chall']['total']);
?>
					<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
						<td><?php echo $this->_tpl_vars['comp']['challenges'][$this->_sections['chall']['index']]['challenger_name']; ?>
</td>
						<td><?php echo $this->_tpl_vars['comp']['challenges'][$this->_sections['chall']['index']]['challenged_name']; ?>
</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['comp']['challenges'][$this->_sections['chall']['index']]['chall_date'])) ? $this->_run_mod_handler('date_format', true, $_tmp) : smarty_modifier_date_format($_tmp)); ?>
</td>
					</tr>
				<?php endfor; endif; ?>
			</table></td>
			</tr>
		</table></td></tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br>
<h3 class="comp"><?php echo ((is_array($_tmp=@_COMP_KARMA)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 <?php echo ((is_array($_tmp=@_COMP_RATINGS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 [<a href="rating.php?uid=<?php echo $this->_tpl_vars['params']['profile']['uid']; ?>
"><?php echo ((is_array($_tmp=@_COMP_VIEW_ALL)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>]</h3>
<table>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "file:".($this->_tpl_vars['xoops_rootpath'])."/modules/comp/templates/ratings_table.html", 'smarty_include_vars' => array('params' => $this->_tpl_vars['params'],'max' => 5)));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>