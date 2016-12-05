<?php /* Smarty version 2.6.28, created on 2016-08-02 12:32:56
         compiled from db:newbb_block.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:newbb_block.tpl', 11, false),)), $this); ?>
<table class="outer" cellspacing="1">
    <?php if ($this->_tpl_vars['block']['disp_mode'] == 0): ?>
        <tr>
            <th class="head" nowrap="nowrap"><?php echo @_MB_NEWBB_FORUM; ?>
</th>
            <th class="head" nowrap="nowrap"><?php echo @_MB_NEWBB_TOPIC; ?>
</th>
            <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_RPLS; ?>
</th>
            <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_VIEWS; ?>
</th>
            <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_LPOST; ?>
</th>
        </tr>
        <?php if (count($this->_tpl_vars['block']['topics'])):
    foreach ($this->_tpl_vars['block']['topics'] as $this->_tpl_vars['topic']):
 ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<?php echo $this->_tpl_vars['topic']['seo_forum_url']; ?>
"><?php echo $this->_tpl_vars['topic']['forum_name']; ?>
</a></td>
            <td><a href="<?php echo $this->_tpl_vars['topic']['seo_topic_url']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a></td>
            <td align="center"><?php echo $this->_tpl_vars['topic']['replies']; ?>
</td>
            <td align="center"><?php echo $this->_tpl_vars['topic']['views']; ?>
</td>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right"><?php echo $this->_tpl_vars['topic']['time']; ?>
<br/><?php echo $this->_tpl_vars['topic']['topic_poster']; ?>
&nbsp;<a href="<?php echo $this->_tpl_vars['topic']['seo_url']; ?>
"><?php echo $this->_tpl_vars['topic']['topic_page_jump']; ?>
</a></td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>

    <?php elseif ($this->_tpl_vars['block']['disp_mode'] == 1): ?>
        <tr>
            <th class="head" nowrap="nowrap"><?php echo @_MB_NEWBB_TOPIC; ?>
</th>
            <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_RPLS; ?>
</th>
            <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_LPOST; ?>
</th>
        </tr>
        <?php if (count($this->_tpl_vars['block']['topics'])):
    foreach ($this->_tpl_vars['block']['topics'] as $this->_tpl_vars['topic']):
 ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<?php echo $this->_tpl_vars['topic']['seo_topic_url']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a></td>
            <td align="center"><?php echo $this->_tpl_vars['topic']['replies']; ?>
</td>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right"><?php echo $this->_tpl_vars['topic']['time']; ?>
<br/><?php echo $this->_tpl_vars['topic']['topic_poster']; ?>
&nbsp;<a href="<?php echo $this->_tpl_vars['topic']['seo_url']; ?>
"><?php echo $this->_tpl_vars['topic']['topic_page_jump']; ?>
</a></td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>

    <?php elseif ($this->_tpl_vars['block']['disp_mode'] == 2): ?>

        <?php if (count($this->_tpl_vars['block']['topics'])):
    foreach ($this->_tpl_vars['block']['topics'] as $this->_tpl_vars['topic']):
 ?>
        <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<?php echo $this->_tpl_vars['topic']['seo_url']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a></td>
        </tr>
    <?php endforeach; endif; unset($_from); ?>

    <?php endif; ?>

</table>

<?php if ($this->_tpl_vars['block']['indexNav']): ?>
    <!-- irmtfan hardcode removed style="text-align:right; padding: 5px;" -->
    <div class="pagenav">
        <!-- irmtfan remove hardcoded html in URLs  -->
        <a href="<?php echo $this->_tpl_vars['block']['seo_top_allposts']; ?>
"><?php echo @_MB_NEWBB_ALLPOSTS; ?>
</a> |
        <a href="<?php echo $this->_tpl_vars['block']['seo_top_alltopics']; ?>
"><?php echo @_MB_NEWBB_ALLTOPICS; ?>
</a> |
        <a href="<?php echo $this->_tpl_vars['block']['seo_top_allforums']; ?>
"><?php echo @_MB_NEWBB_VSTFRMS; ?>
</a>
    </div>
<?php endif; ?>