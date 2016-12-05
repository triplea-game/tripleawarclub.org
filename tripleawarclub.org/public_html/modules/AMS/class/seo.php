<?php 
if (!class_exists('IdgObjectHandler')) {
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/idgobject.php";
}

class AmsSEO extends XoopsObject {
    function AmsSEO() {
        $this->initVar('settingid', XOBJ_DTYPE_INT,null,true,11);
        $this->initVar('settingvalue', XOBJ_DTYPE_TXTBOX,null,false,100);
        $this->initVar('settingtype', XOBJ_DTYPE_TXTBOX,null,false,30);
    }
}

class AMSSEOHandler extends IdgObjectHandler {
    function AMSSEOHandler(&$db) {
        $this->IdgObjectHandler($db, 'ams_setting', 'AmsSEO', 'settingid');
    }
	
    private function readDb($setting_type) {

        $myts =& MyTextSanitizer::getInstance();
        $sql = "SELECT settingvalue FROM ".$this->db->prefix('ams_setting')." WHERE settingtype='".$setting_type."'";

        $result=$this->db->query($sql,1,0);
        $row=$this->db->fetchRow($result);
        return $row;
    }
    
    private function updateDb($setting_type, $setting_value) {
        $myts =& MyTextSanitizer::getInstance();
        $sql = "UPDATE ".$this->db->prefix('ams_setting')." SET settingvalue='".$setting_value."' WHERE settingtype='".$setting_type."'";
        if (!$this->db->query($sql)) {    
            return false;
        }
        return true;
    }
    
    	
	function save_setting($content_parameter=null) {
		//configure setting path based on XOOPS version
		include_once XOOPS_ROOT_PATH."/mainfile.php";
		if ( !defined("XOOPS_VAR_PATH") )
		{
			$AMS_setting=XOOPS_ROOT_PATH. '/cache';
		} else 
		{
			$AMS_setting=XOOPS_VAR_PATH. '/configs';
		}
		
		//if nothing inside the content, fill it with default value
		if (!(is_array($content_parameter) && count($content_parameter) > 0)) 
		{
            $temp_holder=$this->readDb('friendlyurl_enable');
			$content_parameter['friendlyurl_enable']=$temp_holder[0];
            
            $temp_holder=$this->readDb('friendlyurl_template');
			$content_parameter['urltemplate']=$temp_holder[0];
		}else
        {
             $this->updateDb('friendlyurl_enable',$content_parameter['friendlyurl_enable']);
             $this->updateDb('friendlyurl_template',$content_parameter['urltemplate']);
        }
		
        if ( !$file = fopen( $AMS_setting . '/xoops_ams_seo_setting.php', "w" ) )
		{
			print "FAIL WRITING SEO SETTING CACHE";exit;
        } else
		{
			$content= "<?php
			function AMS_SEO_setting()
			{
				\$setting['friendlyurl_enable']=" .$content_parameter['friendlyurl_enable']. ";
				\$setting['urltemplate']='" .$content_parameter['urltemplate']. "';
				return \$setting;
			}?>";
		
			if ( fwrite( $file, $content ) == -1 )
			{
				print "FAIL WRITING SEO SETTING CACHE";exit;
			}
			fclose($file);
		}		
		
			
	}
    
	function read_setting() {
		include_once XOOPS_ROOT_PATH."/mainfile.php";
		
		//configure setting path based on XOOPS version
		if ( !defined("XOOPS_VAR_PATH") )
		{
			$AMS_setting=XOOPS_ROOT_PATH. '/cache';
		} else 
		{
			$AMS_setting=XOOPS_VAR_PATH. '/configs';
		}		

		if(!file_exists( $AMS_setting . '/xoops_ams_seo_setting.php')) //if  1st time running
		{
			$this->save_setting();
		}

		include_once $AMS_setting . '/xoops_ams_seo_setting.php';
		return AMS_SEO_setting();

	}
	
}
?>