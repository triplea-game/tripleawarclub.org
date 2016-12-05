<?php /* Smarty version 2.6.28, created on 2016-02-13 19:39:36
         compiled from db:system_siteclosed.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
" lang="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
">
<head>
	<meta http-equiv="content-type" content="text/html; charset=<?php echo $this->_tpl_vars['xoops_charset']; ?>
" />
	<meta http-equiv="content-language" content="<?php echo $this->_tpl_vars['xoops_langcode']; ?>
" />
	<title><?php echo $this->_tpl_vars['xoops_sitename']; ?>
</title>
	<meta name="robots" content="<?php echo $this->_tpl_vars['xoops_meta_robots']; ?>
" />
	<meta name="keywords" content="<?php echo $this->_tpl_vars['xoops_meta_keywords']; ?>
" />
	<meta name="description" content="<?php echo $this->_tpl_vars['xoops_meta_description']; ?>
" />
	<meta name="rating" content="<?php echo $this->_tpl_vars['xoops_meta_rating']; ?>
" />
	<meta name="author" content="<?php echo $this->_tpl_vars['xoops_meta_author']; ?>
" />
	<meta name="copyright" content="<?php echo $this->_tpl_vars['xoops_meta_copyright']; ?>
" />
	<meta name="generator" content="XOOPS" />
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/xoops.css" />
	<link rel="shortcut icon" type="image/ico" href="<?php echo 'http://www.tripleawarclub.org/favicon.ico'; ?>" />
	
</head>
<body>
  <table cellspacing="0">
    <tr id="header">
      <td style="width: 150px; background-color: #2F5376; vertical-align: middle; text-align:center;"><a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/" title=""><img src="<?php echo $this->_tpl_vars['xoops_imageurl']; ?>
logo.gif" width="150" alt="" /></a></td>
      <td style="width: 100%; background-color: #2F5376; vertical-align: middle; text-align:center;">&nbsp;</td>
    </tr>
    <tr>
      <td style="height: 8px; border-bottom: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>
    </tr>
  </table>

  <table cellspacing="1" align="center" width="80%" border="0" cellpadding="10">
    <tr>
      <td align="center"><div style="background-color: #DDFFDF; color: #136C99; text-align: center; border-top: 1px solid #DDDDFF; border-left: 1px solid #DDDDFF; border-right: 1px solid #AAAAAA; border-bottom: 1px solid #AAAAAA; font-weight: bold; padding: 10px;"><?php echo $this->_tpl_vars['lang_siteclosemsg']; ?>
</div></td>
    </tr>
  </table>
  
  <form action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php" method="post">
    <table cellspacing="0" align="center" style="border: 1px solid silver; width: 200px;">
      <tr>
        <th style="background-color: #2F5376; color: #FFFFFF; padding : 2px; vertical-align : middle;" colspan="2"><?php echo $this->_tpl_vars['lang_login']; ?>
</th>
      </tr>
      <tr>
        <td style="padding: 2px;"><?php echo $this->_tpl_vars['lang_username']; ?>
</td><td style="padding: 2px;"><input type="text" name="uname" size="12" value="" /></td>
      </tr>
      <tr>
        <td style="padding: 2px;"><?php echo $this->_tpl_vars['lang_password']; ?>
</td><td style="padding: 2px;"><input type="password" name="pass" size="12" /></td>
      </tr>
      <tr>
        <td style="padding: 2px;">&nbsp;</td>
        <td style="padding: 2px;">
        	<input type="hidden" name="xoops_redirect" value="<?php echo $this->_tpl_vars['xoops_requesturi']; ?>
" />
        	<input type="hidden" name="xoops_login" value="1" />
        	<input type="submit" value="<?php echo $this->_tpl_vars['lang_login']; ?>
" /></td>
      </tr>
    </table>
  </form>

  <table cellspacing="0" width="100%">
    <tr>
      <td style="height:8px; border-bottom: 1px solid silver; border-top: 1px solid silver; background-color: #dddddd;" colspan="2">&nbsp;</td>
    </tr>
  </table>

  </body>
</html>