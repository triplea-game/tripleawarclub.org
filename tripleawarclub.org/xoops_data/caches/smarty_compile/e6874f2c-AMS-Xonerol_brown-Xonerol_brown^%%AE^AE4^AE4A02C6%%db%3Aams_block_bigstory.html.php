<?php /* Smarty version 2.6.28, created on 2016-02-13 20:04:09
         compiled from db:ams_block_bigstory.html */ ?>
<p><?php echo $this->_tpl_vars['block']['message']; ?>
</p>

<?php if ($this->_tpl_vars['block']['story_id'] != ""): ?>
	<?php if ($this->_tpl_vars['block']['friendlyurl_enable'] != 1): ?>
    <p><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['block']['story_id']; ?>
"><?php echo $this->_tpl_vars['block']['story_title']; ?>
</p>
	<?php else: ?>
    <p><a href="<?php echo $this->_tpl_vars['block']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['block']['story_title']; ?>
</p>
	<?php endif; ?>
<?php endif; ?>