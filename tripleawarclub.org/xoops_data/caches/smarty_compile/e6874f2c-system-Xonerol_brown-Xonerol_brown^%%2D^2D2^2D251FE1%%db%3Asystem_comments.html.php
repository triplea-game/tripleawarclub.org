<?php /* Smarty version 2.6.28, created on 2016-02-14 10:15:15
         compiled from db:system_comments.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_comments.html', 33, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<!--Comments-->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php else: ?>
<div class="floatleft"><?php echo $this->_tpl_vars['form_sort']; ?>
</div>
<div class="floatright">
    <div class="xo-buttons">
        <button class="ui-corner-all" onclick="self.location.href='admin.php?fct=comments&amp;op=comments_form_purge'">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/clear.png'; ?>" alt="<?php echo @_AM_SYSTEM_COMMENTS_FORM_PURGE; ?>
" />
            <?php echo @_AM_SYSTEM_COMMENTS_FORM_PURGE; ?>

        </button>
    </div>
</div>
<div class="clear"></div>
<table id="xo-comment-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
    <tr>
        <th class="txtcenter width5"><input name='allbox' id='allbox' onclick='xoopsCheckAll("commentslist", "allbox");'  type='checkbox' value='Check All' /></th>
        <th class="txtcenter width5"></th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_COMMENTS_TITLE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_COMMENTS_POSTED; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_COMMENTS_IP; ?>
</th>
        <th class="txtcenter"><?php echo @_DATE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_COMMENTS_MODULE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_COMMENTS_STATUS; ?>
</th>
        <th class="txtcenter width10"><?php echo @_AM_SYSTEM_COMMENTS_ACTION; ?>
</th>
    </tr>
    </thead>
    <form name='commentslist' id='commentslist' action='<?php echo $this->_tpl_vars['php_selft']; ?>
' method="post">
    <tbody>
    <?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comments']):
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 alignmiddle">
        <td class="txtcenter"><input type='checkbox' name='commentslist_id[]' id='commentslist_id[]' value='<?php echo $this->_tpl_vars['comments']['comments_id']; ?>
'/></td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_icon']; ?>
</td>
        <td><?php echo $this->_tpl_vars['comments']['comments_title']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_poster']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_ip']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_date']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_modid']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['comments']['comments_status']; ?>
</td>
        <td class="xo-actions txtcenter">
            <img class="cursorpointer" onclick="display_dialog('<?php echo $this->_tpl_vars['comments']['comments_id']; ?>
', true, true, 'slide', 'slide', 300, 500);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_COMMENTS_VIEW; ?>
" title="<?php echo @_AM_SYSTEM_COMMENTS_VIEW; ?>
" />
            <a href="admin/comments/comment_edit.php?com_id=<?php echo $this->_tpl_vars['comments']['comments_id']; ?>
" title="<?php echo @_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
">
            </a>
            <a href="admin/comments/comment_delete.php?com_id=<?php echo $this->_tpl_vars['comments']['comments_id']; ?>
" title="<?php echo @_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
">
            </a>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    </tbody>
    <tr>
        <td><input type='submit' name='<?php echo @_DELETE; ?>
' value='<?php echo @_DELETE; ?>
' /></td>
        <td colspan="7">&nbsp;</td>
    </tr>
    </form>
</table>
<?php $_from = $this->_tpl_vars['comments_popup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['comments']):
?>
<!--Pop-pup-->
<div id='dialog<?php echo $this->_tpl_vars['comments']['comments_id']; ?>
' title='<?php echo $this->_tpl_vars['comments']['comments_title']; ?>
' style='display:none;'>
    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/comment.png'; ?>" alt="comments" title="comments" class="xo-commentsimg" />
    <p><?php echo $this->_tpl_vars['comments']['comments_text']; ?>
</p>
</div>
<?php endforeach; endif; unset($_from); ?>
<!--Pop-pup-->
<div class="txtright"><?php echo $this->_tpl_vars['nav']; ?>
</div>
<?php endif; ?>