<?php /* Smarty version 2.6.28, created on 2016-02-14 17:31:02
         compiled from Xonerol_brown/xotpl/xometas.html */ ?>
<!-- title and metas -->
<title><?php if ($this->_tpl_vars['xoops_pagetitle'] != ''): ?><?php echo $this->_tpl_vars['xoops_pagetitle']; ?>
 : <?php endif; ?><?php echo $this->_tpl_vars['xoops_sitename']; ?>
</title>
<meta http-equiv="content-type" content="text/html; charset=<?php echo $this->_tpl_vars['xoops_charset']; ?>
" />
<meta name="robots" content="<?php echo $this->_tpl_vars['xoops_meta_robots']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['xoops_meta_keywords']; ?>
" />
<meta name="description" content="<?php echo $this->_tpl_vars['xoops_meta_description']; ?>
" />
<meta name="rating" content="<?php echo $this->_tpl_vars['xoops_meta_rating']; ?>
" />
<meta name="author" content="CB"/>
<meta name="copyright" content="<?php echo $this->_tpl_vars['xoops_meta_copyright']; ?>
" />
<meta name="generator" content="Bluefish 1.0.7"/>
<?php if ($this->_tpl_vars['url']): ?>
	<meta http-equiv="Refresh" content="<?php echo $this->_tpl_vars['time']; ?>
; url=<?php echo $this->_tpl_vars['url']; ?>
" />
<?php endif; ?>

<!-- Force MSIE swithout  javascript actived to take the default theme. not conforms to the standards but functional -->
<?php if ($this->_tpl_vars['isMsie']): ?>
	<noscript>
	<meta http-equiv="refresh" content="0; url=<?php echo htmlspecialchars($xoops->buildUrl($_SERVER['REQUEST_URI'], array(
'xoops_theme_select' => 'default',
))); ?>" />
	</noscript>
<?php endif; ?>

<!-- path for rss -->
<link rel="alternate" type="application/rss+xml" title="<?php echo @THEME_RSS; ?>
" href="<?php echo 'http://www.tripleawarclub.org/backend.php'; ?>" />

<!-- path favicon -->
<link rel="shortcut icon" type="image/ico" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/icons/favicon.ico'; ?>" />
<link rel="icon" type="image/png" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/icons/favicon.png'; ?>" />

<!-- include xoops.js and others via header.php -->
<?php echo $this->_tpl_vars['xoops_module_header']; ?>


<!-- Xoops style sheet -->
<link rel="stylesheet" type="text/css" media="screen" href="<?php echo 'http://www.tripleawarclub.org/xoops.css'; ?>" />

<!-- Theme style sheets -->
<link rel="stylesheet" type="text/css" media="screen,projection,print" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/layout-soup.css'; ?>" /><!-- canvas theme style sheet -->
<link rel="stylesheet" type="text/css" media="screen" title="Color" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/style.css'; ?>" />
<link rel="stylesheet" type="text/css" media="print" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/print.css'; ?>" />  <!-- print style sheet experimental -->
<!--<link rel="stylesheet" type="text/css" media="aural" href="<?php 
echo 'http://www.tripleawarclub.org/aural.css'; ?>" />-->  <!-- audio style sheet -->

<link rel="stylesheet" type="text/css" media="screen" title="accordion" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/accordion.css'; ?>" />

<!-- New homepage styles -->
<link rel="stylesheet" type="text/css" media="screen" title="Color" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/homepage.css'; ?>" />
<link rel="stylesheet" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/tabs/screen.css'; ?>" type="text/css" media="screen" />

<!-- Ladder jQuery Accordion Menu styles -->
<link rel="stylesheet" href="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/css/jquery-menu.css'; ?>" type="text/css" />

	<!--[if lt IE 9]>
   <style type="text/css">
   li a {display:inline-block;}
   li a {display:block;}
   </style>
   <![endif]-->