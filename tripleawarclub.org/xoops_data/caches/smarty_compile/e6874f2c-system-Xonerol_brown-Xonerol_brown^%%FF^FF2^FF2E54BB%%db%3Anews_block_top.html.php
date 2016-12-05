<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_block_top.html */ ?>
<?php if ($this->_tpl_vars['block']['displayview'] == 2): ?>		
<style type="text/css">
#fullSupport {
	padding: 1.5em;
	background: <?php echo $this->_tpl_vars['block']['color2']; ?>
;
	min-height: 300px;
}

<?php if ($this->_tpl_vars['block']['tabskin'] == 1): ?>			#tabNavigation {
	background: #F90;
	border-bottom: 1px solid #000;
	border-top: 1px solid #000;
	list-style: none outside none;
	color: inherit;
	margin: 0;
	padding: 0
}

html #tabNavigation/* */ {
	padding: 4px 0 4px 0
}

html>body #tabNavigation {
	margin: 0;
	padding: 4px 0 4px 0
}

#tabNavigation li {
	display: inline;
	line-height: 1em
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: <?php echo $this->_tpl_vars['block']['color4']; ?>
;
	border-bottom: 1px solid #000;
	border-right: 1px solid #000;
	color: #FFF;
	cursor: pointer;
	height: 1em;
	margin: -1px 0 -1px 0;
	padding: 3px 6px 3px 6px;
	text-decoration: none
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	border-bottom: none;
	height: auto;
	margin: 0
}

html>body #tabNavigation a, html>body #tabNavigation a:link, html>body #tabNavigation a:visited {
	border-bottom: none;
	padding: 4px 6px 4px 6px
}

\head+body #tabNavigation a, \head+body #tabNavigation a:link, \head+body #tabNavigation a:visited {
	padding: 3px 6px 3px 6px
}

#tabNavigation a:hover {
	background: <?php echo $this->_tpl_vars['block']['color5']; ?>
;
	color: inherit
}

#tabNavigation a:active {
	background: #CCC;
	border-right: 1px solid #000;
	color: inherit
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: <?php echo $this->_tpl_vars['block']['color3']; ?>
;
	border-bottom: none;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
	color: #000;
	cursor: text;
	padding: 3px 5px 4px 5px
}

html>body #tabNavigation .selectedTab a, html>body #tabNavigation .selectedTab a:link, html>body #tabNavigation .selectedTab a:visited {
	padding: 4px 5px 5px 5px
}

\head+body #tabNavigation .selectedTab a, \head+body #tabNavigation .selectedTab a:link, \head+body #tabNavigation .selectedTab a:visited, \head+body #tabNavigation .selectedTab a:hover {
	padding: 3px 5px 4px 5px
}

.fixTabsIE {
	visibility: hidden
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 2): ?>		#tabNavigation {
	border-bottom: 1px solid #000;
	list-style: none outside none;
	margin: 0;
	padding: 0
}

html #tabNavigation/* */ {
	padding: 4px 0 2px 0
}

html>body #tabNavigation {
	padding: 3px 0 1px 0
}

head+body #tabNavigation {
	padding: 4px 0 2px 0
}

#tabNavigation li {
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
	display: inline;
	height: 1em;
	margin: 0 0 0 3px;
	padding: 0;
	z-index: 1000
}

html #tabNavigation li/* */ {
	height: auto
}

html>body #tabNavigation li {
	height: auto;
	margin: 0 -5px 0 -3px;
	padding: 3px 5px 2px 5px
}

html>body ul[id]#tabNavigation li {
	margin: 0 0 0 3px;
	padding: 3px 0 2px 0
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: <?php echo $this->_tpl_vars['block']['color4']; ?>
;
	border-left: 1px solid #CCC;
	border-right: 1px solid #CCC;
	border-top: 1px solid #CCC;
	color: #FFF;
	height: 1em;
	padding: 2px 4px 2px 4px;
	text-decoration: none
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	height: auto
}

