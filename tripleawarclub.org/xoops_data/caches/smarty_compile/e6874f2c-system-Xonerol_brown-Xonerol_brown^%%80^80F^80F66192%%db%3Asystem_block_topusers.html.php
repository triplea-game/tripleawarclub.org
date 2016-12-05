<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:51
         compiled from db:system_block_topusers.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_block_topusers.html', 3, false),)), $this); ?>
<table cellspacing="1" class="outer">
  <?php $_from = $this->_tpl_vars['block']['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['user']):
?>
  <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
" valign="middle">
    <td><?php echo $this->_tpl_vars['user']['rank']; ?>
</td>
    <td align="center">
      <?php if ($this->_tpl_vars['user']['avatar'] != ""): ?>
      <img src="<?php echo $this->_tpl_vars['user']['avatar']; ?>
" alt="<?php echo $this->_tpl_vars['user']['name']; ?>
" width="32" /><br />
      <?php endif; ?>
      <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['user']['id']; ?>
" title="<?php echo $this->_tpl_vars['user']['name']; ?>
"><?php echo $this->_tpl_vars['user']['name']; ?>
</a>
    </td>
    <td align="center"><?php echo $this->_tpl_vars['user']['posts']; ?>
</td>
  </tr>
  <?php endforeach; endif; unset($_from); ?>
</table>