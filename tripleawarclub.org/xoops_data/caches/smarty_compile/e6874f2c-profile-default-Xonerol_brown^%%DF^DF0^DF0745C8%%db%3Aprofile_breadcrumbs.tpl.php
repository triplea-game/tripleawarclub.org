<?php /* Smarty version 2.6.28, created on 2016-03-10 16:09:00
         compiled from db:profile_breadcrumbs.tpl */ ?>
<div class="breadcrumbs">
    <?php $_from = $this->_tpl_vars['xoBreadcrumbs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['bcloop'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['bcloop']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['itm']):
        $this->_foreach['bcloop']['iteration']++;
?>
        <span class="item">
        <?php if ($this->_tpl_vars['itm']['link']): ?>
            <a href="<?php echo $this->_tpl_vars['itm']['link']; ?>
" title="<?php echo $this->_tpl_vars['itm']['title']; ?>
"><?php echo $this->_tpl_vars['itm']['title']; ?>
</a>
        <?php else: ?>
            <?php echo $this->_tpl_vars['itm']['title']; ?>

        <?php endif; ?>
        </span>
        
        <?php if (! ($this->_foreach['bcloop']['iteration'] == $this->_foreach['bcloop']['total'])): ?>
            <span class="delimiter">&raquo;</span>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
</div>
<br class="clear"/>