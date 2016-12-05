<?php /* Smarty version 2.6.28, created on 2016-02-13 22:37:11
         compiled from db:newbb_viewforum.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'db:newbb_viewforum.tpl', 86, false),array('function', 'cycle', 'db:newbb_viewforum.tpl', 141, false),)), $this); ?>
<div class="forum_header">
    <div class="forum_title">
        <h2><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo $this->_tpl_vars['forum_index_title']; ?>
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
        <?php if ($this->_tpl_vars['forum_topictype']): ?> <?php echo $this->_tpl_vars['forum_topictype']; ?>
 <?php endif; ?>
        <?php if ($this->_tpl_vars['forum_topicstatus']): ?> [<?php echo $this->_tpl_vars['forum_topicstatus']; ?>
]
        <?php else: ?> [
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;status=digest" title="<?php echo @_MD_DIGEST; ?>
"><?php echo @_MD_DIGEST; ?>
</a>
            ]
        <?php endif; ?>
    </div>
    <div style="clear:both;"></div>
</div>
<div class="clear"></div>
<br/>

<?php if ($this->_tpl_vars['subforum']): ?>
    <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_viewforum_subforum.tpl", 'smarty_include_vars' => array()));
 ?>
    <br/>
<?php endif; ?>

<?php if ($this->_tpl_vars['mode'] > 1): ?>
<form name="form_topics_admin" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.topic.php" method="POST" onsubmit="if(window.document.form_topics_admin.op.value &lt; 1){return false;}">
    <?php endif; ?>

    <?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
        <div class="left" style="padding: 5px;" id="admin">
            <?php echo $this->_tpl_vars['forum_addpoll']; ?>
 <?php echo $this->_tpl_vars['forum_post_or_register']; ?>

        </div>
        <div class="right" style="padding: 5px;">
            <?php if ($this->_tpl_vars['mode'] > 1): ?>
                <?php echo @_ALL; ?>
:
                <input type="checkbox" name="topic_check1" id="topic_check1" value="1" onclick="xoopsCheckAll('form_topics_admin', 'topic_check1');"/>
                <select name="op">
                    <option value="0"><?php echo @_SELECT; ?>
</option>
                    <option value="delete"><?php echo @_DELETE; ?>
</option>
                    <?php if ($this->_tpl_vars['status'] == 'pending'): ?>
                        <option value="approve"><?php echo @_MD_APPROVE; ?>
</option>
                        <option value="move"><?php echo @_MD_MOVE; ?>
</option>
                    <?php elseif ($this->_tpl_vars['status'] == 'deleted'): ?>
                        <option value="restore"><?php echo @_MD_RESTORE; ?>
</option>
                    <?php else: ?>
                        <option value="move"><?php echo @_MD_MOVE; ?>
</option>
                    <?php endif; ?>
                </select>
                <input type="hidden" name="forum_id" value="<?php echo $this->_tpl_vars['forum_id']; ?>
"/>
                <input type="submit" name="submit" value="<?php echo @_SUBMIT; ?>
"/>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
" target="_self" title="<?php echo @_MD_TYPE_VIEW; ?>
"><?php echo @_MD_TYPE_VIEW; ?>
</a>
            <?php else: ?>
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php echo @_MD_TYPE_PENDING; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
&amp;status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php echo @_MD_TYPE_DELETED; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/moderate.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
" target="_self" title="<?php echo @_MD_TYPE_SUSPEND; ?>
"><?php echo @_MD_TYPE_SUSPEND; ?>
</a>
            <?php endif; ?>
        </div>
    <?php else: ?>
        <div class="right" style="padding: 5px;">
            <?php echo $this->_tpl_vars['forum_addpoll']; ?>
 <?php echo $this->_tpl_vars['forum_post_or_register']; ?>

        </div>
    <?php endif; ?>
    <div class="clear"></div>
    <br/>

    <div>
        <div class="dropdown">
            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_viewforum_menu.tpl", 'smarty_include_vars' => array()));
 ?>
        </div>
        <!-- irmtfan hardcode removed style="float: right; text-align:right;" -->
        <div class="icon_right">
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['forum_pagenav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
        </div>
    </div>
    <div class="clear"></div>
    <br/>

    <table class="outer" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
        <!-- irmtfan hardcode removed align="left" -->
        <tr class="head" class="align_left">
            <td width="5%" colspan="3">
                <?php if ($this->_tpl_vars['mode'] > 1): ?>
                    <?php echo @_ALL; ?>
:
                    <input type="checkbox" name="topic_check" id="topic_check" value="1" onclick="xoopsCheckAll('form_topics_admin', 'topic_check');"/>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>
            <td>&nbsp;<strong><a href="<?php echo $this->_tpl_vars['h_topic_link']; ?>
"><?php echo @_MD_TOPICS; ?>
</a></strong></td>
            <!-- irmtfan _MD_POSTER to _MD_TOPICPOSTER -->
            <td width="10%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_poster_link']; ?>
"><?php echo @_MD_TOPICPOSTER; ?>
</a></strong></td>
            <td width="10%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_publish_link']; ?>
"><?php echo @_MD_TOPICTIME; ?>
</a></strong></td>
            <td width="5%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_reply_link']; ?>
"><?php echo @_MD_REPLIES; ?>
</a></strong></td>
            <td width="5%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_views_link']; ?>
"><?php echo @_MD_VIEWS; ?>
</a></strong></td>
            <?php if ($this->_tpl_vars['rating_enable']): ?>
                <td width="5%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_rating_link']; ?>
"><?php echo @_MD_RATINGS; ?>
</a></strong></td>
            <?php endif; ?>
            <!-- irmtfan _MD_DATE to _MD_LASTPOSTTIME -->
            <td width="15%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['h_date_link']; ?>
"><?php echo @_MD_LASTPOSTTIME; ?>
</a></strong></td>
        </tr>

        <?php if ($this->_tpl_vars['sticky'] > 0): ?>
            <tr class="head">
                <td colspan="3">&nbsp;</td>
                <?php if ($this->_tpl_vars['rating_enable']): ?>
                    <td colspan="7"><strong><?php echo @_MD_IMTOPICS; ?>
</strong></td>
                <?php else: ?>
                    <td colspan="6"><strong><?php echo @_MD_IMTOPICS; ?>
</strong></td>
                <?php endif; ?>
            </tr>
        <?php endif; ?>

        <!-- start forum topic -->

        <?php $this->_foreach['loop'] = array('total' => count($this->_tpl_vars['topics']), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($this->_tpl_vars['topics'] as $this->_tpl_vars['topic']):
        $this->_foreach['loop']['iteration']++;
 ?>

        <?php if ($this->_tpl_vars['topic']['stick'] && $this->_foreach['loop']['iteration'] == $this->_tpl_vars['sticky']+1): ?>
            <tr class="head">
                <td colspan="3">&nbsp;</td>
                <?php if ($this->_tpl_vars['rating_enable']): ?>
                    <td colspan="7"><strong><?php echo @_MD_NOTIMTOPICS; ?>
</strong></td>
                <?php else: ?>
                    <td colspan="6"><strong><?php echo @_MD_NOTIMTOPICS; ?>
</strong></td>
                <?php endif; ?>
            </tr>
        <?php endif; ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <!-- irmtfan add topic-read/topic-new smarty variable  -->

            <td width="4%" align="center" class="<?php if ($this->_tpl_vars['topic']['topic_read'] == 1): ?>topic-read<?php else: ?>topic-new<?php endif; ?>">
                <?php if ($this->_tpl_vars['mode'] > 1): ?>
                    <input type="checkbox" name="topic_id[]" id="topic_id[<?php echo $this->_tpl_vars['topic']['topic_id']; ?>
]" value="<?php echo $this->_tpl_vars['topic']['topic_id']; ?>
"/>
                <?php else: ?>
                    <?php echo $this->_tpl_vars['topic']['topic_folder']; ?>

                <?php endif; ?>
            </td>


            <td width="4%" align="center"><?php echo $this->_tpl_vars['topic']['topic_icon']; ?>
</td>

                                                                                    <td width="4%" align="center">
                <?php if ($this->_tpl_vars['topic']['topic_digest'] == 1): ?>
                    <?php echo $this->_tpl_vars['img_digest']; ?>

                <?php endif; ?>
            </td>


            

            <td>&nbsp;<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
" title="<?php echo $this->_tpl_vars['topic']['topic_excerpt']; ?>
">
                    <?php echo $this->_tpl_vars['topic']['topic_title']; ?>
</a><?php echo $this->_tpl_vars['topic']['attachment']; ?>
 <?php echo $this->_tpl_vars['topic']['topic_page_jump']; ?>

            </td>


            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_poster']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_time']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_replies']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_views']; ?>
</td>
            <?php if ($this->_tpl_vars['rating_enable']): ?>
                <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['rating_img']; ?>
</td>
            <?php endif; ?>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_last_posttime']; ?>
<br/>
                <!-- irmtfan add $smarty.const._MD_BY -->
                <?php echo @_MD_BY; ?>
&nbsp;<?php echo $this->_tpl_vars['topic']['topic_last_poster']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['topic']['topic_page_jump_icon']; ?>

            </td>
        </tr>

        <?php endforeach; endif; unset($_from); ?>

        <!-- end forum topic -->

        <?php if ($this->_tpl_vars['mode'] > 1): ?>
</form>
<?php endif; ?>

<tr class="foot">
    <?php if ($this->_tpl_vars['rating_enable']): ?>
    <td colspan="9" align="center"><?php else: ?>
    <td colspan="8" align="center"><?php endif; ?>
        <?php echo '<form method="get" action="'; ?><?php echo $this->_tpl_vars['xoops_url']; ?><?php echo '/modules/'; ?><?php echo $this->_tpl_vars['xoops_dirname']; ?><?php echo '/viewforum.php"><strong>'; ?><?php echo @_MD_SORTEDBY; ?><?php echo '</strong>&nbsp;'; ?><?php echo $this->_tpl_vars['forum_selection_sort']; ?><?php echo '&nbsp;'; ?><?php echo $this->_tpl_vars['forum_selection_order']; ?><?php echo '&nbsp;'; ?><?php echo $this->_tpl_vars['forum_selection_since']; ?><?php echo '&nbsp;<input type="hidden" name="forum" id="forum" value="'; ?><?php echo $this->_tpl_vars['forum_id']; ?><?php echo '"/><input type="hidden" name="status" value="'; ?><?php echo $this->_tpl_vars['status']; ?><?php echo '"/><!-- irmtfan remove name="submit" --><input type="submit" value="'; ?><?php echo @_SUBMIT; ?><?php echo '"/></form>'; ?>

    </td>
</tr>
</table>
<!-- end forum main table -->

<br/>

<div>
    <div class="left">
        <?php echo $this->_tpl_vars['forum_addpoll']; ?>
 <?php echo $this->_tpl_vars['forum_post_or_register']; ?>

    </div>
    <div class="right">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['forum_pagenav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
    </div>
</div>
<div class="clear"></div>

<br style="clear: both;"/>
<br/>
<div>
    <!-- irmtfan hardcode style="float: left; text-align: left;" -->
    <div class="icon_left">
        <?php echo $this->_tpl_vars['img_newposts']; ?>
 = <?php echo @_MD_NEWPOSTS; ?>
 (<?php echo $this->_tpl_vars['img_hotnewposts']; ?>
 = <?php echo @_MD_MORETHAN; ?>
) <br/>
        <?php echo $this->_tpl_vars['img_folder']; ?>
 = <?php echo @_MD_NONEWPOSTS; ?>
 (<?php echo $this->_tpl_vars['img_hotfolder']; ?>
 = <?php echo @_MD_MORETHAN2; ?>
) <br/>
        <?php echo $this->_tpl_vars['img_locked']; ?>
 = <?php echo @_MD_TOPICLOCKED; ?>
 <br/>
        <?php echo $this->_tpl_vars['img_sticky']; ?>
 = <?php echo @_MD_TOPICSTICKY; ?>
 <br/>
        <?php echo $this->_tpl_vars['img_digest']; ?>
 = <?php echo @_MD_TOPICDIGEST; ?>
 <br/>
        <?php echo $this->_tpl_vars['img_poll']; ?>
 = <?php echo @_MD_TOPICHASPOLL; ?>

    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align:right;" -->
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
        <?php if ($this->_tpl_vars['rss_button']): ?>
            <br/>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/rss.php?f=<?php echo $this->_tpl_vars['forum_id']; ?>
" target="_blank" title="RSS FEED">
                <?php echo $this->_tpl_vars['rss_button']; ?>

            </a>
            <span style="font-size:0.7em;"><a href="http://xoops.org">NewBB Version <?php echo $this->_tpl_vars['version']/100; ?>
</a></span>
            <br style="clear: both;"/>
            <br/>
        <?php endif; ?>
        <?php echo $this->_tpl_vars['forum_jumpbox']; ?>

    </div>
</div>
<div class="clear"></div>
<br style="clear: both;"/>
<br/>

<div>
    <!-- irmtfan hardcode removed  style="float: left; -->
    <div class="floatleft">
        <?php if (count($this->_tpl_vars['permission_table'])):
    foreach ($this->_tpl_vars['permission_table'] as $this->_tpl_vars['perm']):
 ?>
        <div><?php echo $this->_tpl_vars['perm']; ?>
</div>
        <?php endforeach; endif; unset($_from); ?>
    </div>
</div>
<div class="clear"></div>
<br/>
<?php if ($this->_tpl_vars['online']): ?>
    <br/>
    <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_online.tpl", 'smarty_include_vars' => array()));
 ?>
<?php endif; ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => 'db:newbb_notification_select.tpl', 'smarty_include_vars' => array()));
 ?>

<!-- end module contents -->