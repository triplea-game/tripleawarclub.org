<?php /* Smarty version 2.6.28, created on 2016-02-14 10:12:33
         compiled from db:system_banners.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_banners.html', 40, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<!--Banner-->
<table class='width100 bnone' cellspacing='1'>
	<tr>
        <?php if ($this->_tpl_vars['banner_count'] == true): ?>
		<td>
			<h4><?php echo @_AM_SYSTEM_BANNERS_CURACTBNR; ?>
</h4>
		</td>
        <?php endif; ?>
		<td>
			<div class="floatright">
                <div class="xo-buttons">
    				<a class="ui-corner-all tooltip" href="admin.php?fct=banners&amp;op=new_banner" title="<?php echo @_AM_SYSTEM_BANNERS_ADDNWBNR; ?>
">
    				    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/attach.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_ADDNWBNR; ?>
" />
    					<?php echo @_AM_SYSTEM_BANNERS_ADDNWBNR; ?>

    				</a>
    				<a class="ui-corner-all tooltip" href="admin.php?fct=banners&amp;op=new_client" title="<?php echo @_AM_SYSTEM_BANNERS_ADDCLI; ?>
">
    				    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/user_add.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_ADDCLI; ?>
" />
    					<?php echo @_AM_SYSTEM_BANNERS_ADDCLI; ?>

    				</a>
				</div>
			</div>
		</td>
	</tr>
</table>
<?php if ($this->_tpl_vars['banner_count'] == true): ?>
<table id="xo-bannerslist-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
	<tr>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_IMPRESION; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_IMPLEFT; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CLICKS; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_NCLICKS; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CLINAME; ?>
</th>
		<th class="txtcenter width10"><?php echo @_AM_SYSTEM_BANNERS_FUNCTION; ?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['banner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
">
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner']['impmade']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner']['left']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner']['clicks']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner']['percent']; ?>
%</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner']['name']; ?>
</td>
		<td class="xo-actions txtcenter">
            <img class="tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['banner']['bid']; ?>
, true, true, 'slide', 'slide', 200, 520);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_VIEW; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_VIEW; ?>
" />
            <a class="tooltip" href="admin.php?fct=banners&amp;op=banner_edit&amp;bid=<?php echo $this->_tpl_vars['banner']['bid']; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_EDIT; ?>
" />
            </a>
            <a class="tooltip" href="admin.php?fct=banners&amp;op=banner_delete&amp;bid=<?php echo $this->_tpl_vars['banner']['bid']; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
" />
            </a>
        </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu_banner']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu_banner']; ?>
</div><div class="clear spacer"></div>
<?php endif; ?>
<!--Pop-pup-->
<?php $_from = $this->_tpl_vars['popup_banner']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner']):
?>
<div id="dialog<?php echo $this->_tpl_vars['banner']['bid']; ?>
" title="<?php echo $this->_tpl_vars['banner']['name']; ?>
" style='display:none;'>
	<?php echo $this->_tpl_vars['banner']['imageurl']; ?>

</div>
<?php endforeach; endif; unset($_from); ?>
<!--Pop-pup-->
<?php endif; ?>

<!--Banner Finish-->
<?php if ($this->_tpl_vars['banner_finish_count'] == true): ?>
<h4><?php echo @_AM_SYSTEM_BANNERS_FINISHBNR; ?>
</h4>
<table id="xo-bannersfinish-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
	<tr>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_IMPD; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CLICKS; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_NCLICKS; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_STARTDATE; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_ENDDATE; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CLINAME; ?>
</th>
		<th class="txtcenter width10"><?php echo @_AM_SYSTEM_BANNERS_FUNCTION; ?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['banner_finish']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner_finish']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
">
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['impressions']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['clicks']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['percent']; ?>
%</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['datestart']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['dateend']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_finish']['name']; ?>
</td>
		<td class="xo-actions txtcenter">
            <a class="tooltip" href="admin.php?fct=banners&amp;op=banner_finish_delete&amp;bid=<?php echo $this->_tpl_vars['banner_finish']['bid']; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
" />
            </a>
        </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu_bannerF']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu_bannerF']; ?>
</div>
<div class="clear spacer"></div>
<?php endif; ?>

<?php endif; ?>
<!--Banner Client-->
<?php if ($this->_tpl_vars['banner_client_count'] == true): ?>
<h4><?php echo @_AM_SYSTEM_BANNERS_ADVCLI; ?>
</h4>
<table id="xo-bannersclient-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
	<tr>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CLINAME; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_ACTIVEBNR; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CONTNAME; ?>
</th>
		<th class="txtcenter"><?php echo @_AM_SYSTEM_BANNERS_CONTMAIL; ?>
</th>
		<th class="txtcenter width10"><?php echo @_AM_SYSTEM_BANNERS_FUNCTION; ?>
</th>
	</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['banner_client']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['banner_client']):
?>
	<tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
">
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_client']['name']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_client']['banner_active']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_client']['contact']; ?>
</td>
		<td class="txtcenter"><?php echo $this->_tpl_vars['banner_client']['email']; ?>
</td>
		<td class="xo-actions txtcenter">
            <a class="tooltip" href="admin.php?fct=banners&amp;op=banner_client_edit&amp;cid=<?php echo $this->_tpl_vars['banner_client']['cid']; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_EDIT; ?>
" />
            </a>
            <a class="tooltip" href="admin.php?fct=banners&amp;op=banner_client_delete&amp;cid=<?php echo $this->_tpl_vars['banner_client']['cid']; ?>
" title="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_BANNERS_DELETE; ?>
" />
            </a>
        </td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu_client']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu_client']; ?>
</div>
<div class="clear spacer"></div>
<?php endif; ?>
<?php endif; ?>
<br />
<!-- Display Avatar form (add,edit) -->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>