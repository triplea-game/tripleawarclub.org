<?php
if (!defined("XOOPS_ROOT_PATH")) {
     die("XOOPS root path not defined");
}

if ( !defined("XOOPS_VAR_PATH") )
{
    $AMS_setting=XOOPS_ROOT_PATH. '/cache';
} else 
{
    $AMS_setting=XOOPS_VAR_PATH. '/configs';
}
if (file_exists($AMS_setting.'/xoops_ams_seo_setting.php')) {
unlink($AMS_setting.'/xoops_ams_seo_setting.php');
}
?>