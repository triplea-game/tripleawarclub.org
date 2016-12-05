<?php /* Smarty version 2.6.28, created on 2016-02-14 17:20:26
         compiled from /usr/share/nginx/html/tripleawarclub.org/public_html/modules/system/themes/default/xotpl/xo_globalnav.html */ ?>
<div id="xo_globalnav">
    <!-- start menu -->
    <ul class="menu" id="menu">
        <?php $_from = $this->_tpl_vars['navitems']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
        <li>
            <a href="<?php echo $this->_tpl_vars['item']['link']; ?>
" class="menulink"><?php echo $this->_tpl_vars['item']['text']; ?>
</a>
            <ul>
                <?php $_from = $this->_tpl_vars['item']['menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
                <li>
                    <?php if ($this->_tpl_vars['sub']['options'] != 0): ?>
                    <a class="sub" href="<?php echo $this->_tpl_vars['sub']['link']; ?>
" title="<?php echo $this->_tpl_vars['sub']['title']; ?>
"><?php echo $this->_tpl_vars['sub']['title']; ?>
</a>
                    <ul>
                        <?php $_from = $this->_tpl_vars['sub']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['option']):
?>
                        <li><a href="<?php echo $this->_tpl_vars['sub']['url']; ?>
<?php echo $this->_tpl_vars['option']['link']; ?>
"><?php echo $this->_tpl_vars['option']['title']; ?>
</a></li>
                        <?php endforeach; endif; unset($_from); ?>
                    </ul>
                    <?php else: ?>
                    <a href="<?php echo $this->_tpl_vars['sub']['link']; ?>
" title="<?php echo $this->_tpl_vars['sub']['title']; ?>
"><?php echo $this->_tpl_vars['sub']['title']; ?>
</a>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; unset($_from); ?>
            </ul>
        </li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
    <!-- start style choose -->
    <div id="choosestyle">
        <a href="<?php echo $this->_tpl_vars['theme_css']; ?>
/index.html?style=dark" rel="dark" class="styleswitch"><?php echo @_OXYGEN_DARK; ?>
</a>
        <a href="<?php echo $this->_tpl_vars['theme_css']; ?>
/index.html?style=silver" rel="silver" class="styleswitch"><?php echo @_OXYGEN_SILVER; ?>
</a>
        <a href="<?php echo $this->_tpl_vars['theme_css']; ?>
/index.html?style=orange" rel="orange" class="styleswitch"><?php echo @_OXYGEN_ORANGE; ?>
</a>
    </div>
</div>

<script type="text/javascript">
    var menu=new menu.dd("menu");
    menu.init("menu","menuhover");
</script>