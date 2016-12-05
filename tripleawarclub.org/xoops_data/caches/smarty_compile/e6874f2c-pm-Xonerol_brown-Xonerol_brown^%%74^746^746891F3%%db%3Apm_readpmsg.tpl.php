<?php /* Smarty version 2.6.28, created on 2016-02-15 01:50:59
         compiled from db:pm_readpmsg.tpl */ ?>
<div>
    <h4><?php echo @_PM_PRIVATEMESSAGE; ?>
</h4>
</div><br />
<?php if ($this->_tpl_vars['op'] == out): ?>
    <a href='viewpmsg.php?op=out' title='<?php echo @_PM_OUTBOX; ?>
'><?php echo @_PM_OUTBOX; ?>
</a>&nbsp;
<?php elseif ($this->_tpl_vars['op'] == 'save'): ?>
    <a href='viewpmsg.php?op=save' title='<?php echo @_PM_SAVEBOX; ?>
'><?php echo @_PM_SAVEBOX; ?>
</a>&nbsp;
<?php else: ?>
    <a href='viewpmsg.php?op=in' title='<?php echo @_PM_INBOX; ?>
'><?php echo @_PM_INBOX; ?>
</a>&nbsp;
<?php endif; ?>

<?php if ($this->_tpl_vars['message']): ?>
    <span class='bold'>&raquo;&raquo;</span>&nbsp;<?php echo $this->_tpl_vars['message']['subject']; ?>
<br />
    <form name="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" id="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" action="<?php echo $this->_tpl_vars['pmform']['action']; ?>
" method="<?php echo $this->_tpl_vars['pmform']['method']; ?>
" <?php echo $this->_tpl_vars['pmform']['extra']; ?>
 >
        <table cellpadding='4' cellspacing='1' class='outer bnone width100'>
            <tr>
                <th colspan='2'><?php if ($this->_tpl_vars['op'] == out): ?><?php echo @_PM_TO; ?>
<?php else: ?><?php echo @_PM_FROM; ?>
<?php endif; ?></th>
            </tr>
            <tr class='even'>
                <td class='aligntop'>
                    <?php if (( $this->_tpl_vars['poster'] != false )): ?>
                        <a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['poster']->getVar('uid'); ?>
'><?php echo $this->_tpl_vars['poster']->getVar('uname'); ?>
</a><br />
                        <?php if (( $this->_tpl_vars['poster']->getVar('user_avatar') != "" )): ?>
                            <img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/uploads/<?php echo $this->_tpl_vars['poster']->getVar('user_avatar'); ?>
' alt='' /><br />
                        <?php endif; ?>
                        <?php if (( $this->_tpl_vars['poster']->getVar('user_from') != "" )): ?>
                            <?php echo @_PM_FROMC; ?>
<?php echo $this->_tpl_vars['poster']->getVar('user_from'); ?>
<br /><br />
                        <?php endif; ?>
                        <?php if (( $this->_tpl_vars['poster']->isOnline() )): ?>
                            <span class='bold red'><?php echo @_PM_ONLINE; ?>
</span><br /><br />
                        <?php endif; ?>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['anonymous']; ?>

                    <?php endif; ?>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['message']['msg_image'] != ""): ?>
                        <img src='<?php echo $this->_tpl_vars['xoops_url']; ?>
/images/subject/<?php echo $this->_tpl_vars['message']['msg_image']; ?>
' alt='' />
                    <?php endif; ?>                    
                    <?php echo @_PM_SENTC; ?>
<?php echo $this->_tpl_vars['message']['msg_time']; ?>
<br />
                    <hr />
                    <strong><?php echo $this->_tpl_vars['message']['subject']; ?>
</strong><br />
                    <br />
                    <?php echo $this->_tpl_vars['message']['msg_text']; ?>
<br />
                    <br />
                </td>
            </tr>
            <tr class='foot'>
                <td class='width20 txtleft' colspan='2'>
                    <?php $_from = $this->_tpl_vars['pmform']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
                        <?php echo $this->_tpl_vars['element']['body']; ?>

                    <?php endforeach; endif; unset($_from); ?>
                </td>
            </tr>
            <tr>
                <td class='txtright' colspan='2'>
                    <?php if (( $this->_tpl_vars['previous'] >= 0 )): ?>
                        <a href='readpmsg.php?start=<?php echo $this->_tpl_vars['previous']; ?>
&amp;total_messages=<?php echo $this->_tpl_vars['total_messages']; ?>
&amp;op=<?php echo $this->_tpl_vars['op']; ?>
' title='<?php echo @_PM_PREVIOUS; ?>
'>
                            <?php echo @_PM_PREVIOUS; ?>

                        </a>&nbsp|&nbsp;
                    <?php else: ?>
                        <?php echo @_PM_PREVIOUS; ?>
&nbsp;|&nbsp;
                    <?php endif; ?>
                    <?php if (( $this->_tpl_vars['next'] < $this->_tpl_vars['total_messages'] )): ?>
                        <a href='readpmsg.php?start=<?php echo $this->_tpl_vars['next']; ?>
&amp;total_messages=<?php echo $this->_tpl_vars['total_messages']; ?>
&amp;op=<?php echo $this->_tpl_vars['op']; ?>
' title='<?php echo @_PM_NEXT; ?>
'>
                            <?php echo @_PM_NEXT; ?>

                        </a>
                    <?php else: ?>
                        <?php echo @_PM_NEXT; ?>

                    <?php endif; ?>
                </td>
            </tr>
        </table>
    </form>
<?php else: ?>
    <br /><br /><?php echo @_PM_YOUDONTHAVE; ?>

<?php endif; ?>