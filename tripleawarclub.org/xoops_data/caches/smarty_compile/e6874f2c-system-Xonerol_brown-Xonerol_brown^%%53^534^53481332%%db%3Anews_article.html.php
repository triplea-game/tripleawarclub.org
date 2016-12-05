<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_article.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:news_article.html', 48, false),)), $this); ?>
<div class="news-article">
	
	<div class="marg2 pad2"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:news_item.html", 'smarty_include_vars' => array('story' => $this->_tpl_vars['story'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

        <?php if ($this->_tpl_vars['xoops_isadmin']): ?>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/submit.php?op=edit&amp;storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/edit.png'; ?>" title="<?php echo @_EDIT; ?>
"></a>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/admin/index.php?op=delete&amp;storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/delete.png'; ?>" title="<?php echo @_DELETE; ?>
"></a>
        <?php endif; ?>

        <?php if ($this->_tpl_vars['showicons'] == true): ?>
  		<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/print.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" rel="nofollow" title="<?php echo $this->_tpl_vars['lang_printerpage']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/printer.png'; ?>"  alt="<?php echo $this->_tpl_vars['lang_printerpage']; ?>
" /></a>
  		<a target="_top" href="<?php echo $this->_tpl_vars['mail_link']; ?>
" title="<?php echo $this->_tpl_vars['lang_sendstory']; ?>
" rel="nofollow"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/mail_forward.png'; ?>"  alt="<?php echo $this->_tpl_vars['lang_sendstory']; ?>
" /></a>
          <a target="_blank" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/makepdf.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" rel="nofollow" title="<?php echo $this->_tpl_vars['lang_pdfstory']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/pdf.png'; ?>"  alt="<?php echo $this->_tpl_vars['lang_pdfstory']; ?>
" /></a>
  	   <?php endif; ?>

    </div>
	

	<?php if ($this->_tpl_vars['attached_files_count'] > 0): ?>
		<div class="itemInfo"><?php echo $this->_tpl_vars['lang_attached_files']; ?>

			<?php $_from = $this->_tpl_vars['attached_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onefile']):
?>
				<a href='<?php echo $this->_tpl_vars['onefile']['visitlink']; ?>
' target='_blank'><?php echo $this->_tpl_vars['onefile']['file_realname']; ?>
</a>&nbsp;
			<?php endforeach; endif; unset($_from); ?>
		</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['pagenav']): ?><div class="pagenav"><?php echo @_NW_PAGE; ?>
 <?php echo $this->_tpl_vars['pagenav']; ?>
</div><?php endif; ?>
	
	<?php if ($this->_tpl_vars['tags']): ?>
		<div class="marg10 tagbar"><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:tag_bar.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?></div>
	<?php endif; ?>
	
	<div class="pad5 marg5">
		<?php if ($this->_tpl_vars['nav_links']): ?>
		<?php if ($this->_tpl_vars['previous_story_id'] != -1): ?><a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['previous_story_id']; ?>
' title="<?php echo $this->_tpl_vars['previous_story_title']; ?>
"><?php echo $this->_tpl_vars['lang_previous_story']; ?>
</a> - <?php endif; ?>
		<?php if ($this->_tpl_vars['next_story_id'] != -1): ?><a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['next_story_id']; ?>
' title="<?php echo $this->_tpl_vars['next_story_title']; ?>
"><?php echo $this->_tpl_vars['lang_next_story']; ?>
</a><?php endif; ?>
		<?php endif; ?>	

	</div>
	
	<?php if ($this->_tpl_vars['showsummary'] == true && $this->_tpl_vars['summary_count'] > 0): ?>
	<div class="marg10">
		<table width='50%' cellspacing='0' cellpadding='1'>
			<tr>
				<th><?php echo $this->_tpl_vars['lang_other_story']; ?>
</th>
			</tr>
			<?php $_from = $this->_tpl_vars['summary']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onesummary']):
?>
			<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
				<td align='left'><?php echo $this->_tpl_vars['onesummary']['story_published']; ?>
 - <a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['onesummary']['story_id']; ?>
'<?php echo $this->_tpl_vars['onesummary']['htmltitle']; ?>
><?php echo $this->_tpl_vars['onesummary']['story_title']; ?>
</a></td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['bookmarkme'] == true): ?>
	<div class="item-bookmarkme">
		<div class="head item-bookmarkme-title"><?php echo @_NW_BOOKMARK_ME; ?>
