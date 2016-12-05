<?php /* Smarty version 2.6.28, created on 2016-03-10 16:09:24
         compiled from db:comp_menu.html */ ?>
<ul class="menu collapsible">

<?php $_from = $this->_tpl_vars['block']['ladders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['foo'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['foo']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['myId'] => $this->_tpl_vars['ladder']):
        $this->_foreach['foo']['iteration']++;
?>

<li class="expand">
			<a href="#" class="title"><?php echo $this->_tpl_vars['ladder']['title']; ?>
</a>
			<ul class="acitem">
			<?php if ($this->_tpl_vars['ladder']['is_player'] != true): ?>
					<li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/comp/join.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_JOIN; ?>
</a></li>
			<?php endif; ?>
				<li><a href="<?php echo @XOOPS_URL; ?>
/modules/comp/rules.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_RULES; ?>
</a></li>		
				<li><a href="<?php echo @XOOPS_URL; ?>
/modules/comp/players.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_PLAYERS; ?>
</a></li>
				<li><a href="<?php echo @XOOPS_URL; ?>
/modules/comp/standings.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_STANDINGS; ?>
</a></li>
				<!--<li><a href="<?php echo @XOOPS_URL; ?>
/modules/comp/matches.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_MATCHES; ?>
</a></li>-->
				<li><a href="<?php echo @XOOPS_URL; ?>
/modules/comp/challenges.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_CHALLENGES; ?>
</a></li>
				<li><a href="<?php echo @XOOPS_URL; ?>
/modules/newbb/viewforum.php?forum=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_FORUMS; ?>
</a></li>
				<?php if ($this->_tpl_vars['ladder']['is_player'] == true): ?>
					<li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/comp/leave.php?lid=<?php echo $this->_tpl_vars['ladder']['comp_id']; ?>
"><?php echo @_COMP_BLOCK_LEAVE; ?>
</a></li>
				<?php endif; ?>
			</ul>	
<?php endforeach; endif; unset($_from); ?>