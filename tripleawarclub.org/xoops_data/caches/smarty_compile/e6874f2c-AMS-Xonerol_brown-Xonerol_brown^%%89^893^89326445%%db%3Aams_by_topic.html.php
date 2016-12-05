<?php /* Smarty version 2.6.28, created on 2016-02-15 18:48:42
         compiled from db:ams_by_topic.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'db:ams_by_topic.html', 65, false),array('function', 'cycle', 'db:ams_by_topic.html', 249, false),)), $this); ?>
<h2 class="siteheader"><?php echo $this->_tpl_vars['breadcrumb']; ?>
</h2>



<?php if (isset ( $this->_tpl_vars['topicbanner'] )): ?><div><?php echo $this->_tpl_vars['topicbanner']; ?>
</div><?php endif; ?>



<?php if ($this->_tpl_vars['displaynav'] == true): ?>

  <div style="text-align: right;"><b><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/submit.php"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/new.png"><?php echo $this->_tpl_vars['lang_postnewarticle']; ?>
</a></b></div>

  <div style="text-align: center;">

    <?php echo $this->_tpl_vars['topic_form']['javascript']; ?>


        <form name="<?php echo $this->_tpl_vars['topic_form']['name']; ?>
" id="<?php echo $this->_tpl_vars['topic_form']['name']; ?>
" action="<?php echo $this->_tpl_vars['topic_form']['action']; ?>
" method="<?php echo $this->_tpl_vars['topic_form']['method']; ?>
">

    <table id="topicform" cellspacing="0">

    <!-- start of form elements loop -->

    <tr valign="top">

    <td>

    <?php $_from = $this->_tpl_vars['topic_form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>

      <?php if ($this->_tpl_vars['element']['hidden'] != true): ?>

            <?php echo $this->_tpl_vars['element']['body']; ?>
&nbsp;

      <?php else: ?>

        <?php echo $this->_tpl_vars['element']['body']; ?>


      <?php endif; ?>

    <?php endforeach; endif; unset($_from); ?>

    </td>

    </tr>

    <!-- end of form elements loop -->

    </table>

  </form>

  <hr />

  </div>

<?php endif; ?>



<div id="box" class="item">

<table width="100%" border="0">

    <tr>

        <?php echo smarty_function_counter(array('start' => 0,'print' => false,'assign' => 'topicnum'), $this);?>


        <?php $_from = $this->_tpl_vars['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>

            <td width="<?php echo $this->_tpl_vars['columnwidth']; ?>
%" valign="top">

                <?php if ($this->_tpl_vars['topic']['subtopiccount'] > 0): ?>

                    <div style="float:left; width: 70%;">

                <?php else: ?>

                    <div style="float:left; width: 99%;">

                <?php endif; ?>

                    <div>

                        <div>

                            <table cellpadding="0" cellspacing="0" width="100%">

                                <tr class="itemHead" style="line-height: 200%;">

                                    <td class="itemTitle">

                                        &nbsp;&nbsp;<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['topic']['title']; ?>
</a>

                                    </td>

                                    <td class="itemTitle" style="text-align: right;">

                                        <?php echo @_AMS_NW_TOTALARTICLES; ?>
 : <?php echo $this->_tpl_vars['topic']['articlecount']; ?>
&nbsp;&nbsp;

                                    </td>

                                </tr>

                            </table>

                        </div>



                        <?php $this->assign('storycount', 0); ?>

                        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['topic']['stories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

                          <?php if ($this->_tpl_vars['storycount'] == 0): ?>

                            <div class="head" style="clear:both;">

								<?php if ($this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl_enable'] != 1): ?>

                                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['title']; ?>
</a>

								<?php else: ?>

                                <a href="<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['title']; ?>
</a>

								<?php endif; ?>								

                            </div>

                            <div class="itemInfo">

                                <?php if ($this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['poster'] != ''): ?><span class="itemPoster"><?php echo $this->_tpl_vars['lang_postedby']; ?>
 <?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['poster']; ?>
</span><?php endif; ?>

                                <span class="itemPostDate"><?php echo $this->_tpl_vars['lang_on']; ?>
 <?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['posttime']; ?>
</span> (<span class="itemStats"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['hits']; ?>
 <?php echo $this->_tpl_vars['lang_reads']; ?>
</span>)

                            </div>

                            <div class="itemBody">

                                <?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['imglink']; ?>
FIVE

                                <p class="itemText">

                                    <?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['hometext']; ?>


                                </p>

                            </div>

                            <div class="itemFoot" style="clear:both;">

                                <div style="float:left;">&nbsp;

                                    <?php if ($this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['ratingimage'] != ""): ?>

                                        <img src='<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['ratingimage']; ?>
' />

                                    <?php endif; ?>

                                    &nbsp;

                                    <?php echo @_AMS_NW_STORYID; ?>
 : <?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['id']; ?>


                                </div>

                                <div class="itemPermaLink" style="text-align: right;">

									<?php if ($this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl_enable'] != 1): ?>

                                    <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['bytestext']; ?>
</a>

									<?php else: ?>

	                                <a href="<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['bytestext']; ?>
</a>

									<?php endif; ?>								



                                </div>

                            </div>

                            <br />

                            <?php $this->assign('storycount', 1); ?>

                          <?php else: ?>

                            <?php if ($this->_tpl_vars['storycount'] == 1): ?>

                                <ul>

                                <?php $this->assign('storycount', 2); ?>

                            <?php endif; ?>



							<?php if ($this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl_enable'] != 1): ?>

                            <li><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/article.php?storyid=<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['id']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['title']; ?>
</a> (<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['posttime']; ?>
)</li>

							<?php else: ?>

                            <li><a href="<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['friendlyurl']; ?>
"><?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['title']; ?>
</a> (<?php echo $this->_tpl_vars['topic']['stories'][$this->_sections['i']['index']]['posttime']; ?>
)</li>

							<?php endif; ?>								

							

                          <?php endif; ?>

                          <?php echo smarty_function_counter(array(), $this);?>


                        <?php endfor; endif; ?>

                        <?php if ($this->_tpl_vars['storycount'] > 1): ?>

                            </ul>

                            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/index.php?storytopic=<?php echo $this->_tpl_vars['topic']['id']; ?>
"><?php echo $this->_tpl_vars['lang_morereleases']; ?>
<?php echo $this->_tpl_vars['topic']['title']; ?>
</a>

                        <?php endif; ?>

                    </div>

                </div>

                <?php if ($this->_tpl_vars['topic']['subtopiccount'] > 0): ?>

                    <div class="outer" style="float:left; width: 29%; margin-left: 5px;">

                        <div class="itemHead">

                            <span class="itemTitle">

                                <?php echo @_AMS_MA_SUBTOPICS; ?>
<?php echo $this->_tpl_vars['topic']['title']; ?>


                            </span>

                        </div>

                        <ul>

                            <?php $_from = $this->_tpl_vars['topic']['subtopics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['subtopic']):
?>

                                <?php if ($this->_tpl_vars['subtopic']['imageurl'] != ""): ?>

                                    <li class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
" style="list-style: url(<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/topics/<?php echo $this->_tpl_vars['subtopic']['imageurl']; ?>
) circle; list-style-position: inside; text-align: left;">

                                <?php else: ?>

                                    <li>

                                <?php endif; ?>

                                    <a valign="middle" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/index.php?storytopic=<?php echo $this->_tpl_vars['subtopic']['id']; ?>
"><?php echo $this->_tpl_vars['subtopic']['title']; ?>
</a>

                                 

                                </li>

                            <?php endforeach; endif; unset($_from); ?>

                        </ul>

                    </div>

                <?php endif; ?>

            </td>

            <?php if ($this->_tpl_vars['topicnum'] % $this->_tpl_vars['columns'] == 0): ?>

                </tr>

                <tr>

            <?php endif; ?>

        <?php endforeach; endif; unset($_from); ?>

    </tr>

</table>

<!-- end topic loop -->

</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>