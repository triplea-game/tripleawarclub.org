<?php /* Smarty version 2.6.28, created on 2016-02-14 16:56:53
         compiled from db:profile_admin_steplist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:profile_admin_steplist.tpl', 7, false),)), $this); ?>
<table>
    <th><?php echo @_PROFILE_AM_STEPNAME; ?>
</th>
    <th><?php echo @_PROFILE_AM_STEPORDER; ?>
</th>
    <th><?php echo @_PROFILE_AM_STEPSAVE; ?>
</th>
    <th><?php echo @_PROFILE_AM_ACTION; ?>
</th>
    <?php $_from = $this->_tpl_vars['steps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['step']):
?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
            <td><?php echo $this->_tpl_vars['step']['step_name']; ?>
</td>
            <td align= "center"><?php echo $this->_tpl_vars['step']['step_order']; ?>
</td>            
            <td align="center">
                <a href="step.php?op=toggle&amp;step_save=<?php echo $this->_tpl_vars['step']['step_save']; ?>
&amp;step_id=<?php echo $this->_tpl_vars['step']['step_id']; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/'; ?><?php echo $this->_tpl_vars['step']['step_save']; ?>
.png" title="<?php echo @_PROFILE_AM_SAVESTEP_TOGGLE; ?>
" alt="<?php echo @_PROFILE_AM_SAVESTEP_TOGGLE; ?>
" /></a>
            </td>
            <td align= "center">
                <a href="step.php?id=<?php echo $this->_tpl_vars['step']['step_id']; ?>
" title="<?php echo @_EDIT; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" title="<?php echo @_EDIT; ?>
" /></a>
                &nbsp;<a href="step.php?op=delete&amp;id=<?php echo $this->_tpl_vars['step']['step_id']; ?>
" title="<?php echo @_DELETE; ?>
"><img src="<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
" title="<?php echo @_DELETE; ?>
"</a>
            </td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>