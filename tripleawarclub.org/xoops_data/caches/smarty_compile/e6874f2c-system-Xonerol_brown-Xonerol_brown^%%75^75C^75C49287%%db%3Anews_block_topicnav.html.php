<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_block_topicnav.html */ ?>
<div class="mainmenu news-mainmenu">
	<?php $_from = $this->_tpl_vars['block']['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
	<h2><a class="menuMain" title="<?php echo $this->_tpl_vars['topic']['title']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
 <?php echo $this->_tpl_vars['topic']['news_count']; ?>
</a></h2>
	<?php endforeach; endif; unset($_from); ?>
</div>