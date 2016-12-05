<?php /* Smarty version 2.6.28, created on 2016-02-15 01:06:18
         compiled from db:system_block_login.html */ ?>
<div id="login">

					<!-- Login Form -->
					<form class="login" action="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php" method="post">
<div id="fields">
						<?php echo $this->_tpl_vars['block']['lang_username']; ?>
 <input type="text" name="uname" size="12" value="<?php echo $this->_tpl_vars['block']['unamevalue']; ?>
" maxlength="25" class="field"  style='outline: none;' />
						<?php echo $this->_tpl_vars['block']['lang_password']; ?>
 <input type="password" name="pass" size="12" maxlength="32" class="field" style='outline: none;'  />
</div>

<div id="submit">
    <input type="submit" name="submit" value="<?php echo $this->_tpl_vars['block']['lang_login']; ?>
" class="bt_login" />					
<?php echo $this->_tpl_vars['block']['sslloginlink']; ?>

	</div>
	<div id="forgot">
					<a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/user.php#lost" title="<?php echo $this->_tpl_vars['block']['lang_lostpass']; ?>
"><?php echo $this->_tpl_vars['block']['lang_lostpass']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['xoops_url']; ?>
/register.php" title="<?php echo $this->_tpl_vars['block']['lang_registernow']; ?>
"><?php echo $this->_tpl_vars['block']['lang_registernow']; ?>
</a>
	</div>
	
		<input type="hidden" name="rememberme" value="On" class ="formButton" />
	<input type="hidden" name="xoops_redirect" value="<?php echo $this->_tpl_vars['xoops_requesturi']; ?>
" />
    <input type="hidden" name="op" value="login" />
    
					</form>

			</div><!--	 end login -->