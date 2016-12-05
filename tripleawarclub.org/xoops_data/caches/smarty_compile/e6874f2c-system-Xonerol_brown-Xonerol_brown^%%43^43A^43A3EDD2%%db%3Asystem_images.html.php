<?php /* Smarty version 2.6.28, created on 2016-04-01 14:56:06
         compiled from db:system_images.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'db:system_images.html', 36, false),)), $this); ?>
<!-- Header -->
<?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:system_header.html", 'smarty_include_vars' => array()));
 ?>
<!-- Buttons -->
<div class="floatright">
    <div class="xo-buttons">
        <?php if (! $this->_tpl_vars['edit_form'] && ! $this->_tpl_vars['listimg']): ?>
        <button id="xo-addcat-btn" class="ui-corner-all tooltip" onclick="xo_toggle('div#xo-category-add');" title="<?php echo @_AM_SYSTEM_IMAGES_ADDCAT; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_IMAGES_ADDCAT; ?>
" />
            <?php echo @_AM_SYSTEM_IMAGES_ADDCAT; ?>

        </button>
        <?php endif; ?>
        <?php if ($this->_tpl_vars['cat_img'] || $this->_tpl_vars['listimg']): ?>
        <button id="xo-addimg-btn" class="ui-corner-all tooltip" onclick="xo_toggle('div#xo-images-add');" title="<?php echo @_AM_SYSTEM_IMAGES_ADDIMG; ?>
">
            <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/add.png'; ?>" alt="<?php echo @_AM_SYSTEM_IMAGES_ADDIMG; ?>
" />
            <?php echo @_AM_SYSTEM_IMAGES_ADDIMG; ?>

        </button>
        <?php endif; ?>
    </div>
</div>
<!-- Category List -->
<?php if (! $this->_tpl_vars['edit_form'] && ! $this->_tpl_vars['listimg']): ?>
<table class="outer" cellspacing="1">
    <thead>
        <tr>
            <th><?php echo @_AM_SYSTEM_IMAGES_NAME; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_NBIMAGES; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_MAXSIZE; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_MAXWIDTH; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_MAXHEIGHT; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_DISPLAY; ?>
</th>
            <th><?php echo @_AM_SYSTEM_IMAGES_ACTIONS; ?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['cat_img']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['cat']):
?>
        <tr class="<?php echo smarty_function_cycle(array('values' => 'odd, even'), $this);?>
 txtcenter">
            <td>
                <a class="tooltip" href="admin.php?fct=images&amp;op=listimg&amp;imgcat_id=<?php echo $this->_tpl_vars['cat']['id']; ?>
" title="<?php echo @_AM_SYSTEM_IMAGES_VIEW; ?>
">
                    <?php echo $this->_tpl_vars['cat']['name']; ?>

                </a>
            </td>
            <td><?php echo $this->_tpl_vars['cat']['count']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cat']['maxsize']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cat']['maxwidth']; ?>
</td>
            <td><?php echo $this->_tpl_vars['cat']['maxheight']; ?>
</td>
            <td class="xo-actions"><img id="loading_cat<?php echo $this->_tpl_vars['cat']['id']; ?>
" src="./images/spinner.gif" style="display:none;" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="cursorpointer tooltip" id="cat<?php echo $this->_tpl_vars['cat']['id']; ?>
" onclick="system_setStatus( { fct: 'images', op: 'display_cat', imgcat_id: <?php echo $this->_tpl_vars['cat']['id']; ?>
 }, 'cat<?php echo $this->_tpl_vars['cat']['id']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['cat']['display']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="" title="<?php if ($this->_tpl_vars['cat']['display']): ?><?php echo @_AM_SYSTEM_IMAGES_OFF; ?>
<?php else: ?><?php echo @_AM_SYSTEM_IMAGES_ON; ?>
<?php endif; ?>" />
            </td>
            <td class="xo-actions txtcenter">
                <a class="tooltip" href="admin.php?fct=images&amp;op=listimg&amp;imgcat_id=<?php echo $this->_tpl_vars['cat']['id']; ?>
" title="<?php echo @_AM_SYSTEM_IMAGES_VIEW; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_IMAGES_VIEW; ?>
" />
                </a>
                <?php if ($this->_tpl_vars['xoops_isadmin']): ?>
                <a class="tooltip" href="admin.php?fct=images&amp;op=editcat&amp;imgcat_id=<?php echo $this->_tpl_vars['cat']['id']; ?>
" title="<?php echo @_EDIT; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" />
                </a>
                <a class="tooltip" href="admin.php?fct=images&amp;op=delcat&amp;imgcat_id=<?php echo $this->_tpl_vars['cat']['id']; ?>
" title="<?php echo @_EDIT; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="" />
                </a>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php if (! $this->_tpl_vars['cat_img']): ?>
        <tr>
            <td class="txtcenter bold odd" colspan="7"><?php echo @_AM_SYSTEM_IMAGES_NOCAT; ?>
</td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<!-- Nav menu -->
<?php if ($this->_tpl_vars['nav_menu']): ?><div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div><div class="clear spacer"></div><?php endif; ?>
<?php endif; ?>
<?php if ($this->_tpl_vars['images']): ?>
<!-- Image list -->
<div id="xo-category-add" class="">
    <?php $_from = $this->_tpl_vars['images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['img']):
?>
    <div class="floatleft">
        <div class="ui-corner-all xo-thumb txtcenter">
            <div class="xo-thumbimg">
                <img class="tooltip" src="<?php echo $this->_tpl_vars['xoops_url']; ?>
/image.php?id=<?php echo $this->_tpl_vars['img']['image_id']; ?>
&amp;width=120&amp;height=120" alt="<?php echo $this->_tpl_vars['img']['image_nicename']; ?>
" title="<?php echo $this->_tpl_vars['img']['image_nicename']; ?>
" style="max-width:120px; max-height:120px;" />
            </div>
            <div class="xo-actions txtcenter">
                <div class="spacer bold"><?php echo $this->_tpl_vars['img']['image_nicename']; ?>
</div>
                    <img id="loading_img<?php echo $this->_tpl_vars['img']['image_id']; ?>
" src="./images/spinner.gif" style="display:none;" alt="<?php echo @_AM_SYSTEM_LOADING; ?>
" /><img class="cursorpointer tooltip" id="img<?php echo $this->_tpl_vars['img']['image_id']; ?>
" onclick="system_setStatus( { fct: 'images', op: 'display_img', image_id: <?php echo $this->_tpl_vars['img']['image_id']; ?>
 }, 'img<?php echo $this->_tpl_vars['img']['image_id']; ?>
', 'admin.php' )" src="<?php if ($this->_tpl_vars['img']['image_display']): ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?><?php else: ?><?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?><?php endif; ?>" alt="<?php echo @_IMGDISPLAY; ?>
" title="<?php echo @_IMGDISPLAY; ?>
" />
                    <?php if (! $this->_tpl_vars['db_store']): ?>
                    <a class="lightbox tooltip" href="<?php echo $this->_tpl_vars['xoops_upload_url']; ?>
/<?php echo $this->_tpl_vars['img']['image_name']; ?>
" title="<?php echo @_PREVIEW; ?>
">
                    <?php else: ?>
                    <a class="lightbox tooltip" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/image.php?id=<?php echo $this->_tpl_vars['img']['image_id']; ?>
" title="<?php echo @_PREVIEW; ?>
">
                    <?php endif; ?>
                        <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/display.png'; ?>" alt="<?php echo @_AM_SYSTEM_IMAGES_VIEW; ?>
" />
                    </a>
                <a class="tooltip" href="admin.php?fct=images&amp;op=editimg&amp;image_id=<?php echo $this->_tpl_vars['img']['image_id']; ?>
" title="<?php echo @_EDIT; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/edit.png'; ?>" alt="<?php echo @_EDIT; ?>
" />
                </a>
                <a class="tooltip" href="admin.php?fct=images&amp;op=delfile&amp;image_id=<?php echo $this->_tpl_vars['img']['image_id']; ?>
" title="<?php echo @_DELETE; ?>
">
                    <img src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/delete.png'; ?>" alt="<?php echo @_DELETE; ?>
" />
                </a>
                 <img class="tooltip" onclick="display_dialog(<?php echo $this->_tpl_vars['img']['image_id']; ?>
, true, true, 'slide', 'slide', 120, 350);" src="<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/url.png'; ?>" alt="<?php echo @_AM_SYSTEM_IMAGES_URL; ?>
" title="<?php echo @_AM_SYSTEM_IMAGES_URL; ?>
" />
            </div>
        </div>
    </div>
    
    <div id="dialog<?php echo $this->_tpl_vars['img']['image_id']; ?>
" title="<?php echo $this->_tpl_vars['img']['image_nicename']; ?>
" style='display:none;'>
          <div class="center">
              <?php if (! $this->_tpl_vars['db_store']): ?>
              <?php echo $this->_tpl_vars['xoops_upload_url']; ?>
/<?php echo $this->_tpl_vars['img']['image_name']; ?>

              <?php else: ?>
              <?php echo $this->_tpl_vars['xoops_url']; ?>
/image.php?id=<?php echo $this->_tpl_vars['img']['image_id']; ?>

              <?php endif; ?>
          </div>
    </div>

    <?php endforeach; endif; unset($_from); ?>
    <div class="clear"></div>
</div>
<?php if ($this->_tpl_vars['nav_menu']): ?><div class="xo-avatar-pagenav floatright"><?php echo $this->_tpl_vars['nav_menu']; ?>
</div><div class="clear spacer"></div><?php endif; ?>
<?php else: ?>
<div id="xo-category-add" class="">
    <div class="clear"></div>
</div>
<?php endif; ?>

<!-- Add Image form -->
<div id="xo-images-add" class="hide">
    <br />
    <?php echo $this->_tpl_vars['image_form']['javascript']; ?>

    <form name="<?php echo $this->_tpl_vars['image_form']['name']; ?>
" id="<?php echo $this->_tpl_vars['image_form']['name']; ?>
" action="<?php echo $this->_tpl_vars['image_form']['action']; ?>
" method="<?php echo $this->_tpl_vars['image_form']['method']; ?>
" <?php echo $this->_tpl_vars['image_form']['extra']; ?>
 >
    <table class="outer">
        <tr>
            <th colspan="2"><?php echo $this->_tpl_vars['image_form']['title']; ?>
</th>
        </tr>
        <?php $_from = $this->_tpl_vars['image_form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
        <?php if ($this->_tpl_vars['element']['hidden'] != true && $this->_tpl_vars['element']['body'] != ''): ?>
        <tr>
            <td class="odd aligntop">
                <div class="spacer bold"><?php echo $this->_tpl_vars['element']['caption']; ?>
<?php if ($this->_tpl_vars['element']['required']): ?><span class="red">&nbsp;*</span><?php endif; ?></div>
                <div class="spacer"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
            </td>
            <td class="even"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
        </tr>
        <?php else: ?>
        <?php echo $this->_tpl_vars['element']['body']; ?>

        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </table>
    </form>
</div>
<!-- Add Category form -->
<div id="xo-category-add" class="hide">
    <br />
    <?php echo $this->_tpl_vars['imagecat_form']['javascript']; ?>

    <form name="<?php echo $this->_tpl_vars['imagecat_form']['name']; ?>
" id="<?php echo $this->_tpl_vars['imagecat_form']['name']; ?>
" action="<?php echo $this->_tpl_vars['imagecat_form']['action']; ?>
" method="<?php echo $this->_tpl_vars['imagecat_form']['method']; ?>
" <?php echo $this->_tpl_vars['imagecat_form']['extra']; ?>
 >
    <table class="outer">
        <tr>
            <th colspan="2"><?php echo $this->_tpl_vars['imagecat_form']['title']; ?>
</th>
        </tr>
        <?php $_from = $this->_tpl_vars['imagecat_form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
        <?php if ($this->_tpl_vars['element']['hidden'] != true && $this->_tpl_vars['element']['body'] != ''): ?>
        <tr>
            <td class="odd aligntop">
                <div class="spacer bold"><?php echo $this->_tpl_vars['element']['caption']; ?>
<?php if ($this->_tpl_vars['element']['required']): ?><span class="red">&nbsp;*</span><?php endif; ?></div>
                <div class="spacer"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
            </td>
            <td class="even"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
        </tr>
        <?php else: ?>
        <?php echo $this->_tpl_vars['element']['body']; ?>

        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </table>
    </form>
</div>
<!-- Edit form image -->
<?php if ($this->_tpl_vars['edit_form']): ?>
<div id="xo-images-add" class="">
    <?php echo $this->_tpl_vars['edit_thumbs']; ?>

    <br />
    <?php echo $this->_tpl_vars['edit_form']['javascript']; ?>

    <form name="<?php echo $this->_tpl_vars['edit_form']['name']; ?>
" id="<?php echo $this->_tpl_vars['edit_form']['name']; ?>
" action="<?php echo $this->_tpl_vars['edit_form']['action']; ?>
" method="<?php echo $this->_tpl_vars['edit_form']['method']; ?>
" <?php echo $this->_tpl_vars['edit_form']['extra']; ?>
 >
    <table class="outer">
        <tr>
            <th colspan="2"><?php echo $this->_tpl_vars['edit_form']['title']; ?>
</th>
        </tr>
        <?php $_from = $this->_tpl_vars['edit_form']['elements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['element']):
?>
        <?php if ($this->_tpl_vars['element']['hidden'] != true && $this->_tpl_vars['element']['body'] != ''): ?>
        <tr>
            <td class="odd aligntop">
                <div class="spacer bold"><?php echo $this->_tpl_vars['element']['caption']; ?>
<?php if ($this->_tpl_vars['element']['required']): ?><span class="red">&nbsp;*</span><?php endif; ?></div>
                <div class="spacer"><?php echo $this->_tpl_vars['element']['description']; ?>
</div>
            </td>
            <td class="even"><?php echo $this->_tpl_vars['element']['body']; ?>
</td>
        </tr>
        <?php else: ?>
        <?php echo $this->_tpl_vars['element']['body']; ?>

        <?php endif; ?>
        <?php endforeach; endif; unset($_from); ?>
    </table>
    </form>
</div>
<?php endif; ?>
<script type="text/javascript">
    IMG_ON = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/success.png'; ?>';
    IMG_OFF = '<?php 
echo 'http://www.tripleawarclub.org/modules/system/images/icons/default/cancel.png'; ?>';

    $('.lightbox').lightBox({
        imageLoading:'language/<?php echo $this->_tpl_vars['xoops_language']; ?>
/images/lightbox-ico-loading.gif',
        imageBtnClose:'language/<?php echo $this->_tpl_vars['xoops_language']; ?>
/images/lightbox-btn-close.gif',
        imageBtnNext:'language/<?php echo $this->_tpl_vars['xoops_language']; ?>
/images/lightbox-btn-next.gif',
        imageBtnPrev:'language/<?php echo $this->_tpl_vars['xoops_language']; ?>
/images/lightbox-btn-prev.gif',
        imageBlank:'language/<?php echo $this->_tpl_vars['xoops_language']; ?>
/images/lightbox-blank.gif'
    });


</script>