<?php /* Smarty version 2.6.28, created on 2016-02-14 23:14:10
         compiled from db:newbb_viewpost.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'db:newbb_viewpost.tpl', 85, false),)), $this); ?>
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
        <span class="delimiter">&raquo;</span>
        <strong><?php echo $this->_tpl_vars['lang_title']; ?>
</strong>
    </div>
</div>
<div class="clear"></div>
<?php if ($this->_tpl_vars['viewer_level'] > 1): ?>
    <div class="right" id="admin">
        <?php if ($this->_tpl_vars['mode'] > 1): ?>
        <!-- irmtfan mistype forum_posts_admin => form_posts_admin  -->
        <form name="form_posts_admin" action="action.post.php" method="POST" onsubmit="if(window.document.form_posts_admin.op.value &lt; 1){return false;}">
            <?php echo @_ALL; ?>
: <input type="checkbox" name="post_check" id="post_check" value="1" onclick="xoopsCheckAll('form_posts_admin', 'post_check');"/>
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
            <input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['uid']; ?>
"/> |
            <input type="submit" name="submit" value="<?php echo @_SUBMIT; ?>
"/> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?uid=<?php echo $this->_tpl_vars['uid']; ?>
" target="_self" title="<?php echo @_MD_TYPE_VIEW; ?>
"><?php echo @_MD_TYPE_VIEW; ?>
</a>
            <?php else: ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?uid=<?php echo $this->_tpl_vars['uid']; ?>
&amp;status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?uid=<?php echo $this->_tpl_vars['uid']; ?>
&amp;status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php echo @_MD_TYPE_PENDING; ?>
</a> |
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewpost.php?uid=<?php echo $this->_tpl_vars['uid']; ?>
&amp;status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php echo @_MD_TYPE_DELETED; ?>
</a>
            <?php endif; ?>
    </div>
<?php endif; ?>
<div class="clear"></div>
<br/>

<div style="padding: 5px;">
    <!-- irmtfan remove prev and next icons -->
    <a id="threadtop"></a><?php echo $this->_tpl_vars['down']; ?>
<a href="#threadbottom"><?php echo @_MD_BOTTOM; ?>
</a>
</div>

<br/>
<div>
    <div class="dropdown">
        <select
                name="topicoption" id="topicoption"
                class="menu"
                onchange="if(this.options[this.selectedIndex].value.length >0 )    { window.document.location=this.options[this.selectedIndex].value;}"
                >
            <option value=""><?php echo @_MD_TOPICOPTION; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['newpost_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_NEWPOSTS; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['all_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALL; ?>
</option>
            <!--
            <option value="<?php echo $this->_tpl_vars['digest_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_DIGEST; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['unreplied_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREPLIED; ?>
</option>
            <option value="<?php echo $this->_tpl_vars['unread_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_UNREAD; ?>
</option>
            //-->
        </select>

        <select
                name="viewmode" id="viewmode"
                class="menu"
                onchange="if(this.options[this.selectedIndex].value.length >0 )    { window.document.location=this.options[this.selectedIndex].value;}"
                >
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

<?php if (count($this->_tpl_vars['posts'])):
    foreach ($this->_tpl_vars['posts'] as $this->_tpl_vars['post']):
 ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_thread.tpl", 'smarty_include_vars' => array('topic_post' => $this->_tpl_vars['post'])));
 ?>
<!-- irmtfan hardcode removed style="padding: 5px;float: right; text-align:right;" -->
<div class="pagenav">
    <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['post']['topic_id']; ?>
"><strong><?php echo @_MD_VIEWTOPIC; ?>
</strong></a>
    <?php if (! $this->_tpl_vars['forum_name']): ?>
        |
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/viewforum.php?forum=<?php echo $this->_tpl_vars['post']['forum_id']; ?>
"><strong><?php echo @_MD_VIEWFORUM; ?>
</strong></a>
    <?php endif; ?>
</div>
<div class="clear"></div>
<br/>
<br/>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['mode'] > 1): ?>
    </form>
<?php endif; ?>

<br/>
<div>
    <!-- irmtfan hardcode removed style="float: left; text-align:left;" -->
    <div class="icon_left">
        <!-- irmtfan add up button -->
        <a id="threadbottom"></a><?php echo $this->_tpl_vars['p_up']; ?>
<a href="#threadtop"><?php echo @_MD_TOP; ?>
</a>
    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align:right;" -->
    <div class="icon_right">
        <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['pagenav'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'form', 'div') : smarty_modifier_replace($_tmp, 'form', 'div')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'id="xo-pagenav"', '') : smarty_modifier_replace($_tmp, 'id="xo-pagenav"', '')); ?>
 <!-- irmtfan to solve nested forms and id="xo-pagenav" issue -->
    </div>
</div>
<div class="clear"></div>

<br/>
<br/>
<div>
    <!-- irmtfan hardcode removed style="float: left; text-align: left;" -->
    <div class="icon_left">
        <form action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="get">
            <input name="term" id="term" type="text" size="15"/>
            <input type="hidden" name="sortby" id="sortby" value="p.post_time desc"/>
            <input type="hidden" name="action" id="action" value="yes"/>
            <input type="hidden" name="searchin" id="searchin" value="both"/>
            <input type="submit" class="formButton" value="<?php echo @_MD_SEARCH; ?>
"/><br/>
            [<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php"><?php echo @_MD_ADVSEARCH; ?>
</a>]
        </form>
    </div>
    <!-- irmtfan hardcode removed style="float: right; text-align: right;" -->
    <div class="icon_right">
        <?php echo $this->_tpl_vars['forum_jumpbox']; ?>

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