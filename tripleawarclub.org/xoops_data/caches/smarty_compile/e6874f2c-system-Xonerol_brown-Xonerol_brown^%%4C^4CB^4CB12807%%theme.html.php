<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:35
         compiled from /usr/share/nginx/html/tripleawarclub.org/public_html/themes/Xonerol_brown/theme.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cat', '/usr/share/nginx/html/tripleawarclub.org/public_html/themes/Xonerol_brown/theme.html', 11, false),array('modifier', 'substr', '/usr/share/nginx/html/tripleawarclub.org/public_html/themes/Xonerol_brown/theme.html', 62, false),)), $this); ?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
" lang="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
">
<head>
	<!-- paramètres pour le positionnement des blocs haut et bas -->
		<?php $this->assign('theme_top_order', 'clr'); ?>
	<?php $this->assign('theme_bottom_order', 'clr'); ?>
<!-- Theme name -->
	<?php $this->assign('theme_name', $this->_tpl_vars['xoTheme']->folderName); ?>
<!-- Directory html blocks files or additional html files by include -->
	<?php $this->assign('theme_name', ((is_array($_tmp=$this->_tpl_vars['xoTheme']->folderName)) ? $this->_run_mod_handler('cat', true, $_tmp, '/xotpl') : smarty_modifier_cat($_tmp, '/xotpl'))); ?>
<!-- Directory html plugins files -->	
	<?php $this->assign('theme_plugin', ((is_array($_tmp=$this->_tpl_vars['xoTheme']->folderName)) ? $this->_run_mod_handler('cat', true, $_tmp, '/xoplugins') : smarty_modifier_cat($_tmp, '/xoplugins'))); ?>
<!-- Metas, Titles, and Style Sheets -->
	<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/xometas.html", 'smarty_include_vars' => array()));
 ?>
<!-- Additionals Scripts -->
	<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/xoscripts.html", 'smarty_include_vars' => array()));
 ?>
</head>
<body id="<?php echo $this->_tpl_vars['xoops_dirname']; ?>
" class="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
">
<?php if ($this->_tpl_vars['xoBlocks']['canvas_left'] && $this->_tpl_vars['xoBlocks']['canvas_right']): ?><?php $this->assign('columns_layout', 'threecolumns-layout'); ?>
<?php elseif ($this->_tpl_vars['xoBlocks']['canvas_left']): ?><?php $this->assign('columns_layout', 'leftcolumn-layout'); ?>
<?php elseif ($this->_tpl_vars['xoBlocks']['canvas_right']): ?><?php $this->assign('columns_layout', 'rightcolumn-layout'); ?>
<?php endif; ?>
<div id="xo-wrapper" class="<?php echo $this->_tpl_vars['xoops_dirname']; ?>
 <?php echo $this->_tpl_vars['homeStyle']; ?>
">
	<div id="xo-bgstatic" class="<?php echo $this->_tpl_vars['xoops_dirname']; ?>
"></div>
	<div id="xo-canvas"<?php if ($this->_tpl_vars['columns_layout']): ?> class="<?php echo $this->_tpl_vars['columns_layout']; ?>
"<?php endif; ?>>

		<!-- début du HAUT DE PAGE -->
		<div id="xo-header" class="<?php echo $this->_tpl_vars['xoops_dirname']; ?>
">


      	<!-- include du HEADER avec logo et bannière -->
			<!-- vérification si l'affichage de la bannière est activée ou non dans l'administration du site -->
				<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/xobanner_commercial.html", 'smarty_include_vars' => array()));
 ?>
			<!-- fin de la condition d'affichage en fonction de l'activation de la bannière -->

		</div>
		<!-- fin du haut de page -->

      <!-- zone CONTENU -->
		<!-- Ne pas modifier la partie ci-dessous, c'est supposé être l'architecture standard que chacun doit utiliser -->
		<div id="xo-canvas-content" class="<?php echo $this->_tpl_vars['xoops_dirname']; ?>
">

			<!--<?php if ($this->_tpl_vars['xoBlocks']['canvas_top']): ?>
				<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/blockszone.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['xoBlocks']['canvas_top'],'zoneClass' => '','zoneId' => 'xo-canvas-header')));
 ?>
			<?php endif; ?>-->

			<table id="xo-canvas-columns">
			<tr>
				<?php if ($this->_tpl_vars['xoBlocks']['canvas_left']): ?>
					<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/blockszone.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['xoBlocks']['canvas_left'],'zoneClass' => 'xo-canvas-column','zoneId' => 'xo-canvas-leftcolumn','zoneTag' => 'td')));
 ?>
				<?php endif; ?>

				<td id="xo-page">				

				

					<?php if ($this->_tpl_vars['xoBlocks']['page_topleft'] || $this->_tpl_vars['xoBlocks']['page_topcenter'] || $this->_tpl_vars['xoBlocks']['page_topright']): ?>
						<div class="xo-blockszone-xo-<?php echo $this->_tpl_vars['theme_top_order']; ?>
pageblocks" id="xo-page-topblocks">
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'top','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_top_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 1) : substr($_tmp, 0, 1)))));
 ?>
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'top','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_top_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 1, 1) : substr($_tmp, 1, 1)))));
 ?>
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'top','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_top_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 2, 1) : substr($_tmp, 2, 1)))));
 ?>
						</div>
					<?php endif; ?>

					<?php if ($this->_tpl_vars['xoops_contents']): ?>
						<div id="xo-content">
							<?php echo $this->_tpl_vars['xoops_contents']; ?>

						</div>
					<?php endif; ?>

					<?php if ($this->_tpl_vars['xoBlocks']['page_bottomleft'] || $this->_tpl_vars['xoBlocks']['page_bottomcenter'] || $this->_tpl_vars['xoBlocks']['page_bottomright']): ?>
						<div class="xo-blockszone-xo-<?php echo $this->_tpl_vars['theme_bottom_order']; ?>
pageblocks" id="xo-page-bottomblocks">
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'bottom','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_bottom_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 0, 1) : substr($_tmp, 0, 1)))));
 ?>
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'bottom','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_bottom_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 1, 1) : substr($_tmp, 1, 1)))));
 ?>
							<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/centerblocks.html", 'smarty_include_vars' => array('topbottom' => 'bottom','lcr' => ((is_array($_tmp=$this->_tpl_vars['theme_bottom_order'])) ? $this->_run_mod_handler('substr', true, $_tmp, 2, 1) : substr($_tmp, 2, 1)))));
 ?>
						</div>
					<?php endif; ?>
				</td>

				<?php if ($this->_tpl_vars['xoBlocks']['canvas_right']): ?>
					<?php $this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['theme_name'])."/blockszone.html", 'smarty_include_vars' => array('blocks' => $this->_tpl_vars['xoBlocks']['canvas_right'],'zoneClass' => 'xo-canvas-column','zoneId' => 'xo-canvas-rightcolumn','zoneTag' => 'td')));
 ?>
				<?php endif; ?>
			</tr>
			</table>



			
		</div>


	</div> 
	<!--{xo-logger-output}-->
</div>



</body>
</html>