#tabNavigation a:hover {
	background: <?php echo $this->_tpl_vars['block']['color5']; ?>
;
	border-left: 1px solid #888;
	border-right: 1px solid #888;
	border-top: 1px solid #888;
	color: #FFF
}

#tabNavigation a:active {
	background: #C60;
	border-left: 1px solid #E80;
	border-right: 1px solid #E80;
	border-top: 1px solid #E80;
	color: #FFF
}

html>body #tabNavigation li.selectedTab {
	margin: 0 -5px 0 -3px;
	padding: 3px 5px 2px 5px
}

html>body ul[id]#tabNavigation li.selectedTab {
	margin: 0 0 0 3px;
	padding: 3px 0 2px 0
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: <?php echo $this->_tpl_vars['block']['color3']; ?>
;
	border-left: 1px solid #FC3;
	border-right: 1px solid #FC3;
	border-top: 1px solid #FC3;
	color: #FFF;
	margin: -2px 0 0 0;
	padding: 3px 4px 3px 4px;
	position: relative;
	top: 2px
}

html #tabNavigation .selectedTab a/* */, html #tabNavigation .selectedTab a:link/* */, html #tabNavigation .selectedTab a:visited/* */, html #tabNavigation .selectedTab a:hover/* */ {
	margin: -1px 0 0 0;
	top: 1px
}

html>body #tabNavigation .selectedTab a, html>body #tabNavigation .selectedTab a:link, html>body #tabNavigation .selectedTab a:visited, html>body #tabNavigation .selectedTab a:hover {
	padding: 2px 4px 2px 4px;
	top: 0
}

head:first-child+body #tabNavigation .selectedTab a, head:first-child+body #tabNavigation .selectedTab a:link, head:first-child+body #tabNavigation .selectedTab a:visited, head:first-child+body #tabNavigation .selectedTab a:hover {
	margin: -1px 0 0 0;
	padding: 2px 4px 4px 4px;
	top: 0
}

head:first-child+body ul[id]#tabNavigation .selectedTab a, head:first-child+body ul[id]#tabNavigation .selectedTab a:link, head:first-child+body ul[id]#tabNavigation .selectedTab a:visited, head:first-child+body ul[id]#tabNavigation .selectedTab a:hover {
	padding: 3px 4px 3px 4px;
	top: 1px
}

.fixTabsIE {
	visibility: hidden
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 3): ?>		ul, li {
	list-style: disc;
	margin: 0 10px 0 10px
}

#tabNavigation {
	background: #789;
	color: inherit;
	list-style: none outside none;
	margin: 0;
	padding: 0
}

html #tabNavigation/* */ {
	padding: 6px 0 6px 1px
}

html>body #tabNavigation {
	margin: 0;
	padding: 6px 0 6px 1px;
}

#tabNavigation li {
	display: inline;
	line-height: 1em;
	margin: 0;
	padding: 0
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselectedEnd.gif) <?php echo $this->_tpl_vars['block']['color4']; ?>
 no-repeat scroll top right;
	color: #FFF;
	cursor: pointer;
	height: 1em;
	padding: 5px 21px 5px 2px;
	text-decoration: none;
	z-index: 1000
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	height: auto;
	margin: 0;
	padding: 5px 21px 5px 2px
}

#tabNavigation a:hover {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselectedEnd.gif) <?php echo $this->_tpl_vars['block']['color5']; ?>
 no-repeat scroll top right;
	color: #FFF;
	text-decoration: underline
}

#tabNavigation a:active {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselectedEnd.gif) #789 no-repeat scroll top right;
	color: #567;
	text-decoration: none
}

#tabNavigation li.selectedTab {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selectedStart.gif) #FFF no-repeat scroll top left;
	color: inherit;
	margin: 0 0 0 -22px;
	padding: 0 0 0 23px
}

