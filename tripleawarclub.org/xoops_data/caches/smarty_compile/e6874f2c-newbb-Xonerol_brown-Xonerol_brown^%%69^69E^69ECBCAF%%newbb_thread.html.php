<?php /* Smarty version 2.6.28, created on 2016-02-13 20:33:25
         compiled from /usr/share/nginx/html/tripleawarclub.org/public_html/modules/newbb/templates/newbb_thread.html */ ?>
<a id="forumpost<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
"></a>
<table class="outer" cellpadding="0" cellspacing="0" border="0" width="100%" align="center" id="thread_table">
  <tr>
       <th width="20%" align="left">
       <div class="comUserName"><?php echo $this->_tpl_vars['topic_post']['poster']['link']; ?>
</div>
   	</th>

    <th width="75%" align="left"><div class="comTitle"><?php echo $this->_tpl_vars['topic_post']['post_title']; ?>
</div></th>
    <th align="right"><div class="comTitle" style="float: right;"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
#forumpost<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
">#<?php echo $this->_tpl_vars['topic_post']['post_no']; ?>
</a></div></th>
  </tr>

  <tr>
  	<td width="20%" class="odd" rowspan="2" valign="top">
  	<?php if ($this->_tpl_vars['topic_post']['poster']['uid'] != 0): ?>
  	<div class="comUserRankText"><?php echo $this->_tpl_vars['topic_post']['poster']['rank']['title']; ?>
<br /><?php echo $this->_tpl_vars['topic_post']['poster']['rank']['image']; ?>
</div>
  	<?php if ($this->_tpl_vars['topic_post']['poster']['avatar']): ?>
  	<img class="comUserImg" src="<?php echo $this->_tpl_vars['xoops_upload_url']; ?>
/<?php echo $this->_tpl_vars['topic_post']['poster']['avatar']; ?>
" alt="" />
  	<?php endif; ?>
  	<div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_JOINED; ?>
:</span><br /><?php echo $this->_tpl_vars['topic_post']['poster']['regdate']; ?>
</div>
  	<?php if ($this->_tpl_vars['topic_post']['poster']['from']): ?>
  	<div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_FROM; ?>
</span> <?php echo $this->_tpl_vars['topic_post']['poster']['from']; ?>
</div>
  	<?php endif; ?>
	<?php if ($this->_tpl_vars['topic_post']['poster']['groups']): ?>
  	<div class="comUserStat"> <span class="comUserStatCaption"><?php echo @_MD_GROUP; ?>
</span>
  	<?php $_from = $this->_tpl_vars['topic_post']['poster']['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?> <br /><?php echo $this->_tpl_vars['group']; ?>
<?php endforeach; endif; unset($_from); ?>
  	</div>
	<?php endif; ?>
  	<div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_POSTS; ?>
:</span> 
  	<?php if ($this->_tpl_vars['topic_post']['poster']['posts'] > 0): ?>
  	<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?uid=<?php echo $this->_tpl_vars['topic_post']['poster']['uid']; ?>
" title="<?php echo @_ALL; ?>
" target="_self"><?php echo $this->_tpl_vars['topic_post']['poster']['posts']; ?>
</a>
  	<?php else: ?>
  	0
  	<?php endif; ?>
  	</div>
  	<?php if ($this->_tpl_vars['topic_post']['poster']['level']): ?>
  	<div class="comUserStat"><?php echo $this->_tpl_vars['topic_post']['poster']['level']; ?>
</div>
  	<?php endif; ?>
  	<?php if ($this->_tpl_vars['topic_post']['poster']['status']): ?>
  	<div class="comUserStatus"><?php echo $this->_tpl_vars['topic_post']['poster']['status']; ?>
</div>
  	<?php endif; ?>
	<?php else: ?>
   	<div class="comUserRankText"><?php echo $this->_tpl_vars['anonymous_prefix']; ?>
<?php echo $this->_tpl_vars['topic_post']['poster']['name']; ?>
</div>
	<?php endif; ?>
	</td>

    <td colspan="2" class="odd" style="border-bottom:none;">
    <div class="comText"><?php echo $this->_tpl_vars['topic_post']['post_text']; ?>
</div>
	<?php if ($this->_tpl_vars['topic_post']['post_attachment']): ?>
	<div class="comText"><?php echo $this->_tpl_vars['topic_post']['post_attachment']; ?>
</div>
	<?php endif; ?>
	<div class="clear"></div>
    <div style="float: right; padding: 0px 5px 0px 0px;">
	<?php if ($this->_tpl_vars['topic_post']['poster_ip']): ?>
	IP: <a href="http://www.whois.sc/<?php echo $this->_tpl_vars['topic_post']['poster_ip']; ?>
" target="_blank"><?php echo $this->_tpl_vars['topic_post']['poster_ip']; ?>
</a> |
	<?php endif; ?>
    <?php echo @_MD_POSTEDON; ?>
<?php echo $this->_tpl_vars['topic_post']['post_date']; ?>
</div>
	<?php if ($this->_tpl_vars['topic_post']['post_edit']): ?>
	<div class="clear"></div>
	<?php endif; ?>
	</td>
  </tr>

  <tr>
    <td colspan="2" class="odd" valign="bottom">
	<?php if ($this->_tpl_vars['topic_post']['post_signature']): ?>
    <div class="signature">
	_________________<br />
	<?php echo $this->_tpl_vars['topic_post']['post_signature']; ?>

	</div>
	<?php endif; ?>
	</td>
  </tr>

  <tr>
    <td width="20%" class="foot">
	<!--<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.transfer.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" target="_blank" title="<?php echo @_MD_TRANSFER_DESC; ?>
"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/images/external.png" alt="<?php echo @_MD_TRANSFER_DESC; ?>
" /> <?php echo @_MD_TRANSFER; ?>
</a>-->
	</td>
    <td colspan="2" class="foot"><div align="right">
    <?php if ($this->_tpl_vars['mode'] > 1): ?>
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=1" target="_self" title="<?php echo @_MD_SPLIT_ONE; ?>
"><?php echo @_MD_SPLIT_ONE; ?>
</a> | 
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=2" target="_self" title="<?php echo @_MD_SPLIT_TREE; ?>
"><?php echo @_MD_SPLIT_TREE; ?>
</a> | 
		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=3" target="_self" title="<?php echo @_MD_SPLIT_ALL; ?>
"><?php echo @_MD_SPLIT_ALL; ?>
</a> | 
		<input type="checkbox" name="post_id[]" id="post_id[<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
]" value="<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" />
    <?php else: ?>
    	<?php $_from = $this->_tpl_vars['topic_post']['thread_buttons']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['btn']):
?> <a href="<?php echo $this->_tpl_vars['btn']['link']; ?>
&amp;post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" title="<?php echo $this->_tpl_vars['btn']['name']; ?>
"> <?php echo $this->_tpl_vars['btn']['image']; ?>
</a> <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
    <a href="#threadtop" title="<?php echo @_MD_UP; ?>
"> <?php echo $this->_tpl_vars['p_up']; ?>
</a>
    </div>
    </td>
  </tr>
</table>