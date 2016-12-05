<?php /* Smarty version 2.6.28, created on 2016-02-15 11:37:44
         compiled from db:ams_index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'db:ams_index.html', 63, false),)), $this); ?>
<!--<div><?php if (isset ( $this->_tpl_vars['topicbanner'] )): ?><?php echo $this->_tpl_vars['topicbanner']; ?>
<?php endif; ?></div>-->

<?php if ($this->_tpl_vars['displaynav'] == true): ?>

  <!--<div style="text-align: right;"><b><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/submit.php"><img src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/AMS/images/new.png"><?php echo $this->_tpl_vars['lang_postnewarticle']; ?>
</a></b></div>-->

  <div style="float: right;">

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


<h2 class="siteheader"><?php echo $this->_tpl_vars['breadcrumb']; ?>
</h2>


<div style="margin: 10px;"><?php echo $this->_tpl_vars['pagenav']; ?>
</div>

<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr>

        <!-- start news item loop -->

        <?php echo smarty_function_counter(array('assign' => 'story_count','start' => 0,'print' => false), $this);?>


        <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['stories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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

            <?php if ($this->_tpl_vars['story_count'] > 0 && $this->_tpl_vars['story_count'] % $this->_tpl_vars['columns'] == 0): ?>

                </tr>

                <tr>

            <?php endif; ?>

            <td width="<?php echo $this->_tpl_vars['columnwidth']; ?>
%" style="padding:5px;">

                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "db:ams_item.html", 'smarty_include_vars' => array('story' => $this->_tpl_vars['stories'][$this->_sections['i']['index']])));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

                <?php echo smarty_function_counter(array(), $this);?>


            </td>

        <?php endfor; endif; ?>

    </tr>

</table>



<div style="text-align: right; margin: 10px;"><?php echo $this->_tpl_vars['pagenav']; ?>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'db:system_notification_select.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>