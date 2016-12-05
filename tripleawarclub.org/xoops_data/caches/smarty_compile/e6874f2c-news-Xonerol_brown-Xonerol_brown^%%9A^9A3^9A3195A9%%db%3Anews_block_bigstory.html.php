<?php /* Smarty version 2.6.28, created on 2016-02-14 17:38:30
         compiled from db:news_block_bigstory.html */ ?>
<div class="news-bigstory">
	<p><?php echo $this->_tpl_vars['block']['message']; ?>
</p>
	<?php if ($this->_tpl_vars['block']['story_id'] != ""): ?>
	  <h2><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['block']['story_id']; ?>
"<?php echo $this->_tpl_vars['block']['htmltitle']; ?>
><?php echo $this->_tpl_vars['block']['story_title']; ?>
</a></h2>
	<?php endif; ?>
</div>