html>body #tabNavigation li.selectedTab {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selectedStart.gif) #FFF no-repeat scroll top left;
	color: inherit;
	margin: 0 0 0 -22px;
	padding: 5px 1px 5px 22px
}

html>body ul[id]#tabNavigation li.selectedTab {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selectedStart.gif) #FFF no-repeat scroll top left;
	color: inherit;
	margin: 0 0 0 -22px;
	padding: 5px 0 5px 23px
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selectedEnd.gif) no-repeat scroll top right;
	border-bottom: none;
	color: #000;
	cursor: text;
	padding: 5px 21px 5px 2px;
	text-decoration: none
}

html #tabNavigation .selectedTab a/* */, html #tabNavigation .selectedTab a:link/* */, html #tabNavigation .selectedTab a:visited/* */, html #tabNavigation .selectedTab a:hover/* */ {
	padding: 5px 21px 5px 1px
}

#tabNavigation .fixTabsIE a, #tabNavigation .fixTabsIE a:link, #tabNavigation .fixTabsIE a:visited, #tabNavigation .fixTabsIE a:hover {
	display: none;
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 4): ?>		#tabNavigation {
	border-bottom: 1px solid #C60;
	list-style: none outside none;
	margin: 0;
	padding: 0 0 0 20px
}

\html #tabNavigation/* */ {
	margin: 0;
	padding: 3px 0 3px 20px
}

html>body #tabNavigation {
	margin: 0;
	padding: 0 0 1px 20px
}

\head+body #tabNavigation {
	padding: 0 0 3px 20px
}

html>body ul[id] #tabNavigation {
	padding: 0 0 0 20px
}

#tabNavigation li,  #subNavigation li {
	display: inline;
	list-style: none outside none
}

#tabNavigation .preloadUnselected {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected.gif);
}

#tabNavigation .preloadSelected {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected.gif);
}

#tabNavigation .preloadHover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
hover.gif);
}

#tabNavigation .preloadActive {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
active.gif);
}

html>body #tabNavigation li {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected.gif) no-repeat top left;
	border-right: 1px solid #666;
	display: block;
	float: left;
	height: 1em;
	margin: 3px 5px 3px -15px;
	padding: 3px 5px 5px 27px
}

head:first-child+body #tabNavigation li {
	background: none;
	border-right: none;
	display: inline;
	float: none;
	margin: 0;
	padding: 0
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected.gif) no-repeat top left;
	border-right: 1px solid #666;
	color: #FFF;
	display: inline;
	height: 1em;
	margin: 0 0 0 -15px;
	padding: 3px 5px 3px 27px;
	text-decoration: none
}

html>body #tabNavigation a, html>body #tabNavigation a:link, html>body #tabNavigation a:visited {
	border-right: none;
	margin: 0;
	padding: 0
}

head:first-child+body #tabNavigation a, head:first-child+body #tabNavigation a:link, head:first-child+body #tabNavigation a:visited {
	border-right: 1px solid #666;
	margin: 0 0 0 -15px;
	padding: 3px 5px 3px 27px;
	position: relative;
	z-index: 50
}

#tabNavigation a:hover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
hover.gif) no-repeat top left;
	border-right: 1px solid #333;
	color: #FFF;
	text-decoration: none
}

html>body #tabNavigation a:hover {
	border-right: none;
	text-decoration: underline
}

head:first-child+body #tabNavigation a:hover {
	border-right: 1px solid #333;
	padding: 4px 5px 3px 27px;
	position: relative;
	text-decoration: none;
	z-index: 5000
}

#tabNavigation a:active {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
active.gif) no-repeat top left;
	color: #FFF;
	text-decoration: none
}

html>body #tabNavigation a:active {
	text-decoration: underline
}

head:first-child+body #tabNavigation a:active {
	text-decoration: none
}

