<?php /* Smarty version 2.6.28, created on 2016-02-15 01:50:55
         compiled from db:pm_viewpmsg.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:pm_viewpmsg.tpl', 56, false),)), $this); ?>
<h4 class="txtcenter"><?php echo @_PM_PRIVATEMESSAGE; ?>
</h4>
<?php if ($this->_tpl_vars['op']): ?>
<br />
<div class="floatright txtright" style="width: 18%;">
    <?php if ($this->_tpl_vars['op'] == 'out'): ?>
        <a href='viewpmsg.php?op=in' title='<?php echo @_PM_INBOX; ?>
'><?php echo @_PM_INBOX; ?>
</a> | <a href='viewpmsg.php?op=save' title='<?php echo @_PM_SAVEBOX; ?>
'><?php echo @_PM_SAVEBOX; ?>
</a>
    <?php elseif ($this->_tpl_vars['op'] == 'save'): ?>
        <a href='viewpmsg.php?op=in' title='<?php echo @_PM_INBOX; ?>
'><?php echo @_PM_INBOX; ?>
</a> | <a href='viewpmsg.php?op=out' title='<?php echo @_PM_OUTBOX; ?>
'><?php echo @_PM_OUTBOX; ?>
</a>
    <?php elseif ($this->_tpl_vars['op'] == 'in'): ?>
        <a href='viewpmsg.php?op=out' title='<?php echo @_PM_OUTBOX; ?>
'><?php echo @_PM_OUTBOX; ?>
</a> | <a href='viewpmsg.php?op=save' title='<?php echo @_PM_SAVEBOX; ?>
'><?php echo @_PM_SAVEBOX; ?>
</a>
    <?php endif; ?>
</div>
<div class="floatleft width80">
    <?php if ($this->_tpl_vars['op'] == 'out'): ?><?php echo @_PM_OUTBOX; ?>

    <?php elseif ($this->_tpl_vars['op'] == 'save'): ?><?php echo @_PM_SAVEBOX; ?>

    <?php else: ?><?php echo @_PM_INBOX; ?>
<?php endif; ?>
</div>
<br />
<br />
<?php if ($this->_tpl_vars['msg']): ?>
    <div class="confirmMsg"><?php echo $this->_tpl_vars['msg']; ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['errormsg']): ?>
    <div class="errorMsg"><?php echo $this->_tpl_vars['errormsg']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['pagenav']): ?>
    <div class="floatright txtright pad5">
    <?php echo $this->_tpl_vars['pagenav']; ?>

    </div>
    <br class="clear" />
<?php endif; ?>

<form name="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" id="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" action="<?php echo $this->_tpl_vars['pmform']['action']; ?>
" method="<?php echo $this->_tpl_vars['pmform']['method']; ?>
" <?php echo $this->_tpl_vars['pmform']['extra']; ?>
 >
    <table cellspacing='1' cellpadding='4' class='outer bnone width100'>
    
        <tr class='txtcenter alignmiddle'>
            <th><input name='allbox' id='allbox' onclick='xoopsCheckAll("<?php echo $this->_tpl_vars['pmform']['name']; ?>
", "allbox");' type='checkbox' value='Check All' /></th>
            <th><img class='bnone' src='<?php echo 'http://www.tripleawarclub.org/images/download.gif'; ?>' alt=''/></th>
            <th>&nbsp;</th>
            <?php if ($this->_tpl_vars['op'] == 'out'): ?>
                <th><?php echo @_PM_TO; ?>
</th>
            <?php else: ?>
                <th><?php echo @_PM_FROM; ?>
</th>
            <?php endif; ?>
            <th><?php echo @_PM_SUBJECT; ?>
</th>
            <th class='txtcenter'><?php echo @_PM_DATE; ?>
</th>
        </tr>
        
        <?php if ($this->_tpl_vars['total_messages'] == 0): ?>
            <tr>
                <td class='even txtcenter' colspan='6'><?php echo @_PM_YOUDONTHAVE; ?>
</td>
            </tr>
        <?php endif; ?>
        <?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
            <tr class='<?php echo smarty_function_cycle(array('values' => "odd, even"), $this);?>
 txtleft'>
                <td class='aligntop txtcenter width2'>
                    <input type='checkbox' id='msg_id_<?php echo $this->_tpl_vars['message']['msg_id']; ?>
' name='msg_id[]' value='<?php echo $this->_tpl_vars['message']['msg_id']; ?>
' />
                </td>
                <?php if ($this->_tpl_vars['message']['read_msg'] == 1): ?>
                    <td class='aligntop width5 txtcenter'><img src='<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/mail_read.png'; ?>' alt='<?php echo @_PM_READ; ?>
' title='<?php echo @_PM_READ; ?>
'/></td>
                <?php else: ?>
                    <td class='aligntop width5 txtcenter'><img src='<?php 
echo 'http://www.tripleawarclub.org/Frameworks/moduleclasses/icons/16/mail_notread.png'; ?>' alt='<?php echo @_PM_NOTREAD; ?>
' title='<?php echo @_PM_NOTREAD; ?>
'/></td>
                <?php endif; ?>
                <td class='aligntop width5 txtcenter'>
                    <?php if ($this->_tpl_vars['message']['msg_image'] != ""): ?>
                        <img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/subject/<?php echo $this->_tpl_vars['message']['msg_image']; ?>
' alt='' />
                    <?php endif; ?>
                </td>
                <td class='alignmiddle width10'>
                    <?php if ($this->_tpl_vars['message']['postername'] != ""): ?>
                        <a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['message']['posteruid']; ?>
' title=''><?php echo $this->_tpl_vars['message']['postername']; ?>
</a>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['anonymous']; ?>

                    <?php endif; ?>
                </td>
                <td class='alignmiddle'>
                    <a href='readpmsg.php?msg_id=<?php echo $this->_tpl_vars['message']['msg_id']; ?>
&amp;start=<?php echo $this->_tpl_vars['message']['msg_no']; ?>
&amp;total_messages=<?php echo $this->_tpl_vars['total_messages']; ?>
&amp;op=<?php echo $this->_tpl_vars['op']; ?>
' title=''>
                        <?php echo $this->_tpl_vars['message']['subject']; ?>

                    </a>
                </td>
                <td class='alignmiddle txtcenter width20'>
                    <?php echo $this->_tpl_vars['message']['msg_time']; ?>

                </td>
            </tr>
        <?php endforeach; endif; unset($_from); ?>
        <tr class='bg2 txtleft'>
            <td class='txtleft' colspan='6'>
                <?php echo $this->_tpl_vars['pmform']['elements']['send']['body']; ?>

                <?php if ($this->_tpl_vars['display']): ?>
                    &nbsp;<?php echo $this->_tpl_vars['pmform']['elements']['move_messages']['body']; ?>

                    &nbsp;<?php echo $this->_tpl_vars['pmform']['elements']['delete_messages']['body']; ?>

                    &nbsp;<?php echo $this->_tpl_vars['pmform']['elements']['empty_messages']['body']; ?>

                <?php endif; ?>
                <?php $_from = $this->_tpl_vars['pmform']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
                    <?php if ($this->_tpl_vars['element']['hidden'] == 1): ?>
                        <?php echo $this->_tpl_vars['element']['body']; ?>

                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
            </td>
        </tr>
    </table>
</form>
<?php if ($this->_tpl_vars['pagenav']): ?>
<div class="floatright txtright pad5">
<?php echo $this->_tpl_vars['pagenav']; ?>

</div>
<?php endif; ?>
<?php endif; ?>