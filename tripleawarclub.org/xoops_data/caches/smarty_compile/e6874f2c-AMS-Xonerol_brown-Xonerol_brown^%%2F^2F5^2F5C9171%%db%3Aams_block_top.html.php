<?php /* Smarty version 2.6.28, created on 2016-02-13 20:04:54
         compiled from db:ams_block_top.html */ ?>
<div>
    <ul>
        <?php $_from = $this->_tpl_vars['block']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
			<?php if ($this->_tpl_vars['news']['friendlyurl_enable'] != 1): ?>
            <li style="clear:both;"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['news']['id']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
</a> (<?php echo $this->_tpl_vars['news']['hits']; ?>
)<br /><?php echo $this->_tpl_vars['news']['teaser']; ?>
</li>
			<?php else: ?>
            <li style="clear:both;"><a href="<?php echo $this->_tpl_vars['news']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
</a> (<?php echo $this->_tpl_vars['news']['hits']; ?>
)<br /><?php echo $this->_tpl_vars['news']['teaser']; ?>
</li>
			<?php endif; ?>
		
        <?php endforeach; endif; unset($_from); ?>
    </ul>
</div>