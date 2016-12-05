<?php /* Smarty version 2.6.28, created on 2016-02-14 19:31:05
         compiled from db:system_comments_nest.html */ ?>
<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['comments']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
<br />
<table cellspacing="1" class="outer">
  <tr>
    <th width="20%"><?php echo $this->_tpl_vars['lang_poster']; ?>
</th>
    <th><?php echo $this->_tpl_vars['lang_thread']; ?>
</th>
  </tr>
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:system_comment.html", 'smarty_include_vars' => array('comment' => $this->_tpl_vars['comments'][$this->_sections['i']['index']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</table>

<!-- start comment replies -->
<?php $_from = $this->_tpl_vars['comments'][$this->_sections['i']['index']]['replies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['reply']):
?>
<br />
<table cellspacing="0" border="0">
  <tr>
    <td width="<?php echo $this->_tpl_vars['reply']['prefix']; ?>
"></td>
    <td>
      <table class="outer" cellspacing="1">
        <tr>
          <th width="20%"><?php echo $this->_tpl_vars['lang_poster']; ?>
</th>
          <th><?php echo $this->_tpl_vars['lang_thread']; ?>
</th>
        </tr>
        <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:system_comment.html", 'smarty_include_vars' => array('comment' => $this->_tpl_vars['reply'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      </table>
    </td>
  </tr>
</table>
<?php endforeach; endif; unset($_from); ?>
<!-- end comment tree -->
<?php endfor; endif; ?>