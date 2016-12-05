<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_block_archives.html */ ?>
<div class="news-archives">
	<h2><?php echo @_NW_NEWSARCHIVES; ?>
</h2>
	<ul>
	<?php $_from = $this->_tpl_vars['block']['archives']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onedate']):
?>
	<li>
	    <a title="<?php echo $this->_tpl_vars['onedate']['formated_month']; ?>
 <?php echo $this->_tpl_vars['onedate']['year']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/archive.php?year=<?php echo $this->_tpl_vars['onedate']['year']; ?>
&amp;month=<?php echo $this->_tpl_vars['onedate']['month']; ?>
"><?php echo $this->_tpl_vars['onedate']['formated_month']; ?>
 <?php echo $this->_tpl_vars['onedate']['year']; ?>
</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul>
</div>