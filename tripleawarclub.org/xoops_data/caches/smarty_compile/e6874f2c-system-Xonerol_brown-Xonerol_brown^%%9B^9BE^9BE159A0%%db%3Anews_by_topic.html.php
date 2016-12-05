<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_by_topic.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'db:news_by_topic.html', 9, false),)), $this); ?>
<div class="item">
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
%" valign="top">
	<?php $_from = $this->_tpl_vars['columns'][$this->_sections['i']['index']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
    <div class="itemBody">
    	<div class="itemInfo"><span class="itemText"><a title="<?php echo $this->_tpl_vars['topic']['title']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a></span></div>
		<?php echo smarty_function_counter(array('start' => 0,'print' => false,'assign' => 'storynum'), $this);?>

        <?php $_from = $this->_tpl_vars['topic']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['story']):
?>
        	<?php if ($this->_tpl_vars['storynum'] == 0): ?>
        		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:news_item.html", 'smarty_include_vars' => array('story' => $this->_tpl_vars['story'])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?><br />
			<?php else: ?>
        		<?php if ($this->_tpl_vars['storynum'] == 1): ?>
            		<ul>
				<?php endif; ?>
					<li><a title="<?php echo $this->_tpl_vars['story']['title']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><?php echo $this->_tpl_vars['story']['title']; ?>
</a> (<?php echo $this->_tpl_vars['story']['posttime']; ?>
)</li>
				<?php endif; ?>
				<?php echo smarty_function_counter(array(), $this);?>

			<?php endforeach; endif; unset($_from); ?>
			<?php if ($this->_tpl_vars['storynum'] > 1): ?>
				</ul>
				<a title="<?php echo $this->_tpl_vars['lang_morereleases']; ?>
<?php echo $this->_tpl_vars['topic']['title']; ?>
" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['lang_morereleases']; ?>
<?php echo $this->_tpl_vars['topic']['title']; ?>
</a>
			<?php endif; ?>
	 </div>
	<?php endforeach; endif; unset($_from); ?>
	</td>
<?php endfor; endif; ?>
</tr>
</table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>