html>body #tabNavigation li.selectedTab {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected.gif) no-repeat top left;
	border-right: 1px solid #C60;
	display: block;
	float: left;
	height: 1em;
	margin: 3px 5px 5px -15px;
	padding: 3px 5px 5px 27px
}

head:first-child+body #tabNavigation li.selectedTab {
	background: none;
	border-right: none;
	display: inline;
	float: none;
	margin: 0;
	padding: 0
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected.gif) no-repeat top left;
	border-right: 1px solid #C60;
	color: #FFF;
	cursor: text;
	display: inline;
	height: 1em;
	margin: 0 0 0 -15px;
	padding: 3px 5px 3px 27px
}

html>body #tabNavigation .selectedTab a, html>body #tabNavigation .selectedTab a:link, html>body #tabNavigation .selectedTab a:visited {
	border-right: none;
	margin: 0;
	padding: 0
}

head:first-child+body #tabNavigation .selectedTab a, head:first-child+body #tabNavigation .selectedTab a:link, head:first-child+body #tabNavigation .selectedTab a:visited, head:first-child+body #tabNavigation .selectedTab a:hover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected.gif) no-repeat top left;
	border-right: 1px solid #C60;
	margin: 0 0 0 -15px;
	padding: 3px 5px 3px 27px;
	position: relative;
	z-index: 10000
}

\html head:first-child+body #tabNavigation .selectedTab a, \html head:first-child+body #tabNavigation .selectedTab a:link, \html head:first-child+body #tabNavigation .selectedTab a:visited, \html head:first-child+body #tabNavigation .selectedTab a:hover {
	padding: 4px 5px 5px 27px
}

.fixTabsIE {
	visibility: hidden
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 5): ?>		#tabNavigation {
	background: #CCC;
	border-bottom: 1px solid #999;
	border-top: 1px solid #FFF;
	color: inherit;
	list-style: none outside none;
	margin: 0;
	padding: 0;
}

html #tabNavigation/* */ {
	padding: 4px 0 4px 0
}

html>body #tabNavigation {
	margin: 0;
	padding: 4px 0 4px 0
}

#tabNavigation li {
	display: inline;
	line-height: 1em
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: inherit;
	border-bottom: 1px solid #999;
	border-left: 1px solid #FFF;
	border-right: 1px solid #999;
	border-top: 1px solid #FFF;
	color: #000;
	cursor: pointer;
	height: 1em;
	margin: -1px 0 -1px 0;
	padding: 3px 6px 3px 6px;
	text-decoration: none;
	white-space: normal;
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	height: auto;
	margin: 0
}

html>body #tabNavigation a, html>body #tabNavigation a:link, html>body #tabNavigation a:visited {
	padding: 4px 6px 4px 6px
}

\head+body #tabNavigation a, \head+body #tabNavigation a:link, \head+body #tabNavigation a:visited {
	padding: 3px 6px 3px 6px
}

#tabNavigation a:hover {
	background: <?php echo $this->_tpl_vars['block']['color5']; ?>
;
	border-bottom: 1px solid #666;
	border-left: 1px solid #CCC;
	border-right: 1px solid #666;
	border-top: 1px solid #CCC;
	color: inherit
}

#tabNavigation a:active {
	background: #CCC;
	border-bottom: 1px solid #FFF;
	border-left: 1px solid #999;
	border-right: 1px solid #FFF;
	border-top: 1px solid #999;
	color: inherit
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: <?php echo $this->_tpl_vars['block']['color3']; ?>
;
	border-bottom: 1px solid #999;
	border-left: 1px solid #FFF;
	border-right: 1px solid #999;
	border-top: 1px solid #FFF;
	color: #000;
	cursor: text;
	font-weight: bold
}

#tabNavigation .fixTabsIE a, #tabNavigation .fixTabsIE a:link, #tabNavigation .fixTabsIE a:visited {
	visibility: hidden
}

