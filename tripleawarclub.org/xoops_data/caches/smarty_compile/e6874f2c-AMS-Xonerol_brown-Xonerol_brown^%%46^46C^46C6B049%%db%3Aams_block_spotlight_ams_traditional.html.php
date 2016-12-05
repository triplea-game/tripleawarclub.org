<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:35
         compiled from db:ams_block_spotlight_ams_traditional.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'db:ams_block_spotlight_ams_traditional.html', 64, false),)), $this); ?>
<div id="news">

<div id="box">

<h2 class="boxHeader"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/index.php?storytopic=2">News &raquo;</a></h2>

<div id="newsContent">

<table style="width: 100%; height: auto;">

    <tr>

        <?php $_from = $this->_tpl_vars['spotlights']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['spot'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['spot']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['spot']):
        $this->_foreach['spot']['iteration']++;
?>

            <?php if ($this->_foreach['spot']['iteration'] == 1): ?>

                <td colspan="2">

            <?php else: ?>

                <td colspan="2">

            <?php endif; ?>

            <?php if ($this->_tpl_vars['spot']['custom'] == 1): ?>

                <div class="itemBody">

                    <?php echo $this->_tpl_vars['spot']['image']; ?>


                    <p class="itemText">

                        <?php echo $this->_tpl_vars['spot']['text']; ?>


                    </p>

                </div>

            <?php else: ?>

				<table border="0" cellspacing="0" cellpadding="0" id="itemHeader">
<tr>

<td class="itemHead">

                    <span class="itemTitle">

						<?php if ($this->_tpl_vars['spot']['friendlyurl_enable'] != 1): ?>

                        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['spot']['id']; ?>
"><?php echo $this->_tpl_vars['spot']['title']; ?>
</a>

						<?php else: ?>

                        <a href="<?php echo $this->_tpl_vars['spot']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['spot']['title']; ?>
</a>

						<?php endif; ?>									

                    </span>
</td>
<td class="itemInfo">

                    <?php if ($this->_tpl_vars['spot']['posterid'] > 0): ?><span class="itemPoster"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['spot']['posterid']; ?>
"><?php echo $this->_tpl_vars['spot']['poster']; ?>
</a></span><?php endif; ?>

                    <span class="itemPostDate"><?php echo @_ON; ?>
 <?php echo ((is_array($_tmp=$this->_tpl_vars['spot']['posttime'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 10, "") : smarty_modifier_truncate($_tmp, 10, "")); ?>
</span><!-- (<span class="itemStats"><?php echo $this->_tpl_vars['spot']['hits']; ?>
</span>)-->

</td>
</tr>				
				</table>


                <div class="itemBody">

                    <!--<?php echo $this->_tpl_vars['spot']['image']; ?>
-->

                    <p class="itemText">

                        <?php echo ((is_array($_tmp=$this->_tpl_vars['spot']['text'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 225, "...") : smarty_modifier_truncate($_tmp, 225, "...")); ?>


<br/>

 <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['spot']['id']; ?>
">Read more.</a>

                    </p>

                </div>

          <!--      <div class="itemFoot" style="clear:both;">

                    <div class="itemPermaLink" style="text-align: right;">

						<?php if ($this->_tpl_vars['spot']['friendlyurl_enable'] != 1): ?>

                        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['spot']['id']; ?>
"><?php echo @_AMS_MB_READMORE; ?>
</a>

						<?php else: ?>

                        <a href="<?php echo $this->_tpl_vars['spot']['friendlyurl']; ?>
"><?php echo @_AMS_MB_READMORE; ?>
</a>

						<?php endif; ?>														

                    </div> -->

                </div>

            <?php endif; ?>

            </td> 

            <?php if (($this->_foreach['spot']['iteration'] == $this->_foreach['spot']['total']) != true): ?>

                </tr>



            <?php endif; ?>

        <?php endforeach; endif; unset($_from); ?>

    </tr>

</table>