<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_block_randomnews.html */ ?>
<div class="news-random">
	<?php $_from = $this->_tpl_vars['block']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
	   <div class="item">
	   <h2>
		   <span>
			<?php if ($this->_tpl_vars['block']['sort'] == 'counter'): ?>
			[<?php echo $this->_tpl_vars['news']['hits']; ?>
]
			<?php elseif ($this->_tpl_vars['block']['sort'] == 'published'): ?>
			[<?php echo $this->_tpl_vars['news']['date']; ?>
]
			<?php else: ?>
			[<?php echo $this->_tpl_vars['news']['rating']; ?>
]
			<?php endif; ?>
			</span>
			<?php echo $this->_tpl_vars['news']['topic_title']; ?>
 - <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['news']['id']; ?>
" <?php echo $this->_tpl_vars['news']['infotips']; ?>
><?php echo $this->_tpl_vars['news']['title']; ?>
</a> 
		</h2>
		<?php if ($this->_tpl_vars['news']['teaser']): ?><p><?php echo $this->_tpl_vars['news']['teaser']; ?>
</p><?php endif; ?>
	   </div>
	<?php endforeach; endif; unset($_from); ?>
</div>