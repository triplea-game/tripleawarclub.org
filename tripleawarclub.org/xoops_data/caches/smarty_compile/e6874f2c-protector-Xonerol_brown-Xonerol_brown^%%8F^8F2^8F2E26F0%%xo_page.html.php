<?php /* Smarty version 2.6.28, created on 2016-02-13 19:40:05
         compiled from /usr/share/nginx/html/tripleawarclub.org/public_html/modules/system/themes/default/xotpl/xo_page.html */ ?>
<div id="xo-body-contain">
  <div id="xo-body">
     <?php if ($this->_tpl_vars['xoops_contents']): ?>
          <div id="xo-content">
          <!-- Display Admin menu -->
          <?php if ($this->_tpl_vars['xo_system_menu']): ?><?php echo $this->_tpl_vars['xo_system_menu']; ?>
<?php endif; ?>
          <?php echo $this->_tpl_vars['xoops_contents']; ?>

          </div>
      <?php endif; ?>
      <?php if ($this->_tpl_vars['modules']): ?>
      <div>
          <div id="xo-index">
              <div id="xo-body-icons" class="xo-index-option"><?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_tpl'])."/xo_icons.html", 'smarty_include_vars' => array()));
 ?></div>
              <div id="xo-tabs" class="xo-index-option"><?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_tpl'])."/xo_tabs.html", 'smarty_include_vars' => array()));
 ?></div>
          </div>
          <div id="xo-index">
              <div id="xo-modules" class="xo-index-option"><?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_tpl'])."/xo_modules.html", 'smarty_include_vars' => array()));
 ?></div>
              <div id="xo-accordion" class="xo-index-option"><?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_tpl'])."/xo_accordion.html", 'smarty_include_vars' => array()));
 ?></div>
          </div>
      </div>
      <div id="xo-index-bottom"></div>
      <?php endif; ?>
  </div>
</div>