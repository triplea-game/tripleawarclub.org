<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:13
         compiled from db:news_ratenews.html */ ?>
<div class="news-rate">
	<hr size="1" noshade="noshade" />
   <div class="news-rate-desc">
	   <h3><?php echo $this->_tpl_vars['news']['title']; ?>
</h3>
		<ul>
			<li><?php echo $this->_tpl_vars['lang_voteonce']; ?>
</li>
			<li><?php echo $this->_tpl_vars['lang_ratingscale']; ?>
</li>
			<li><?php echo $this->_tpl_vars['lang_beobjective']; ?>
</li>
			<li><?php echo $this->_tpl_vars['lang_donotvote']; ?>
</li>
		</ul>
   </div>
   <div class="news-rate-form">
   	<form method="post" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/ratenews.php">
			<input type="hidden" name="storyid" value="<?php echo $this->_tpl_vars['news']['storyid']; ?>
" />
			<select name="rating"><option>--</option><option>10</option><option>9</option><option>8</option><option>7</option><option>6</option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select>&nbsp;&nbsp;
	      <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['lang_rateit']; ?>
" /> <input type='button' value="<?php echo $this->_tpl_vars['lang_cancel']; ?>
" onclick="location='<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/news/article.php?storyid=<?php echo $this->_tpl_vars['news']['storyid']; ?>
'" />
      </form>
   </div>
</div>