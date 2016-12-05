<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_item.html */ ?>
<table cellpadding="0" cellspacing="0" class="item">
<tr>
	<td>
		<table cellpadding="0" cellspacing="0" width="98%">
		<tr>
			<td class="itemHead">
				<span class="itemTitle">
					<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php?storytopic=<?php echo $this->_tpl_vars['story']['topicid']; ?>
"><?php echo $this->_tpl_vars['story']['topic_title']; ?>
</a> : <?php echo $this->_tpl_vars['story']['news_title']; ?>

				</span>
			</td>
		</tr>
		<tr>
			<td class="itemInfo"><?php if ($this->_tpl_vars['story']['files_attached']): ?><?php echo $this->_tpl_vars['story']['attached_link']; ?>
&nbsp;<?php endif; ?><?php if ($this->_tpl_vars['story']['poster'] != ''): ?><span class="itemPoster_news"><?php echo $this->_tpl_vars['lang_postedby']; ?>
 <?php echo $this->_tpl_vars['story']['poster']; ?>
</span><?php endif; ?> <span class="itemPostDate"><?php echo $this->_tpl_vars['lang_on']; ?>
 <?php echo $this->_tpl_vars['story']['posttime']; ?>
</span> (<span class="itemStats"><?php echo $this->_tpl_vars['story']['hits']; ?>
 <?php echo $this->_tpl_vars['lang_reads']; ?>
</span>) <?php echo $this->_tpl_vars['news_by_the_same_author_link']; ?>
</td>
		</tr>
		<tr>
			<td class="itemBody"><?php echo $this->_tpl_vars['story']['imglink']; ?>
<p class="itemText"><?php echo $this->_tpl_vars['story']['text']; ?>
</p></td>
		</tr>
		<tr>
			<td class="itemFoot"><span class="itemAdminLink"><?php echo $this->_tpl_vars['story']['adminlink']; ?>
</span><?php if ($this->_tpl_vars['rates']): ?><b><?php echo $this->_tpl_vars['lang_ratingc']; ?>
</b> <?php echo $this->_tpl_vars['story']['rating']; ?>
 (<?php echo $this->_tpl_vars['story']['votes']; ?>
) - <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/ratenews.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" rel="nofollow"><?php echo $this->_tpl_vars['lang_ratethisnews']; ?>
</a> - <?php endif; ?><span class="itemPermaLink_news"><?php echo $this->_tpl_vars['story']['morelink']; ?>
</span></td>
		</tr>
		</table>
	</td>
</tr>
</table>