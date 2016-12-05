<?php /* Smarty version 2.6.28, created on 2016-02-13 20:08:40
         compiled from db:comp_menu_player.html */ ?>
<ul id="player">
<li><a class="playermenu first" href="<?php echo @XOOPS_URL; ?>
/modules/comp/profile.php?uid=<?php echo $this->_tpl_vars['xoops_userid']; ?>
"><?php echo @_COMP_BLOCK_PROFILE; ?>
</a></li>
<li><a class="playermenu" href="<?php echo @XOOPS_URL; ?>
/modules/comp/challenges.php?uid=<?php echo $this->_tpl_vars['xoops_userid']; ?>
"><?php echo @_COMP_BLOCK_MY_CHALLENGES; ?>
</a></li>
<li><a class="playermenu" href="<?php echo @XOOPS_URL; ?>
/modules/comp/matches.php?op=search&uid=<?php echo $this->_tpl_vars['xoops_userid']; ?>
"><?php echo @_COMP_BLOCK_FIND_OPPONENTS; ?>
</a></li>
<li><a class="playermenu" href="<?php echo @XOOPS_URL; ?>
/modules/comp/matches.php?op=report&uid=<?php echo $this->_tpl_vars['xoops_userid']; ?>
"><?php echo @_COMP_BLOCK_REPORT_MATCH; ?>
</a></li>
<li><a class="playermenu" href="<?php echo @XOOPS_URL; ?>
/modules/comp/rating.php?op=rate"><?php echo @_COMP_BLOCK_RATE_PLAYER; ?>
</a></li>
<?php if ($this->_tpl_vars['ladder']['is_admin'] == true): ?>
<li><a class="adminmenu" href="<?php echo @XOOPS_URL; ?>
/modules/comp/ladderadmin.php">Admin</a></li>
<?php endif; ?>
</ul>