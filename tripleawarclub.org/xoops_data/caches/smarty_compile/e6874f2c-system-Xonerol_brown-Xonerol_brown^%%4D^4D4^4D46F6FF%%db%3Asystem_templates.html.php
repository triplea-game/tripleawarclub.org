<?php /* Smarty version 2.6.28, created on 2016-02-14 17:04:55
         compiled from db:system_templates.html */ ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>

<?php if ($this->_tpl_vars['index']): ?>    
<br class="clear" />
<div class="spacer">
    <table class="outer ui-corner-all" cellspacing="1">
        <tr>
            <th><?php echo @_AM_SYSTEM_TEMPLATES_YOUR_THEMES; ?>
</th>
            <th>&nbsp;</th>
        </tr>
		<tr>
			<td class="aligntop width10"><div id="fileTree" class="display_folder"></div></td>
			<td class="aligntop">
				<div id="display_form"><?php echo $this->_tpl_vars['form']; ?>
</div>
				<div id="display_contenu"></div>
				<div id='display_message' class="txtcenter" style="display:none;"></div>
				<div id='loading' class="txtcenter" style="display:none;"><br /><br /><img src="images/loading.gif" title="Loading" alt="Loading" /></div>
			</td>
		</tr>
    </table>

<br class="clear" />
</div>
<?php else: ?>
    <br />
    <?php if ($this->_tpl_vars['verif']): ?>
        <?php echo $this->_tpl_vars['infos']; ?>

    <?php else: ?>
        <div class="txtcenter"><?php echo @_AM_SYSTEM_TEMPLATES_NOT_CREATED; ?>
</div>
    <?php endif; ?>
<?php endif; ?>