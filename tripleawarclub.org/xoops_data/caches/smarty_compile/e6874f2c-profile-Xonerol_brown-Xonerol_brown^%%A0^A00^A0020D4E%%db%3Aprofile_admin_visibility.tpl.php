<?php /* Smarty version 2.6.28, created on 2016-09-13 22:11:53
         compiled from db:profile_admin_visibility.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:profile_admin_visibility.tpl', 12, false),)), $this); ?>
<br />
<div class="head">
    <form id="<?php echo $this->_tpl_vars['addform']['name']; ?>
" method="<?php echo $this->_tpl_vars['addform']['method']; ?>
" action="<?php echo $this->_tpl_vars['addform']['action']; ?>
">
        <?php $_from = $this->_tpl_vars['addform']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
            <?php echo $this->_tpl_vars['element']['caption']; ?>
 <?php echo $this->_tpl_vars['element']['body']; ?>

        <?php endforeach; endif; unset($_from); ?>
    </form>
</div>

<table>
    <?php $_from = $this->_tpl_vars['fields']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field_id'] => $this->_tpl_vars['field']):
?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'odd,even'), $this);?>
">
            <td class="width20"><?php echo $this->_tpl_vars['field']; ?>
</td>
            <td>
                <?php if (isset ( $this->_tpl_vars['visibilities'][$this->_tpl_vars['field_id']] )): ?>
                    <ul>
                        <?php $_from = $this->_tpl_vars['visibilities'][$this->_tpl_vars['field_id']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['visibility']):
?>
                            <?php $this->assign('user_gid', $this->_tpl_vars['visibility']['user_group']); ?>
                            <?php $this->assign('profile_gid', $this->_tpl_vars['visibility']['profile_group']); ?>
                            <li>
                                <?php echo @_PROFILE_AM_FIELDVISIBLEFOR; ?>
 <?php echo $this->_tpl_vars['groups'][$this->_tpl_vars['user_gid']]; ?>

                                <?php echo @_PROFILE_AM_FIELDVISIBLEON; ?>
 <?php echo $this->_tpl_vars['groups'][$this->_tpl_vars['profile_gid']]; ?>

                                <a href="visibility.php?op=del&amp;field_id=<?php echo $this->_tpl_vars['field_id']; ?>
&amp;ug=<?php echo $this->_tpl_vars['user_gid']; ?>
&amp;pg=<?php echo $this->_tpl_vars['profile_gid']; ?>
" title="<?php echo @_DELETE; ?>
">
                                    <img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/profile/assets/images/no.png" alt="<?php echo @_DELETE; ?>
" />
                                </a>
                            </li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                <?php else: ?>
                    <?php echo @_PROFILE_AM_FIELDNOTVISIBLE; ?>

                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>