<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_whos_who.html */ ?>
<div class="news-whoswho">
	<h2><?php echo @_AM_NEWS_WHOS_WHO; ?>
</h2>
	<h3><?php echo @_NW_NEWS_LIST_OF_AUTHORS; ?>
</h3>
	<ul>
	<?php $_from = $this->_tpl_vars['whoswho']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['who']):
?>
		<li><a title="<?php echo $this->_tpl_vars['who']['name']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/newsbythisauthor.php?uid=<?php echo $this->_tpl_vars['who']['uid']; ?>
"><?php echo $this->_tpl_vars['who']['name']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>