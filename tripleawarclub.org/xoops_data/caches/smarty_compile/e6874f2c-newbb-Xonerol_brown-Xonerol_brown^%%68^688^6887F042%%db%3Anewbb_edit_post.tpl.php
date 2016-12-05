<?php /* Smarty version 2.6.28, created on 2016-02-13 22:39:09
         compiled from db:newbb_edit_post.tpl */ ?>
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
/index.php"><?php echo @_MD_FORUMINDEX; ?>
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
            &nbsp;
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
        <span class="delimiter">&raquo;</span>
        &nbsp;<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum_name']; ?>
</a>
        <span class="delimiter">&raquo;</span>
        &nbsp;<strong><?php echo $this->_tpl_vars['form_title']; ?>
</strong>
    </div>
</div>
<div class="clear"></div>
<br/>

<?php if ($this->_tpl_vars['disclaimer']): ?>
    <div class="confirmMsg"><?php echo $this->_tpl_vars['disclaimer']; ?>
</div>
    <div class="clear"></div>
    <br/>
<?php endif; ?>

<?php if ($this->_tpl_vars['error_message']): ?>
    <div class="errorMsg"><?php echo $this->_tpl_vars['error_message']; ?>
</div>
    <div class="clear"></div>
    <br/>
<?php endif; ?>

<?php if ($this->_tpl_vars['post_preview']): ?>
    <table width='100%' class='outer' cellspacing='1'>
        <tr valign="top">
            <td class="head"><?php echo $this->_tpl_vars['post_preview']['subject']; ?>
</td>
        </tr>
        <tr valign="top">
            <td><?php echo $this->_tpl_vars['post_preview']['meta']; ?>
<br/><br/>
                <?php echo $this->_tpl_vars['post_preview']['content']; ?>

            </td>
        </tr>
    </table>
    <div class="clear"></div>
    <br/>
<?php endif; ?>

<form name="<?php echo $this->_tpl_vars['form_post']['name']; ?>
" id="<?php echo $this->_tpl_vars['form_post']['name']; ?>
" action="<?php echo $this->_tpl_vars['form_post']['action']; ?>
" method="<?php echo $this->_tpl_vars['form_post']['method']; ?>
" <?php echo $this->_tpl_vars['form_post']['extra']; ?>
 >
    <table width='100%' class='outer' cellspacing='1'>
        <?php if (count($this->_tpl_vars['form_post']['elements'])):
    foreach ($this->_tpl_vars['form_post']['elements'] as $this->_tpl_vars['element']):
 ?>
        <?php if ($this->_tpl_vars['element']['hidden'] != true): ?>
            <tr valign="top">
                <td class="head">
                    <div class="xoops-form-element-caption<?php if ($this->_tpl_vars['element']['required']): ?>-required<?php endif; ?>"><span class="caption-text"><?php echo $this->_tpl_vars['element']['caption']; ?>
</span><span class="caption-marker">*</span></div>
                    <?php if ($this->_tpl_vars['element']['description'] != ''): ?>
                        <div class="xoops-form-element-help"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
                    <?php endif; ?>
                </td>
                <td class="odd" style="white-space: nowrap;"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
            </tr>
        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </table>
    <?php if (count($this->_tpl_vars['form_post']['elements'])):
    foreach ($this->_tpl_vars['form_post']['elements'] as $this->_tpl_vars['element']):
 ?>
    <?php if ($this->_tpl_vars['element']['hidden'] == true): ?>
        <?php echo $this->_tpl_vars['element']['body']; ?>

    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</form>
<?php echo $this->_tpl_vars['form_post']['javascript']; ?>

<div class="clear"></div>
<br/>

<?php if ($this->_tpl_vars['posts_context']): ?>
    <table width='100%' class='outer' cellspacing='1'>
        <?php if (count($this->_tpl_vars['posts_context'])):
    foreach ($this->_tpl_vars['posts_context'] as $this->_tpl_vars['post']):
 ?>
        <tr valign="top">
            <td class="head"><?php echo $this->_tpl_vars['post']['subject']; ?>
</td>
        </tr>
        <tr valign="top">
            <td><?php echo $this->_tpl_vars['post']['meta']; ?>
<br/><br/>
                <?php echo $this->_tpl_vars['post']['content']; ?>

            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </table>
<?php endif; ?>