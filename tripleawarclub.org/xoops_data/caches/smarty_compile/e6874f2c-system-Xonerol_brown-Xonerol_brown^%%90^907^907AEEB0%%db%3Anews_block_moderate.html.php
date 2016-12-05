<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_block_moderate.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:news_block_moderate.html', 10, false),)), $this); ?>
<table class="outer" cellspacing="1">
<tr>
	<th align="center"><?php echo $this->_tpl_vars['block']['lang_story_title']; ?>
</th>
    <th align="center"><?php echo $this->_tpl_vars['block']['lang_story_topic']; ?>
</th>
    <th align="center"><?php echo $this->_tpl_vars['block']['lang_story_date']; ?>
</th>
    <th align="center"><?php echo $this->_tpl_vars['block']['lang_story_author']; ?>
</th>
    <th align="center"><?php echo $this->_tpl_vars['block']['lang_story_action']; ?>
</th>
</tr>
<?php $_from = $this->_tpl_vars['block']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
<tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
	<td align="left"><?php echo $this->_tpl_vars['news']['title']; ?>
</td>
    <td align="left"><?php echo $this->_tpl_vars['news']['topic_title']; ?>
</td>
    <td align="center"><?php echo $this->_tpl_vars['news']['date']; ?>
</td>
    <td align="left"><?php echo $this->_tpl_vars['news']['author']; ?>
</td>
    <td align="center"><?php echo $this->_tpl_vars['news']['action']; ?>
</td>
</tr>
<?php endforeach; endif; unset($_from); ?>
</table>