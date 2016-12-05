<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:35
         compiled from db:newbb_block.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:newbb_block.html', 34, false),array('modifier', 'truncate', 'db:newbb_block.html', 37, false),array('modifier', 'replace', 'db:newbb_block.html', 43, false),)), $this); ?>
<div id="forums">
    
    <div id="box">

<table>
<tr><td>
<h2 class="boxHeader"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/">Forums &raquo;</a></h2>
</td><td align="right">
<form action="http://www.tripleawarclub.org/modules/newbb/search.php" method="post" name="search" id="search">
<input name="term" id="term" type="text" value="Search Forums.." onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Search Forums..':this.value;"/>
<input type="hidden" name="forum" id="forum" value="all" />
<input type="hidden" name="sortby" id="sortby" value="p.post_time desc" />
<input type="hidden" name="searchin" id="searchin" value="both" />
<input type="image" src="<?php 
echo 'http://www.tripleawarclub.org/themes/Xonerol_brown/img/page_white_find.png'; ?>" name="submit" value="submit" style="vertical-align:middle;"/>
</form>
</td></tr></table>
<ul id="tabs" class='forums'>
	<li><a href='#latestposts' class='selected'>Latest Activity</a></li>
	<li><a href='#forumslist'>Forums List</a></li>
</ul>

<div id="latestposts">
	<table>
	
	  <tr>
	    <th class="head left first" nowrap="nowrap"><?php echo @_MB_NEWBB_TOPIC; ?>
</th>
	    <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_RPLS; ?>
</th>
	    <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_VIEWS; ?>
</th>
	    <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_LPOST; ?>
</th>
	    <th class="head" nowrap="nowrap"><?php echo @_MB_NEWBB_FORUM; ?>
</th>
	  </tr>
	
	  <?php $_from = $this->_tpl_vars['block']['topics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['topic']):
?>
	  <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
	    
	    <td class="left first"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic']['id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['topic']['forum_id']; ?>
" class="title">
			<?php echo ((is_array($_tmp=$this->_tpl_vars['topic']['title'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 24, "...") : smarty_modifier_truncate($_tmp, 24, "...")); ?>
</a><br/>by <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/userinfo.php?uid=<?php echo $this->_tpl_vars['topic']['topic_poster_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['topic']['topic_poster'])) ? $this->_run_mod_handler('truncate', true, $_tmp, 12) : smarty_modifier_truncate($_tmp, 12)); ?>
</a></td>
	    <td align="center"><?php echo $this->_tpl_vars['topic']['replies']; ?>
</td>
	    <td align="center"><?php echo $this->_tpl_vars['topic']['views']; ?>
</td>
	    <td align="center" class="last_poster">
	    <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewtopic.php?topic_id=<?php echo $this->_tpl_vars['topic']['id']; ?>
&amp;forum=<?php echo $this->_tpl_vars['topic']['forum_id']; ?>
&amp;post_id=<?php echo $this->_tpl_vars['topic']['post_id']; ?>
#forumpost<?php echo $this->_tpl_vars['topic']['post_id']; ?>
" class="title"><?php echo $this->_tpl_vars['topic']['time']; ?>
</a>
	    <br />by <?php echo $this->_tpl_vars['topic']['last_poster']; ?>
</td>
	    <td class="last"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewforum.php?forum=<?php echo $this->_tpl_vars['topic']['forum_id']; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['topic']['forum_name'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Tournament of Champions', 'ToC') : smarty_modifier_replace($_tmp, 'Tournament of Champions', 'ToC')); ?>
</a></td>
	  </tr>
	  <?php endforeach; endif; unset($_from); ?>
	  
	</table>
</div>

<div id="forumslist">
	<table>
	
	  <tr>
	    <th class="head" nowrap="nowrap"></th>
	    <th class="head left first" nowrap="nowrap"><?php echo @_MB_NEWBB_FORUM; ?>
</th>
	    <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_TOPICS; ?>
</th>
	    <th class="head" align="center" nowrap="nowrap"><?php echo @_MB_NEWBB_RPLS; ?>
</th>
	  </tr>
	
	  <?php $_from = $this->_tpl_vars['block']['forums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['forum']):
?>
	  <tr class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
">
	  	 <td><span class="cat">[<?php echo $this->_tpl_vars['forum']['cat_name']; ?>
]</span></td>
	    <td class="left first"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewforum.php?forum=<?php echo $this->_tpl_vars['forum']['forum_id']; ?>
"><?php echo $this->_tpl_vars['forum']['forum_name']; ?>
</a></td>
	    <td align="center"><?php echo $this->_tpl_vars['forum']['forum_topics']; ?>
</td>
	    <td align="center"><?php echo $this->_tpl_vars['forum']['forum_posts']; ?>
</td>
	  </tr>
	  <?php endforeach; endif; unset($_from); ?>
	  
	</table>
</div>
</div>
</div>
<script type="text/javascript">
$("#forums > div > div").hide().first().show();

$("ul.forums a").click(
    function() {
        $("ul.forums a.selected").removeClass('selected');
        $("#forums > div > div").hide();
        $($(this).attr("href")).fadeIn('slow');
        $(this).addClass('selected');
        return false;
    }
);
$('td.last_poster').each(function(){
var last_poster_name = $('a:last',this).text();
if(last_poster_name.length>12){
last_poster_name = last_poster_name.substring(0,8)+"...";
$('a:last',this).text(last_poster_name);
}
});
</script>