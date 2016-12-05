<?php /* Smarty version 2.6.28, created on 2016-02-14 07:28:27
         compiled from db:system_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_index.html', 19, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<table cellspacing="1" class="outer">
    <thead>
        <tr>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_SECTION; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_DESC; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_USAGE; ?>
</th>
            <th class="txtcenter"><?php echo @_AM_SYSTEM_ACTIVE; ?>
</th>
        </tr>
    </thead>

    <tbody>
    <?php $_from = $this->_tpl_vars['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['menu']):
?>
    <?php if ($this->_tpl_vars['menu']['title']): ?>
    <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
">
        <td class="bold width15">
            <a class="tooltip" href="admin.php?fct=<?php echo $this->_tpl_vars['menu']['file']; ?>
" title="<?php echo @_AM_SYSTEM_GO; ?>
: <?php echo $this->_tpl_vars['menu']['title']; ?>
">
                <img class="xo-imgmini" src='<?php echo $this->_tpl_vars['theme_icons']; ?>
/<?php echo $this->_tpl_vars['menu']['icon']; ?>
' alt="<?php echo $this->_tpl_vars['menu']['title']; ?>
" />
                <?php echo $this->_tpl_vars['menu']['title']; ?>

            </a>
        </td>
        <td class=""><?php echo $this->_tpl_vars['menu']['desc']; ?>
</td>
        <td class="width15"><?php echo $this->_tpl_vars['menu']['infos']; ?>
</td>
        <td class="xo-actions width2">
            <?php if ($this->_tpl_vars['menu']['used']): ?>
                <img id="loading_<?php echo $this->_tpl_vars['menu']['file']; ?>
" src="images/spinner.gif" style="display:none;" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" />
                <img class="tooltip" id="<?php echo $this->_tpl_vars['menu']['file']; ?>
" onclick="system_setStatus( { op: 'system_activate', type: '<?php echo $this->_tpl_vars['menu']['file']; ?>
' }, '<?php echo $this->_tpl_vars['menu']['file']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['menu']['status']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php echo @_AM_SYSTEM_STATUS; ?>
" title="<?php echo @_AM_SYSTEM_STATUS; ?>
" />
            <?php endif; ?>
        </td>
    </tr>
    <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>