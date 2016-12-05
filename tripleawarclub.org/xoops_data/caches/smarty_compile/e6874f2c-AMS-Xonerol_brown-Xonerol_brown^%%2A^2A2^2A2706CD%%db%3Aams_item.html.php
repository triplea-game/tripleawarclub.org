<?php /* Smarty version 2.6.28, created on 2016-02-15 11:37:44
         compiled from db:ams_item.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'db:ams_item.html', 34, false),)), $this); ?>
<table cellpadding="0" cellspacing="0" class="amsItem" width="100%">

            <tbody>

                <tr>

                    <td class="amsTitle" colspan="2">

							<?php if ($this->_tpl_vars['story']['friendlyurl_enable'] != 1): ?>

				            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><?php echo $this->_tpl_vars['story']['title']; ?>
</a>

							<?php else: ?>

				            <a href="<?php echo $this->_tpl_vars['story']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['story']['title']; ?>
</a>

							<?php endif; ?>
							<br/>
							<span class="itemPostDate"> <?php echo $this->_tpl_vars['story']['posttime']; ?>
</span>						

                    </td>

                    

                </tr>

                <tr>

                    <td class="amsItemBody">
                       

                            <p class="itemText">

                                <?php echo ((is_array($_tmp=$this->_tpl_vars['story']['hometext'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 186, "...", true) : smarty_modifier_truncate($_tmp, 186, "...", true)); ?>


                            </p>


                    </td>
                    <td class="amsDetails">
                    			<div class="amsDetailsBG">
								<?php echo $this->_tpl_vars['story']['imglink']; ?>
  
  								<?php if ($this->_tpl_vars['story']['poster'] != ''): ?><span class="itemPoster"><?php echo $this->_tpl_vars['lang_postedby']; ?>
 <?php echo $this->_tpl_vars['story']['poster']; ?>
</span><?php endif; ?>
								<br/><br/>
                         <span class="itemStats"><?php echo $this->_tpl_vars['story']['hits']; ?>
 <?php echo $this->_tpl_vars['lang_reads']; ?>
</span>  
                         </div>                 
                    </td>

                </tr>

                <tr>

                    <td class="amsMore">


                           <!-- <?php if ($this->_tpl_vars['story']['ratingimage'] != ""): ?>

                                <img src='<?php echo $this->_tpl_vars['story']['ratingimage']; ?>
' alt="<?php echo $this->_tpl_vars['story']['rating']; ?>
"/>

                            <?php endif; ?> -->


						<?php if ($this->_tpl_vars['story']['friendlyurl_enable'] != 1): ?>

						<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><?php echo $this->_tpl_vars['story']['bytestext']; ?>
</a>

						<?php else: ?>

						<a href="<?php echo $this->_tpl_vars['story']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['story']['bytestext']; ?>
</a>

						<?php endif; ?>						

                            <?php if ($this->_tpl_vars['showcomments']): ?>

                                &nbsp;|&nbsp;

								<?php if ($this->_tpl_vars['story']['friendlyurl_enable'] != 1): ?>

                                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><?php echo $this->_tpl_vars['story']['comments']; ?>
</a>

								<?php else: ?>

								<a href="<?php echo $this->_tpl_vars['story']['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['story']['comments']; ?>
</a>

								<?php endif; ?>						

                            <?php endif; ?>


                    </td>

                </tr>

             </tbody>

         </table>