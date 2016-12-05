<?php /* Smarty version 2.6.28, created on 2016-04-17 04:02:23
         compiled from db:system_smilies.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_smilies.html', 28, false),)), $this); ?>
<!--smilies-->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<?php if ($this->_tpl_vars['smilies_count'] == true): ?>
<div class="floatright">
    <div class="xo-buttons">
        <a class="ui-corner-all tooltip" href="admin.php?fct=smilies&amp;op=new_smilie" title="<?php echo @_AM_SYSTEM_SMILIES_ADD; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_SMILIES_ADD; ?>
" />
            <?php echo @_AM_SYSTEM_SMILIES_ADD; ?>

        </a>
    </div>
</div>
<table id="xo-smilies-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
	<tr>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_SMILIES_CODE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_SMILIES_SMILIE; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_SMILIES_DESCRIPTION; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_SMILIES_DISPLAY; ?>
</th>
		<th class="txtcenter width10"><?php echo @_AM_SYSTEM_SMILIES_ACTION; ?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['smilies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['smilies']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 alignmiddle">
		<td class="txtcenter width5"><?php echo $this->_tpl_vars['smilies']['code']; ?>
</td>
        <td class="txtcenter width5"><?php echo $this->_tpl_vars['smilies']['image']; ?>
</td>
		<td class="txtcenter width50"><?php echo $this->_tpl_vars['smilies']['emotion']; ?>
</td>
		<td class="xo-actions txtcenter width10">
            <img id="loading_sml<?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
" src="images/spinner.gif" style="display:none;" title="<?php echo @_AM_SYSTEM_LOADING; ?>
" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="cursorpointer tooltip" id="sml<?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
" onclick="system_setStatus( { fct: 'smilies', op: 'smilies_update_display', smilies_id: <?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
 }, 'sml<?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['smilies']['display']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['smilies']['display']): ?><?php echo @_AM_SYSTEM_SMILIES_OFF; ?>
<?php else: ?><?php echo @_AM_SYSTEM_SMILIES_ON; ?>
<?php endif; ?>" title="<?php if ($this->_tpl_vars['smilies']['display']): ?><?php echo @_AM_SYSTEM_SMILIES_OFF; ?>
<?php else: ?><?php echo @_AM_SYSTEM_SMILIES_ON; ?>
<?php endif; ?>" />
        </td>
		<td class="xo-actions txtcenter width10">
            <a class="tooltip" href="admin.php?fct=smilies&amp;op=edit_smilie&amp;smilies_id=<?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
" title="<?php echo @_AM_SYSTEM_SMILIES_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_SMILIES_EDIT; ?>
" />
            </a>
            <a class="tooltip" href="admin.php?fct=smilies&amp;op=smilies_delete&amp;smilies_id=<?php echo $this->_tpl_vars['smilies']['smilies_id']; ?>
" title="<?php echo @_AM_SYSTEM_SMILIES_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_SMILIES_DELETE; ?>
" />
            </a>
        </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<!-- Display smilies navigation -->
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div>
<div class="clear spacer"></div>
<?php endif; ?>
<?php endif; ?>
<!-- Display smilies form (add,edit) -->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>