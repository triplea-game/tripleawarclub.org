<?php /* Smarty version 2.6.28, created on 2016-02-13 21:40:32
         compiled from db:comp_rules_new.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'capitalize', 'db:comp_rules_new.html', 1, false),)), $this); ?>
<h2 class="siteheader"><?php echo ((is_array($_tmp=$this->_tpl_vars['name'])) ? $this->_run_mod_handler('capitalize', true, $_tmp) : smarty_modifier_capitalize($_tmp)); ?>
 Rules</h2>
<p><?php echo @_COMP_RULES_LASTUPDATE; ?>
: <?php echo $this->_tpl_vars['lastupdate']; ?>
</br></p>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "/usr/share/nginx/html/tripleawarclub.org/public_html/modules/comp/".($this->_tpl_vars['rules']), 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>