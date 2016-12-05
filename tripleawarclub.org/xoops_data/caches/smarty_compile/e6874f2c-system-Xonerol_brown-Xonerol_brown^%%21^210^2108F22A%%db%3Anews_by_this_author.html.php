<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_by_this_author.html */ ?>
<div class="news-author">
	<h2><?php echo $this->_tpl_vars['lang_news_by_this_author']; ?>
 <?php echo $this->_tpl_vars['author_name_with_link']; ?>
</h2>
	<br /><img src='<?php echo $this->_tpl_vars['user_avatarurl']; ?>
' border='0' alt='' />
	<br />
	<table width='100%' border='0'>
	<?php $_from = $this->_tpl_vars['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
		<tr>
			<?php if ($this->_tpl_vars['news_rating']): ?><th colspan='4'><?php else: ?><th colspan='3'><?php endif; ?><?php echo $this->_tpl_vars['topic']['topic_link']; ?>
</th>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['lang_date']; ?>
</td><td><?php echo $this->_tpl_vars['lang_title']; ?>
</td><td><?php echo $this->_tpl_vars['lang_hits']; ?>
</td><?php if ($this->_tpl_vars['news_rating']): ?><td><?php echo $this->_tpl_vars['lang_rating']; ?>
</td><?php endif; ?>
		</tr>
		<?php $_from = $this->_tpl_vars['topic']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['article']):
?>
		<tr>
			<td><?php echo $this->_tpl_vars['article']['published']; ?>
</td><td><?php echo $this->_tpl_vars['article']['article_link']; ?>
</td><td align='right'><?php echo $this->_tpl_vars['article']['hits']; ?>
</td><?php if ($this->_tpl_vars['news_rating']): ?><td align='right'><?php echo $this->_tpl_vars['article']['rating']; ?>
</td><?php endif; ?>
		</tr>
		<?php endforeach; endif; unset($_from); ?>
		<tr>
			<td colspan='2' align='left'><?php echo $this->_tpl_vars['topic']['topic_count_articles']; ?>
</td>
			<td align='right'><?php echo $this->_tpl_vars['topic']['topic_count_reads']; ?>
</td><?php if ($this->_tpl_vars['news_rating']): ?><td>&nbsp;</td><?php endif; ?>
		</tr>
		<tr><?php if ($this->_tpl_vars['news_rating']): ?><td colspan='4'><?php else: ?><td colspan='3'><?php endif; ?>&nbsp;</td></tr>
	<?php endforeach; endif; unset($_from); ?>
	</table>
</div>