html #tabNavigation .fixTabsIE a/* */, html #tabNavigation .fixTabsIE a:link/* */, html #tabNavigation .fixTabsIE a:visited/* */ {
	background: #CCC;
	border-bottom: none;
	border-left: 1px solid #FFF;
	border-right: none;
	border-top: none;
	color: inherit;
	cursor: text;
	margin: 0;
	padding: 3px 6px 3px 6px;
	visibility: visible
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 6): ?>		#tabNavigation {
	border-bottom: 1px solid #000;
	font: normal 11px Verdana, Geneva, Arial, Helvetica, sans-serif;
	margin: 0;
	padding: 0 0 18px 0;
}

ul#tabNavigation li {
	display: inline;
	list-style-image: none;
	list-style-position: outside;
	list-style-type: none;
}

ul#tabNavigation a, ul#tabNavigation a:link, ul#tabNavigation a:visited {
	background: <?php echo $this->_tpl_vars['block']['color4']; ?>
;
	border: 1px solid #000;
	color: #000;
	float: left;
	margin: 0 0 0 5px;
	padding: 2px 6px 2px 6px;
	text-decoration: none
}

ul#tabNavigation a:hover, ul#tabNavigation a:focus {
	background: <?php echo $this->_tpl_vars['block']['color5']; ?>
;
	color: #FFF;
}

ul#tabNavigation a:active {
	background: #FFF;
	border-bottom: none;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
	color: #00F;
	padding: 2px 6px 3px 6px
}

ul#tabNavigation li.selectedTab a, ul#tabNavigation li.selectedTab a:link, ul#tabNavigation li.selectedTab a:visited {
	background: <?php echo $this->_tpl_vars['block']['color3']; ?>
;
	border-bottom: none;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
	color: #000;
	cursor: text;
	margin: 0 0 0 5px;
	padding: 2px 6px 3px 6px
}

ul#tabNavigation li.fixTabsIE {
	display: none;
	visibility: hidden
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 7): ?>		#tabNavigation {
	background: #FFF;
	border-bottom: 1px solid #000;
	color: inherit;
	list-style: none outside none;
	margin: 1px 0 0 0;
	padding: 0;
}

html #tabNavigation/* */ {
	padding: 4px 0 4px 0
}

html>body #tabNavigation {
	margin: 0;
	padding: 4px 0 4px 0
}

#tabNavigation li {
	background: url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected_left.gif) #C60 no-repeat scroll top left;
	color: inherit;
	display: inline;
	line-height: 1em;
	margin: 0 0 0 2px;
	padding: 0
}

html>body #tabNavigation li {
	margin: 0 0 0 -6px;
	padding: 3px 0 3px 8px
}

html>body ul[id]#tabNavigation li {
	margin: 0 0 0 2px;
	padding: 3px 0 3px 0
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected_right.gif) no-repeat scroll top right;
	border-bottom: 1px solid #000;
	color: #FFF;
	cursor: pointer;
	height: 1em;
	margin: -1px 0 -1px 0;
	padding: 3px 8px 3px 8px;
	text-decoration: none
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	border-bottom: none;
	height: auto;
	margin: 0 0 0 4px;
	padding: 3px 8px 3px 4px
}

#tabNavigation a:hover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected_right.gif) no-repeat scroll top right;
	color: #FFF;
	text-decoration: underline
}

#tabNavigation a:active {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
unselected_right.gif) no-repeat scroll top right;
	color: #000;
	text-decoration: underline
}

#tabNavigation li.selectedTab {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected_left_F90.gif) no-repeat scroll top left;
	color: inherit;
	padding: 0
}

html>body #tabNavigation li.selectedTab {
	margin: 0 0 0 -6px;
	padding: 4px 0 4px 8px
}

html>body ul[id]#tabNavigation li.selectedTab {
	margin: 0 0 0 2px;
	padding: 4px 0 4px 0
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: transparent url(<?php echo $this->_tpl_vars['block']['imagesurl']; ?>
selected_right_F90.gif) no-repeat scroll top right;
	border-bottom: none;
	color: #000;
	cursor: text;
	padding: 4px 8px 4px 8px;
	text-decoration: none
}

