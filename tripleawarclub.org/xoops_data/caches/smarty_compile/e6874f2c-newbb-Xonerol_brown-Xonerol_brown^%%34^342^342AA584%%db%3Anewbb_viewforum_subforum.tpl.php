<?php /* Smarty version 2.6.28, created on 2016-02-13 22:37:11
         compiled from db:newbb_viewforum_subforum.tpl */ ?>
<table cellspacing="1" class="outer" width="100%">
    <tr class="head" align="center">
        <td width="5%">&nbsp;</td>
        <!-- irmtfan hardcode removed align="left" -->
        <td nowrap="nowrap" class="align_left"><?php echo @_MD_SUBFORUMS; ?>
</td>
        <td nowrap="nowrap">&nbsp;</td>
        <td nowrap="nowrap"><?php echo @_MD_LASTPOST; ?>
</td>
    </tr>
    <!-- start subforums -->
    <?php if (count($this->_tpl_vars['subforum'])):
    foreach ($this->_tpl_vars['subforum'] as $this->_tpl_vars['sforum']):
 ?>
    <tr>
        <td class="even" align="center" valign="middle"><?php echo $this->_tpl_vars['sforum']['forum_folder']; ?>
</td>
        <td class="odd" onclick="window.location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['sforum']['forum_id']; ?>
'"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['sforum']['forum_id']; ?>
"><strong><?php echo $this->_tpl_vars['sforum']['forum_name']; ?>
</strong></a><br/>

            <div id="index_forum">
                <?php echo $this->_tpl_vars['sforum']['forum_desc']; ?>

                <?php if ($this->_tpl_vars['sforum']['forum_moderators']): ?><br/>
                <span class="extra"><?php echo @_MD_MODERATOR; ?>
:&nbsp;</strong><?php echo $this->_tpl_vars['sforum']['forum_moderators']; ?>

                    <?php endif; ?>
            </div>
        </td>
        <td class="even" align="center" valign="middle">
            <?php echo $this->_tpl_vars['sforum']['forum_topics']; ?>
  <?php echo @_MD_TOPICS; ?>

            <br/>
            <?php echo $this->_tpl_vars['sforum']['forum_posts']; ?>
 <?php echo @_MD_POSTS; ?>

        </td>
        <!-- irmtfan hardcode removed align="right" -->
        <td class="odd" id="align_right" valign="middle">
            <?php if ($this->_tpl_vars['sforum']['forum_lastpost_subject']): ?>
                <?php echo $this->_tpl_vars['sforum']['forum_lastpost_time']; ?>
 <?php echo @_MD_BY; ?>
 <?php echo $this->_tpl_vars['sforum']['forum_lastpost_user']; ?>

                <br/>
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?post_id=<?php echo $this->_tpl_vars['sforum']['forum_lastpost_id']; ?>
">
                    <?php echo $this->_tpl_vars['sforum']['forum_lastpost_subject']; ?>
&nbsp;&nbsp;
                    <!-- irmtfan removed icon_path -->
                    <?php echo $this->_tpl_vars['sforum']['forum_lastpost_icon']; ?>

                </a>
            <?php else: ?>
                <?php echo @_MD_NONEWPOSTS; ?>

            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end subforums -->
</table>