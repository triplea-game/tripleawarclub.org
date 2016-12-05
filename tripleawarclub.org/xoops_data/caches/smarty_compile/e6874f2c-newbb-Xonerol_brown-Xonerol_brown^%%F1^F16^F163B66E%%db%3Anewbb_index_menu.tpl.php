<?php /* Smarty version 2.6.28, created on 2016-02-13 22:34:27
         compiled from db:newbb_index_menu.tpl */ ?>
<select
        name="mainoption" id="mainoption"
        onchange="if(this.options[this.selectedIndex].value.length >0 )	{ window.document.location=this.options[this.selectedIndex].value;}">
    <option value=""><?php echo @_MD_MAINFORUMOPT; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['mark_read']; ?>
"><?php echo @_MD_MARK_ALL_FORUMS; ?>
&nbsp;<?php echo @_MD_MARK_READ; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['mark_unread']; ?>
"><?php echo @_MD_MARK_ALL_FORUMS; ?>
&nbsp;<?php echo @_MD_MARK_UNREAD; ?>
</option>
    <option value="">--------</option>
    <option value="<?php echo $this->_tpl_vars['post_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALLPOSTS; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['newpost_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_NEWPOSTS; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['all_link']; ?>
"><?php echo @_MD_VIEW; ?>
&nbsp;<?php echo @_MD_ALL; ?>
</option>
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
    <?php if ($this->_tpl_vars['forum_index_cpanel']): ?>
        <option value="">--------</option>
        <option value="<?php echo $this->_tpl_vars['forum_index_cpanel']['link']; ?>
"><?php echo $this->_tpl_vars['forum_index_cpanel']['name']; ?>
</option>
    <?php endif; ?>
</select>