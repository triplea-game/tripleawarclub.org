<?php /* Smarty version 2.6.28, created on 2016-02-16 04:11:01
         compiled from db:pm_pmlite.tpl */ ?>
<?php echo $this->_tpl_vars['pmform']['javascript']; ?>

<form name="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" id="<?php echo $this->_tpl_vars['pmform']['name']; ?>
" action="<?php echo $this->_tpl_vars['pmform']['action']; ?>
" method="<?php echo $this->_tpl_vars['pmform']['method']; ?>
" <?php echo $this->_tpl_vars['pmform']['extra']; ?>
 >
    <table class='outer txtcenter width100'>
        <tr>
            <td class='head width30 txtright'><?php echo @_PM_TO; ?>
</td>
            <td class='even txtleft'><?php if ($this->_tpl_vars['pmform']['elements']['to_userid']['hidden'] != 1): ?><?php echo $this->_tpl_vars['pmform']['elements']['to_userid']['body']; ?>
<?php endif; ?><?php echo $this->_tpl_vars['to_username']; ?>
</td>
        </tr>
        <tr>
            <td class='head width30 txtright'><?php echo @_PM_SUBJECTC; ?>
</td>
            <td class='even txtleft'><?php echo $this->_tpl_vars['pmform']['elements']['subject']['body']; ?>
</td>
        </tr>
        <tr>
            <td class='head width30 txtright'><?php echo @_PM_SUBJECT_ICONS; ?>
</td>
            <td class='even txtleft'>

            <?php if (count($this->_tpl_vars['radio_icons'])):
    foreach ($this->_tpl_vars['radio_icons'] as $this->_tpl_vars['icon']):
 ?>
                <input type='radio' name='icon' id='<?php echo $this->_tpl_vars['icon']; ?>
' value='<?php echo $this->_tpl_vars['icon']; ?>
'  /><label name='xolb_icon' for='<?php echo $this->_tpl_vars['icon']; ?>
'><img src='<?php echo 'http://www.tripleawarclub.org/'; ?>images/subject/<?php echo $this->_tpl_vars['icon']; ?>
' alt="" /></label>
            <?php endforeach; endif; unset($_from); ?>  </td>  
        </tr>   
        <tr class='aligntop'>
            <td class='head width30 txtright'><?php echo @_PM_MESSAGEC; ?>
</td>
            <td class='even txtleft'><?php echo $this->_tpl_vars['pmform']['elements']['message']['body']; ?>
</td>
        </tr>
        <tr class='aligntop'>
            <td class='head width30'><?php echo @_PM_SAVEINOUTBOX; ?>
</td>
            <td class='even'><?php echo $this->_tpl_vars['pmform']['elements']['savecopy']['body']; ?>
</td>
        </tr>                          
        <tr>
            <td class='head'>&nbsp;</td>
            <td class='even'>
                <?php $_from = $this->_tpl_vars['pmform']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
                    <?php if ($this->_tpl_vars['element']['hidden'] == 1): ?>
                        <?php echo $this->_tpl_vars['element']['body']; ?>

                    <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php echo $this->_tpl_vars['pmform']['elements']['submit']['body']; ?>
&nbsp;
                <?php echo $this->_tpl_vars['pmform']['elements']['reset']['body']; ?>
&nbsp;
                <?php echo $this->_tpl_vars['pmform']['elements']['cancel']['body']; ?>

            </td>
        </tr>
    </table>
</form>