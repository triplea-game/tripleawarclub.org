<?php /* Smarty version 2.6.28, created on 2016-02-16 00:24:30
         compiled from db:newbb_searchresults.tpl */ ?>
<div class="resultMsg"> <?php echo $this->_tpl_vars['search_info']; ?>
 </div>
<br/>
<?php if ($this->_tpl_vars['results']): ?>
    <table class="outer" border="0" cellpadding="0" cellspacing="0" align="center" width="95%">
        <tr>
            <td>
                <table border="0" cellpadding="4" cellspacing="1" width="100%">
                    <tr class="head" align="center">
                        <td><?php echo @_MD_FORUMC; ?>
</td>
                        <td><?php echo @_MD_SUBJECT; ?>
</td>
                        <td><?php echo @_MD_AUTHOR; ?>
</td>
                        <td nowrap="nowrap"><?php echo @_MD_POSTTIME; ?>
</td>
                    </tr>
                    <!-- start search results -->
                    <?php unset($this->_sections['i']);
$this->_sections['i']['name'] = 'i';
$this->_sections['i']['loop'] = is_array($_loop=$this->_tpl_vars['results']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['i']['show'] = true;
$this->_sections['i']['max'] = $this->_sections['i']['loop'];
$this->_sections['i']['step'] = 1;
$this->_sections['i']['start'] = $this->_sections['i']['step'] > 0 ? 0 : $this->_sections['i']['loop']-1;
if ($this->_sections['i']['show']) {
    $this->_sections['i']['total'] = $this->_sections['i']['loop'];
    if ($this->_sections['i']['total'] == 0)
        $this->_sections['i']['show'] = false;
} else
    $this->_sections['i']['total'] = 0;
if ($this->_sections['i']['show']):

            for ($this->_sections['i']['index'] = $this->_sections['i']['start'], $this->_sections['i']['iteration'] = 1;
                 $this->_sections['i']['iteration'] <= $this->_sections['i']['total'];
                 $this->_sections['i']['index'] += $this->_sections['i']['step'], $this->_sections['i']['iteration']++):
$this->_sections['i']['rownum'] = $this->_sections['i']['iteration'];
$this->_sections['i']['index_prev'] = $this->_sections['i']['index'] - $this->_sections['i']['step'];
$this->_sections['i']['index_next'] = $this->_sections['i']['index'] + $this->_sections['i']['step'];
$this->_sections['i']['first']      = ($this->_sections['i']['iteration'] == 1);
$this->_sections['i']['last']       = ($this->_sections['i']['iteration'] == $this->_sections['i']['total']);
?>
                        <!-- start each result -->
                        <tr align="center">
                            <td class="even"><a href="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['forum_link']; ?>
"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['forum_name']; ?>
</a></td>
                            <!-- irmtfan hardcode removed align="left" -->
                            <td class="odd" id="align_left"><a href="<?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['link']; ?>
"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['title']; ?>
</a></td>
                            <td class="even"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['poster']; ?>
</a></td>
                            <td class="odd"><?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['post_time']; ?>
</td>
                        </tr>
                        <!-- START irmtfan add show search -->
                        <?php if ($this->_tpl_vars['results'][$this->_sections['i']['index']]['post_text']): ?>
                            <tr align="center">
                                <td class="even"></td>
                                <td class="odd">
                                    <?php echo $this->_tpl_vars['results'][$this->_sections['i']['index']]['post_text']; ?>

                                </td>
                                <td class="even"></td>
                                <td class="odd"></td>
                            </tr>
                        <?php endif; ?>
                        <!-- END irmtfan add show search -->
                        <!-- end each result -->
                    <?php endfor; endif; ?>
                    <!-- end search results -->
                </table>
            </td>
        </tr>
        <?php if ($this->_tpl_vars['search_next'] || $this->_tpl_vars['search_prev']): ?>
            <tr>
                <td>
                    <table border="0" cellpadding="4" cellspacing="1" width="100%">
                        <tr class="head">
                            <!-- irmtfan hardcode removed align="left" -->
                            <td class="align_left" width="50%"><?php echo $this->_tpl_vars['search_prev']; ?>
 </td>
                            <td class="align_right" width="50%"> <?php echo $this->_tpl_vars['search_next']; ?>
</td>
                        </tr>
                    </table>
                </td>
            </tr>
        <?php endif; ?>
    </table>
    <br/>
<?php elseif ($this->_tpl_vars['lang_nomatch']): ?>
    <div class="resultMsg"> <?php echo $this->_tpl_vars['lang_nomatch']; ?>
 </div>
    <br/>
<?php endif; ?>