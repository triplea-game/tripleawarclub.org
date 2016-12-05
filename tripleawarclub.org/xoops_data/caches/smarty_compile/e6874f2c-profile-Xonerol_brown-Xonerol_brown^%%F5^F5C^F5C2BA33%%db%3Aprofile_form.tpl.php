<?php /* Smarty version 2.6.28, created on 2016-02-13 22:35:08
         compiled from db:profile_form.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:profile_form.tpl', 17, false),)), $this); ?>

    <?php echo $this->_tpl_vars['xoForm']['javascript']; ?>

    <form id="<?php echo $this->_tpl_vars['xoForm']['name']; ?>
" name="<?php echo $this->_tpl_vars['xoForm']['name']; ?>
" action="<?php echo $this->_tpl_vars['xoForm']['action']; ?>
" method="<?php echo $this->_tpl_vars['xoForm']['method']; ?>
" <?php echo $this->_tpl_vars['xoForm']['extra']; ?>
 >
        <table class="profile-form" id="profile-form-<?php echo $this->_tpl_vars['xoForm']['name']; ?>
">
            <?php $_from = $this->_tpl_vars['xoForm']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
                <?php if (! $this->_tpl_vars['element']['hidden']): ?>
                    <tr>
                        <td class="head">
				            <div class='xoops-form-element-caption<?php if ($this->_tpl_vars['element']['required']): ?>-required<?php endif; ?>'>
				                <span class='caption-text'><?php echo $this->_tpl_vars['element']['caption']; ?>
</span>
				                <span class='caption-marker'>*</span>
				            </div>
                            <?php if ($this->_tpl_vars['element']['description'] != ""): ?>
                                <div class='xoops-form-element-help'><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
                            <?php endif; ?>
                        </td>
                        <td class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
">
                            <?php echo $this->_tpl_vars['element']['body']; ?>

                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; endif; unset($_from); ?>
        </table>
        <?php $_from = $this->_tpl_vars['xoForm']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
            <?php if ($this->_tpl_vars['element']['hidden']): ?>
                <?php echo $this->_tpl_vars['element']['body']; ?>

            <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </form>