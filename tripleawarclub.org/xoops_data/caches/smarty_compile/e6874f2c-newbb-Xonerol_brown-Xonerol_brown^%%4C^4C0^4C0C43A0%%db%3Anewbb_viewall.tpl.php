<?php /* Smarty version 2.6.28, created on 2016-02-14 23:13:44
         compiled from db:newbb_viewall.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'db:newbb_viewall.tpl', 109, false),array('modifier', 'replace', 'db:newbb_viewall.tpl', 139, false),array('function', 'cycle', 'db:newbb_viewall.tpl', 167, false),)), $this); ?>
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
        <?php if ($this->_tpl_vars['parent_forum']): ?>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['parent_forum']; ?>
"><?php echo $this->_tpl_vars['parent_name']; ?>
</a>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
        <?php elseif ($this->_tpl_vars['forum_name']): ?>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['current']): ?>
            <span class="delimiter">&raquo;</span>
            <a href="<?php echo $this->_tpl_vars['current']['link']; ?>
"><?php echo $this->_tpl_vars['current']['title']; ?>
</a>
        <?php endif; ?>
    </div>
</div>
<div class="clear"></div>

<?php if ($this->_tpl_vars['mode'] > 1): ?>
<form name="form_topics_admin" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.topic.php" method="POST" onsubmit="if(window.document.form_topics_admin.op.value &lt; 1){return false;}">
    <?php endif; ?>

    <?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
        <!-- irmtfan hardcode removed style="padding: 5px;float: right; text-align:right;" -->
        <div class="pagenav" id="admin">
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
/list.topic.php" target="_self" title="<?php echo @_MD_TYPE_VIEW; ?>
"><?php echo @_MD_TYPE_VIEW; ?>
</a>
                <!-- irmtfan remove < { elseif $mode eq 1} > to show all admin links in admin mode in the initial page loading -->
            <?php else: ?>
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php echo @_MD_TYPE_PENDING; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php echo @_MD_TYPE_DELETED; ?>
</a>
                |
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/moderate.php" target="_self" title="<?php echo @_MD_TYPE_SUSPEND; ?>
"><?php echo @_MD_TYPE_SUSPEND; ?>
</a>
                <!-- irmtfan remove < { else } > no need for mode=1
< { else } >
<!--<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/list.topic.php?mode=1#admin" target="_self" title="<?php echo @_MD_TYPE_VIEW; ?>
"><?php echo @_MD_TYPE_VIEW; ?>
</a>
-->
            <?php endif; ?>
        </div>
        <br/>
    <?php else: ?>
        <br/>
    <?php endif; ?>
    <div class="clear"></div>

    <div>
        <div class="dropdown">
            <?php if ($this->_tpl_vars['menumode'] == 0): ?>
                <select
                        name="topicoption" id="topicoption"
                        class="menu"
                        onchange="if(this.options[this.selectedIndex].value.length >0 )    { window.document.location=this.options[this.selectedIndex].value;}"
                        >
                    <option value=""><?php echo @_MD_TOPICOPTION; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['post_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALLPOSTS; ?>
</option>
                    <option value="<?php echo $this->_tpl_vars['newpost_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_NEWPOSTS; ?>
</option>
                    <!-- irmtfan add a separator -->
                    <option value="">--------</option>
                    <?php $_from = $this->_tpl_vars['filters']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filter']):
?>
                        <option value="<?php echo $this->_tpl_vars['filter']['link']; ?>
"><?php echo $this->_tpl_vars['filter']['title']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                    <option value="">--------</option>
                    <?php $_from = $this->_tpl_vars['types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filter']):
?>
                        <option value="<?php echo $this->_tpl_vars['filter']['link']; ?>
"><?php echo $this->_tpl_vars['filter']['title']; ?>
</option>
                    <?php endforeach; endif; unset($_from); ?>
                </select>
            <?php elseif ($this->_tpl_vars['menumode'] == 1): ?>
                <div id="topicoption" class="menu">
                    <table>
                        <tr>
                            <td>
                                <a class="item" href="<?php echo $this->_tpl_vars['post_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALLPOSTS; ?>
</a>
                                <a class="item" href="<?php echo $this->_tpl_vars['newpost_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_NEWPOSTS; ?>
</a>
                                <a class="item" href="<?php echo $this->_tpl_vars['all_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALL; ?>
</a>
                                <a class="item" href="<?php echo $this->_tpl_vars['digest_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_DIGEST; ?>
</a>
                                <a class="item" href="<?php echo $this->_tpl_vars['unreplied_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREPLIED; ?>
</a>
                                <a class="item" href="<?php echo $this->_tpl_vars['unread_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREAD; ?>
</a>

                            </td>
                        </tr>
                    </table>
                </div>
                <script type="text/javascript">document.getElementById("topicoption").onmouseout = closeMenu;</script>
                <div class="menubar"><a href="" onclick="openMenu(event, 'topicoption');return false;"><?php echo ((is_array($_tmp=@_MD_TOPICOPTION)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
</a></div>
            <?php elseif ($this->_tpl_vars['menumode'] == 2): ?>
                <div class="menu">
                    <ul>
                        <li>
                            <div class="item"><strong><?php echo @_MD_TOPICOPTION; ?>
</strong></div>
                            <ul>
                                <li>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['post_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALLPOSTS; ?>
</a></div>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['newpost_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_NEWPOSTS; ?>
</a></div>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['all_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALL; ?>
</a></div>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['digest_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_DIGEST; ?>
</a></div>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['unreplied_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREPLIED; ?>
</a></div>
                                                <div class="item"><a href="<?php echo $this->_tpl_vars['unread_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREAD; ?>
</a></div>

                                            </td>
                                        </tr>
                                    </table>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <!-- irmtfan hardcode removed style="padding: 5px;float: right; text-align:right;" -->
        <div class="pagenav">
            <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pagenav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
        </div>
    </div>
    <div class="clear"></div>
    <br/>
    <br/>

    <table class="outer" cellpadding="6" cellspacing="1" border="0" width="100%" align="center">
        <!-- irmtfan hardcode removed align="left" -->
        <tr class="head" class="align_left">
            <td width="5%" colspan="2">
                <?php if ($this->_tpl_vars['mode'] > 1): ?>
                    <?php echo @_ALL; ?>
:
                    <input type="checkbox" name="topic_check" id="topic_check" value="1" onclick="xoopsCheckAll('form_topics_admin', 'topic_check');"/>
                <?php else: ?>
                    &nbsp;
                <?php endif; ?>
            </td>
            <td>&nbsp;<strong><a href="<?php echo $this->_tpl_vars['headers']['topic']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['topic']['title']; ?>
</a></strong></td>
            <td width="15%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['headers']['forum']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['forum']['title']; ?>
</a></strong></td>
            <td width="5%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['headers']['replies']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['replies']['title']; ?>
</a></strong></td>
            <td width="10%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['headers']['poster']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['poster']['title']; ?>
</a></strong></td>
            <td width="5%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['headers']['views']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['views']['title']; ?>
</a></strong></td>
            <td width="15%" align="center" nowrap="nowrap"><strong><a href="<?php echo $this->_tpl_vars['headers']['lastpost']['link']; ?>
"><?php echo $this->_tpl_vars['headers']['lastpost']['title']; ?>
</a></strong></td>
        </tr>

        <!-- start forum topic -->
        <?php $this->_foreach['loop'] = array('total' => count($this->_tpl_vars['topics']), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($this->_tpl_vars['topics'] as $this->_tpl_vars['topic']):
        $this->_foreach['loop']['iteration']++;
 ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <!-- irmtfan add topic-read/topic-new smarty variable  -->
            <td width="4%" align="center" class="<?php if ($this->_tpl_vars['topic']['topic_read'] == 1): ?>topic-read<?php else: ?>topic-new<?php endif; ?>">
                <?php if ($this->_tpl_vars['mode'] > 1): ?>
                    <input type="checkbox" name="topic_id[]" id="topic_id[<?php echo $this->_tpl_vars['topic']['topic_id']; ?>
]" value="<?php echo $this->_tpl_vars['topic']['topic_id']; ?>
"/>
                <?php else: ?>
                    <!-- irmtfan add lock -->
                    <?php echo $this->_tpl_vars['topic']['topic_folder']; ?>
<?php echo $this->_tpl_vars['topic']['lock']; ?>

                <?php endif; ?>
            </td>
            <!-- irmtfan add sticky, digest, poll -->
            <td width="4%" align="center"><?php echo $this->_tpl_vars['topic']['topic_icon']; ?>
<?php echo $this->_tpl_vars['topic']['sticky']; ?>
<br/><?php echo $this->_tpl_vars['topic']['digest']; ?>
<?php echo $this->_tpl_vars['topic']['poll']; ?>
</td>
            <!-- irmtfan remove topic_link hardcode and add topic_excerpt -->
            <td>&nbsp;<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
" title="<?php echo $this->_tpl_vars['topic']['topic_excerpt']; ?>
">
                    <!-- irmtfan remove
        <?php if ($this->_tpl_vars['topic']['allow_prefix'] && $this->_tpl_vars['topic']['topic_subject']): ?>
        <?php echo $this->_tpl_vars['topic']['topic_subject']; ?>

        <?php endif; ?> -->
                    <?php echo $this->_tpl_vars['topic']['topic_title']; ?>
</a><?php echo $this->_tpl_vars['topic']['attachment']; ?>
 <?php echo $this->_tpl_vars['topic']['topic_page_jump']; ?>

                <!-- irmtfan add topic publish time and rating -->
                <br/>
        <span>
            <?php echo $this->_tpl_vars['headers']['publish']['title']; ?>
: <?php echo $this->_tpl_vars['topic']['topic_time']; ?>

        </span>
                <?php if ($this->_tpl_vars['rating_enable'] && $this->_tpl_vars['topic']['votes']): ?>
                    |&nbsp;
                    <span>
                <?php echo $this->_tpl_vars['headers']['votes']['title']; ?>
: <?php echo $this->_tpl_vars['topic']['votes']; ?>
&nbsp;<?php echo $this->_tpl_vars['topic']['rating_img']; ?>

            </span>
                <?php endif; ?>
            </td>
            <!-- irmtfan hardcode removed align="left" -->
            <td class="align_left" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_forum_link']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_replies']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_poster']; ?>
</td>
            <td align="center" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_views']; ?>
</td>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right" valign="middle"><?php echo $this->_tpl_vars['topic']['topic_last_posttime']; ?>
<br/>
                <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['topic']['topic_last_poster']; ?>
&nbsp;&nbsp;<?php echo $this->_tpl_vars['topic']['topic_page_jump_icon']; ?>

            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <!-- end forum topic -->

        <?php if ($this->_tpl_vars['mode'] > 1): ?>
</form>
<?php endif; ?>

<tr class="foot">
    <td colspan="8" align="center">
        <?php echo '<form method="get" action="'; ?><?php echo $this->_tpl_vars['selection']['action']; ?><?php echo '"><strong>'; ?><?php echo @_MD_SORTEDBY; ?><?php echo '</strong>&nbsp;'; ?><?php echo $this->_tpl_vars['selection']['sort']; ?><?php echo '&nbsp;'; ?><?php echo $this->_tpl_vars['selection']['order']; ?><?php echo '&nbsp;'; ?><?php echo $this->_tpl_vars['selection']['since']; ?><?php echo '&nbsp;'; ?><?php $_from = $this->_tpl_vars['selection']['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hidvar'] => $this->_tpl_vars['hidval']):
?><?php echo ''; ?><?php if ($this->_tpl_vars['hidval'] && $this->_tpl_vars['hidvar'] != 'sort' && $this->_tpl_vars['hidvar'] != 'order' && $this->_tpl_vars['hidvar'] != 'since'): ?><?php echo '<!-- irmtfan correct name="$hidvar" --><input type="hidden" name="'; ?><?php echo $this->_tpl_vars['hidvar']; ?><?php echo '" value="'; ?><?php echo $this->_tpl_vars['hidval']; ?><?php echo '"/>'; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo '<!-- irmtfan remove name="refresh" --><input type="submit" value="'; ?><?php echo @_SUBMIT; ?><?php echo '"/></form>'; ?>

    </td>
</tr>
</table>
<!-- end forum main table -->

<?php if ($this->_tpl_vars['pagenav']): ?>
    <!-- irmtfan hardcode removed style="padding: 5px;float: right; text-align:right;" -->
    <div class="pagenav"><?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pagenav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue --></div>
    <br/>
<?php endif; ?>
<div class="clear"></div>

<div>
    <div class="left floatleft">
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
    <!-- irmtfan hardcode removed style="float: right; text-align: right;" -->
    <div class="icon_right">
        <form action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="get">
            <input name="term" id="term" type="text" size="15"/>
            <?php $_from = $this->_tpl_vars['search']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hidvar'] => $this->_tpl_vars['hidval']):
?>
                <?php if ($this->_tpl_vars['hidval']): ?>
                    <!-- irmtfan correct name="$hidvar" -->
                    <input type="hidden" name="<?php echo $this->_tpl_vars['hidvar']; ?>
" value="<?php echo $this->_tpl_vars['hidval']; ?>
"/>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <input type="submit" class="formButton" value="<?php echo @_MD_SEARCH; ?>
"/><br/>
            [<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php"><?php echo @_MD_ADVSEARCH; ?>
</a>]
        </form>
        <br/>
        <!-- START irmtfan add forum selection box -->
        <?php if ($this->_tpl_vars['forum_jumpbox']): ?>
            <form method="get" action="<?php echo $this->_tpl_vars['selection']['action']; ?>
">
                <?php echo $this->_tpl_vars['selection']['forum']; ?>
&nbsp;
                <?php $_from = $this->_tpl_vars['selection']['vars']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['hidvar'] => $this->_tpl_vars['hidval']):
?>
                    <?php if ($this->_tpl_vars['hidval'] && $this->_tpl_vars['hidvar'] != 'forum'): ?>
                        <input type="hidden" name="<?php echo $this->_tpl_vars['hidvar']; ?>
" value="<?php echo $this->_tpl_vars['hidval']; ?>
"/>
                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <input type="submit" value="<?php echo @_SUBMIT; ?>
"/>
            </form>
            <br/>
            <?php echo $this->_tpl_vars['forum_jumpbox']; ?>

        <?php endif; ?>
        <!-- END irmtfan add forum selection box -->
    </div>
</div>
<div class="clear"></div>
<br/>

<?php if ($this->_tpl_vars['online']): ?><?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_online.tpl", 'smarty_include_vars' => array()));
 ?><?php endif; ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => 'db:newbb_notification_select.tpl', 'smarty_include_vars' => array()));
 ?>
<!-- end module contents -->