<?php /* Smarty version 2.6.28, created on 2016-02-13 20:03:20
         compiled from db:system_blocks.html */ ?>
<!-- Breadcrumb Header -->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';
</script>
<?php if ($this->_tpl_vars['filterform']): ?>
<div class="floatright">
    <div class="xo-buttons">
        <button id="xo-add-btn" class="ui-corner-all" onclick="self.location.href='admin.php?fct=blocksadmin&amp;op=add';">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_BLOCKS_ADD; ?>
" />
            <?php echo @_AM_SYSTEM_BLOCKS_ADD; ?>

        </button>
    </div>
</div>
<div class="clear"></div>
<div id="xo-block-dragndrop">
    <table class="outer">
        <tr>
            <th>
                <form name="<?php echo $this->_tpl_vars['filterform']['name']; ?>
" id="<?php echo $this->_tpl_vars['filterform']['name']; ?>
" action="<?php echo $this->_tpl_vars['filterform']['action']; ?>
" method="<?php echo $this->_tpl_vars['filterform']['method']; ?>
" <?php echo $this->_tpl_vars['filterform']['extra']; ?>
 >
                    <div class="xo-blocksfilter">
                    <?php $_from = $this->_tpl_vars['filterform']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
                    <?php if ($this->_tpl_vars['element']['hidden'] != true): ?>
                    
                    <div class="xo-caption"><?php echo $this->_tpl_vars['element']['caption']; ?>
</div>
                    <div class="xo-element"><?php echo $this->_tpl_vars['element']['body']; ?>
</div>
                    <?php else: ?>
                    <?php echo $this->_tpl_vars['element']['body']; ?>

                    <?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?>
                    </div>
                </form>
            </th>
        </tr>
        <tr>
            <td>
                <table id="xo-block-managment">
                    <tr>
                        <td side="0" class="xo-blocksection" rowspan="3" id="xo-leftcolumn">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDELEFT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 0)));
 ?>
                        </td>
                        <td side="3" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDETOPLEFT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 3)));
 ?>
                        </td>
                        <td side="5" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDETOPCENTER; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 5)));
 ?>
                        </td>
                        <td side="4" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDETOPRIGHT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 4)));
 ?>
                        </td>
                        <td side="1" class="xo-blocksection" rowspan="3" id="xo-rightcolumn">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDERIGHT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 1)));
 ?>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <td colspan="3" class="xo-blockContent width5">&nbsp;</td>
                    </tr>
                    <tr>
                        <td side="7" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDEBOTTOMLEFT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 7)));
 ?>
                        </td>
                        <td side="9" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDEBOTTOMCENTER; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 9)));
 ?>
                        </td>
                        <td side="8" class="xo-blocksection">
                            <div class="xo-title"><?php echo @_AM_SYSTEM_BLOCKS_SIDEBOTTOMRIGHT; ?>
</div>
                            <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_blocks_item.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['blocks'],'side' => 8)));
 ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
<?php endif; ?>
<div id="xo-block-add" <?php if ($this->_tpl_vars['filterform']): ?>class="hide"<?php endif; ?>>
    <?php if (! $this->_tpl_vars['filterform']): ?><br /><?php endif; ?>
    <?php echo $this->_tpl_vars['blockform']; ?>

</div>
<!-- Preview block -->
<div id="xo-preview-block" class="hide"></div>