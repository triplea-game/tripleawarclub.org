<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_index.html */ ?>
<div class="news-index">
	<?php if ($this->_tpl_vars['topic_rssfeed_link'] != ""): ?>
	<div align='right'><?php echo $this->_tpl_vars['topic_rssfeed_link']; ?>
</div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['displaynav'] == true): ?>
	  <div style="text-align: center;">
	    <form name="form1" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php" method="get">
	    <?php echo $this->_tpl_vars['topic_select']; ?>
 <select name="storynum"><?php echo $this->_tpl_vars['storynum_options']; ?>
</select> <input type="submit" value="<?php echo $this->_tpl_vars['lang_go']; ?>
" class="formButton" /></form>
	  <hr />
	  </div>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['topic_description'] != ''): ?>
		<div style="text-align: center;"><?php echo $this->_tpl_vars['topic_description']; ?>
</div>
	<?php endif; ?>
	
	<div style="margin: 10px;"><?php echo $this->_tpl_vars['pagenav']; ?>
</div>
	<table width='100%' border='0'>
	<tr>
		<?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['columns']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
		<td width="<?php echo $this->_tpl_vars['columnwidth']; ?>
%"><?php $_from = $this->_tpl_vars['columns'][$this->_sections['i']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['story']):
?><?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:news_item.html", 'smarty_include_vars' => array('story' => $this->_tpl_vars['story'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><?php endforeach; endif; unset($_from); ?></td>
		<?php endfor; endif; ?>
	</tr>
	</table>
	
	<div class="pagenav"><?php echo $this->_tpl_vars['pagenav']; ?>
</div>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div>