html #tabNavigation .selectedTab a/* */, html #tabNavigation .selectedTab a:link/* */, html #tabNavigation .selectedTab a:visited/* */, html #tabNavigation .selectedTab a:hover/* */ {
	padding: 4px 8px 4px 4px
}

.fixTabsIE {
	visibility: hidden
}
<?php elseif ($this->_tpl_vars['block']['tabskin'] == 8): ?>		#tabNavigation {
	list-style: none outside none;
	margin: 0;
	padding: 4px 0 3px 0
}

@media all {
	#tabNavigation {
		text-align: center
	}
}

#tabNavigation li {
	background: #000;
	display: inline;
	line-height: 1em;
	margin: 0 4px 0 4px;
	padding: 0;
	position: relative;
	top: 10px
}

html #tabNavigation li/* */ {
	line-height: 1.2em;
	top: 6px
}

html>body #tabNavigation li {
	margin: 0 2px 0 4px;
	padding: 4px 0 4px 0
}

#tabNavigation a, #tabNavigation a:link, #tabNavigation a:visited {
	background: <?php echo $this->_tpl_vars['block']['color4']; ?>
;
	border: 1px solid #FFF;
	bottom: 2px;
	color: #FFF;
	cursor: pointer;
	display: inline;
	height: 1em;
	margin: 0 4px 0 0;
	padding: 3px 5px 3px 5px;
	position: relative;
	right: 2px;
	text-decoration: none
}

html #tabNavigation a/* */, html #tabNavigation a:link/* */, html #tabNavigation a:visited/* */ {
	height: auto;
	margin: 0 -4px 0 0
}

html>body #tabNavigation a, html>body #tabNavigation a:link, html>body #tabNavigation a:visited {
	margin: 0
}

#tabNavigation a:hover {
	background: <?php echo $this->_tpl_vars['block']['color5']; ?>
;
	border: 1px solid #FFF;
	bottom: 1px;
	color: #FFF;
	padding: 3px 5px 3px 5px;
	position: relative;
	right: 1px
}

#tabNavigation a:active {
	background: #666;
	border: 1px solid #FFF;
	bottom: 0;
	color: #FFF;
	padding: 3px 5px 3px 5px;
	position: relative;
	right: 0
}

#tabNavigation li.selectedTab {
	background: <?php echo $this->_tpl_vars['block']['color3']; ?>
;
	display: inline;
	margin: 0 4px 0 4px;
	position: relative;
	top: 4px
}

#tabNavigation .selectedTab a, #tabNavigation .selectedTab a:link, #tabNavigation .selectedTab a:visited, #tabNavigation .selectedTab a:hover {
	background: #F90;
	border-bottom: none;
	border-left: 1px solid #000;
	border-right: 1px solid #000;
	border-top: 1px solid #000;
	bottom: 0;
	color: #FFF;
	cursor: text;
	margin: 0 5px 0 0;
	padding: 3px 5px 0 5px;
	position: relative;
	right: 0
}

html #tabNavigation .selectedTab a/* */, html #tabNavigation .selectedTab a:link/* */, html #tabNavigation .selectedTab a:visited/* */, html #tabNavigation .selectedTab a:hover/* */ {
	margin: 0 -2px 0 0
}

.fixTabsIE {
	visibility: hidden
}
<?php endif; ?>
</style>
	<ul id="tabNavigation">
<?php $_from = $this->_tpl_vars['block']['tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onetab']):
?>
	<?php if ($this->_tpl_vars['block']['current_tab'] == $this->_tpl_vars['onetab']['id']): ?>
	<li class="selectedTab"><a href='#'><?php echo $this->_tpl_vars['onetab']['title']; ?>
