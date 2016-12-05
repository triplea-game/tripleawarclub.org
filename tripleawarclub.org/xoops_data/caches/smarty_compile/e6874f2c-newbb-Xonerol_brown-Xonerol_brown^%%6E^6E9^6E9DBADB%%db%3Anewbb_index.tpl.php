<?php /* Smarty version 2.6.28, created on 2016-02-13 22:34:27
         compiled from db:newbb_index.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'db:newbb_index.tpl', 57, false),array('modifier', 'default', 'db:newbb_index.tpl', 378, false),)), $this); ?>
<div class="forum_header">
    <!-- irmtfan hardcode remove style="float: left;" -->
    <div class="forum_title">
        <h2><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo $this->_tpl_vars['index_title']; ?>
</a></h2>
        <!-- irmtfan hardcode remove align="left" -->
        <hr class="align_left" width="50%" size="1"/>
        <?php echo $this->_tpl_vars['index_desc']; ?>

    </div>
</div>
<div style="clear:both;"></div>

<?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
    <br/>
    <div class="forum_stats">
        <div class="forum_stats_left">
            <?php echo @_MD_TOPIC; ?>
:
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php if ($this->_tpl_vars['wait_new_topic']): ?>(
                    <span style="color: red; "><b><?php echo $this->_tpl_vars['wait_new_topic']; ?>
</b></span>
                    ) <?php endif; ?><?php echo @_MD_TYPE_PENDING; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php if ($this->_tpl_vars['delete_topic']): ?>(
                    <span style="color: red; "><b><?php echo $this->_tpl_vars['delete_topic']; ?>
</b></span>
                    ) <?php endif; ?><?php echo @_MD_TYPE_DELETED; ?>
</a><br/>
            <?php echo @_MD_POST2; ?>
:
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php if ($this->_tpl_vars['wait_new_post']): ?>(
                    <span style="color: red; "><b><?php echo $this->_tpl_vars['wait_new_post']; ?>
</b></span>
                    ) <?php endif; ?><?php echo @_MD_TYPE_PENDING; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php if ($this->_tpl_vars['delete_post']): ?>(
                    <span style="color: red; "><b><?php echo $this->_tpl_vars['delete_post']; ?>
</b></span>
                    ) <?php endif; ?><?php echo @_MD_TYPE_DELETED; ?>
</a>
        </div>
        <div class="forum_stats_right">
            <?php if ($this->_tpl_vars['report_post']): ?><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/admin/admin_report.php"><?php echo $this->_tpl_vars['report_post']; ?>
</a><?php endif; ?>
            <br/><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/moderate.php" target="_self" title="<?php echo @_MD_TYPE_SUSPEND; ?>
"><?php echo @_MD_TYPE_SUSPEND; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/admin/index.php" target="_self" title="<?php echo @_MD_ADMINCP; ?>
"><?php echo @_MD_ADMINCP; ?>
</a>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php endif; ?>
<br style="clear: both;"/>
<div class="dropdown">
    <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_index_menu.tpl", 'smarty_include_vars' => array()));
 ?>
</div>
<br style="clear: both;"/>
<br/>

<!-- start forum categories -->
<div class="index_category">
    <!-- start forum categories -->
    <?php if (count($this->_tpl_vars['categories'])):
    foreach ($this->_tpl_vars['categories'] as $this->_tpl_vars['category']):
 ?>
    <table class="index_category" cellspacing="0" width="100%">
        <tr class="head">
            <td width="3%" valign="middle" align="center">
                <!-- irmtfan simplify onclick method and use newbbDisplayImage(this.children[0] for IE7&8) - add alt and title"-->
                <div class="pointer"
                     onclick="ToggleBlockCategory('<?php echo $this->_tpl_vars['category']['cat_element_id']; ?>
',(this.firstElementChild || this.children[0]) , '<?php echo $this->_tpl_vars['category_icon']['expand']; ?>
', '<?php echo $this->_tpl_vars['category_icon']['collapse']; ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_HIDE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_SEE)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
')">
                    <?php echo $this->_tpl_vars['category']['cat_displayImage']; ?>

                </div>
            </td>
            <?php if ($this->_tpl_vars['category']['cat_image']): ?>
                <td width="8%"><img src="<?php echo $this->_tpl_vars['category']['cat_image']; ?>
" alt="<?php echo $this->_tpl_vars['category']['cat_title']; ?>
"/></td>
            <?php endif; ?>
            <!-- irmtfan hardcode removed align="left" -->
            <td class="align_left">
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php?cat=<?php echo $this->_tpl_vars['category']['cat_id']; ?>
"><?php echo $this->_tpl_vars['category']['cat_title']; ?>
</a>
                <?php if ($this->_tpl_vars['category']['cat_description']): ?><p class="desc"><?php echo $this->_tpl_vars['category']['cat_description']; ?>
</p><?php endif; ?>
            </td>
            <?php if ($this->_tpl_vars['category']['cat_sponsor']): ?>
                <!-- irmtfan hardcode removed align="right" -->
                <td width="15%" nowrap="nowrap" class="align_right">
                    <p class="desc"><a href="<?php echo $this->_tpl_vars['category']['cat_sponsor']['link']; ?>
" title="<?php echo $this->_tpl_vars['category']['cat_sponsor']['title']; ?>
" target="_blank"><?php echo $this->_tpl_vars['category']['cat_sponsor']['title']; ?>
</a></p>
                </td>
            <?php endif; ?>
        </tr>
    </table>
    <!-- irmtfan move semicolon -->
    <div id="<?php echo $this->_tpl_vars['category']['cat_element_id']; ?>
" style="display: <?php echo $this->_tpl_vars['category']['cat_display']; ?>
;">
        <table border="0" cellspacing="2" cellpadding="0" width="100%">
            <?php if ($this->_tpl_vars['category']['forums']): ?>
                <tr class="head" align="center">
                    <td width="5%">&nbsp;</td>
                    <?php if ($this->_tpl_vars['subforum_display'] == 'expand'): ?>
                        <!-- irmtfan hardcode removed align="left" -->
                        <td colspan="2" width="37%" nowrap="nowrap" class="align_left"><?php echo @_MD_FORUM; ?>
</td>
                    <?php else: ?>
                        <!-- irmtfan hardcode removed align="left" -->
                        <td width="37%" nowrap="nowrap" class="align_left"><?php echo @_MD_FORUM; ?>
</td>
                    <?php endif; ?>
                    <td width="9%" nowrap="nowrap"><?php echo @_MD_TOPICS; ?>
</td>
                    <td width="9%" nowrap="nowrap"><?php echo @_MD_POSTS; ?>
</td>
                    <td width="40%" nowrap="nowrap"><?php echo @_MD_LASTPOST; ?>
</td>
                </tr>
            <?php endif; ?>

            <!-- start forums -->
            <?php if ($this->_tpl_vars['subforum_display'] == 'expand'): ?>
                <?php if (count($this->_tpl_vars['category']['forums'])):
    foreach ($this->_tpl_vars['category']['forums'] as $this->_tpl_vars['forum']):
 ?>
                <tr>
                    <!-- irmtfan add forum-read/forum-new smarty variable  -->
                    <td width="5%" class="even <?php if ($this->_tpl_vars['forum']['forum_read'] == 1): ?>forum-read<?php else: ?>forum-new<?php endif; ?>" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_folder']; ?>
</td>
                    <td colspan="2" class="odd">
                        <div id="index_forum">
<span class="item"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
    <?php if ($this->_tpl_vars['rss_enable']): ?>
        (
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?f=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
" target="_blank" title="RSS feed">RSS</a>
        )
    <?php endif; ?>
    <br/><?php echo $this->_tpl_vars['forum']['forum_desc']; ?>

</span>
                            <?php if ($this->_tpl_vars['forum']['forum_moderators']): ?>
                                <span class="extra">
<?php echo @_MD_MODERATOR; ?>
: <?php echo $this->_tpl_vars['forum']['forum_moderators']; ?>

</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="even" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_topics']; ?>

                    </td>
                    <td class="odd" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_posts']; ?>

                    </td>
                    <!-- irmtfan hardcode removed align="right" -->
                    <td class="even" class="align_right" valign="middle">
                        <?php if ($this->_tpl_vars['forum']['forum_lastpost_subject']): ?>
                            <?php echo $this->_tpl_vars['forum']['forum_lastpost_time']; ?>
 <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['forum']['forum_lastpost_user']; ?>

                            <br/>
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['forum']['forum_lastpost_id']; ?>
">
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_subject']; ?>
&nbsp;&nbsp;
                                <!-- irmtfan remove icon_path -->
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_icon']; ?>

                            </a>
                        <?php else: ?>
                            <?php echo @_AM_NEWBB_NOTOPIC; ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['forum']['subforum']): ?>
                    <tr class="head">
                        <td width="5%">&nbsp;</td>
                        <td width="5%" align="center"><?php echo $this->_tpl_vars['img_subforum']; ?>
&nbsp;</td>
                        <td width="32%" align="center"><?php echo @_MD_SUBFORUMS; ?>
&nbsp;</td>
                        <td width="9%" nowrap="nowrap">&nbsp;</td>
                        <td width="9%" nowrap="nowrap">&nbsp;</td>
                        <td width="40%" nowrap="nowrap">&nbsp;</td>
                    </tr>
                    <?php if (count($this->_tpl_vars['forum']['subforum'])):
    foreach ($this->_tpl_vars['forum']['subforum'] as $this->_tpl_vars['subforum']):
 ?>
                    <tr>
                        <td class="odd" width="5%">&nbsp;</td>
                        <!-- irmtfan add forum-read/forum-new smarty variable  -->
                        <td class="even <?php if ($this->_tpl_vars['subforum']['forum_read'] == 1): ?>forum-read<?php else: ?>forum-new<?php endif; ?>" align="center" valign="middle" width="5%"><?php echo $this->_tpl_vars['subforum']['forum_folder']; ?>
</td>
                        <td width="32%" class="odd">
                            <div id="index_forum">
<span class="item"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['subforum']['forum_id']; ?>
"><strong><?php echo $this->_tpl_vars['subforum']['forum_name']; ?>
</strong></a>
    <?php if ($this->_tpl_vars['rss_enable']): ?>
        (
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?f=<?php echo $this->_tpl_vars['subforum']['forum_id']; ?>
" target="_blank" title="RSS feed">RSS</a>
        )
    <?php endif; ?>
    <br/><?php echo $this->_tpl_vars['subforum']['forum_desc']; ?>

</span>
                                <?php if ($this->_tpl_vars['subforum']['forum_moderators']): ?>
                                    <span class="extra">
<?php echo @_MD_MODERATOR; ?>
: <?php echo $this->_tpl_vars['subforum']['forum_moderators']; ?>

</span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="even" width="9%" align="center" valign="middle">
                            <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['subforum']['forum_id']]['topic']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['subforum']['forum_id']]['topic']['day']; ?>
</strong>/<?php endif; ?>
                            <?php echo $this->_tpl_vars['subforum']['forum_topics']; ?>

                        </td>
                        <td class="odd" width="9%" align="center" valign="middle">
                            <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['subforum']['forum_id']]['post']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['subforum']['forum_id']]['post']['day']; ?>
</strong>/<?php endif; ?>
                            <?php echo $this->_tpl_vars['subforum']['forum_posts']; ?>

                        </td>
                        <!-- irmtfan hardcode removed align="right" -->

                        <td class="even" width="40%" class="align_right" valign="middle">
                            <?php if ($this->_tpl_vars['subforum']['forum_lastpost_subject']): ?>
                                <?php echo $this->_tpl_vars['subforum']['forum_lastpost_time']; ?>
 <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['subforum']['forum_lastpost_user']; ?>

                                <br/>
                                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['subforum']['forum_lastpost_id']; ?>
">
                                    <?php echo $this->_tpl_vars['subforum']['forum_lastpost_subject']; ?>
&nbsp;&nbsp;
                                    <!-- irmtfan remove icon_path -->
                                    <?php echo $this->_tpl_vars['subforum']['forum_lastpost_icon']; ?>

                                </a>
                            <?php else: ?>
                                <?php echo @_AM_NEWBB_NOTOPIC; ?>

                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>

            <?php elseif ($this->_tpl_vars['subforum_display'] == 'collapse'): ?>

                <?php if (count($this->_tpl_vars['category']['forums'])):
    foreach ($this->_tpl_vars['category']['forums'] as $this->_tpl_vars['forum']):
 ?>
                <tr>
                    <?php if ($this->_tpl_vars['forum']['subforum']): ?>
                        <!-- irmtfan add forum-read/forum-new smarty variable  -->
                        <td class="even <?php if ($this->_tpl_vars['forum']['forum_read'] == 1): ?>forum-read<?php else: ?>forum-new<?php endif; ?>" rowspan="2" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_folder']; ?>
</td>
                    <?php else: ?>
                        <td class="even <?php if ($this->_tpl_vars['forum']['forum_read'] == 1): ?>forum-read<?php else: ?>forum-new<?php endif; ?>" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_folder']; ?>
</td>
                    <?php endif; ?>
                    <td class="odd">
                        <div id="index_forum">
<span class="item"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
    <?php if ($this->_tpl_vars['rss_enable']): ?>
        (
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?f=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
" target="_blank" title="RSS feed">RSS</a>
        )
    <?php endif; ?>
    <br/><?php echo $this->_tpl_vars['forum']['forum_desc']; ?>

</span>
                            <?php if ($this->_tpl_vars['forum']['forum_moderators']): ?>
                                <span class="extra">
<?php echo @_MD_MODERATOR; ?>
: <?php echo $this->_tpl_vars['forum']['forum_moderators']; ?>

</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="even" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_topics']; ?>

                    </td>
                    <td class="odd" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_posts']; ?>

                    </td>
                    <!-- irmtfan hardcode removed align="right" -->
                    <td class="even" class="align_right" valign="middle">
                        <?php if ($this->_tpl_vars['forum']['forum_lastpost_subject']): ?>
                            <?php echo $this->_tpl_vars['forum']['forum_lastpost_time']; ?>
 <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['forum']['forum_lastpost_user']; ?>

                            <br/>
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['forum']['forum_lastpost_id']; ?>
">
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_subject']; ?>
&nbsp;&nbsp;
                                <!-- irmtfan remove icon_path -->
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_icon']; ?>

                            </a>
                        <?php else: ?>
                            <?php echo @_AM_NEWBB_NOTOPIC; ?>

                        <?php endif; ?>
                    </td>
                </tr>
                <?php if ($this->_tpl_vars['forum']['subforum']): ?>
                    <tr>
                        <!-- irmtfan hardcode removed align="left" -->

                        <td class="odd" colspan="4" class="align_left"><?php echo @_MD_SUBFORUMS; ?>
&nbsp;<?php echo $this->_tpl_vars['img_subforum']; ?>
&nbsp;
                            <?php if (count($this->_tpl_vars['forum']['subforum'])):
    foreach ($this->_tpl_vars['forum']['subforum'] as $this->_tpl_vars['subforum']):
 ?>
                            &nbsp;[<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['subforum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['subforum']['forum_name']; ?>
</a>]
                            <?php endforeach; endif; unset($_from); ?>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>

            <?php else: ?>

                <?php if (count($this->_tpl_vars['category']['forums'])):
    foreach ($this->_tpl_vars['category']['forums'] as $this->_tpl_vars['forum']):
 ?>
                <tr>
                    <!-- irmtfan add forum-read/forum-new smarty variable  -->
                    <td class="even <?php if ($this->_tpl_vars['forum']['forum_read'] == 1): ?>forum-read<?php else: ?>forum-new<?php endif; ?>" align="center" valign="middle"><?php echo $this->_tpl_vars['forum']['forum_folder']; ?>
</td>
                    <td class="odd">
                        <div id="index_forum">
<span class="item"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
    <?php if ($this->_tpl_vars['rss_enable']): ?>
        (
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?f=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
" target="_blank" title="RSS feed">RSS</a>
        )
    <?php endif; ?>
    <br/><?php echo $this->_tpl_vars['forum']['forum_desc']; ?>

</span>
                            <?php if ($this->_tpl_vars['forum']['forum_moderators']): ?>
                                <span class="extra">
<?php echo @_MD_MODERATOR; ?>
: <?php echo $this->_tpl_vars['forum']['forum_moderators']; ?>

</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td class="even" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['topic']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_topics']; ?>

                    </td>
                    <td class="odd" align="center" valign="middle">
                        <?php if ($this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']): ?><strong><?php echo $this->_tpl_vars['stats'][$this->_tpl_vars['forum']['forum_id']]['post']['day']; ?>
</strong>/<?php endif; ?>
                        <?php echo $this->_tpl_vars['forum']['forum_posts']; ?>

                    </td>
                    <!-- irmtfan hardcode removed align="right" -->
                    <td class="even" class="align_right" valign="middle">
                        <?php if ($this->_tpl_vars['forum']['forum_lastpost_subject']): ?>
                            <?php echo $this->_tpl_vars['forum']['forum_lastpost_time']; ?>
 <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['forum']['forum_lastpost_user']; ?>

                            <br/>
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['forum']['forum_lastpost_id']; ?>
">
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_subject']; ?>
&nbsp;&nbsp;
                                <!-- irmtfan remove icon_path -->
                                <?php echo $this->_tpl_vars['forum']['forum_lastpost_icon']; ?>

                            </a>
                        <?php else: ?>
                            <?php echo @_AM_NEWBB_NOTOPIC; ?>

                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>

            <?php endif; ?>
            <!-- end forums -->
        </table>
        <br/>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end forum categories -->
</div>
<!-- irmtfan hardcode removed style="float: left; text-align: left;" -->
<div class="icon_left">
    <?php echo $this->_tpl_vars['img_forum_new']; ?>
 = <?php echo @_MD_NEWPOSTS; ?>
<br/>
    <?php echo $this->_tpl_vars['img_forum']; ?>
 = <?php echo @_MD_NONEWPOSTS; ?>
<br/>
</div>
<br style="clear:both;"/>
<!-- irmtfan hardcode removed style="float: right; text-align: right;" -->
<div class="icon_right">
    <form action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="post" name="search" id="search">
        <input name="term" id="term" type="text" size="20"/>
        <input type="hidden" name="forum" id="forum" value="all"/>
        <input type="hidden" name="sortby" id="sortby" value="p.post_time desc"/>
        <input type="hidden" name="searchin" id="searchin" value="both"/>
        <!-- irmtfan remove name="submit" -->
        <input type="submit" id="submit" value="<?php echo @_MD_SEARCH; ?>
"/>
        <br/>
        [ <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php"><?php echo @_MD_ADVSEARCH; ?>
</a> ]
    </form>
    <?php if ($this->_tpl_vars['rss_button']): ?>
        <br/>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?c=<?php echo $this->_tpl_vars['viewcat']; ?>
" target="_blank" title="RSS FEED">
            <?php echo $this->_tpl_vars['rss_button']; ?>

        </a>
        <br/>
        <span style='font-size: 0.7em;'><a href="http://www.xoops.org">NewBB Version  <?php echo $this->_tpl_vars['version']/100; ?>
</a></span>
        <br/>
    <?php endif; ?>
</div>
<br style="clear: both;"/>
<?php if ($this->_tpl_vars['currenttime']): ?>
    <div>
        <div class="even" style="padding: 5px; line-height: 150%;">
            <span style="padding: 2px;"><?php echo $this->_tpl_vars['online']['statistik']; ?>
</span>
            <strong><?php echo @_MD_NEWBB_STATS; ?>
</strong>
        </div>

        <div class="forum_stats odd" style="padding: 5px; line-height: 150%;">
            <div class="forum_stats_left odd">
                <?php echo $this->_tpl_vars['currenttime']; ?>
<br/>
                <!-- irmtfan add lastvisit smarty variable for all users -->
                <?php echo $this->_tpl_vars['lastvisit']; ?>
<br/>
                <?php echo @_MD_TOTALTOPICSC; ?>

                <strong><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php" title="<?php echo @_MD_ALL; ?>
"><?php echo $this->_tpl_vars['stats'][0]['topic']['total']; ?>
</a></strong>
                | <?php echo @_MD_TOTALPOSTSC; ?>
<strong><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php" title="<?php echo @_MD_ALLPOSTS; ?>
"><?php echo $this->_tpl_vars['stats'][0]['post']['total']; ?>
</a></strong>
                <?php if ($this->_tpl_vars['stats'][0]['digest']['total']): ?>
                    | <?php echo @_MD_TOTALDIGESTSC; ?>
<strong><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=digest" title="<?php echo @_MD_TOTALDIGESTSC; ?>
"><?php echo $this->_tpl_vars['stats'][0]['digest']['total']; ?>
</a></strong>
                <?php endif; ?>
                <?php if ($this->_tpl_vars['userstats']): ?>
                    <br/>
                    <br/>
                    <!-- irmtfan userstats.lastvisit should be removed because it is for anon users too  -->
                                        <br/>
                    <?php echo $this->_tpl_vars['userstats']['lastpost']; ?>

                <?php endif; ?>
            </div>
            <div class="forum_stats_right odd">
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?status=new" title="<?php echo @_MD_VIEW_NEWPOSTS; ?>
"><?php echo @_MD_VIEW_NEWPOSTS; ?>
</a><br/>
                <?php echo @_MD_TODAYTOPICSC; ?>
<strong><?php echo ((is_array($_tmp=@$this->_tpl_vars['stats'][0]['topic']['day'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</strong>
                | <?php echo @_MD_TODAYPOSTSC; ?>
<strong><?php echo ((is_array($_tmp=@$this->_tpl_vars['stats'][0]['post']['day'])) ? $this->_run_mod_handler('default', true, $_tmp, 0) : smarty_modifier_default($_tmp, 0)); ?>
</strong>
                <?php if ($this->_tpl_vars['userstats']): ?>
                    <br/>
                    <br/>
                    <?php echo $this->_tpl_vars['userstats']['topics']; ?>
 | <?php echo $this->_tpl_vars['userstats']['posts']; ?>
<?php if ($this->_tpl_vars['userstats']['digests']): ?><br/><?php echo $this->_tpl_vars['userstats']['digests']; ?>
<?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <br style="clear:both;"/>
<?php endif; ?>
<br style="clear: both;"/>
<?php if ($this->_tpl_vars['online']): ?>
    <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_online.tpl", 'smarty_include_vars' => array()));
 ?>
<?php endif; ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => 'db:newbb_notification_select.tpl', 'smarty_include_vars' => array()));
 ?>
<!-- end module contents -->