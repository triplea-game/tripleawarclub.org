<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_topics_directory.html */ ?>
<div class="news-topics-directory">
	<h2><?php echo @_AM_NEWS_TOPICS_DIRECTORY; ?>
</h2>
	<div class="pad2">
		<ul>
		<?php $_from = $this->_tpl_vars['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
			<li><?php echo $this->_tpl_vars['topic']['prefix']; ?>
<a title="<?php echo $this->_tpl_vars['topic']['title']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a> (<?php echo $this->_tpl_vars['topic']['news_count']; ?>
)</li>
		<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
</div>