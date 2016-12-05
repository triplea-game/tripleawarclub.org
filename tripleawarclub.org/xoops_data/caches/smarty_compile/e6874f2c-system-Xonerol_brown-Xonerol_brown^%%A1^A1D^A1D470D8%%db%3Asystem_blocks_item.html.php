<?php /* Smarty version 2.6.28, created on 2016-02-13 20:03:20
         compiled from db:system_blocks_item.html */ ?>

<?php $_from = $this->_tpl_vars['blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
<?php if ($this->_tpl_vars['item']['side'] == $this->_tpl_vars['side']): ?>
<div id="blk_<?php echo $this->_tpl_vars['item']['bid']; ?>
" bid="<?php echo $this->_tpl_vars['item']['bid']; ?>
" side="<?php echo $this->_tpl_vars['item']['side']; ?>
" order="<?php echo $this->_tpl_vars['item']['weight']; ?>
" class="xo-block ui-widget ui-widget-content ui-corner-all">
    <div class="xo-blocktitle ui-corner-all">
        <span class="spacer">
            <img class="xo-imgmini" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/block.png'; ?>" alt="<?php echo @_AM_SYSTEM_BLOCKS_DRAG; ?>
" title="<?php echo @_AM_SYSTEM_BLOCKS_DRAG; ?>
" />
        </span>
        <?php echo $this->_tpl_vars['item']['title']; ?>

    </div>
    <div class="xo-blockaction xo-actions"><img id="loading_img<?php echo $this->_tpl_vars['item']['bid']; ?>
" src="./images/mimetypes/spinner.gif" style="display:none;" title="<?php echo @_AM_SYSTEM_LOADING; ?>
" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="tooltip" id="img<?php echo $this->_tpl_vars['item']['bid']; ?>
" onclick="system_setStatus( { fct: 'blocksadmin', op: 'display', bid: <?php echo $this->_tpl_vars['item']['bid']; ?>
, visible: <?php if ($this->_tpl_vars['item']['visible']): ?>0<?php else: ?>1<?php endif; ?> }, 'img<?php echo $this->_tpl_vars['item']['bid']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['item']['visible']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php if ($this->_tpl_vars['item']['visible']): ?><?php echo @_AM_SYSTEM_BLOCKS_HIDE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_BLOCKS_DISPLAY; ?>
<?php endif; ?><?php echo $this->_tpl_vars['item']['name']; ?>
" title="<?php if ($this->_tpl_vars['item']['visible']): ?><?php echo @_AM_SYSTEM_BLOCKS_HIDE; ?>
<?php else: ?><?php echo @_AM_SYSTEM_BLOCKS_DISPLAY; ?>
<?php endif; ?><?php echo $this->_tpl_vars['item']['name']; ?>
" />
        <a class="tooltip" href="admin.php?fct=blocksadmin&amp;op=edit&amp;bid=<?php echo $this->_tpl_vars['item']['bid']; ?>
" title="<?php echo @_EDIT; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" />
        </a>
        <?php if ($this->_tpl_vars['item']['block_type'] != 'S'): ?>
        <a class="tooltip" href="admin.php?fct=blocksadmin&amp;op=delete&amp;bid=<?php echo $this->_tpl_vars['item']['bid']; ?>
" title="<?php echo @_DELETE; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
" />
        </a>
        <?php endif; ?>
        <a class="tooltip" href="admin.php?fct=blocksadmin&amp;op=clone&amp;bid=<?php echo $this->_tpl_vars['item']['bid']; ?>
" title="<?php echo @_AM_SYSTEM_BLOCKS_CLONE; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/clone.png'; ?>" alt="<?php echo @_AM_SYSTEM_BLOCKS_CLONE; ?>
" />
        </a>
    </div>
</div>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>