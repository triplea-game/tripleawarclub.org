<?php /* Smarty version 2.6.28, created on 2016-12-03 04:07:56
         compiled from db:newbb_thread.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'db:newbb_thread.tpl', 53, false),)), $this); ?>
<!-- START irmtfan assign forum_post_prefix smarty -->
<?php if ($this->_tpl_vars['forum_post_prefix'] === null): ?>
    <!-- change the value to what you prefer. even value="" (no prefix) is acceptable -->
    <?php $this->assign('forum_post_prefix', 'forumpost'); ?>
    <!-- it is the first time then add id=0 for recognizoing top of the topic to scroll when $post_id=0 (just $topic_id in the URL) -->
    <div id="<?php echo $this->_tpl_vars['forum_post_prefix']; ?>
0"></div>
<?php endif; ?>
<!-- END irmtfan assign forum_post_prefix smarty -->
<!-- irmtfan removed  
-->
<table class="outer" cellpadding="0" cellspacing="0" border="0" width="100%" align="center" style="border-bottom-width: 0;">
    <tr>
        <!-- irmtfan hardcode removed align="left" -->
        <th width="20%" class="left">
            <div class="ThreadUserName"><?php echo $this->_tpl_vars['topic_post']['poster']['link']; ?>
</div>
        </th>
        <!-- irmtfan hardcode removed align="left" -->
        <th width="75%" class="left">
            <div class="comTitle"><?php echo $this->_tpl_vars['topic_post']['post_title']; ?>
</div>
        </th>
        <!-- irmtfan hardcode removed align="right" -->
        <th class="right">
            <!-- irmtfan hardcode removed style="float: right;" -->
            <div class="ThreadTitle">
                <?php if ($this->_tpl_vars['topic_post']['post_id'] > 0): ?>
                    <!-- irmtfan add id for each post -->
                    <a id="<?php echo $this->_tpl_vars['forum_post_prefix']; ?>
<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
">#<?php echo $this->_tpl_vars['topic_post']['post_no']; ?>
</a>
                <?php endif; ?>
            </div>
        </th>
    </tr>
    <tr>
        <?php if ($this->_tpl_vars['topic_post']['poster']['uid'] > -1): ?>
        <td width="20%" class="odd" rowspan="2" valign="top">
            <?php if ($this->_tpl_vars['topic_post']['poster']['uid'] != 0): ?>
                <!-- START hacked by irmtfan rank_title -> rank.title -->
                <div class="comUserRankText"><?php if ($this->_tpl_vars['topic_post']['poster']['rank']['title'] != ""): ?> <?php echo $this->_tpl_vars['topic_post']['poster']['rank']['title']; ?>
<br/><img src="<?php echo $this->_tpl_vars['xoops_upload_url']; ?>
/<?php echo $this->_tpl_vars['topic_post']['poster']['rank']['image']; ?>
" alt="<?php echo $this->_tpl_vars['topic_post']['poster']['rank']['title']; ?>
" /><?php endif; ?></div>
                <!-- END hacked by irmtfan -->

                <?php if ($this->_tpl_vars['topic_post']['poster']['avatar'] != "blank.gif"): ?>
                    <br/>
                    <img class="comUserImg" src="<?php echo $this->_tpl_vars['xoops_upload_url']; ?>
/<?php echo $this->_tpl_vars['topic_post']['poster']['avatar']; ?>
" alt=""/>
                <?php else: ?>
                    <!-- irmtfan remove icon_path -->
                    <br/>
                    <?php echo $this->_tpl_vars['anonym_avatar']; ?>

                <?php endif; ?>
                <br/>
                <?php if ($this->_tpl_vars['infobox']['show']): ?>
                    <!-- irmtfan simplify onclick method (this.children[0] for IE7&8) - remove hardcode style="padding:2px;"-->
                    <span class="pointer"
                          onclick="ToggleBlockCategory('<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
',(this.firstElementChild || this.children[0]) , '<?php echo $this->_tpl_vars['infobox']['icon']['expand']; ?>
', '<?php echo $this->_tpl_vars['infobox']['icon']['collapse']; ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_HIDEUSERDATA)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
','<?php echo ((is_array($_tmp=@_MD_NEWBB_SEEUSERDATA)) ? $this->_run_mod_handler('escape', true, $_tmp, 'quotes') : smarty_modifier_escape($_tmp, 'quotes')); ?>
')">
                        <?php echo $this->_tpl_vars['infobox']['displayImage']; ?>

</span>
                    <!-- irmtfan move semicolon -->
                    <div id="<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" style="display: <?php echo $this->_tpl_vars['infobox']['style']; ?>
;">
                        <div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_JOINED; ?>
:</span><br/><?php echo $this->_tpl_vars['topic_post']['poster']['regdate']; ?>
<br/><span class="comUserStatCaption"><?php echo @_US_LASTLOGIN; ?>

                                :</span><br/><?php echo $this->_tpl_vars['topic_post']['poster']['last_login']; ?>
</div>
                        <!-- irmtfan add last_login -->
                        <?php if ($this->_tpl_vars['topic_post']['poster']['from']): ?>
                            <div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_FROM; ?>
</span> <?php echo $this->_tpl_vars['topic_post']['poster']['from']; ?>
</div>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['topic_post']['poster']['groups']): ?>
                            <div class="comUserStat"><span class="comUserStatCaption"><?php echo @_MD_GROUP; ?>
</span>
                                <?php if (count($this->_tpl_vars['topic_post']['poster']['groups'])):
    foreach ($this->_tpl_vars['topic_post']['poster']['groups'] as $this->_tpl_vars['group']):
 ?> <br/><?php echo $this->_tpl_vars['group']; ?>
<?php endforeach; endif; unset($_from); ?>
                            </div>
                        <?php endif; ?>
                        <div class="comUserStat">
                            <span class="comUserStatCaption"><?php echo @_MD_POSTS; ?>
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
                            <?php if ($this->_tpl_vars['topic_post']['poster']['digests'] > 0): ?>
                                |
                                <span class="comUserStatCaption"><?php echo @_MD_DIGESTS; ?>
:</span>
                                <?php echo $this->_tpl_vars['topic_post']['poster']['digests']; ?>

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
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="comUserRankText"><?php echo $this->_tpl_vars['anonymous_prefix']; ?>
<?php echo $this->_tpl_vars['topic_post']['poster']['name']; ?>
</div>
            <?php endif; ?>
        </td>

        <td colspan="2" class="even">
            <?php else: ?>
        <td colspan="3" class="even">
            <?php endif; ?>
            <div class="comText"><?php echo $this->_tpl_vars['topic_post']['post_text']; ?>
</div>
            <?php if ($this->_tpl_vars['topic_post']['post_attachment']): ?>
                <div class="comText"><?php echo $this->_tpl_vars['topic_post']['post_attachment']; ?>
</div>
            <?php endif; ?>
            <div class="clear"></div>
            <br/>
            <!-- irmtfan hardcode removed style="float: right; padding: 5px; margin-top: 10px;" -->
            <div class="post_ip">
                <?php if ($this->_tpl_vars['topic_post']['poster_ip']): ?>
                    IP:
                    <a href="http://www.whois.sc/<?php echo $this->_tpl_vars['topic_post']['poster_ip']; ?>
" target="_blank"><?php echo $this->_tpl_vars['topic_post']['poster_ip']; ?>
</a>
                    |
                <?php endif; ?>
                <?php if ($this->_tpl_vars['topic_post']['poster']['uid'] > 0): ?>
                <?php echo @_MD_POSTEDON; ?>
<?php echo $this->_tpl_vars['topic_post']['post_date']; ?>
</div>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['topic_post']['post_edit']): ?>
                <div class="clear"></div>
                <br/>
                <!-- irmtfan hardcode removed style="float: right; padding: 5px; margin-top: 10px; border:1px solid #000;" -->
                <div class="post_edit">
                    <!-- irmtfan hardcode removed -->
                    <?php echo $this->_tpl_vars['topic_post']['post_edit']; ?>

                </div>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <?php if ($this->_tpl_vars['topic_post']['poster']['uid'] > -1): ?>
        <td colspan="2" class="odd" valign="bottom">
            <?php else: ?>
        <td colspan="3" class="odd" valign="bottom">
            <?php endif; ?>
            <?php if ($this->_tpl_vars['topic_post']['post_signature']): ?>
                <div class="signature">
                    <!-- irmtfan hardcode removed hardcode ____________________<br /> -->
                    <?php echo $this->_tpl_vars['topic_post']['post_signature']; ?>

                </div>
            <?php endif; ?>
        </td>
    </tr>

    <tr>
        <td colspan="3" class="foot">
            <table style="border: 0; padding: 0; margin: 0;">
                <tr>
                    <!--  irmtfan removed hardcode style="text-align:left;" -->
                    <td class="left">
                        <?php if ($this->_tpl_vars['topic_post']['thread_action']): ?>
                            <?php if (count($this->_tpl_vars['topic_post']['thread_action'])):
    foreach ($this->_tpl_vars['topic_post']['thread_action'] as $this->_tpl_vars['btn']):
 ?>
                            <!--  irmtfan add alt key -->
                            <a href="<?php echo $this->_tpl_vars['btn']['link']; ?>
&amp;post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" alt="<?php echo $this->_tpl_vars['btn']['name']; ?>
" title="<?php echo $this->_tpl_vars['btn']['name']; ?>
" <?php if ($this->_tpl_vars['btn']['target']): ?>target="<?php echo $this->_tpl_vars['btn']['target']; ?>
"<?php endif; ?>> <?php echo $this->_tpl_vars['btn']['image']; ?>
</a>
                        <?php endforeach; endif; unset($_from); ?>
                        <?php endif; ?>
                    </td>
                    <!--  irmtfan removed hardcode style="text-align:right;" -->
                    <td class="right">
                        <!--  irmtfan if the post is not advertise -->
                        <?php if ($this->_tpl_vars['mode'] > 1 && $this->_tpl_vars['topic_post']['poster']['uid'] > -1): ?>
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=1" target="_self" title="<?php echo @_MD_SPLIT_ONE; ?>
"><?php echo @_MD_SPLIT_ONE; ?>
</a>
                            |
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=2" target="_self" title="<?php echo @_MD_SPLIT_TREE; ?>
"><?php echo @_MD_SPLIT_TREE; ?>
</a>
                            |
                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/action.post.php?post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
&amp;op=split&amp;mode=3" target="_self" title="<?php echo @_MD_SPLIT_ALL; ?>
"><?php echo @_MD_SPLIT_ALL; ?>
</a>
                            |
                            <input type="checkbox" name="post_id[]" id="post_id[<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
]" value="<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
"/>
                        <?php else: ?>
                            <?php if ($this->_tpl_vars['topic_post']['thread_buttons']): ?>
                                <?php if (count($this->_tpl_vars['topic_post']['thread_buttons'])):
    foreach ($this->_tpl_vars['topic_post']['thread_buttons'] as $this->_tpl_vars['btn']):
 ?>
                                <!--  irmtfan add alt key -->
                                <a href="<?php echo $this->_tpl_vars['btn']['link']; ?>
&amp;post_id=<?php echo $this->_tpl_vars['topic_post']['post_id']; ?>
" alt="<?php echo $this->_tpl_vars['btn']['name']; ?>
" title="<?php echo $this->_tpl_vars['btn']['name']; ?>
"> <?php echo $this->_tpl_vars['btn']['image']; ?>
</a>
                            <?php endforeach; endif; unset($_from); ?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a href="#threadtop" title="<?php echo @_MD_TOP; ?>
"> <?php echo $this->_tpl_vars['p_up']; ?>
</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>