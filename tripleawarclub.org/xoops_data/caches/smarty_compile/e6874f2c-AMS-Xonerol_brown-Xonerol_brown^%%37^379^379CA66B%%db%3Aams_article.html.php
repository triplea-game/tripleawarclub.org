<?php /* Smarty version 2.6.28, created on 2016-02-14 17:31:02
         compiled from db:ams_article.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:ams_article.html', 100, false),)), $this); ?>
<h2 class="siteheader"><?php echo $this->_tpl_vars['breadcrumb']; ?>
</h2>


<div style="text-align: left; margin: 10px;"><?php if ($this->_tpl_vars['pagenav']): ?>Page <?php echo $this->_tpl_vars['pagenav']; ?>
<?php endif; ?></div>

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

            <?php if ($this->_tpl_vars['page'] == 0): ?>

                <?php echo $this->_tpl_vars['story']['hometext']; ?>


            <?php endif; ?>

            <?php if ($this->_tpl_vars['page'] == 0): ?>

                <br />

            <?php endif; ?>

            <?php echo $this->_tpl_vars['story']['bodytext']; ?>


        </p>

			
					</td>
					<td class="amsDetails">
		<div class="amsDetailsBG">
	<?php echo $this->_tpl_vars['story']['imglink']; ?>
		


        <?php if ($this->_tpl_vars['story']['poster'] != ''): ?><?php echo $this->_tpl_vars['lang_postedby']; ?>
 : <?php echo $this->_tpl_vars['story']['poster']; ?>
 <br/> <?php endif; ?>


        <!--<div class="itemPoster" style="text-align: right;"><?php echo @_AMS_NW_STORYID; ?>
 : <?php echo $this->_tpl_vars['story']['id']; ?>
</div>-->

    

        <!--<div class="itemPoster" style="float:left;"><?php echo @_AMS_NW_AUDIENCE; ?>
 : <?php echo $this->_tpl_vars['story']['audience']; ?>
</div>

        <div class="itemPoster" style="text-align: right;"><?php echo @_AMS_NW_VERSION; ?>
&nbsp;<?php echo $this->_tpl_vars['story']['version']; ?>
.<?php echo $this->_tpl_vars['story']['revision']; ?>
<?php echo $this->_tpl_vars['story']['revisionminor']; ?>
</div>

    

        <div class="itemPostDate" style="float:left;"><?php echo $this->_tpl_vars['lang_on']; ?>
 <?php echo $this->_tpl_vars['story']['posttime']; ?>
</div>-->

       <br/>	 <div class="itemStats" style="text-align: right;"><?php echo $this->_tpl_vars['lang_reads']; ?>
 : <?php echo $this->_tpl_vars['story']['hits']; ?>
</div> <br/>


		

    <?php if ($this->_tpl_vars['related'] && $this->_tpl_vars['related']['top']): ?>

        <div class="itemHead">

                <?php echo @_AMS_NW_PREREQUISITEARTICLES; ?>


        </div>

        <div>

            <table>

                <?php $_from = $this->_tpl_vars['related']['top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>

                    <tr>

                        <td class="head" width="20%"><?php echo $this->_tpl_vars['link']['link_module']; ?>
</td>

                        <td class="<?php echo smarty_function_cycle(array('values' => "odd, even"), $this);?>
">

                            <a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/viewlink.php?lid=<?php echo $this->_tpl_vars['link']['linkid']; ?>
<?php if ($this->_tpl_vars['link']['storyid'] != $this->_tpl_vars['story']['id']): ?>&amp;rev=1<?php endif; ?>

                            ' target="<?php echo $this->_tpl_vars['link']['target']; ?>
"><?php echo $this->_tpl_vars['link']['link_title']; ?>
</a>

                            <?php if ($this->_tpl_vars['admin']): ?>

                                (<?php echo $this->_tpl_vars['link']['hits']; ?>
)

                            <?php endif; ?>

                        </td>

                    </tr>

                <?php endforeach; endif; unset($_from); ?>

            </table>

        </div>

    <?php endif; ?>
    
				
<?php if ($this->_tpl_vars['story']['forum']): ?>

<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewforum.php?forum=<?php echo $this->_tpl_vars['story']['forum']; ?>
"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/discuss.png" /></a>

<?php endif; ?>	

<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/print.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/print.png" border="0" alt="<?php echo $this->_tpl_vars['lang_printerpage']; ?>
" /></a>
<a target="_top" href="<?php echo $this->_tpl_vars['mail_link']; ?>
"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/email.png" border="0" alt="<?php echo $this->_tpl_vars['lang_sendstory']; ?>
" /></a>

<br/>
</div>					
					
					</td>
                
                </tr>


</tbody>
</table>



<div style="text-align: left; margin: 10px;"><?php if ($this->_tpl_vars['pagenav']): ?>Page <?php echo $this->_tpl_vars['pagenav']; ?>
<?php endif; ?></div>


    <div class="itemFoot" style="clear: both;">

        <!--<?php if ($this->_tpl_vars['story']['ratingimage'] != ""): ?>

            <div style="float: left;">

                <img src='<?php echo $this->_tpl_vars['story']['ratingimage']; ?>
' alt="<?php echo $this->_tpl_vars['story']['rating']; ?>
" />

                <?php if ($this->_tpl_vars['allow_rating'] == 1): ?>

                    | <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/ratefile.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
"><?php echo @_AMS_NW_RATEARTICLE; ?>
</a>&nbsp;

                <?php endif; ?>

            </div>

        <?php endif; ?>-->

        <div style="text-align:right;">

            <?php if ($this->_tpl_vars['admin']): ?>

                <span class="itemAdminLink">

                    &nbsp;<a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/submit.php?op=edit&amp;storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
'><?php echo @_EDIT; ?>
</a>

                    <?php if (( $this->_tpl_vars['story']['hasversions'] == 1 )): ?>&nbsp&nbsp|

                       &nbsp&nbsp<a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/versions.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
'><?php echo @_AMS_NW_VERSION; ?>
</a>

                    <?php endif; ?>

                    &nbsp&nbsp;

                </span>

            <?php endif; ?>

            <?php if (( $this->_tpl_vars['story']['posterid'] == $this->_tpl_vars['xoops_userid'] || $this->_tpl_vars['admin'] )): ?>

                <span class="itemPermaLink">|&nbsp&nbsp;<a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/link.php?storyid=<?php echo $this->_tpl_vars['story']['id']; ?>
'><?php echo @_AMS_NW_MANAGELINK; ?>
</a>&nbsp;</span>

            <?php endif; ?>

        </div>

    </div>


<?php if ($this->_tpl_vars['related'] && $this->_tpl_vars['related']['bottom']): ?>

    <div class="itemHead">

        <?php echo @_AMS_NW_RELATEDARTICLES; ?>


    </div>

    <table>

        <?php $_from = $this->_tpl_vars['related']['bottom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>

            <tr>

                <td class="head" width="20%"><?php echo $this->_tpl_vars['link']['link_module']; ?>
</td>

                <td class="<?php echo smarty_function_cycle(array('values' => "odd, even"), $this);?>
">

                    <a href='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/viewlink.php?lid=<?php echo $this->_tpl_vars['link']['linkid']; ?>
<?php if ($this->_tpl_vars['link']['storyid'] != $this->_tpl_vars['story']['id']): ?>&amp;rev=1<?php endif; ?>' target="<?php echo $this->_tpl_vars['link']['target']; ?>
"><?php echo $this->_tpl_vars['link']['link_title']; ?>
</a>

                    <?php if ($this->_tpl_vars['admin']): ?>

                        (<?php echo $this->_tpl_vars['link']['hits']; ?>
)

                    <?php endif; ?>

                </td>

            </tr>

        <?php endforeach; endif; unset($_from); ?>

    </table>

<?php endif; ?>



<?php if ($this->_tpl_vars['attached_files_count'] > 0): ?>

	<div class="itemInfo"><?php echo $this->_tpl_vars['lang_attached_files']; ?>


		<?php $_from = $this->_tpl_vars['attached_files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onefile']):
?>

			<a href='<?php echo $this->_tpl_vars['onefile']['visitlink']; ?>
' target='_blank'><?php echo $this->_tpl_vars['onefile']['file_realname']; ?>
</a>&nbsp;

			<br>

		<?php endforeach; endif; unset($_from); ?>

	</div>

<?php endif; ?>