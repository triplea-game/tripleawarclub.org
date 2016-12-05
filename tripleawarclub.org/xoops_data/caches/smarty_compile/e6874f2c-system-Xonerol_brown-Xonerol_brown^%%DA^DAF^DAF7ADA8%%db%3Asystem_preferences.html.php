<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:56
         compiled from db:system_preferences.html */ ?>
<?php if ($this->_tpl_vars['breadcrumb']): ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<?php endif; ?>
<!--Preferences-->
<?php if ($this->_tpl_vars['menu']): ?>
<div class="xo-catsetting">
	<?php $_from = $this->_tpl_vars['preferences']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['preferences']):
?>
	<a class="tooltip" href="admin.php?fct=preferences&amp;op=show&amp;confcat_id=<?php echo $this->_tpl_vars['preferences']['id']; ?>
" title="<?php echo $this->_tpl_vars['preferences']['name']; ?>
">
        <img src="<?php echo $this->_tpl_vars['preferences']['image']; ?>
" alt="<?php echo $this->_tpl_vars['preferences']['name']; ?>
" />
        <span><?php echo $this->_tpl_vars['preferences']['name']; ?>
</span>
    </a>	
	<?php endforeach; endif; unset($_from); ?>
	<a class="tooltip" href="admin.php?fct=preferences&amp;op=showmod&amp;mod=1" title="<?php echo @_AM_SYSTEM_PREFERENCES_SETTINGS; ?>
">
        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/xoops/system_mods.png'; ?>" alt="<?php echo @_AM_SYSTEM_PREFERENCES_SETTINGS; ?>
" />
        <span><?php echo @_AM_SYSTEM_PREFERENCES_SETTINGS; ?>
</span>
    </a>	
</div>
<?php endif; ?>
<div class="clear">&nbsp;</div>
<br />

