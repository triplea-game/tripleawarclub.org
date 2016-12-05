<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:31
         compiled from db:system_header.html */ ?>
<ul id="xo-breadcrumb" class="ui-corner-all" style="background-image:url('<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/bc_bg.png'; ?>'); ">
    <?php $_from = $this->_tpl_vars['xo_sys_breadcrumb']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['breadcrumb']):
?>
        <?php if ($this->_tpl_vars['breadcrumb']['home']): ?>
            <li><a class="tooltip" href="<?php echo $this->_tpl_vars['breadcrumb']['link']; ?>
" title="<?php echo $this->_tpl_vars['breadcrumb']['title']; ?>
" style="background-image:url('<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/bc_separator.png'; ?>');"><img  class="home" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/home.png'; ?>" alt="<?php echo $this->_tpl_vars['breadcrumb']['title']; ?>
" /></a></li>
        <?php else: ?>
            <?php if ($this->_tpl_vars['breadcrumb']['link']): ?>
            <li><a class="tooltip" href="<?php echo $this->_tpl_vars['breadcrumb']['link']; ?>
" title="<?php echo $this->_tpl_vars['breadcrumb']['title']; ?>
" style="background-image:url('<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/bc_separator.png'; ?>');"><?php echo $this->_tpl_vars['breadcrumb']['title']; ?>
</a></li>
            <?php else: ?>
            <li><?php echo $this->_tpl_vars['breadcrumb']['title']; ?>
</li>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; endif; unset($_from); ?>
    <?php if ($this->_tpl_vars['xo_sys_help']): ?>
    <li class="xo-help">
        <a class="cursorhelp tooltip help_view" title="<?php echo @_AM_SYSTEM_HELP_VIEW; ?>
" style="background-image:url('<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/bc_separator_end.png'; ?>'); display: visible;"><img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/help.png'; ?>" alt="<?php echo @_AM_SYSTEM_HELP_VIEW; ?>
" /></a>
        <a class="cursorhelp tooltip help_hide" title="<?php echo @_AM_SYSTEM_HELP_HIDE; ?>
" style="background-image:url('<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/breadcrumb/default/bc_separator_end.png'; ?>'); display: none;"><img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/help.png'; ?>" alt="<?php echo @_AM_SYSTEM_HELP_HIDE; ?>
" /></a>
    </li>
    <?php endif; ?>
</ul>
<?php if ($this->_tpl_vars['help_content']): ?>
<div class="hide" id="xo-system-help">
<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['help_content']), 'smarty_include_vars' => array()));
 ?>
</div>
<?php endif; ?>
<?php if ($this->_tpl_vars['xo_sys_tips']): ?>
<div class="tips ui-corner-all">
    <img class="floatleft tooltip" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/tips.png'; ?>" alt="<?php echo @_AM_SYSTEM_TIPS; ?>
" title="<?php echo @_AM_SYSTEM_TIPS; ?>
" />
    <div class="floatleft"><?php echo $this->_tpl_vars['xo_sys_tips']; ?>
</div>
    <div class="clear">&nbsp;</div>
</div>
<?php else: ?>
<br />
<?php endif; ?>