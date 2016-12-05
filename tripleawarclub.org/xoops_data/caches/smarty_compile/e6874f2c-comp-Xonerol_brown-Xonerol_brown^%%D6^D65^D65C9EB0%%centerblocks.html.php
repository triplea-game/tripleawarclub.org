<?php /* Smarty version 2.6.28, created on 2016-02-13 20:08:40
         compiled from Xonerol_brown/xotpl/centerblocks.html */ ?>

<?php if ($this->_tpl_vars['lcr'] == 'l'): ?><?php $this->assign('lcr', 'left'); ?>
<?php elseif ($this->_tpl_vars['lcr'] == 'r'): ?><?php $this->assign('lcr', 'right'); ?>
<?php else: ?><?php $this->assign('lcr', 'center'); ?>
<?php endif; ?>

<?php $this->assign('zone', "page_".($this->_tpl_vars['topbottom']).($this->_tpl_vars['lcr'])); ?>


<?php if ($this->_tpl_vars['xoBlocks'][$this->_tpl_vars['zone']]): ?>
	<div class="xo-blockszone" id="xo-page-<?php echo $this->_tpl_vars['topbottom']; ?>
<?php echo $this->_tpl_vars['lcr']; ?>
blocks">
	<?php $_from = $this->_tpl_vars['xoBlocks'][$this->_tpl_vars['zone']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block']):
?>
		<div class="xo-block <?php echo $this->_tpl_vars['block']['module']; ?>
">
			<?php if ($this->_tpl_vars['block']['title']): ?><div class="xo-blocktitle"><?php echo $this->_tpl_vars['block']['title']; ?>
</div><?php endif; ?>
			<div class="xo-blockcontent"><?php echo $this->_tpl_vars['block']['content']; ?>
</div>
		</div>
	<?php endforeach; endif; unset($_from); ?>
	</div>
<?php endif; ?>