<?php /* Smarty version 2.6.28, created on 2016-02-13 20:02:45
         compiled from db:system_modules.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_modules.html', 79, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<?php if ($this->_tpl_vars['install_mods']): ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<div class="floatleft">
    <img class="cursorpointer tooltip" onclick="system_moduleLargeView();" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/view_large.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_VIEWLARGE; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_VIEWLARGE; ?>
" />
    <img class="cursorpointer tooltip" onclick="system_moduleListView();" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/view_small.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_VIEWLINE; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_VIEWLINE; ?>
" />
</div>
<div class="floatright">
    <div class="xo-buttons">
        <a class="ui-corner-all tooltip" href="admin.php?fct=modulesadmin&amp;op=installlist" title="<?php echo @_AM_SYSTEM_MODULES_TOINSTALL; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/install.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_TOINSTALL; ?>
" />
            <?php echo @_AM_SYSTEM_MODULES_TOINSTALL; ?>
&nbsp;<span class="red">(<?php echo $this->_tpl_vars['toinstall_nb']; ?>
)</span>
        </a>
    </div>
</div>
<div class="clear spacer"></div>
<form action="admin.php" method="post" name="moduleadmin">
    <table id="xo-module-sort" class="outer" cellspacing="1">
        <thead>
            <tr class="txtcenter">
                <th><?php echo @_AM_SYSTEM_MODULES_MODULE; ?>
</th>
                <th><?php echo @_AM_SYSTEM_MODULES_VERSION; ?>
</th>
                <th><?php echo @_AM_SYSTEM_MODULES_LASTUP; ?>
</th>
                <th><?php echo @_AM_SYSTEM_MODULES_ACTIVE; ?>
</th>
                <th><?php echo @_AM_SYSTEM_MODULES_MENU; ?>
</th>
                <th><?php echo @_AM_SYSTEM_MODULES_ACTION; ?>
</th>
            </tr>
        </thead>
        <tbody>
            <?php $_from = $this->_tpl_vars['install_mods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
            <?php if ($this->_tpl_vars['row']['dirname'] == 'system'): ?>
            <tr class="txtcenter foot">
                <td>
                    <a class="xo-logonormal tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </a>
                    <div class="spacer xo-modsimages">
                        <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                            <img class="xo-mods hide" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                        </a>
                        <input type="text" name="newname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" maxlength="150" size="20" />
                        <input type="hidden" name="oldname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </div>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['row']['warning_update'] == 1): ?>
                        <strong class="red"><?php echo $this->_tpl_vars['row']['version']; ?>
</strong>
                    <?php else: ?>
                        <?php echo $this->_tpl_vars['row']['version']; ?>
 <?php echo $this->_tpl_vars['row']['module_status']; ?>

                    <?php endif; ?>
                </td>
                <td><?php echo $this->_tpl_vars['row']['last_update']; ?>
</td>
                <td class="xo-modsimages"></td>
                <td class="xo-modsimages"></td>
                <td class="xo-modsimages">
                    <?php if ($this->_tpl_vars['row']['isactive'] == 1): ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=update&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
">
                        <?php if ($this->_tpl_vars['row']['warning_update'] == 1): ?>
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/messagebox_warning.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
" />
                        <?php else: ?>
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/reload.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
" />
                        <?php endif; ?>
                    </a>
                    <?php endif; ?>
                    <img class="cursorpointer tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['row']['mid']; ?>
, true, true, 'slide', 'slide', 240, 450);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/info.png'; ?>" alt="<?php echo @_INFO; ?>
" title="<?php echo @_INFO; ?>
" />
                    <input type="hidden" name="module[]" value="<?php echo $this->_tpl_vars['row']['mid']; ?>
" />
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
            <tr class="head"><td colspan="6"></td></tr>
        </tbody>
        <tbody class="xo-module">
            <?php $_from = $this->_tpl_vars['install_mods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
            <?php if ($this->_tpl_vars['row']['dirname'] != 'system' && $this->_tpl_vars['row']['hasmain']): ?>
            <tr id="mod_<?php echo $this->_tpl_vars['row']['mid']; ?>
" class="<?php if ($this->_tpl_vars['row']['dirname'] == 'system'): ?>xo-system <?php endif; ?>txtcenter <?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
                <td>
                    <?php if ($this->_tpl_vars['row']['hasadmin'] == 1 && $this->_tpl_vars['row']['isactive'] == 1): ?>
                    <a class="xo-logonormal tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </a>
                    <?php else: ?>
                    <img class="xo-logonormal tooltip" src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    <?php endif; ?>
                    <div class="spacer xo-modsimages">
                        <?php if ($this->_tpl_vars['row']['hasadmin'] == 1 && $this->_tpl_vars['row']['isactive'] == 1): ?>
                        <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                            <img class="xo-mods hide" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                        </a>
                        <?php else: ?>
                        <img class="xo-mods hide tooltip" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                        <?php endif; ?>
                        <input type="text" name="newname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" maxlength="150" size="20" />
                        <input type="hidden" name="oldname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </div>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['row']['warning_update'] == 1): ?>
                        <a class="tooltip maxi" style="color:red;" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=update&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
"><?php echo $this->_tpl_vars['row']['version']; ?>
</a><br /><?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>

                    <?php else: ?>
                        <?php echo $this->_tpl_vars['row']['version']; ?>
 <?php echo $this->_tpl_vars['row']['module_status']; ?>

                    <?php endif; ?>
                </td>
                <td><?php echo $this->_tpl_vars['row']['last_update']; ?>
</td>
                <td class="xo-modsimages">
                    <img id="loading_active<?php echo $this->_tpl_vars['row']['mid']; ?>
" src="images/spinner.gif" style="display:none;" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" />
                    <img class="cursorpointer tooltip" id="active<?php echo $this->_tpl_vars['row']['mid']; ?>
" onclick="system_setStatus( { fct: 'modulesadmin', op: 'display', mid: <?php echo $this->_tpl_vars['row']['mid']; ?>
 }, 'active<?php echo $this->_tpl_vars['row']['mid']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php echo @_AM_SYSTEM_MODULES_DEACTIVATE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_ACTIVATE; ?>
<?php endif; ?>" title="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php echo @_AM_SYSTEM_MODULES_DEACTIVATE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_ACTIVATE; ?>
<?php endif; ?>" />
                </td>
                <td class="xo-modsimages">
                    <img id="loading_menu<?php echo $this->_tpl_vars['row']['mid']; ?>
" src="images/spinner.gif" style="display:none;" title="<?php echo @_AM_SYSTEM_LOADING; ?>
" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" />
                    <img class="cursorpointer tooltip" id="menu<?php echo $this->_tpl_vars['row']['mid']; ?>
" onclick="system_setStatus( { fct: 'modulesadmin', op: 'display_in_menu', mid: <?php echo $this->_tpl_vars['row']['mid']; ?>
 }, 'menu<?php echo $this->_tpl_vars['row']['mid']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['row']['weight'] != 0): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['row']['weight'] != 0): ?><?php echo @_AM_SYSTEM_MODULES_HIDE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_SHOW; ?>
<?php endif; ?>" title="<?php if ($this->_tpl_vars['row']['weight'] != 0): ?><?php echo @_AM_SYSTEM_MODULES_HIDE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_SHOW; ?>
<?php endif; ?>" />
                </td>
                <td class="xo-modsimages">
                    <?php if ($this->_tpl_vars['row']['isactive'] == 1): ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=update&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
">
                        <?php if ($this->_tpl_vars['row']['warning_update'] == 1): ?>
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/messagebox_warning.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
" />
                        <?php else: ?>
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/reload.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
" />
                        <?php endif; ?>
                    </a>
                    <?php endif; ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=uninstall&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UNINSTALL; ?>
">
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/uninstall.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UNINSTALL; ?>
" />
                    </a>
                    <img class="cursorpointer tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['row']['mid']; ?>
, true, true, 'slide', 'slide', 240, 450);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/info.png'; ?>" alt="<?php echo @_INFO; ?>
" title="<?php echo @_INFO; ?>
" />
                    <input type="hidden" name="module[]" value="<?php echo $this->_tpl_vars['row']['mid']; ?>
" />
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tbody>
            <tr class="head"><td colspan="6"></td></tr>
            <?php $_from = $this->_tpl_vars['install_mods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
            <?php if ($this->_tpl_vars['row']['dirname'] != 'system' && ! $this->_tpl_vars['row']['hasmain']): ?>
            <tr class="txtcenter foot">
                <td>
                    <a class="xo-logonormal tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                        <img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </a>
                    <div class="spacer xo-modsimages">
                        <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                            <img class="xo-mods hide" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                        </a>
                        <input type="text" name="newname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" maxlength="150" size="20" />
                        <input type="hidden" name="oldname[<?php echo $this->_tpl_vars['row']['mid']; ?>
]" value="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </div>
                </td>
                <td>
                    <?php if ($this->_tpl_vars['row']['warning_update'] == 1): ?>
                        <a class="tooltip maxi" style="color:red;" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=update&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
"><?php echo $this->_tpl_vars['row']['version']; ?>
</a><br /><?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>

                    <?php else: ?>
                        <?php echo $this->_tpl_vars['row']['version']; ?>
 <?php echo $this->_tpl_vars['row']['module_status']; ?>

                    <?php endif; ?>
                </td>
                <td><?php echo $this->_tpl_vars['row']['last_update']; ?>
</td>
                <td class="xo-modsimages"><img id="loading_mid<?php echo $this->_tpl_vars['row']['mid']; ?>
" src="images/spinner.gif" style="display:none;" title="<?php echo @_AM_SYSTEM_LOADING; ?>
" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="cursorpointer tooltip" id="mid<?php echo $this->_tpl_vars['row']['mid']; ?>
" onclick="system_setStatus( { fct: 'modulesadmin', op: 'display', mid: <?php echo $this->_tpl_vars['row']['mid']; ?>
 }, 'mid<?php echo $this->_tpl_vars['row']['mid']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php echo @_AM_SYSTEM_MODULES_DEACTIVATE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_ACTIVATE; ?>
<?php endif; ?>" title="<?php if ($this->_tpl_vars['row']['isactive']): ?><?php echo @_AM_SYSTEM_MODULES_DEACTIVATE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_MODULES_ACTIVATE; ?>
<?php endif; ?>" />
                </td>
                <td class="xo-modsimages"></td>
                <td class="xo-modsimages">
                    <?php if ($this->_tpl_vars['row']['isactive'] == 1): ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=update&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
">
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/reload.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UPDATE; ?>
" />
                    </a>
                    <?php endif; ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=uninstall&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_UNINSTALL; ?>
">
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/uninstall.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_UNINSTALL; ?>
" />
                    </a>
                    <img class="cursorpointer tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['row']['mid']; ?>
, true, true, 'slide', 'slide', 240, 450);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/info.png'; ?>" alt="<?php echo @_INFO; ?>
" title="<?php echo @_INFO; ?>
" />
                    <input type="hidden" name="module[]" value="<?php echo $this->_tpl_vars['row']['mid']; ?>
" />
                </td>
            </tr>
            <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </tbody>
        <tfoot>
            <tr class="txtcenter foot">
                <td colspan="6">
                    <input type="hidden" name="fct" value="modulesadmin" />
                    <input type="hidden" name="op" value="confirm" />
                    <input class="xo-formbuttons" type="submit" name="submit" value="<?php echo @_AM_SYSTEM_MODULES_SUBMIT; ?>
" />
                </td>
            </tr>
        </tfoot>
    </table>
    <?php echo $GLOBALS['xoopsSecurity']->getTokenHTML(); ?>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['toinstall_mods']): ?>
<div class="floatleft">
    <img class="cursorpointer tooltip" onclick="system_moduleLargeView();" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/view_large.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_VIEWLARGE; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_VIEWLARGE; ?>
" />
    <img class="cursorpointer tooltip" onclick="system_moduleListView();" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/view_small.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_VIEWLINE; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_VIEWLINE; ?>
" />
</div>
<div class="clear spacer"></div>
<table class="outer" cellspacing="1">
    <thead>
        <tr class="txtcenter">
            <th><?php echo @_AM_SYSTEM_MODULES_MODULE; ?>
</th>
            <th><?php echo @_AM_SYSTEM_MODULES_VERSION; ?>
</th>
            <th><?php echo @_AM_SYSTEM_MODULES_ACTION; ?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['toinstall_mods']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
        <tr class="txtcenter <?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
            <td>
                <img class="xo-logonormal" src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                <div class="spacer xo-modsimages">
                    <?php if ($this->_tpl_vars['row']['hasadmin'] == 1 && $this->_tpl_vars['row']['isactive'] == 1): ?>
                    <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['adminindex']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
">
                        <img class="xo-mods hide" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    </a>
                    <?php else: ?>
                    <img class="xo-mods hide tooltip" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/applications.png'; ?>" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
                    <?php endif; ?>
                    <span class="spacer bold"><?php echo $this->_tpl_vars['row']['name']; ?>
</span>
                </div>
            </td>
            <td><?php echo $this->_tpl_vars['row']['version']; ?>
 <?php echo $this->_tpl_vars['row']['module_status']; ?>
</td>
            <td class="xo-modsimages">
                <a class="tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/system/admin.php?fct=modulesadmin&amp;op=install&amp;module=<?php echo $this->_tpl_vars['row']['dirname']; ?>
" title="<?php echo @_AM_SYSTEM_MODULES_INSTALL; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/install.png'; ?>" alt="<?php echo @_AM_SYSTEM_MODULES_INSTALL; ?>
" />
                </a>
                <img class="cursorpointer tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['row']['mid']; ?>
, true, true, 'slide', 'slide', 240, 450);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/info.png'; ?>" alt="<?php echo @_INFO; ?>
" title="<?php echo @_INFO; ?>
" />
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>
<?php endif; ?>
<!--Pop-pup-->
<?php $_from = $this->_tpl_vars['mods_popup']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['row']):
?>
<div id="dialog<?php echo $this->_tpl_vars['row']['mid']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" style='display:none;'>
    <table>
        <tr>
            <td class="width10 aligntop">
                <img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['row']['dirname']; ?>
/<?php echo $this->_tpl_vars['row']['image']; ?>
" alt="<?php echo $this->_tpl_vars['row']['name']; ?>
" title="<?php echo $this->_tpl_vars['row']['name']; ?>
" />
            </td>
            <td>
                <ul class="xo-moduleinfos">
                    <li><span class="bold"><?php echo @_VERSION; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['row']['version']; ?>
 <?php echo $this->_tpl_vars['row']['module_status']; ?>
</li>
                    <li><span class="bold"><?php echo @_AUTHOR; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['row']['author']; ?>
</li>
                    <li><span class="bold"><?php echo @_CREDITS; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['row']['credits']; ?>
</li>
                    <li><span class="bold"><?php echo @_LICENCE; ?>
</span>&nbsp;:&nbsp;<?php echo $this->_tpl_vars['row']['license']; ?>
 </li>
                </ul>
            </td>
        </tr>
    </table>
    <p><?php echo $this->_tpl_vars['row']['description']; ?>
</p>
</div>
<?php endforeach; endif; unset($_from); ?>
<!--Pop-pup-->