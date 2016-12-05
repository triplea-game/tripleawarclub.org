<?php /* Smarty version 2.6.28, created on 2016-02-15 01:36:28
         compiled from db:newbb_search.tpl */ ?>
<div id="forum_header">
    <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/index.php"><?php echo $this->_tpl_vars['forumindex']; ?>
</a>
    >
    <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php"><?php echo @_SR_SEARCH; ?>
</a>
</div>

<?php if ($this->_tpl_vars['search_info']): ?>
    <?php $this->_smarty_include(array('smarty_include_tpl_file' => "db:newbb_searchresults.tpl", 'smarty_include_vars' => array('results' => $this->_tpl_vars['results'])));
 ?>
<?php endif; ?>
<form name="Search" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/modules/<?php echo $this->_tpl_vars['xoops_dirname']; ?>
/search.php" method="get">
    <table class="outer" border="0" cellpadding="1" cellspacing="0" align="center" width="95%">
        <tr>
            <td>
                <table border="0" cellpadding="1" cellspacing="1" width="100%" class="head">
                    <tr>
                        <!-- irmtfan hardcode removed align="right" -->
                        <td class="head" width="10%" id="align_right"><strong><?php echo @_SR_KEYWORDS; ?>
</strong>&nbsp;</td>
                        <!-- irmtfan add  value="$search_term" -->
                        <td class="even"><input type="text" name="term" value="<?php echo $this->_tpl_vars['search_term']; ?>
"/></td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" add $andor_selection_box -->
                        <td class="head" id="align_right"><strong><?php echo @_SR_TYPE; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['andor_selection_box']; ?>
</td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" -->
                        <td class="head" id="align_right"><strong><?php echo @_MD_FORUMC; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['forum_selection_box']; ?>
</td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" add $searchin_radio -->
                        <td class="head" id="align_right"><strong><?php echo @_SR_SEARCHIN; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['searchin_radio']; ?>
</td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" add value="$author_select"-->
                        <td class="head" id="align_right"><strong><?php echo @_MD_AUTHOR; ?>
</strong>&nbsp;</td>
                        <td class="even"><input type="text" name="uname" value="<?php echo $this->_tpl_vars['author_select']; ?>
"/></td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" add $sortby_selection_box -->
                        <td class="head" id="align_right"><strong><?php echo @_MD_SORTBY; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['sortby_selection_box']; ?>
</td>
                    </tr>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" -->
                        <td class="head" id="align_right"><strong><?php echo @_MD_SINCE; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['since_selection_box']; ?>
</td>
                    </tr>
                    <!-- START irmtfan add select text options -->
                    <tr>
                        <td class="head" id="align_right" title="<?php echo @_MD_SELECT_STARTLAG_DESC; ?>
"><strong><?php echo @_MD_SELECT_STARTLAG; ?>
</strong>&nbsp;</td>
                        <td class="even" title="<?php echo @_MD_SELECT_STARTLAG_DESC; ?>
"><input type="text" name="selectstartlag" value="<?php echo $this->_tpl_vars['selectstartlag_select']; ?>
"/></td>
                    </tr>
                    <tr>
                        <td class="head" id="align_right"><strong><?php echo @_MD_SELECT_LENGTH; ?>
</strong>&nbsp;</td>
                        <td class="even"><input type="text" name="selectlength" value="<?php echo $this->_tpl_vars['selectlength_select']; ?>
"/></td>
                    </tr>
                    <tr>
                        <td class="head" id="align_right"><strong><?php echo @_MD_SELECT_HTML; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['selecthtml_radio']; ?>
</td>
                    </tr>
                    <tr>
                        <td class="head" id="align_right"><strong><?php echo @_MD_SELECT_EXCLUDE; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['selectexclude_check_box']; ?>
</td>
                    </tr>
                    <!-- END irmtfan add select text options -->
                    <!-- START irmtfan add show search -->
                    <tr>
                        <td class="head" id="align_right"><strong><?php echo @_MD_SHOWSEARCH; ?>
</strong>&nbsp;</td>
                        <td class="even"><?php echo $this->_tpl_vars['show_search_radio']; ?>
</td>
                    </tr>
                    <!-- START irmtfan add show search -->
                    <?php if ($this->_tpl_vars['search_rule']): ?>
                        <tr>
                            <!-- irmtfan hardcode removed align="right" -->
                            <td class="head" id="align_right"><strong><?php echo @_SR_SEARCHRULE; ?>
</strong>&nbsp;</td>
                            <td class="even"><?php echo $this->_tpl_vars['search_rule']; ?>
</td>
                        </tr>
                    <?php endif; ?>
                    <tr>
                        <!-- irmtfan hardcode removed align="right" -->
                        <td class="head" id="align_right">&nbsp;</td>
                        <!-- irmtfan remove name="submit" -->
                        <td class="even"><input type="submit" value="<?php echo @_MD_SEARCH; ?>
"/></td>
                </table>
            </td>
        </tr>
    </table>
</form>