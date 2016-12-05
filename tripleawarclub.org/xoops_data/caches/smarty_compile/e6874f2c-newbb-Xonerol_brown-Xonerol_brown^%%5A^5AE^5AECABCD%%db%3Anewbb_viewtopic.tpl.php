<?php /* Smarty version 2.6.28, created on 2016-02-13 22:34:57
         compiled from db:newbb_viewtopic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'db:newbb_viewtopic.tpl', 170, false),array('modifier', 'escape', 'db:newbb_viewtopic.tpl', 243, false),)), $this); ?>
<div class="forum_header">
    <div class="forum_title">
        <h2><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo $this->_tpl_vars['lang_forum_index']; ?>
</a></h2>
        <!-- irmtfan hardcode removed align="left" -->
        <hr class="align_left" width="50%" size="1"/>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo @_MD_FORUMHOME; ?>
</a>
        <span class="delimiter">&raquo;</span>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php?cat=<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['title']; ?>
</a>
        <?php if ($this->_tpl_vars['parentforum']): ?>
            <?php if (count($this->_tpl_vars['parentforum'])):
    foreach ($this->_tpl_vars['parentforum'] as $this->_tpl_vars['forum']):
 ?>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        <span class="delimiter">&raquo;</span>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
        <span class="delimiter">&raquo;</span>
        <strong><?php echo $this->_tpl_vars['topic_title']; ?>
</strong> <?php if ($this->_tpl_vars['topicstatus']): ?><?php echo $this->_tpl_vars['topicstatus']; ?>
<?php endif; ?>
    </div>
</div>
<div class="clear"></div>
<br/>
<?php if ($this->_tpl_vars['tagbar']): ?>
    <div class="taglist" style="padding: 5px;">
        <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:tag_bar.tpl", 'smarty_include_vars' => array()));
 ?>
    </div>
<?php endif; ?>

<br/>

<?php if ($this->_tpl_vars['online']): ?>
    <div class="left" style="padding: 5px;">
        <?php echo @_MD_BROWSING; ?>
&nbsp;
        <?php if (count($this->_tpl_vars['online']['users'])):
    foreach ($this->_tpl_vars['online']['users'] as $this->_tpl_vars['user']):
 ?>
        <a href="<?php echo $this->_tpl_vars['user']['link']; ?>
">
            <?php if ($this->_tpl_vars['user']['level'] == 2): ?>
                <span class="online_admin"><?php echo $this->_tpl_vars['user']['uname']; ?>
</span>
            <?php elseif ($this->_tpl_vars['user']['level'] == 1): ?>
                <span class="online_moderator"><?php echo $this->_tpl_vars['user']['uname']; ?>
</span>
            <?php else: ?>
                <?php echo $this->_tpl_vars['user']['uname']; ?>

            <?php endif; ?>
        </a>&nbsp;
        <?php endforeach; endif; unset($_from); ?>
        <?php if ($this->_tpl_vars['online']['num_anonymous']): ?>
            &nbsp;<?php echo $this->_tpl_vars['online']['num_anonymous']; ?>
 <?php echo @_MD_ANONYMOUS_USERS; ?>

        <?php endif; ?>
    </div>
    <br/>
<?php endif; ?>

<?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
    <!-- irmtfan hardcode removed style="float: right; text-align: right;" -->
    <div class="icon_right" id="admin">
        <?php if ($this->_tpl_vars['mode'] > 1): ?>
        <!-- irmtfan mistype forum_posts_admin => form_posts_admin - action="topicmanager.php" => action="action.post.php" -->
        <form name="form_posts_admin" action="action.post.php" method="POST" onsubmit="if(window.document.form_posts_admin.op.value &lt; 1){return false;}">
            <?php echo @_ALL; ?>
: <input type="checkbox" name="post_check" id="post_check" value="1" onclick="xoopsCheckAll('form_posts_admin', 'post_check');"/>
            <!-- irmtfan mistype mode => op  -->
            <select name="op">
                <option value="0"><?php echo @_SELECT; ?>
</option>
                <option value="delete"><?php echo @_DELETE; ?>
</option>
                <?php if ($this->_tpl_vars['status'] == 'pending'): ?>
                    <option value="approve"><?php echo @_MD_APPROVE; ?>
</option>
                <?php elseif ($this->_tpl_vars['status'] == 'deleted'): ?>
                    <option value="restore"><?php echo @_MD_RESTORE; ?>
</option>
                <?php endif; ?>
            </select>
            <input type="hidden" name="topic_id" value="<?php echo $this->_tpl_vars['topic_id']; ?>
"/>
            <input type="submit" name="submit" value="<?php echo @_SUBMIT; ?>
"/> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
" target="_self" title="<?php echo @_MD_TYPE_VIEW; ?>
"><?php echo @_MD_TYPE_VIEW; ?>
</a>
            <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php echo @_MD_TYPE_PENDING; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php echo @_MD_TYPE_DELETED; ?>
</a>
            <?php endif; ?>
    </div>
    <br/>
<?php endif; ?>
<div class="clear"></div>
<br/>
<!-- irmtfan add to not show polls in admin mode -->
<?php if ($this->_tpl_vars['mode'] <= 1): ?>
    <?php if ($this->_tpl_vars['topic_poll']): ?>
        <?php if ($this->_tpl_vars['topic_pollresult']): ?>
            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_poll_results.tpl", 'smarty_include_vars' => array('poll' => $this->_tpl_vars['poll'])));
 ?>
        <?php else: ?>
            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_poll_view.tpl", 'smarty_include_vars' => array('poll' => $this->_tpl_vars['poll'])));
 ?>
        <?php endif; ?>
    <?php endif; ?>
<?php endif; ?>
<div class="clear"></div>
<br/>

<div style="padding: 5px;">
    <!-- irmtfan hardcode removed style="float: left; text-align:left;"" -->
<span class="icon_left">
        <!-- irmtfan correct prev and next icons -->
<a id="threadtop"></a><?php echo $this->_tpl_vars['down']; ?>
<a href="#threadbottom"><?php echo @_MD_BOTTOM; ?>
</a>&nbsp;&nbsp;<?php echo $this->_tpl_vars['previous']; ?>
&nbsp;<a
            href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?order=<?php echo $this->_tpl_vars['order_current']; ?>
&amp;topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;move=prev"><?php echo @_MD_PREVTOPIC; ?>
</a>&nbsp;&nbsp;<?php echo $this->_tpl_vars['next']; ?>
&nbsp;<a
            href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?order=<?php echo $this->_tpl_vars['order_current']; ?>
&amp;topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;move=next"><?php echo @_MD_NEXTTOPIC; ?>
</a>
</span>
    <!-- irmtfan hardcode removed style="float: right; text-align:right;"" -->
<span class="icon_right">
<?php echo $this->_tpl_vars['forum_reply']; ?>
&nbsp;<?php echo $this->_tpl_vars['forum_addpoll']; ?>
&nbsp;<?php echo $this->_tpl_vars['forum_post_or_register']; ?>

</span>
</div>
<div class="clear"></div>
<br/>

<div>
    <div class="dropdown">
        <select name="topicoption" id="topicoption" onchange="if(this.options[this.selectedIndex].value.length >0 )	{ window.document.location=this.options[this.selectedIndex].value;}">
            <option value=""><?php echo @_MD_TOPICOPTION; ?>
</option>
            <?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
                <?php if (count($this->_tpl_vars['admin_actions'])):
    foreach ($this->_tpl_vars['admin_actions'] as $this->_tpl_vars['act']):
 ?>
                <option value="<?php echo $this->_tpl_vars['act']['link']; ?>
"><?php echo $this->_tpl_vars['act']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
            <?php if (count ( $this->_tpl_vars['adminpoll_actions'] ) > 0): ?>
                <option value="">--------</option>
                <option value=""><?php echo @_MD_POLLOPTIONADMIN; ?>
</option>
                <?php if (count($this->_tpl_vars['adminpoll_actions'])):
    foreach ($this->_tpl_vars['adminpoll_actions'] as $this->_tpl_vars['actpoll']):
 ?>
                <option value="<?php echo $this->_tpl_vars['actpoll']['link']; ?>
"><?php echo $this->_tpl_vars['actpoll']['name']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </select>
        <!-- irmtfan user should not see rating if he dont have permission -->
        <?php if ($this->_tpl_vars['rating_enable'] && $this->_tpl_vars['forum_post'] && $this->_tpl_vars['forum_reply']): ?>
            <select
                    name="rate" id="rate"
                    onchange="if(this.options[this.selectedIndex].value.length >0 )	{ window.document.location=this.options[this.selectedIndex].value;}">
                <option value=""><?php echo @_MD_RATE; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/ratethread.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;rate=5"><?php echo @_MD_RATE5; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/ratethread.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;rate=4"><?php echo @_MD_RATE4; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/ratethread.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;rate=3"><?php echo @_MD_RATE3; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/ratethread.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;rate=2"><?php echo @_MD_RATE2; ?>
</option>
                <option value="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/ratethread.php?topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;rate=1"><?php echo @_MD_RATE1; ?>
</option>
            </select>
        <?php endif; ?>

        <select
                name="viewmode" id="viewmode"
                onchange="if(this.options[this.selectedIndex].value.length >0 )	{ window.location=this.options[this.selectedIndex].value;}">
            <option value=""><?php echo @_MD_VIEWMODE; ?>
</option>
            <?php if (count($this->_tpl_vars['viewmode_options'])):
    foreach ($this->_tpl_vars['viewmode_options'] as $this->_tpl_vars['act']):
 ?>
            <option value="<?php echo $this->_tpl_vars['act']['link']; ?>
"><?php echo $this->_tpl_vars['act']['title']; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        <!-- START irmtfan add topic search -->
        <?php if ($this->_tpl_vars['mode'] <= 1): ?>
            <form id="search-topic" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="get">
                <fieldset>
                    <input name="term" id="term" type="text" size="15" value="<?php echo @_MD_SEARCHTOPIC; ?>
..." onBlur="if(this.value=='') this.value='<?php echo @_MD_SEARCHTOPIC; ?>
...'"
                           onFocus="if(this.value =='<?php echo @_MD_SEARCHTOPIC; ?>
...' ) this.value=''"/>
                    <input type="hidden" name="forum" id="forum" value="<?php echo $this->_tpl_vars['forum_id']; ?>
"/>
                    <input type="hidden" name="sortby" id="sortby" value="p.post_time desc"/>
                    <input type="hidden" name="topic" id="topic" value="<?php echo $this->_tpl_vars['topic_id']; ?>
"/>
                    <input type="hidden" name="action" id="action" value="yes"/>
                    <input type="hidden" name="searchin" id="searchin" value="both"/>
                    <input type="hidden" name="show_search" id="show_search" value="post_text"/>
                    <input type="submit" class="formButton" value="<?php echo @_MD_SEARCH; ?>
"/>
                </fieldset>
            </form>
        <?php endif; ?>
        <!-- END irmtfan add topic search -->
    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align:right;" -->
    <div class="icon_right">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['forum_page_nav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
    </div>
</div>
<div class="clear"></div>
<br/>
<br/>

<?php if ($this->_tpl_vars['viewer_level'] > 1 && $this->_tpl_vars['topic_status'] == 1): ?>
    <div class="resultMsg"><?php echo @_MD_TOPICLOCK; ?>
</div>
    <br/>
<?php endif; ?>
<!-- irmtfan remove here and move to the newbb_thread.html
-->
<?php if (count($this->_tpl_vars['topic_posts'])):
    foreach ($this->_tpl_vars['topic_posts'] as $this->_tpl_vars['topic_post']):
 ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_thread.tpl", 'smarty_include_vars' => array('topic_post' => $this->_tpl_vars['topic_post'],'mode' => $this->_tpl_vars['mode'])));
 ?>
<br/>
<br/>
<?php endforeach; else: ?>
<div style="text-align: center;width:100%;font-size:1.5em;padding:5px;"><?php echo @_MD_ERRORPOST; ?>
</div>
<?php endif; unset($_from); ?>

<?php if ($this->_tpl_vars['mode'] > 1): ?>
</form>
<?php endif; ?>

<br/>
<div class="forum_header">
    <div class="forum_title">
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo @_MD_FORUMHOME; ?>
</a>
        <span class="delimiter">&raquo;</span>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php?cat=<?php echo $this->_tpl_vars['category']['id']; ?>
"><?php echo $this->_tpl_vars['category']['title']; ?>
</a>
        <?php if ($this->_tpl_vars['parentforum']): ?>
            <?php if (count($this->_tpl_vars['parentforum'])):
    foreach ($this->_tpl_vars['parentforum'] as $this->_tpl_vars['forum']):
 ?>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        <span class="delimiter">&raquo;</span>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
        <span class="delimiter">&raquo;</span>
        <strong><?php echo $this->_tpl_vars['topic_title']; ?>
</strong> <?php if ($this->_tpl_vars['topicstatus']): ?><?php echo $this->_tpl_vars['topicstatus']; ?>
<?php endif; ?>
    </div>
</div>
<div class="clear"></div>
<br/>

<div>
    <div class="left">
        <!-- irmtfan correct prev and next icons add up-->
        <a id="threadbottom"></a><?php echo $this->_tpl_vars['p_up']; ?>
<a href="#threadtop"><?php echo @_MD_TOP; ?>
</a>&nbsp;&nbsp;<?php echo $this->_tpl_vars['previous']; ?>
&nbsp;<a
                href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?viewmode=flat&amp;order=<?php echo $this->_tpl_vars['order_current']; ?>
&amp;topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;move=prev"><?php echo @_MD_PREVTOPIC; ?>
</a>&nbsp;&nbsp;<?php echo $this->_tpl_vars['next']; ?>

        &nbsp;<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?viewmode=flat&amp;order=<?php echo $this->_tpl_vars['order_current']; ?>
&amp;topic_id=<?php echo $this->_tpl_vars['topic_id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;move=next"><?php echo @_MD_NEXTTOPIC; ?>
</a>
    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align:right;"" -->
    <div class="icon_right">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['forum_page_nav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
    </div>
</div>
<div class="clear"></div>
<br/>

<div class="left" style="padding: 5px;">
    <?php echo $this->_tpl_vars['forum_reply']; ?>
&nbsp;<?php echo $this->_tpl_vars['forum_addpoll']; ?>
&nbsp;<?php echo $this->_tpl_vars['forum_post_or_register']; ?>

</div>
<div class="clear"></div>
<br/>
<br/>

<?php if ($this->_tpl_vars['quickreply']['show']): ?>
    <div>
        <!-- irmtfan improve toggle method to ToggleBlockCategory (this.children[0] for IE7&8) change display to style and icon to displayImage for more comprehension -->
        <a href="#threadbottom"
           onclick="ToggleBlockCategory('qr', (this.firstElementChild || this.children[0]), '<?php echo $this->_tpl_vars['quickreply']['icon']['expand']; ?>
', '<?php echo $this->_tpl_vars['quickreply']['icon']['collapse']; ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_HIDE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
 <?php echo ((is_array($_tmp=@_MD_QUICKREPLY)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_SEE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
 <?php echo ((is_array($_tmp=@_MD_QUICKREPLY)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
')">
            <?php echo $this->_tpl_vars['quickreply']['displayImage']; ?>

        </a>
    </div>
    <br/>
    <!-- irmtfan move semicolon -->
    <div id="qr" style="display: <?php echo $this->_tpl_vars['quickreply']['style']; ?>
;">
        <div><?php echo $this->_tpl_vars['quickreply']['form']; ?>
</div>
    </div>
    <br/>
    <br/>
<?php endif; ?>

<div>
    <!-- irmtfan hardcode removed style="float: left; text-align: left;" -->
    <div class="icon_left">
        <?php if (count($this->_tpl_vars['permission_table'])):
    foreach ($this->_tpl_vars['permission_table'] as $this->_tpl_vars['perm']):
 ?>
        <div><?php echo $this->_tpl_vars['perm']; ?>
</div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align: right;" -->
    <div class="icon_right">
        <form action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="get">
            <input name="term" id="term" type="text" size="15"/>
            <input type="hidden" name="forum" id="forum" value="<?php echo $this->_tpl_vars['forum_id']; ?>
"/>
            <input type="hidden" name="sortby" id="sortby" value="p.post_time desc"/>
            <input type="hidden" name="since" id="since" value="<?php echo $this->_tpl_vars['forum_since']; ?>
"/>
            <input type="hidden" name="action" id="action" value="yes"/>
            <input type="hidden" name="searchin" id="searchin" value="both"/>
            <input type="submit" class="formButton" value="<?php echo @_MD_SEARCH; ?>
"/><br/>
            [<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php"><?php echo @_MD_ADVSEARCH; ?>
</a>]
        </form>
        <br/>
        <?php echo $this->_tpl_vars['forum_jumpbox']; ?>

    </div>
</div>
<div class="clear"></div>
<br/>

<?php $this->_smarty_include(array('smarty_include_tpl_file' => 'db:newbb_notification_select.tpl', 'smarty_include_vars' => array()));
 ?>
<!-- irmtfan remove

<script type="text/javascript">
<!--xoopsGetElementById('aktuell').scrollIntoView(true);
</script>
-->
<!-- START irmtfan add scroll js function to scroll down to current post or top of the topic -->
<script type="text/javascript">
    if (document.body.scrollIntoView && window.location.href.indexOf('#') == -1) {
        var el = xoopsGetElementById('<?php echo $this->_tpl_vars['forum_post_prefix']; ?>
<?php echo $this->_tpl_vars['post_id']; ?>
');
        if (el) {
            el.scrollIntoView(true);
        }
    }
</script>
<!-- END irmtfan add scroll js function to scroll down to current post or top of the topic -->