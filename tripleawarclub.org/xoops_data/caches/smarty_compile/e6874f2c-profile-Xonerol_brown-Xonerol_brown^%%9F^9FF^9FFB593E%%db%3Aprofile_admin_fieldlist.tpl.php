<?php /* Smarty version 2.6.28, created on 2016-02-14 16:55:25
         compiled from db:profile_admin_fieldlist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:profile_admin_fieldlist.tpl', 13, false),array('function', 'html_options', 'db:profile_admin_fieldlist.tpl', 20, false),)), $this); ?>
<form action="field.php" method="post" id="fieldform">
    <table>
        <th><?php echo @_PROFILE_AM_NAME; ?>
</th>
        <th><?php echo @_PROFILE_AM_TITLE; ?>
</th>
        <th><?php echo @_PROFILE_AM_DESCRIPTION; ?>
</th>
        <th><?php echo @_PROFILE_AM_TYPE; ?>
</th>
        <th><?php echo @_PROFILE_AM_CATEGORY; ?>
</th>
        <th><?php echo @_PROFILE_AM_WEIGHT; ?>
</th>
        <th><?php echo @_PROFILE_AM_REQUIRED; ?>
</th>
        <th><?php echo @_PROFILE_AM_ACTION; ?>
</th>
        <?php $_from = $this->_tpl_vars['fieldcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['category']):
?>
            <?php $_from = $this->_tpl_vars['category']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['field']):
?>
                <tr class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
                    <td><?php echo $this->_tpl_vars['field']['field_name']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['field']['field_title']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['field']['field_description']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['field']['fieldtype']; ?>
</td>
                    <td>
                        <?php if ($this->_tpl_vars['field']['canEdit']): ?>
                            <select name="category[<?php echo $this->_tpl_vars['field']['field_id']; ?>
]"><?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['categories'],'selected' => $this->_tpl_vars['field']['cat_id']), $this);?>
</select>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($this->_tpl_vars['field']['canEdit']): ?>
                            <input type="text" name="weight[<?php echo $this->_tpl_vars['field']['field_id']; ?>
]" size="5" maxlength="5" value="<?php echo $this->_tpl_vars['field']['field_weight']; ?>
" />
                        <?php endif; ?>
                    </td>
                    <td align="center">
                        <?php if ($this->_tpl_vars['field']['canEdit']): ?>
                        <a href="field.php?op=toggle&amp;field_required=<?php echo $this->_tpl_vars['field']['field_required']; ?>
&amp;field_id=<?php echo $this->_tpl_vars['field']['field_id']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/'; ?><?php echo $this->_tpl_vars['field']['field_required']; ?>
.png" title="<?php echo @_PROFILE_AM_REQUIRED_TOGGLE; ?>
" alt="<?php echo @_PROFILE_AM_REQUIRED_TOGGLE; ?>
" /></a>
                        <?php endif; ?>
                    </td>
                    <td align= "center">
                        <?php if ($this->_tpl_vars['field']['canEdit']): ?>
                            <input type="hidden" name="oldweight[<?php echo $this->_tpl_vars['field']['field_id']; ?>
]" value="<?php echo $this->_tpl_vars['field']['field_weight']; ?>
" />
                            <input type="hidden" name="oldcat[<?php echo $this->_tpl_vars['field']['field_id']; ?>
]" value="<?php echo $this->_tpl_vars['field']['cat_id']; ?>
" />
                            <input type="hidden" name="field_ids[]" value="<?php echo $this->_tpl_vars['field']['field_id']; ?>
" />
                            <a href="field.php?id=<?php echo $this->_tpl_vars['field']['field_id']; ?>
" title="<?php echo @_EDIT; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" title="<?php echo @_EDIT; ?>
" /></a>
                        <?php endif; ?>
                        <?php if ($this->_tpl_vars['field']['canDelete']): ?>
                            &nbsp;<a href="field.php?op=delete&amp;id=<?php echo $this->_tpl_vars['field']['field_id']; ?>
" title="<?php echo @_DELETE; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
" title="<?php echo @_DELETE; ?>
"</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
        <?php endforeach; endif; unset($_from); ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
            <td colspan="5">
            </td>
            <td>
                <?php echo $this->_tpl_vars['token']; ?>

                <input type="hidden" name="op" value="reorder" />
                <input type="submit" name="submit" value="<?php echo @_SUBMIT; ?>
" />
            </td>
            <td colspan="2">
            </td>
        </tr>
    </table>
</form>