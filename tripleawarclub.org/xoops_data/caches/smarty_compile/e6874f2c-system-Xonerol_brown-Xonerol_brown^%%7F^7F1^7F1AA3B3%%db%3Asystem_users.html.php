<?php /* Smarty version 2.6.28, created on 2016-02-14 16:57:20
         compiled from db:system_users.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_users.html', 39, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>

<?php if ($this->_tpl_vars['users_display'] == true): ?>
<!--Display form sort-->
<div class="xo-headercontent">
    <div class="floatleft"><?php echo $this->_tpl_vars['form_sort']; ?>
</div>
    <div class="floatright">
        <div class="xo-buttons">
            <a class="ui-corner-all tooltip" href="admin.php?fct=users&amp;op=users_synchronize&amp;status=2" title="<?php echo @_AM_SYSTEM_USERS_SYNCHRONIZE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/reload.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_SYNCHRONIZE; ?>
" />
                <?php echo @_AM_SYSTEM_USERS_SYNCHRONIZE; ?>

            </a>
            <a class="ui-corner-all tooltip" href="admin.php?fct=users&amp;op=users_add" title="<?php echo @_AM_SYSTEM_USERS_ADDUSER; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_add.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_ADDUSER; ?>
" />
                <?php echo @_AM_SYSTEM_USERS_ADDUSER; ?>

            </a>
        </div>
    </div>
</div>
<div class="clear">&nbsp;</div>
    <table id="xo-users-sorter" cellspacing="1" class="outer tablesorter">
        <thead>
        <tr>
            <th class="txtcenter width3"><input name='allbox' id='allbox' onclick='xoopsCheckAll("memberslist", "allbox");'  type='checkbox' value='Check All' /></th>
            <th class="txtcenter width5"><?php echo @_AM_SYSTEM_USERS_STATUS; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USERS_UNAME; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USERS_EMAIL; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USERS_REG_DATE; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USERS_LAST_LOGIN; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USERS_POSTS; ?>
</th>
            <th class="txtcenter" width='11%'><?php echo @_AM_SYSTEM_USERS_ACTION; ?>
</th>
        </tr>
        </thead>
        <!--Display data-->
        <?php if ($this->_tpl_vars['users_count'] == true): ?>
        <form name='memberslist' id='memberslist' action='<?php echo 'http://www.tripleawarclub.org/modules/system/admin.php?fct=users'; ?>' method='POST'>
        <tbody>
        <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['users']):
?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 alignmiddle">
            <td class="txtcenter"><?php if ($this->_tpl_vars['users']['checkbox_user']): ?><input type='checkbox' name='memberslist_id[]' id='memberslist_id[]' value='<?php echo $this->_tpl_vars['users']['uid']; ?>
' /><?php endif; ?></td>
            <td class="txtcenter"><img class="xo-imgmini" src="<?php echo $this->_tpl_vars['users']['group']; ?>
" alt="" /></td>
            <td class="txtcenter"><a title="<?php echo $this->_tpl_vars['users']['uname']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" ><?php echo $this->_tpl_vars['users']['uname']; ?>
</a></td>
            <td class="txtcenter"><?php echo $this->_tpl_vars['users']['email']; ?>
</td>
            <td class="txtcenter"><?php echo $this->_tpl_vars['users']['reg_date']; ?>
</td>
            <td class="txtcenter"><?php echo $this->_tpl_vars['users']['last_login']; ?>
</td>
            <td class="txtcenter"><div id="display_post_<?php echo $this->_tpl_vars['users']['uid']; ?>
"><?php echo $this->_tpl_vars['users']['posts']; ?>
</div><div id='loading_<?php echo $this->_tpl_vars['users']['uid']; ?>
' class="txtcenter" style="display:none;"><img src="./images/mimetypes/spinner.gif" title="Loading" alt="Loading" width="12px"/></div></td>
            <td class="xo-actions txtcenter">
                <?php if ($this->_tpl_vars['users']['user_level'] > 0): ?>
                <img class="tooltip" onclick="display_post('<?php echo $this->_tpl_vars['users']['uid']; ?>
');" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/reload.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_SYNCHRONIZE; ?>
" title="<?php echo @_AM_SYSTEM_USERS_SYNCHRONIZE; ?>
" />
                <img class="tooltip" onclick="display_dialog('<?php echo $this->_tpl_vars['users']['uid']; ?>
', true, true, 'slide', 'slide', 300, 400);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_VIEW; ?>
" title="<?php echo @_AM_SYSTEM_USERS_VIEW; ?>
" />
                <a class="tooltip" href="admin.php?fct=users&amp;op=users_edit&amp;uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo @_AM_SYSTEM_USERS_EDIT; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_EDIT; ?>
" />
                </a>
                <a class="tooltip" href="admin.php?fct=users&amp;op=users_delete&amp;uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo @_AM_SYSTEM_USERS_DEL; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_DEL; ?>
" />
                </a>
                <?php else: ?>
                <a class="tooltip" href="admin.php?fct=users&amp;op=users_active&amp;uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo @_AM_SYSTEM_USERS_ACTIVE; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/xoops/active_user.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_ACTIVE; ?>
" />
                </a>
                <img class="tooltip" onclick="display_dialog('<?php echo $this->_tpl_vars['users']['uid']; ?>
', true, true, 'slide', 'slide', 300, 400);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_VIEW; ?>
" title="<?php echo @_AM_SYSTEM_USERS_VIEW; ?>
" />
                <a class="tooltip" href="admin.php?fct=users&amp;op=users_edit&amp;uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo @_AM_SYSTEM_USERS_EDIT; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_EDIT; ?>
" />
                </a>
                <a class="tooltip" href="admin.php?fct=users&amp;op=users_delete&amp;uid=<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo @_AM_SYSTEM_USERS_DEL; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERS_DEL; ?>
" />
                </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tr>
            <td class='txtleft' colspan='6'>
                <select name='fct' onChange='changeDisplay (this.value, "groups", "edit_group")'>
                    <option value=''>---------</option>
                    <option value='mailusers'><?php echo @_AM_SYSTEM_USERS_SENDMAIL; ?>
</option>
                    <option value='groups'><?php echo @_AM_SYSTEM_USERS_EDIT_GROUPS; ?>
</option>
                    <option value='users'><?php echo @_AM_SYSTEM_USERS_DELETE; ?>
</option>
                </select>&nbsp;
                <select name='edit_group' id='edit_group' onChange='changeDisplay (this.value, this.value, "selgroups")' style="display:none;">
                    <option value=''>---------</option>
                    <option value='add_group'><?php echo @_AM_SYSTEM_USERS_ADD_GROUPS; ?>
</option>
                    <option value='delete_group'><?php echo @_AM_SYSTEM_USERS_DELETE_GROUPS; ?>
</option>
                </select>
                <?php echo $this->_tpl_vars['form_select_groups']; ?>

                <input type="hidden" name="op" value="action_group">
                <input type='submit' name='Submit' />
            </td>
        </tr>
        </form>
        <?php endif; ?>
        <!--No found-->
        <?php if ($this->_tpl_vars['users_no_found'] == true): ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 alignmiddle">
            <td colspan='8' class="txtcenter"><?php echo @_AM_SYSTEM_USERS_NO_FOUND; ?>
</td>
        </tr>
        <?php endif; ?>
    </table>
    <!--Pop-pup-->
    <?php if ($this->_tpl_vars['users_count'] == true): ?>
        <?php $_from = $this->_tpl_vars['users_popup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['users']):
?>
            <div id="dialog<?php echo $this->_tpl_vars['users']['uid']; ?>
" title="<?php echo $this->_tpl_vars['users']['uname']; ?>
" style='display:none;'>
                <table>
                    <tr>
                        <td class="txtcenter">
                            <img src="<?php echo $this->_tpl_vars['users']['user_avatar']; ?>
" alt="<?php echo $this->_tpl_vars['users']['uname']; ?>
" title="<?php echo $this->_tpl_vars['users']['uname']; ?>
" />
                        </td>
                        <td class="txtcenter">
                            <a href='mailto:<?php echo $this->_tpl_vars['users']['email']; ?>
'><img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/mail_send.png'; ?>" alt="" title=<?php echo @_AM_SYSTEM_USERS_EMAIL; ?>
 /></a>
                            <a href='javascript:openWithSelfMain("<?php echo $this->_tpl_vars['xoops_url']; ?>
/pmlite.php?send2=1&amp;to_userid=<?php echo $this->_tpl_vars['users']['uid']; ?>
","pmlite",450,370);'><img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/pm.png'; ?>" alt="" title=<?php echo @_AM_SYSTEM_USERS_PM; ?>
 /></a>
                            <a href='<?php echo $this->_tpl_vars['users']['url']; ?>
' rel='external'><img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/url.png'; ?>" alt="" title=<?php echo @_AM_SYSTEM_USERS_URL; ?>
 ></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <ul style="border: 1px solid #666; padding: 8px;">
                                <?php if ($this->_tpl_vars['users']['user_name']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_NAME; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['name']; ?>
</li><?php endif; ?>
                                <li><span class="bold"><?php echo @_AM_SYSTEM_USERS_UNAME; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['uname']; ?>
</li>
                                <li><span class="bold"><?php echo @_AM_SYSTEM_USERS_EMAIL; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['email']; ?>
</li>
                                <?php if ($this->_tpl_vars['users']['user_url']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_URL; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['url']; ?>
 </li><?php endif; ?>
                                <?php if ($this->_tpl_vars['users']['user_icq']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_ICQ; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['user_icq']; ?>
</li><?php endif; ?>
                                <?php if ($this->_tpl_vars['users']['user_aim']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_AIM; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['user_aim']; ?>
</li><?php endif; ?>
                                <?php if ($this->_tpl_vars['users']['user_yim']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_YIM; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['user_yim']; ?>
</li><?php endif; ?>
                                <?php if ($this->_tpl_vars['users']['user_msnm']): ?><li><span class="bold"><?php echo @_AM_SYSTEM_USERS_MSNM; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['users']['user_msnm']; ?>
 </li><?php endif; ?>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
    <!--Pop-pup-->
    <div class='txtright'><?php echo $this->_tpl_vars['nav']; ?>
</div>
<?php endif; ?>
<br />
<!-- Display Avatar form (add,edit) -->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>