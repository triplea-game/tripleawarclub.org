<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:31
         compiled from db:system_maintenance.html */ ?>
<!--maintenance-->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<!-- Display mailusers form  -->
<br />
<?php if ($this->_tpl_vars['form_maintenance']): ?>
    <div class="spacer"><?php echo $this->_tpl_vars['form_maintenance']; ?>
</div><br />
	<div class="spacer"><?php echo $this->_tpl_vars['form_dump']; ?>
</div>
<?php elseif ($this->_tpl_vars['maintenance']): ?>
	<?php if ($this->_tpl_vars['verif_cache'] || $this->_tpl_vars['verif_session'] || $this->_tpl_vars['verif_avatar']): ?>
		<table class="outer ui-corner-all" cellspacing="1">
			<tr>
				<th><?php echo @_AM_SYSTEM_MAINTENANCE; ?>
</th>
				<th><?php echo @_AM_SYSTEM_MAINTENANCE_RESULT; ?>
</th>
			</tr>
			<?php if ($this->_tpl_vars['verif_cache']): ?>
				<tr>
					<td class="aligntop txtcenter"><?php echo @_AM_SYSTEM_MAINTENANCE_RESULT_CACHE; ?>
</td>
					<td class="aligntop txtcenter"><?php if ($this->_tpl_vars['result_cache']): ?><img width="16" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>" /><?php else: ?><img style="width:16px;" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>" alt="Cancel"/><?php endif; ?></td>
				</tr>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['verif_session']): ?>
				<tr>
					<td class="aligntop" align="center"><?php echo @_AM_SYSTEM_MAINTENANCE_RESULT_SESSION; ?>
</td>
					<td class="aligntop" align="center"><?php if ($this->_tpl_vars['result_session']): ?><img style="width:16px;" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>" alt="Success"/><?php else: ?><img style="width:16px;" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>" alt="Cancel"/><?php endif; ?></td>
				</tr>
			<?php endif; ?>

			<?php if ($this->_tpl_vars['verif_avatar']): ?>
				<tr>
					<td class="aligntop" align="center"><?php echo @_AM_SYSTEM_MAINTENANCE_RESULT_AVATAR; ?>
</td>
					<td class="aligntop" align="center"><?php if ($this->_tpl_vars['result_avatar']): ?><img style="width:16px;" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>" alt="Success"/><?php else: ?><img style="width:16px;" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>" alt="Cancel"/><?php endif; ?></td>
				</tr>
			<?php endif; ?>
		</table><br />
	<?php endif; ?>
	<?php if ($this->_tpl_vars['verif_maintenance']): ?>
		<?php echo $this->_tpl_vars['result_maintenance']; ?>

	<?php endif; ?>
<?php else: ?>
	<?php echo $this->_tpl_vars['result_dump']; ?>

<?php endif; ?>