</a></li>
	<?php else: ?>
	<li><a href="<?php echo $this->_tpl_vars['block']['url']; ?>
NewsTab=<?php echo $this->_tpl_vars['onetab']['id']; ?>
"><?php echo $this->_tpl_vars['onetab']['title']; ?>
</a></li>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
	<li class="fixTabsIE"><a href="javascript:void(0);">&nbsp;</a></li>
</ul>

<?php if ($this->_tpl_vars['block']['current_is_spotlight']): ?>
	<div style="border-top: 1px solid rgb(0, 0, 0); background: <?php echo $this->_tpl_vars['block']['color1']; ?>
 none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;"><?php echo $this->_tpl_vars['block']['spotlight']['author']; ?>
 <?php echo $this->_tpl_vars['block']['lang_on']; ?>
 <?php echo $this->_tpl_vars['block']['spotlight']['date']; ?>
 <?php if ($this->_tpl_vars['block']['use_rating']): ?> - <?php echo $this->_tpl_vars['block']['spotlight']['rating']; ?>
/10 (<?php echo $this->_tpl_vars['block']['spotlight']['number_votes']; ?>
)<?php endif; ?>, <?php echo $this->_tpl_vars['block']['spotlight']['hits']; ?>
 <?php echo $this->_tpl_vars['block']['lang_reads']; ?>
<br /></div>
<?php else: ?>
	<div style="border-top: 1px solid rgb(0, 0, 0); background: <?php echo $this->_tpl_vars['block']['color1']; ?>
 none repeat scroll 0%; -moz-background-clip: initial; -moz-background-origin: initial; -moz-background-inline-policy: initial;">
	<?php $_from = $this->_tpl_vars['block']['smallheader']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onesummary']):
?>
		<?php echo $this->_tpl_vars['onesummary']; ?>
&nbsp;
	<?php endforeach; endif; unset($_from); ?>
	<br /></div>
<?php endif; ?>
	<div id="fullSupport">
	<?php if ($this->_tpl_vars['block']['current_is_spotlight'] && $this->_tpl_vars['block']['tabs']['id'] == 0): ?>
		<table border='0'>
		<tr>
			<td colspan='2'>
				<table border='0'>
				<tr><td><img src='<?php echo $this->_tpl_vars['block']['spotlight']['topic_image']; ?>
' border='0' alt='' /></td><td align='left'><?php echo $this->_tpl_vars['block']['spotlight']['topic_description']; ?>
</td></tr>
				</table>
			<div class="itemBody"><ul><li><?php echo $this->_tpl_vars['block']['spotlight']['title_with_link']; ?>
</li></ul></div></td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['block']['spotlight']['image']; ?>
&nbsp;</td><td><p class="note"><?php echo $this->_tpl_vars['block']['spotlight']['text']; ?>
</p></td>
		</tr>
		</table>
		<br /><center><hr width='85%' /></center>
		<ul>
			<?php $_from = $this->_tpl_vars['block']['spotlight']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onenews']):
?>
				<li><?php echo $this->_tpl_vars['onenews']['date']; ?>
 - <?php echo $this->_tpl_vars['onenews']['title_with_link']; ?>
</li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	<?php else: ?>
		<table border='0'>
		<tr><td><img src='<?php echo $this->_tpl_vars['block']['topic_image']; ?>
' border='0' alt='' /></td><td align='left'><?php echo $this->_tpl_vars['block']['topic_description']; ?>
</td></tr>
		</table>
		<?php $_from = $this->_tpl_vars['block']['news']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['onenews']):
?>
			<div class="itemBody"><ul><li><?php echo $this->_tpl_vars['onenews']['title']; ?>
</li></ul><span class="itemStats">&nbsp;&nbsp;<?php echo $this->_tpl_vars['onenews']['author']; ?>
 <?php echo $this->_tpl_vars['block']['lang_on']; ?>
 <?php echo $this->_tpl_vars['onenews']['date']; ?>
 - <?php if ($this->_tpl_vars['block']['use_rating']): ?> <?php echo $this->_tpl_vars['onenews']['rating']; ?>