</div>
		<div class="item-bookmarkme-items">
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_BLINKLIST; ?>
" href="http://www.blinklist.com/index.php?Action=Blink/addblink.php&Description=&Url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&Title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_BLINKLIST; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/blinklist.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_DELICIOUS; ?>
" href="http://del.icio.us/post?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_DELICIOUS; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/delicious.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_DIGG; ?>
" href="http://digg.com/submit?phase=2&url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_DIGG; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/diggman.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_FARK; ?>
" href="http://cgi.fark.com/cgi/fark/edit.pl?new_url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&new_comment=<?php echo $this->_tpl_vars['story']['news_title']; ?>
&new_link_other=<?php echo $this->_tpl_vars['story']['news_title']; ?>
&linktype=Misc" ><img alt="<?php echo @_NW_BOOKMARK_TO_FARK; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/fark.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_FURL; ?>
" href="http://www.furl.net/storeIt.jsp?t=<?php echo $this->_tpl_vars['story']['news_title']; ?>
&u=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_FURL; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/furl.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_NEWSVINE; ?>
" href="http://www.nwvine.com/_tools/seed&save?u=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&h=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_NEWSVINE; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/newsvine.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_REDDIT; ?>
" href="http://reddit.com/submit?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_REDDIT; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/reddit.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_SIMPY; ?>
" href="http://www.simpy.com/simpy/LinkAdd.do?href=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_SIMPY; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/simpy.png'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_SPURL; ?>
" href="http://www.spurl.net/spurl.php?title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
&url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_SPURL; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/spurl.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_YAHOO; ?>
" href="http://myweb2.search.yahoo.com/myresults/bookmarklet?t=<?php echo $this->_tpl_vars['story']['news_title']; ?>
&u=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_YAHOO; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/yahoomyweb.gif'; ?>" /></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_BALATARIN; ?>
" href="http://balatarin.com/links/submit?phase=2&amp;url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_BALATARIN; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/balatarin.png'; ?>"></a>
			<a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_FACEBOOK; ?>
" href="http://www.facebook.com/share.php?u=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_FACEBOOK; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/facebook_share_icon.gif'; ?>" /></a>
		   <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_TWITTER; ?>
" href="http://twitter.com/home?status=Browsing:%20<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_TWITTER; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/twitter_share_icon.gif'; ?>" /></a>
		   <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_SCRIPSTYLE; ?>
" href="http://scriptandstyle.com/submit?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_SCRIPSTYLE; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/scriptandstyle.png'; ?>" /></a>
		   <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_STUMBLE; ?>
" href="http://www.stumbleupon.com/submit?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_STUMBLE; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/stumbleupon.png'; ?>" /></a>
		   <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_TECHNORATI; ?>
" href="http://technorati.com/faves?add=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_TECHNORATI; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/technorati.png'; ?>" /></a>
		   <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_MIXX; ?>
" href="http://www.mixx.com/submit?page_url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_MIXX; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/mixx.png'; ?>" /></a>
	      <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_MYSPACE; ?>
" href="http://www.myspace.com/Modules/PostTo/Pages/?u=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_MYSPACE; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/myspace.jpg'; ?>" /></a>
	      <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_DESIGNFLOAT; ?>
" href="http://www.designfloat.com/submit.php?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_DESIGNFLOAT; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/designfloat.png'; ?>" /></a>
	      <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_GOOGLEPLUS; ?>
" href="https://plusone.google.com/_/+1/confirm?hl=en&url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_GOOGLEPLUS; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/google_plus.png'; ?>" /></a>
	      <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_GOOGLEREADER; ?>
" href="http://www.google.com/reader/link?url=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&amp;title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_GOOGLEREADER; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/google-reader-icon.png'; ?>" /></a>
	      <a rel="external nofollow" target="_blank" title="<?php echo @_NW_BOOKMARK_TO_GOOGLEBOOKMARKS; ?>
" href="https://www.google.com/bookmarks/mark?op=add&amp;bkmk=<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
&amp;title=<?php echo $this->_tpl_vars['story']['news_title']; ?>
" ><img alt="<?php echo @_NW_BOOKMARK_TO_GOOGLEBOOKMARKS; ?>
" src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/bookmarks/google-icon.png'; ?>" /></a>
		</div>
	</div>
	<?php endif; ?>
    <?php if ($this->_tpl_vars['share'] == true): ?>
   	<div class="item-bookmarkme-ftg">
   		<ul>
   			<li><div class="item-bookmarkme-facebook"><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:like href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" layout="button_count" show_faces="false"></fb:like></div></li>
   		   <li><div class="item-bookmarkme-twitter"><script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script><a href="http://twitter.com/share/<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" class="twitter-share-button">Tweet</a></div></li>
   			<li><div class="item-bookmarkme-google1"><script src="https://apis.google.com/js/plusone.js" type="text/javascript"></script><g:plusone size="medium" count="true"></g:plusone></div></li>
   		</ul><br/>
   	</div>
   	<?php endif; ?>

	<?php if ($this->_tpl_vars['fbcomments'] == true): ?>
	<div id="fb-root"></div><script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script><fb:comments href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
" num_posts="5" width="500"></fb:comments>
	<?php endif; ?>

	
	<div class="pad2 marg2">
		<?php echo $this->_tpl_vars['commentsnav']; ?>

		<?php echo $this->_tpl_vars['lang_notice']; ?>

	</div>
	
	<div class="pad2 marg2">
	<?php if ($this->_tpl_vars['comment_mode'] == 'flat'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:system_comments_flat.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php elseif ($this->_tpl_vars['comment_mode'] == 'thread'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:system_comments_thread.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php elseif ($this->_tpl_vars['comment_mode'] == 'nest'): ?>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:system_comments_nest.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	<?php endif; ?>
	</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</div>