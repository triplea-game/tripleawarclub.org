<?php /* Smarty version 2.6.28, created on 2016-02-17 19:16:47
         compiled from db:system_userform.html */ ?>
<h2 class="siteheader"><?php echo $this->_tpl_vars['lang_login']; ?>
</h2>
<br/>
<form action="user.php" method="post">
<table style="background-color:#F1F1F1;border-bottom:3px solid #EFEFEF;padding-top:10px;">
<tr>
<td width="70" align="right" style="padding-right:10px;"><?php echo $this->_tpl_vars['lang_username']; ?>
</td>
<td align="left"><input type="text" name="uname" size="26" maxlength="25" value="<?php echo $this->_tpl_vars['usercookie']; ?>
" /></td>
</tr> 
<tr>
<td width="70" align="right" style="padding-right:10px;"><?php echo $this->_tpl_vars['lang_password']; ?>
</td>
<td align="left"><input type="password" name="pass" size="21" maxlength="32" /></td>
</tr>  
<tr>
<td width="70" align="right" style="padding-right:10px;">&nbsp;</td>
<td align="left" valign="middle">
<input type="submit" value="<?php echo $this->_tpl_vars['lang_login']; ?>
" />&nbsp;
<?php if (isset ( $this->_tpl_vars['lang_rememberme'] )): ?>
        <input type="checkbox" name="rememberme" value="On" checked /> <?php echo $this->_tpl_vars['lang_rememberme']; ?>
<br />
    <?php endif; ?>
</td>
</tr>   
  </table>
  <input type="hidden" name="op" value="login" />
  <input type="hidden" name="xoops_redirect" value="<?php echo $this->_tpl_vars['redirect_page']; ?>
" />
  </form>
  <br />
  <a name="lost"></a>
  <p><?php echo $this->_tpl_vars['lang_notregister']; ?>
</p>
<br/>
<h2 class="siteheader"><?php echo $this->_tpl_vars['lang_lostpassword']; ?>
</h2><br/>
<p><?php echo $this->_tpl_vars['lang_noproblem']; ?>
</p>
  <form action="lostpass.php" method="post">
    <?php echo $this->_tpl_vars['lang_youremail']; ?>
 <input type="text" name="email" size="26" maxlength="60" />&nbsp;&nbsp;<input type="hidden" name="op" value="mailpasswd" /><input type="hidden" name="t" value="<?php echo $this->_tpl_vars['mailpasswd_token']; ?>
" /><input type="submit" value="<?php echo $this->_tpl_vars['lang_sendpassword']; ?>
" />
  </form>