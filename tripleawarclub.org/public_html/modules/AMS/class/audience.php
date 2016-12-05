<?php 
if (!class_exists('IdgObjectHandler')) {
    include_once XOOPS_ROOT_PATH."/modules/AMS/class/idgobject.php";
}
class AmsAudience extends XoopsObject {
    function AmsAudience() {
        $this->initVar('audienceid', XOBJ_DTYPE_INT);
        $this->initVar('audience', XOBJ_DTYPE_TXTBOX);
    }
}

class AMSAudienceHandler extends IdgObjectHandler {
    function AMSAudienceHandler(&$db) {
        $this->IdgObjectHandler($db, 'ams_audience', 'AmsAudience', 'audienceid');
    }
    
    function delete(&$aud, $newaudid) {
        if ($aud->getVar('audienceid') == 1) {
            return false;
        }
        $sql = "UPDATE ".$this->db->prefix('ams_article')." SET audienceid = ".intval($newaudid)." WHERE audienceid = ".intval($aud->getVar('audienceid'));
        if (!$this->db->query($sql)) {
            return false;
        }
        return parent::delete($aud);
    }
    
    function getAllAudiences() {
        return $this->getObjects(null, true);
    }
    
    function getStoryCountByAudience($audience) {
        $sql = "SELECT COUNT(*) FROM ".$this->db->prefix("ams_article")." WHERE audienceid=".$audience->getVar('audienceid');
        if ($result = $this->db->query($sql)) {
            list($count) = $this->db->fetchRow($result);
            return $count;
        }
        return false;
    }
}

?>