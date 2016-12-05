<?php /* Smarty version 2.6.28, created on 2016-02-13 22:37:11
         compiled from db:newbb_viewforum_menu.tpl */ ?>
<select
        name="forumoption" id="forumoption"
        onchange="if(this.options[this.selectedIndex].value.length >0 )    { window.location=this.options[this.selectedIndex].value;}"
        >
    <option value=""><?php echo @_MD_FORUMOPTION; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['mark_read']; ?>
"><?php echo @_MD_MARK_ALL_TOPICS; ?>
&nbsp;<?php echo @_MD_MARK_READ; ?>
</option>
    <option value="<?php echo $this->_tpl_vars['mark_unread']; ?>
"><?php echo @_MD_MARK_ALL_TOPICS; ?>
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
</select>

<?php if ($this->_tpl_vars['typeOptions']): ?>
    <select
            name="type" id="type"
            onchange="if(this.options[this.selectedIndex].value.length >0 )    { window.location=this.options[this.selectedIndex].value;}"
            >
        <option value=""><?php echo @_MD_NEWBB_TYPE; ?>
</option>
        <?php if (count($this->_tpl_vars['typeOptions'])):
    foreach ($this->_tpl_vars['typeOptions'] as $this->_tpl_vars['opt']):
 ?>
        <option value="<?php echo $this->_tpl_vars['opt']['link']; ?>
"><?php echo $this->_tpl_vars['opt']['title']; ?>
</option>
        <?php endforeach; endif; unset($_from); ?>
    </select>
<?php endif; ?>