<?php /* Smarty version 2.6.28, created on 2016-11-28 18:19:30
         compiled from db:profile_avatar.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:profile_avatar.tpl', 26, false),)), $this); ?>
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:profile_breadcrumbs.tpl", 'smarty_include_vars' => array()));
 ?>

<?php if ($this->_tpl_vars['old_avatar']): ?>
    <div class="pad10 center">
        <h4 class="bold red"><?php echo @_US_OLDDELETED; ?>
</h4>
        <img src="<?php echo $this->_tpl_vars['old_avatar']; ?>
" alt="" />
    </div>
<?php endif; ?>

<?php if ($this->_tpl_vars['uploadavatar']): ?>
<?php echo $this->_tpl_vars['uploadavatar']['javascript']; ?>

<form name="<?php echo $this->_tpl_vars['uploadavatar']['name']; ?>
" action="<?php echo $this->_tpl_vars['uploadavatar']['action']; ?>
" method="<?php echo $this->_tpl_vars['uploadavatar']['method']; ?>
" <?php echo $this->_tpl_vars['uploadavatar']['extra']; ?>
>
  <table class="outer" cellspacing="1">
    <tr>
    <th colspan="2"><?php echo $this->_tpl_vars['uploadavatar']['title']; ?>
</th>
    </tr>
    <!-- start of form elements loop -->
    <?php $_from = $this->_tpl_vars['uploadavatar']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
      <?php if ($this->_tpl_vars['element']['hidden'] != true): ?>
      <tr>
        <td class="head"><?php echo $this->_tpl_vars['element']['caption']; ?>

        <?php if ($this->_tpl_vars['element']['description']): ?>
        	<div style="font-weight: normal"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
        <?php endif; ?>
        </td>
        <td class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
      </tr>
      <?php else: ?>
      <?php echo $this->_tpl_vars['element']['body']; ?>

      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end of form elements loop -->
  </table>
</form>
<br />
<?php endif; ?>

<br />
<?php echo $this->_tpl_vars['chooseavatar']['javascript']; ?>

<form name="<?php echo $this->_tpl_vars['chooseavatar']['name']; ?>
" action="<?php echo $this->_tpl_vars['chooseavatar']['action']; ?>
" method="<?php echo $this->_tpl_vars['chooseavatar']['method']; ?>
" <?php echo $this->_tpl_vars['chooseavatar']['extra']; ?>
>
  <table class="outer" cellspacing="1">
    <tr>
    <th colspan="2"><?php echo $this->_tpl_vars['chooseavatar']['title']; ?>
</th>
    </tr>
    <!-- start of form elements loop -->
    <?php $_from = $this->_tpl_vars['chooseavatar']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
      <?php if ($this->_tpl_vars['element']['hidden'] != true): ?>
      <tr>
        <td class="head"><?php echo $this->_tpl_vars['element']['caption']; ?>

        <?php if ($this->_tpl_vars['element']['description']): ?>
        	<div style="font-weight: normal"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
        <?php endif; ?>
        </td>
        <td class="<?php echo smarty_function_cycle(array('values' => 'even,odd'), $this);?>
"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
      </tr>
      <?php else: ?>
      <?php echo $this->_tpl_vars['element']['body']; ?>

      <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end of form elements loop -->
  </table>
</form>