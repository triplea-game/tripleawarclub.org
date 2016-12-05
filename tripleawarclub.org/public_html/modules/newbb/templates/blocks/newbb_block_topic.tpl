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

<table class="outer" cellspacing="1">

    <{if $block.disp_mode == 0}>
        <tr>
            <th class="head" nowrap="nowrap"><{$smarty.const._MB_NEWBB_FORUM}></th>
            <th class="head" nowrap="nowrap"><{$smarty.const._MB_NEWBB_TITLE}></th>
            <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_RPLS}></th>
            <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_VIEWS}></th>
            <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_AUTHOR}></th>
        </tr>
        <{foreachq item=topic from=$block.topics}>
        <tr class="<{cycle values="even,odd"}>">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<{$topic.seo_forum_url}>"><{$topic.forum_name}></a></td>
            <td><a href="<{$topic.seo_topic_url}>"><{$topic.title}></a></td>
            <td align="center"><{$topic.replies}></td>
            <td align="center"><{$topic.views}></td>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right"><{$topic.time}><br/><{$topic.topic_poster}></td>
        </tr>
    <{/foreach}>

    <{elseif $block.disp_mode == 1}>
        <tr>
            <th class="head" nowrap="nowrap"><{$smarty.const._MB_NEWBB_TOPIC}></th>
            <th class="head" align="center" nowrap="nowrap"><{$smarty.const._MB_NEWBB_AUTHOR}></th>
        </tr>
        <{foreachq item=topic from=$block.topics}>
        <tr class="<{cycle values="even,odd"}>">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<{$topic.seo_topic_url}>"><{$topic.title}></a></td>
            <!-- irmtfan hardcode removed align="right" -->
            <td class="align_right"><{$topic.time}><br/><{$topic.topic_poster}></td>
        </tr>
    <{/foreach}>

    <{elseif $block.disp_mode == 2}>

        <{foreachq item=topic from=$block.topics}>
        <tr class="<{cycle values="even,odd"}>">
            <!-- irmtfan remove hardcoded html in URLs  -->
            <td><a href="<{$topic.seo_topic_url}>"><{$topic.title}></a></td>
        </tr>
    <{/foreach}>

    <{/if}>

</table>

<{if $block.indexNav}>
    <!-- irmtfan hardcode removed style="text-align:right; padding: 5px;" -->
    <div class="pagenav">
        <!-- irmtfan remove hardcoded html in URLs  -->
        <a href="<{$block.seo_top_alltopics}>"><{$smarty.const._MB_NEWBB_ALLTOPICS}></a> |
        <a href="<{$block.seo_top_allforums}>"><{$smarty.const._MB_NEWBB_VSTFRMS}></a>
    </div>
<{/if}>

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
	  
	</table> </div> </div> </div> <script type="text/javascript"> $("#forums > div > div").hide().first().show(); $("ul.forums a").click(
    function() {
        $("ul.forums a.selected").removeClass('selected');
        $("#forums > div > div").hide();
        $($(this).attr("href")).fadeIn('slow');
        $(this).addClass('selected');
        return false;
    }
);
</script>
