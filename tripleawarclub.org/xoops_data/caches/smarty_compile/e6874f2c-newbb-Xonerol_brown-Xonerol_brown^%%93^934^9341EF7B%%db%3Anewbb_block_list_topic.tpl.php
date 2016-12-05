<?php /* Smarty version 2.6.28, created on 2016-10-14 14:49:31
         compiled from db:newbb_block_list_topic.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:newbb_block_list_topic.tpl', 44, false),)), $this); ?>
<!-- a new block template for newbb -->
<!-- all classes can be found in xoops.css -->
<!-- define your desired width here -->
<?php $this->assign('minwidth', 200); ?> <!-- minimum block minwidth property -->
<?php $this->assign('topicwidth', 100); ?> <!-- maximum topic width property -->

<?php if ($this->_tpl_vars['block']['headers']['forum']): ?>
    <?php $this->assign('minwidth', $this->_tpl_vars['minwidth']+50); ?>
    <?php $this->assign('topicwidth', $this->_tpl_vars['topicwidth']-20); ?>
    <?php $this->assign('block_forum', 'width20'); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['block']['headers']['views']): ?>
    <?php $this->assign('minwidth', $this->_tpl_vars['minwidth']+25); ?>
    <?php $this->assign('topicwidth', $this->_tpl_vars['topicwidth']-10); ?>
    <?php $this->assign('block_view', 'width10'); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['block']['headers']['replies']): ?>
    <?php $this->assign('minwidth', $this->_tpl_vars['minwidth']+25); ?>
    <?php $this->assign('topicwidth', $this->_tpl_vars['topicwidth']-10); ?>
    <?php $this->assign('block_reply', 'width10'); ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['block']['headers']['lastpost']): ?>
    <?php $this->assign('minwidth', $this->_tpl_vars['minwidth']+100); ?>
    <?php $this->assign('topicwidth', $this->_tpl_vars['topicwidth']-20); ?>
<?php endif; ?>
<?php $this->assign('block_topic', $this->_tpl_vars['topicwidth']); ?> <!-- block topic width after reduction above -->
<div class="outer" style="min-width: <?php echo $this->_tpl_vars['minwidth']; ?>
px;">
    <div class="head border x-small">
        <div class="<?php echo $this->_tpl_vars['block_topic']; ?>
 floatleft center"><?php echo $this->_tpl_vars['block']['headers']['topic']; ?>
</div>
        <?php if ($this->_tpl_vars['block']['headers']['forum']): ?>
            <div class="<?php echo $this->_tpl_vars['block_forum']; ?>
 floatleft center"><?php echo $this->_tpl_vars['block']['headers']['forum']; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['replies']): ?>
            <div class="<?php echo $this->_tpl_vars['block_reply']; ?>
 floatleft center"><?php echo $this->_tpl_vars['block']['headers']['replies']; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['views']): ?>
            <div class="<?php echo $this->_tpl_vars['block_view']; ?>
 floatleft center"><?php echo $this->_tpl_vars['block']['headers']['views']; ?>
</div>
        <?php endif; ?>
        <div style="overflow: hidden;" class="center"><?php echo $this->_tpl_vars['block']['headers']['lastpost']; ?>
</div>
        <div class="clear"></div>
    </div>
    <!-- start forum topic -->
    <?php $this->_foreach['loop'] = array('total' => count($this->_tpl_vars['block']['topics']), 'iteration' => 0);
if ($this->_foreach['loop']['total'] > 0):
    foreach ($this->_tpl_vars['block']['topics'] as $this->_tpl_vars['topic']):
        $this->_foreach['loop']['iteration']++;
 ?>
    <div class="<?php echo smarty_function_cycle(array('values' => "even,odd"), $this);?>
 border">
        <div class="<?php echo $this->_tpl_vars['block_topic']; ?>
 floatleft left">
            <?php if ($this->_tpl_vars['block']['headers']['approve']): ?>
                <?php if ($this->_tpl_vars['topic']['approve'] == 1): ?><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
&status=active#admin" target="_self" title="<?php echo @_MD_TYPE_ADMIN; ?>
"><?php echo @_MD_TYPE_ADMIN; ?>
</a><?php endif; ?>
                <?php if ($this->_tpl_vars['topic']['approve'] == 0): ?><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
&status=pending#admin" target="_self" title="<?php echo @_MD_TYPE_PENDING; ?>
"><?php echo @_MD_TYPE_PENDING; ?>
</a><?php endif; ?>
                <?php if ($this->_tpl_vars['topic']['approve'] == -1): ?><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
&status=deleted#admin" target="_self" title="<?php echo @_MD_TYPE_DELETED; ?>
"><?php echo @_MD_TYPE_DELETED; ?>
</a><?php endif; ?>
                <br/>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['read']): ?><?php echo $this->_tpl_vars['topic']['topic_folder']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['topic']): ?>
                <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/<?php echo $this->_tpl_vars['topic']['topic_link']; ?>
" title="<?php echo $this->_tpl_vars['topic']['topic_excerpt']; ?>
">
                    <?php if ($this->_tpl_vars['block']['headers']['type']): ?><?php echo $this->_tpl_vars['topic']['topic_title']; ?>
<?php else: ?><?php echo $this->_tpl_vars['topic']['topic_title_excerpt']; ?>
<?php endif; ?>
                </a>
                <?php if ($this->_tpl_vars['block']['headers']['pagenav']): ?><?php echo $this->_tpl_vars['topic']['topic_page_jump']; ?>
<?php endif; ?>
                <br/>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['attachment']): ?><?php echo $this->_tpl_vars['topic']['attachment']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['lock']): ?><?php echo $this->_tpl_vars['topic']['lock']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['sticky']): ?><?php echo $this->_tpl_vars['topic']['sticky']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['digest']): ?><?php echo $this->_tpl_vars['topic']['digest']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['poll']): ?><?php echo $this->_tpl_vars['topic']['poll']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['publish']): ?>
                <br/>
                <span class="xx-small">
<?php echo $this->_tpl_vars['block']['headers']['publish']; ?>
: <?php echo $this->_tpl_vars['topic']['topic_time']; ?>

</span>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['topic']['votes']): ?>
                <br/>
                <span class="xx-small">
<?php if ($this->_tpl_vars['block']['headers']['votes']): ?><?php echo $this->_tpl_vars['block']['headers']['votes']; ?>
: <?php echo $this->_tpl_vars['topic']['votes']; ?>
<?php endif; ?>
                    <?php if ($this->_tpl_vars['block']['headers']['ratings']): ?>&nbsp;<?php echo $this->_tpl_vars['topic']['rating_img']; ?>
<?php endif; ?>
</span>
            <?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['poster']): ?>
                <br/>
                <span class="xx-small">
<?php echo $this->_tpl_vars['block']['headers']['poster']; ?>
: <?php echo $this->_tpl_vars['topic']['topic_poster']; ?>

</span>
            <?php endif; ?>
        </div>
        <?php if ($this->_tpl_vars['block']['headers']['forum']): ?>
            <div class="<?php echo $this->_tpl_vars['block_forum']; ?>
 floatleft left"><?php echo $this->_tpl_vars['topic']['topic_forum_link']; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['replies']): ?>
            <div class="<?php echo $this->_tpl_vars['block_reply']; ?>
 floatleft center"><?php echo $this->_tpl_vars['topic']['topic_replies']; ?>
</div>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['views']): ?>
            <div class="<?php echo $this->_tpl_vars['block_view']; ?>
 floatleft center"><?php echo $this->_tpl_vars['topic']['topic_views']; ?>
</div>
        <?php endif; ?>
        <div style="overflow: hidden;" class="right">
            <?php if ($this->_tpl_vars['block']['headers']['lastpostmsgicon']): ?><?php echo $this->_tpl_vars['topic']['topic_icon']; ?>
<?php endif; ?>
            <?php if ($this->_tpl_vars['block']['headers']['lastposttime']): ?><?php echo $this->_tpl_vars['topic']['topic_last_posttime']; ?>
<?php endif; ?>
            <br/>
            <?php if ($this->_tpl_vars['block']['headers']['lastposter']): ?><?php echo $this->_tpl_vars['topic']['topic_last_poster']; ?>
<?php endif; ?>
            &nbsp;
            <?php if ($this->_tpl_vars['block']['headers']['lastpost']): ?><?php echo $this->_tpl_vars['topic']['topic_page_jump_icon']; ?>
<?php endif; ?>
        </div>
        <div class="clear"></div>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    <!-- end forum topic -->
</div>
<div class="clear"></div>
<?php if ($this->_tpl_vars['block']['indexNav']): ?>
    <!-- a sample of pagenav. you can create your own! -->
    <div class="floatright right">
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/viewpost.php"><?php echo @_MB_NEWBB_ALLPOSTS; ?>
</a> |
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/list.topic.php"><?php echo @_MB_NEWBB_ALLTOPICS; ?>
</a> |
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/list.topic.php?status=unread"><?php echo @_MD_UNREAD; ?>
</a> |
        <?php if ($this->_tpl_vars['block']['headers']['replies']): ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/list.topic.php?status=unreplied"><?php echo @_MD_UNREPLIED; ?>
</a>
            |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['votes']): ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/list.topic.php?status=voted"><?php echo @_MD_VOTED; ?>
</a>
            |
        <?php endif; ?>
        <?php if ($this->_tpl_vars['block']['headers']['poll']): ?>
            <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb/list.topic.php?status=poll"><?php echo @_MD_POLL_POLL; ?>
</a>
            |
        <?php endif; ?>
        <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/newbb"><?php echo @_MB_NEWBB_VSTFRMS; ?>
</a>
    </div>
<?php endif; ?>