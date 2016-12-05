<div id="forums">
    
    <div id="box">

<table>
<tr><td>
<h2 class="boxHeader"><a href="<{$xoops_url}>/modules/newbb/">Forums &raquo;</a></h2>
</td><td align="right">
<form action="http://www.tripleawarclub.org/modules/newbb/search.php" method="post" name="search" id="search">
<input name="term" id="term" type="text" value="Search Forums.." onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Search Forums..':this.value;"/>
<input type="hidden" name="forum" id="forum" value="all" />
<input type="hidden" name="sortby" id="sortby" value="p.post_time desc" />
<input type="hidden" name="searchin" id="searchin" value="both" />
<input type="image" src="<{xoImgUrl img/page_white_find.png}>" name="submit" value="submit" style="vertical-align:middle;"/>
</form>
</td></tr></table>
<ul id="tabs" class='forums'>
	<li><a href='#latestposts' class='selected'>Latest Activity</a></li>
	<li><a href='#forumslist'>Forums List</a></li>
</ul>

<div id="latestposts">
	<table>
	
	  <tr>
	    <th class="head left first" nowrap="nowrap"><{$smarty.const._MB_NEWBB_TOPIC}></th>
	    <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_RPLS}></th>
	    <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_VIEWS}></th>
	    <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_LPOST}></th>
	    <th class="head" nowrap="nowrap"><{$smarty.const._MB_NEWBB_FORUM}></th>
	  </tr>
	
	  <{foreach item=topic from=$block.topics}>
	  <tr class="<{cycle values="even,odd"}>">
	    
	    <td class="left first"><a href="<{$xoops_url}>/modules/newbb/viewtopic.php?topic_id=<{$topic.id}>&amp;forum=<{$topic.forum_id}>">
			<{$topic.title|truncate:24:"..."}></a><br/>by <a href="<{$xoops_url}>/userinfo.php?uid=<{$topic.topic_poster_id}>" class="user"><{$topic.topic_poster|truncate:12}></a></td>
	    <td align="center"><{$topic.replies}></td>
	    <td align="center"><{$topic.views}></td>
	    <td align="center">
	    <a href="<{$xoops_url}>/modules/newbb/viewtopic.php?topic_id=<{$topic.id}>&amp;forum=<{$topic.forum_id}>&amp;post_id=<{$topic.post_id}>#forumpost<{$topic.last_post_id}>"><{$topic.time}></a>
	    <br />by <a href="<{$xoops_url}>userinfo.php?uid=<{$topic.last_poster_id}>" class="user"><{$topic.last_poster}></a></td>
	    <td class="last"><a href="<{$xoops_url}>/modules/newbb/viewforum.php?forum=<{$topic.forum_id}>"><{$topic.forum_name|replace:'Tournament of Champions':'ToC'}></a></td>
	  </tr>
	  <{/foreach}>
	  
	</table>
</div>

<div id="forumslist">
	<table>
	
	  <tr>
	    <th class="head" nowrap="nowrap"></th>
	    <th class="head left first" nowrap="nowrap"><{$smarty.const._MB_NEWBB_FORUM}></th>
	    <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_TOPICS}></th>
	    <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_RPLS}></th>
	  </tr>
	
	  <{foreach item=forum from=$block.forums}>
	  <tr class="<{cycle values="even,odd"}>">
	  	 <td><span class="cat">[<{$forum.cat_name}>]</span></td>
	    <td class="left first"><a href="<{$xoops_url}>/modules/newbb/viewforum.php?forum=<{$forum.forum_id}>"><{$forum.forum_name}></a></td>
	    <td align="center"><{$forum.forum_topics}></td>
	    <td align="center"><{$forum.forum_posts}></td>
	  </tr>
	  <{/foreach}>
	  
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
</script>
