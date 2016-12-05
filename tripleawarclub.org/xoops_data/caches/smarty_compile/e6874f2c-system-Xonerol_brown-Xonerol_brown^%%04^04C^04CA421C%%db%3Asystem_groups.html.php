<?php /* Smarty version 2.6.28, created on 2016-04-02 14:34:46
         compiled from db:system_groups.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_groups.html', 24, false),)), $this); ?>
<!--groups-->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<?php if ($this->_tpl_vars['groups_count'] == true): ?>
<div class="floatright">
    <div class="xo-buttons">
        <button class="ui-corner-all" onclick="self.location.href='admin.php?fct=groups&amp;op=groups_add'">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_GROUPS_ADD; ?>
" />
            <?php echo @_AM_SYSTEM_GROUPS_ADD; ?>

        </button>
    </div>
</div>
<table id="xo-group-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
	<tr>
		<th class="txtcenter width5"><?php echo @_AM_SYSTEM_GROUPS_ID; ?>
</th>
        <th class="txtcenter width20"><?php echo @_AM_SYSTEM_GROUPS_NAME; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_GROUPS_DESCRIPTION; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_GROUPS_NB_USERS_BY_GROUPS; ?>
</th>
		<th class="txtcenter width10"><?php echo @_AM_SYSTEM_GROUPS_ACTION; ?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['groups']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
 alignmiddle">
		<td class="txtcenter"><?php echo $this->_tpl_vars['groups']['groups_id']; ?>
</td>
        <td class="txtleft">
            <a class="tooltip" href="admin.php?fct=groups&amp;op=groups_edit&amp;groups_id=<?php echo $this->_tpl_vars['groups']['groups_id']; ?>
" title="<?php echo @_AM_SYSTEM_GROUPS_EDIT; ?>
">
                <?php echo $this->_tpl_vars['groups']['name']; ?>

            </a>
        </td>
		<td class="txtleft"><?php echo $this->_tpl_vars['groups']['description']; ?>
</td>
		<td class="txtcenter width25">
            <a href="./admin.php?fct=users&amp;selgroups=<?php echo $this->_tpl_vars['groups']['groups_id']; ?>
"><?php echo $this->_tpl_vars['groups']['nb_users_by_groups']; ?>
</a>
        </td>
		<td class="xo-actions txtcenter">
			<a class="tooltip" href="admin.php?fct=groups&amp;op=groups_edit&amp;groups_id=<?php echo $this->_tpl_vars['groups']['groups_id']; ?>
" title="<?php echo @_AM_SYSTEM_GROUPS_EDIT; ?>
">
				<img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_GROUPS_EDIT; ?>
" />
			</a>
			<?php if ($this->_tpl_vars['groups']['delete']): ?>
			<a class="tooltip" href="admin.php?fct=groups&amp;op=groups_delete&amp;groups_id=<?php echo $this->_tpl_vars['groups']['groups_id']; ?>
" title="<?php echo @_AM_SYSTEM_GROUPS_DELETE; ?>
">
				<img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_GROUPS_DELETE; ?>
" />
			</a>
			<?php endif; ?>
        </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<!-- Display groups navigation -->
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div><div class="clear spacer"></div>
<?php endif; ?>
<?php endif; ?>
<!-- Display groups form (add,edit) -->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>