/10 (<?php echo $this->_tpl_vars['onenews']['number_votes']; ?>
)<?php endif; ?>, <?php echo $this->_tpl_vars['onenews']['hits']; ?>
 <?php echo $this->_tpl_vars['block']['lang_reads']; ?>
</span></div>
			<p class="note"><?php echo $this->_tpl_vars['onenews']['text']; ?>
</p>
		<?php endforeach; endif; unset($_from); ?>
	<?php endif; ?>
</div>
<?php else: ?>	<table>
	<?php if ($this->_tpl_vars['block']['spotlight']): ?>
	<tr>
		<td><table>
		<tr>
			<td colspan='2'>
				<table border='0'>
				<tr><td><img src='<?php echo $this->_tpl_vars['block']['spotlight']['topic_image']; ?>
' border='0' alt='<?php echo $this->_tpl_vars['block']['spotlight']['title']; ?>
' /></td><td align='left'><?php echo $this->_tpl_vars['block']['spotlight']['topic_description']; ?>
</td></tr>
				</table>
				<font color="#FF6600"><b><?php echo $this->_tpl_vars['block']['spotlight']['title']; ?>
</b></font> <?php echo $this->_tpl_vars['block']['spotlight']['author']; ?>

			<?php if ($this->_tpl_vars['block']['sort'] == 'counter'): ?>
				(<?php echo $this->_tpl_vars['block']['spotlight']['hits']; ?>
)
			<?php elseif ($this->_tpl_vars['block']['sort'] == 'published'): ?>
				(<?php echo $this->_tpl_vars['block']['spotlight']['date']; ?>
)
			<?php else: ?>
				(<?php echo $this->_tpl_vars['block']['spotlight']['rating']; ?>
)
			<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['block']['spotlight']['image']; ?>
</td><td><?php echo $this->_tpl_vars['block']['spotlight']['text']; ?>
</td>
		</tr>
		<tr>
			<td colspan='2'>
			<?php if ($this->_tpl_vars['block']['spotlight']['read_more']): ?>
				<hr width='98%' />
				<div align='right'><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['block']['spotlight']['id']; ?>
"><?php echo $this->_tpl_vars['block']['lang_read_more']; ?>
</a> &nbsp;&nbsp;&nbsp;</div>
				<hr width='98%' />
			<?php endif; ?>
			</td>
		</tr>
		</table></td>
	</tr>
	<?php endif; ?>
	<tr>
		<td>
			<ul>
				<?php $_from = $this->_tpl_vars['block']['stories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['news']):
?>
					<?php if ($this->_tpl_vars['news']['id'] != $this->_tpl_vars['block']['spotlight']['id']): ?>
						<li>
						<h2>
						   <span>
							<?php if ($this->_tpl_vars['block']['sort'] == 'counter'): ?>
								[<?php echo $this->_tpl_vars['news']['hits']; ?>
]
							<?php elseif ($this->_tpl_vars['block']['sort'] == 'published'): ?>
								[<?php echo $this->_tpl_vars['news']['date']; ?>
]
							<?php else: ?>
								[<?php echo $this->_tpl_vars['news']['rating']; ?>
]
							<?php endif; ?>
							</span>
							<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['news']['id']; ?>
" <?php echo $this->_tpl_vars['news']['infotips']; ?>
><?php echo $this->_tpl_vars['news']['title']; ?>
</a>
						</h2>
						<?php if ($this->_tpl_vars['news']['teaser']): ?><p><?php echo $this->_tpl_vars['news']['teaser']; ?>
</p><?php endif; ?>
						</li>
					<?php endif; ?>
				<?php endforeach; endif; unset($_from); ?>
			</ul>
		</td>
	</tr>
</table>
<?php endif; ?>