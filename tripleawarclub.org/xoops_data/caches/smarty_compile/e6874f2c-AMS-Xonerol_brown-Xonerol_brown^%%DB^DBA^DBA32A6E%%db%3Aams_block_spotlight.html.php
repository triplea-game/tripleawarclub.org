<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:35
         compiled from db:ams_block_spotlight.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'db:ams_block_spotlight.html', 15, false),)), $this); ?>
<?php echo $this->_tpl_vars['block']['spotlightcontent']; ?>


<?php if ($this->_tpl_vars['block']['showother']): ?>

    <div class= "itemOtherArticles" style="clear:both;">

        <h3><?php echo @_AMS_MB_SPOT_OTHERNEWS; ?>
</h3>

        <ul>

            <?php $_from = $this->_tpl_vars['block']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>

				<?php if ($this->_tpl_vars['news']['friendlyurl_enable'] != 1): ?>

                <li style="clear:both;"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['news']['id']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
</a> <span class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['published'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "") : smarty_modifier_truncate($_tmp, 10, "")); ?>
</span> <!--(<?php echo $this->_tpl_vars['news']['hits']; ?>
)--></li>

				<?php else: ?>

                <li style="clear:both;"><a href="<?php echo $this->_tpl_vars['news']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['news']['title']; ?>
</a>  <span class="date"><?php echo ((is_array($_tmp=$this->_tpl_vars['news']['published'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "") : smarty_modifier_truncate($_tmp, 10, "")); ?>
</span> <!--(<?php echo $this->_tpl_vars['news']['hits']; ?>
)--></li>

				<?php endif; ?>

			

            <?php endforeach; endif; unset($_from); ?>

        </ul>

    </div>

<?php endif; ?>

<?php if ($this->_tpl_vars['block']['showministats'] == 1): ?>

    <div class="itemFoot" style="clear:both; text-align: center;">

        <span><?php echo @_AMS_MB_SPOT_TOTALARTICLES; ?>
 : <?php echo $this->_tpl_vars['block']['total_art']; ?>
</span>&nbsp;

        <span><?php echo @_AMS_MB_SPOT_TOTALREADS; ?>
 : <?php echo $this->_tpl_vars['block']['total_read']; ?>
</span>&nbsp;

        <span><?php echo @_AMS_MB_SPOT_TOTALCOMMENTS; ?>
 : <?php echo $this->_tpl_vars['block']['total_comments']; ?>
</span>

    </div>

<?php endif; ?>

</div>

</div>

</div>