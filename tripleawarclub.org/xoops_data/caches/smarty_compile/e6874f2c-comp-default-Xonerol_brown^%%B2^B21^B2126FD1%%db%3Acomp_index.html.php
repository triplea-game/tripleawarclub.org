<?php /* Smarty version 2.6.28, created on 2016-03-10 16:09:24
         compiled from db:comp_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:comp_index.html', 18, false),)), $this); ?>
<h2 class="boxHeader">Ladders</h2>
<p>Below are the current ladders for Revised and 1941. For discussion, please see the <a href="http://www.tripleawarclub.org/modules/newbb/index.php?cat=2">ladder forum</a>. </p>
<br>

		 <?php $_from = $this->_tpl_vars['index']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comp_id']):
?>

			 <?php $_from = $this->_tpl_vars['comp_id']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['ladder']):
?>

				<h3 class="comp"><?php echo $this->_tpl_vars['ladder']['comp_name']; ?>
</h3>

				<table width="100%" cellpadding="0" cellspacing="0" border="0" class="comp_table">

					<tr> 

						<td rowspan="2" width="150"><img src="<?php echo $this->_tpl_vars['ladder']['comp_image']; ?>
" class="comp_image" width="150"></td>

						<td>
						<p><u><?php echo ((is_array($_tmp=@_COMP_DESC)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</u> <?php echo $this->_tpl_vars['ladder']['comp_desc']; ?>
</p>
						<p><i><?php echo ((is_array($_tmp=@_COMP_PLAYERS)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</i> <?php echo $this->_tpl_vars['ladder']['comp_players']; ?>
<br/>
						<i><?php echo ((is_array($_tmp=@_COMP_MATCHES_PLAYED)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
:</i> <?php echo $this->_tpl_vars['ladder']['comp_matches']/2; ?>
</p>
						<h2 class="boxHeader">
							<?php if ($this->_tpl_vars['ladder']['is_player'] != true): ?>
								<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/comp/join.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo ((is_array($_tmp=@_COMP_BLOCK_JOIN)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a> »
							<?php else: ?>
								<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/comp/leave.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo ((is_array($_tmp=@_COMP_BLOCK_LEAVE)) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
</a>
							<?php endif; ?>
							</h2>
						</td>

					</tr>

					<tr> 

				    	<td> 
	
							<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/comp/rules.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_RULES; ?>
</a> | 
							<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewforum.php?forum=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_FORUMS; ?>
</a>
						
						</td>

  					</tr>

				</table>

				<br>

				

			 <?php endforeach; endif; unset($_from); ?>	

		 <?php endforeach; endif; unset($_from); ?>