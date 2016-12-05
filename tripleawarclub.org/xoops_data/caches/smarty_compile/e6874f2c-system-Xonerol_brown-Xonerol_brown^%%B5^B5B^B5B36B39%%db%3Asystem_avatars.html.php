<?php /* Smarty version 2.6.28, created on 2016-04-01 14:54:32
         compiled from db:system_avatars.html */ ?>
<!-- Header -->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<?php if ($this->_tpl_vars['view_cat']): ?>
<!-- Display Avatar header for switch between system & custom category -->
<table class="outer" cellspacing="1">
    <thead>
        <tr>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_AVATAR_SYSTEM; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_AVATAR_CUSTOM; ?>
</th>
        </tr>
    </thead>
    <tbody>
        <tr class="odd">
            <td class="txtcenter">
                <a class="tooltip" href="admin.php?fct=avatars&amp;op=listavt&amp;type=s" title="<?php echo @_AM_SYSTEM_AVATAR_SYSTEM; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/avatar_system.png'; ?>" alt="<?php echo @_AM_SYSTEM_AVATAR_SYSTEM; ?>
" />
                </a>
                <div class="spacer"><?php echo @_AM_SYSTEM_AVATAR_SYSTEM; ?>
&nbsp;:&nbsp;<strong><?php echo $this->_tpl_vars['count_system']; ?>
</strong></div>
            </td>
            <td class="txtcenter">
                <a class="tooltip" href="admin.php?fct=avatars&amp;op=listavt&amp;type=c" title="<?php echo @_AM_SYSTEM_AVATAR_CUSTOM; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/avatar_custom.png'; ?>" alt="<?php echo @_AM_SYSTEM_AVATAR_CUSTOM; ?>
" />
                </a>
                <div class="spacer"><?php echo @_AM_SYSTEM_AVATAR_CUSTOM; ?>
&nbsp;:&nbsp;<strong><?php echo $this->_tpl_vars['count_custom']; ?>
</strong></div>
            </td>
        </tr>
    </tbody>
</table>
<br />
<?php endif; ?>
<!-- Display Avatar list for each category -->
<?php if ($this->_tpl_vars['avatars_list']): ?>
<?php $_from = $this->_tpl_vars['avatars_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['avatar']):
?>
<div class="floatleft">
    <div class="ui-corner-all xo-thumb txtcenter">
        <div class="xo-thumbimg">
            <img class="tooltip" src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/image.php?src=<?php echo $this->_tpl_vars['xoops_url']; ?>
/uploads/<?php echo $this->_tpl_vars['avatar']['avatar_file']; ?>
&amp;height=120&amp;width=120" alt="<?php echo $this->_tpl_vars['avatar']['avatar_name']; ?>
" title="<?php echo $this->_tpl_vars['avatar']['avatar_name']; ?>
" />
        </div>
        <div class="xo-actions txtcenter">
            <div class="spacer bold"><?php echo $this->_tpl_vars['avatar']['avatar_name']; ?>
</div>
            <img id="loading_avt<?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
" src="images/spinner.gif" style="display:none;" title="<?php echo @_AM_SYSTEM_LOADING; ?>
" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="tooltip" id="avt<?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
" onclick="system_setStatus( { fct: 'avatars', op: 'display', avatar_id: <?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
 }, 'avt<?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['avatar']['avatar_display']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php echo @_IMGDISPLAY; ?>
" title="<?php echo @_IMGDISPLAY; ?>
" />
            <?php if ($this->_tpl_vars['avatar']['type'] == 'c'): ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/profile/userinfo.php?uid=<?php echo $this->_tpl_vars['avatar']['user']; ?>
" title="<?php echo @_AM_SYSTEM_AVATAR_USERS; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_AVATAR_USERS; ?>
" />
            </a>
            <?php else: ?>
            <img class="cursorhelp tooltip" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/forum.png'; ?>" alt="<?php echo $this->_tpl_vars['avatar']['count']; ?>
 <?php echo @_AM_SYSTEM_AVATAR_USERS; ?>
" title="<?php echo $this->_tpl_vars['avatar']['count']; ?>
 <?php echo @_AM_SYSTEM_AVATAR_USERS; ?>
" />
            <?php endif; ?>
            <a class="tooltip" href="admin.php?fct=avatars&amp;op=edit&amp;avatar_id=<?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
" title="<?php echo @_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" />
            </a>
            <a class="tooltip" href="admin.php?fct=avatars&amp;op=delfile&amp;avatar_id=<?php echo $this->_tpl_vars['avatar']['avatar_id']; ?>
" title="<?php echo @_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
" />
            </a>
        </div>
    </div>
</div>
<?php endforeach; endif; unset($_from); ?>
<!-- Display Avatars navigation -->
<div class="clear">&nbsp;</div>
<?php if ($this->_tpl_vars['nav_menu']): ?><div class="xo-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div><div class="clear spacer"></div><?php endif; ?>
<?php endif; ?>
<!-- Display Avatar form (add,edit) -->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>
<!-- Display Avatar images on edit page -->