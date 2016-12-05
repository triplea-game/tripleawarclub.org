<?php /* Smarty version 2.6.28, created on 2016-02-13 22:35:06
         compiled from db:profile_userinfo.tpl */ ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:profile_breadcrumbs.tpl", 'smarty_include_vars' => array()));
 ?>

<div>
    <?php if ($this->_tpl_vars['avatar']): ?>
        <div class="floatleft pad5">
            <img src="<?php echo $this->_tpl_vars['avatar']; ?>
" alt="<?php echo $this->_tpl_vars['uname']; ?>
" />
        </div>
    <?php endif; ?>
    <div class="floatleft pad10 block">
        <strong><?php echo $this->_tpl_vars['uname']; ?>
</strong>
        <?php if ($this->_tpl_vars['email']): ?>
            <?php echo $this->_tpl_vars['email']; ?>
 <br />
        <?php endif; ?>
        <?php if (! $this->_tpl_vars['user_ownpage'] && $this->_tpl_vars['xoops_isuser'] == true): ?>
        <form name="usernav" action="user.php" method="post">
            <input type="button" value="<?php echo @_PROFILE_MA_SENDPM; ?>
" onclick="javascript:openWithSelfMain('<?php echo $this->_tpl_vars['xoops_url']; ?>
/pmlite.php?send2=1&amp;to_userid=<?php echo $this->_tpl_vars['user_uid']; ?>
', 'pmlite', 450, 380);" />
        </form>
        <?php endif; ?>
    </div>
</div>
<br class="clear"/>

<?php if ($this->_tpl_vars['user_ownpage'] == true): ?>
<div class="floatleft pad5">
    <form name="usernav" action="user.php" method="post">
        <input type="button" value="<?php echo $this->_tpl_vars['lang_editprofile']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/edituser.php'" />
        <input type="button" value="<?php echo $this->_tpl_vars['lang_changepassword']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/changepass.php'" />
        <?php if ($this->_tpl_vars['user_changeemail']): ?>
            <input type="button" value="<?php echo @_PROFILE_MA_CHANGEMAIL; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/changemail.php'" />
        <?php endif; ?>

        <?php if ($this->_tpl_vars['user_candelete'] == true): ?>
            <form method="post" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/user.php">
                <input type="hidden" name="op" value="delete">
                <input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['user_uid']; ?>
">
                <input type="button" value="<?php echo $this->_tpl_vars['lang_deleteaccount']; ?>
" onclick="submit();" />
            </form>
        <?php endif; ?>

        <input type="button" value="<?php echo $this->_tpl_vars['lang_avatar']; ?>
" onclick="location='edituser.php?op=avatarform'" />
        <input type="button" value="<?php echo $this->_tpl_vars['lang_inbox']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/viewpmsg.php'" />
        <input type="button" value="<?php echo $this->_tpl_vars['lang_logout']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/user.php?op=logout'" />
    </form>
</div>
<?php elseif ($this->_tpl_vars['xoops_isadmin'] != false): ?>
<div class="floatleft pad5">
        <form method="post" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/admin/deactivate.php">
        <input type="button" value="<?php echo $this->_tpl_vars['lang_editprofile']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/admin/user.php?op=edit&amp;id=<?php echo $this->_tpl_vars['user_uid']; ?>
'" />
        <input type="hidden" name="uid" value="<?php echo $this->_tpl_vars['user_uid']; ?>
" />
        <?php if ($this->_tpl_vars['userlevel'] == 1): ?>
            <input type="hidden" name="level" value="0" />
            <input type="button" value="<?php echo @_PROFILE_MA_DEACTIVATE; ?>
" onclick="submit();" />
        <?php else: ?>
            <input type="hidden" name="level" value="1" />
            <input type="button" value="<?php echo @_PROFILE_MA_ACTIVATE; ?>
" onclick="submit();" />
        <?php endif; ?>
        </form>
</div>
<?php endif; ?>

<br class="clear"/>

<?php $_from = $this->_tpl_vars['categories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
    <?php if (isset ( $this->_tpl_vars['category']['fields'] )): ?>
        <div class="profile-list-category" id="profile-category-<?php echo $this->_tpl_vars['category']['cat_id']; ?>
">
            <table class="outer" cellpadding="4" cellspacing="1">
                <tr>
                  <th class="txtcenter" colspan="2"><?php echo $this->_tpl_vars['category']['cat_title']; ?>
</th>
                </tr>
                <?php $_from = $this->_tpl_vars['category']['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                    <tr>
                        <td class="head"><?php echo $this->_tpl_vars['field']['title']; ?>
</td>
                        <td class="even"><?php echo $this->_tpl_vars['field']['value']; ?>
</td>
                    </tr>
                <?php endforeach; endif; unset($_from); ?>
            </table>
        </div>
    <?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['modules']): ?>
<br class="clear" />
<div class="profile-list-activity">
    <h2><?php echo $this->_tpl_vars['recent_activity']; ?>
</h2>
    <!-- start module search results loop -->
    <?php $_from = $this->_tpl_vars['modules']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['module']):
?>

    <h4><?php echo $this->_tpl_vars['module']['name']; ?>
</h4>

      <!-- start results item loop -->
          <?php $_from = $this->_tpl_vars['module']['results']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['result']):
?>

          <img src="<?php echo $this->_tpl_vars['result']['image']; ?>
" alt="<?php echo $this->_tpl_vars['module']['name']; ?>
" />&nbsp;<strong><a href="<?php echo $this->_tpl_vars['result']['link']; ?>
"><?php echo $this->_tpl_vars['result']['title']; ?>
</a></strong><br /><span class="x-small">(<?php echo $this->_tpl_vars['result']['time']; ?>
)</span><br />

          <?php endforeach; endif; unset($_from); ?>
          <!-- end results item loop -->

    <?php echo $this->_tpl_vars['module']['showall_link']; ?>


    <?php endforeach; endif; unset($_from); ?>
    <!-- end module search results loop -->
</div>
<?php endif; ?>