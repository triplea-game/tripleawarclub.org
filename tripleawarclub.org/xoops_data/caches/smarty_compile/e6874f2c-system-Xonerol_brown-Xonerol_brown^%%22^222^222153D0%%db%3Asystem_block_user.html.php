<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:35
         compiled from db:system_block_user.html */ ?>
<div id="menublock">
<ul id="usermenu">

      <?php if ($this->_tpl_vars['xoops_isadmin']): ?>
        <li><a class="menuTop first" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/admin.php" title="<?php echo $this->_tpl_vars['block']['lang_adminmenu']; ?>
"><?php echo $this->_tpl_vars['block']['lang_adminmenu']; ?>
</a></li>
	    <li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php" title="<?php echo $this->_tpl_vars['block']['lang_youraccount']; ?>
"><?php echo $this->_tpl_vars['block']['lang_youraccount']; ?>
</a></li>
      <?php else: ?>
		<li><a class="menuTop first" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php" title="<?php echo $this->_tpl_vars['block']['lang_youraccount']; ?>
"><?php echo $this->_tpl_vars['block']['lang_youraccount']; ?>
</a></li>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['block']['new_messages'] > 0): ?>
        <li><a class="highlight" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/viewpmsg.php" title="<?php echo $this->_tpl_vars['block']['lang_inbox']; ?>
"><?php echo $this->_tpl_vars['block']['lang_inbox']; ?>
 (<span style="color:#ffff1f; font-weight: bold;"><?php echo $this->_tpl_vars['block']['new_messages']; ?>
</span>)</a></li>
      <?php else: ?>
        <li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/viewpmsg.php" title="<?php echo $this->_tpl_vars['block']['lang_inbox']; ?>
"><?php echo $this->_tpl_vars['block']['lang_inbox']; ?>
</a></li>
      <?php endif; ?>
      <li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php?op=logout" title="<?php echo $this->_tpl_vars['block']['lang_logout']; ?>
"><?php echo $this->_tpl_vars['block']['lang_logout']; ?>
</a></li>

</ul>
</div>