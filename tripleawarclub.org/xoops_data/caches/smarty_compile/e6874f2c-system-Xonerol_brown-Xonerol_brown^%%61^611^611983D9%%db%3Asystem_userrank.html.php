<?php /* Smarty version 2.6.28, created on 2016-04-02 14:34:36
         compiled from db:system_userrank.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_userrank.html', 29, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<!--User rank-->
<?php if ($this->_tpl_vars['userrank_count'] == true): ?>
<div class="floatright">
    <div class="xo-buttons">
        <a class="ui-corner-all tooltip" href="admin.php?fct=userrank&amp;op=userrank_new" title="<?php echo @_AM_SYSTEM_USERRANK_ADD; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERRANK_ADD; ?>
" />
            <?php echo @_AM_SYSTEM_USERRANK_ADD; ?>

        </a>
    </div>
</div>
<table id="xo-rank-sorter" cellspacing="1" class="outer tablesorter">
    <thead>
    <tr>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_USERRANK_IMAGE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_USERRANK_TITLE; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_USERRANK_MINPOST; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_USERRANK_MAXPOST; ?>
</th>
        <th class="txtcenter"><?php echo @_AM_SYSTEM_USERRANK_SPECIAL; ?>
</th>
        <th class="txtcenter width10"><?php echo @_AM_SYSTEM_USERRANK_ACTION; ?>
</th>
    </tr>
    </thead>
    <tbody>
    <?php $_from = $this->_tpl_vars['userrank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['userrank']):
?>
    <tr class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
 alignmiddle">
        <td class="txtcenter"><?php echo $this->_tpl_vars['userrank']['rank_image']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['userrank']['rank_title']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['userrank']['rank_min']; ?>
</td>
        <td class="txtcenter"><?php echo $this->_tpl_vars['userrank']['rank_max']; ?>
</td>
        <td class="xo-actions txtcenter"><img id="loading_sml<?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
" src="images/spinner.gif" style="display:none;" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="cursorpointer tooltip" id="sml<?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
" onclick="system_setStatus( { fct: 'userrank', op: 'userrank_update_special', rank_id: <?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
 }, 'sml<?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['userrank']['rank_special']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['userrank']['rank_special']): ?><?php echo @_AM_SYSTEM_USERRANK_OFF; ?>
<?php else: ?><?php echo @_AM_SYSTEM_USERRANK_ON; ?>
<?php endif; ?>" title="<?php if ($this->_tpl_vars['userrank']['rank_special']): ?><?php echo @_AM_SYSTEM_USERRANK_OFF; ?>
<?php else: ?><?php echo @_AM_SYSTEM_USERRANK_ON; ?>
<?php endif; ?>" />
        </td>
        <td class="xo-actions txtcenter">
            <a class="tooltip" href="admin.php?fct=userrank&amp;op=userrank_edit&amp;rank_id=<?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
" title="<?php echo @_AM_SYSTEM_USERRANK_EDIT; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERRANK_EDIT; ?>
" />
            </a>
            <a class="tooltip" href="admin.php?fct=userrank&amp;op=userrank_delete&amp;rank_id=<?php echo $this->_tpl_vars['userrank']['rank_id']; ?>
" title="<?php echo @_AM_SYSTEM_USERRANK_DELETE; ?>
">
                <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_AM_SYSTEM_USERRANK_DELETE; ?>
" />
            </a>
        </td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    </tbody>
</table>
<!-- Display rank navigation -->
<div class="clear spacer"></div>
<?php if ($this->_tpl_vars['nav_menu']): ?>
<div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div>
<div class="clear spacer"></div>
<?php endif; ?>
<?php endif; ?>
<!--Display rank form (add,edit)-->
<?php if ($this->_tpl_vars['form']): ?>
<div class="spacer"><?php echo $this->_tpl_vars['form']; ?>
</div>
<?php endif; ?>
