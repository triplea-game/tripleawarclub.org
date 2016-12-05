<?php
include_once XOOPS_ROOT_PATH . "/modules/AMS/class/class.mimetype.php";

class sFiles {
	var $db;
	var $table;
	var $fileid;
	var $filerealname;
	var $storyid;
	var $date;
	var $mimetype;
	var $downloadname;
	var $counter;

    function sFiles($fileid=-1) 
    {
		$this->db =& Database::getInstance();
        $this->table = $this->db->prefix("ams_files");
        $this->storyid = 0;
        $this->filerealname = "";
        $this->date = '';
        $this->mimetype = "";
        $this->downloadname = "downloadfile";
        $this->counter = 0;
        if(is_array($fileid)){
        	$this->makeFile($fileid);
        }elseif($fileid != -1){
        	$this->getFile($fileid);
        }
	}

	function createUploadName($folder,$filename, $trimname=false)
	{
		$workingfolder=$folder;
		if(xoops_substr($workingfolder,strlen($workingfolder)-1,1)<>'/')
		{
			$workingfolder.='/';
		}
		$ext = basename($filename);
		$ext= explode('.', $ext);
		$ext= '.'.$ext[count($ext)-1];
		$true=true;
		while($true)
		{
			$ipbits = explode(".", $_SERVER["REMOTE_ADDR"]); 
  			list($usec, $sec) = explode(" ",microtime()); 

			$usec = (integer) ($usec * 65536); 
  			$sec = ((integer) $sec) & 0xFFFF; 

  			if($trimname) { 
  				$uid = sprintf("%06x%04x%04x",($ipbits[0] << 24) | ($ipbits[1] << 16) | ($ipbits[2] << 8) | $ipbits[3], $sec, $usec); 
  			} else {
  				$uid = sprintf("%08x-%04x-%04x",($ipbits[0] << 24) | ($ipbits[1] << 16) | ($ipbits[2] << 8) | $ipbits[3], $sec, $usec); 
  			}
         	if(!file_exists($workingfolder.$uid.$ext))
         	{
         		$true=false;
         	}
         }
  		return $uid.$ext;
	}
	
    function setFileRealName($filename) 
    {    
		$this->filerealname = $filename;
    }

	function getDate()
	{
		return $this->date;
	}
	
    function setStoryid($id) 
    {    
		$this->storyid = $id;
    }

    function giveMimetype($filename='')
    {
		$cmimetype = new cmimetype();
		$workingfile=$this->downloadname;
		if(trim($filename)!='')
		{
			$workingfile=$filename;
		}
		return $cmimetype->getType($workingfile);
    }
    
    function setMimetype($value) 
    {
		$this->mimetype = $value;
    }

    function setDownloadname($value) 
    {
		$this->downloadname = $value;
    }

    function getFileRealName($format="S") 
    {
		$myts =& MyTextSanitizer::getInstance();
        $smiley = 0;
        switch($format)
        {
        	case "S":
            case "Show":
            	$filerealname = $myts->htmlSpecialChars($this->filerealname,$smiley);
				break;
			case "E":
        	case "Edit":
                $filerealname = $myts->htmlSpecialChars($this->filerealname);
                break;
        	case "P":
        	case "Preview":
                $filerealname = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->filerealname,$smiley));
                break;
        	case "F":
        	case "InForm":
                $filerealname = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->filerealname));
                break;
        }
        return $filerealname;
    }

    function getMimetype($format="S") 
    {
       $myts =& MyTextSanitizer::getInstance();
       $smiley = 0;
       switch($format){
			case "S":
            case "Show":
                $filemimetype = $myts->htmlSpecialChars($this->mimetype,$smiley);
                break;
            case "E":
            case "Edit":
                $filemimetype = $myts->htmlSpecialChars($this->mimetype);
                break;
            case "P":
            case "Preview":
                $filemimetype = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->mimetype,$smiley));
                break;
            case "F":
            case "InForm":
                $filemimetype = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->mimetype));
                break;
       }
       return $filemimetype;
    }

    function getDownloadname($format="S") 
    {
       $myts =& MyTextSanitizer::getInstance();
       $smiley = 0;
       switch($format){
			case "S":
            case "Show":
            	$filedownname = $myts->htmlSpecialChars($this->downloadname,$smiley);
                break;
            case "E":
            case "Edit":
                $filedownname = $myts->htmlSpecialChars($this->downloadname);
                break;
            case "P":
            case "Preview":
                $filedownname = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->downloadname,$smiley));
                break;
            case "F":
            case "InForm":
                $filedownname = $myts->htmlSpecialChars($myts->stripSlashesGPC($this->downloadname));
                break;
       }
       return $filedownname;
    }

    function getFileid() 
    {
		return $this->fileid;
    }

    function getStoryid() 
    {
    	return $this->storyid;
    }

    function getCounter() 
    {
    	return $this->counter;
    }

    function getAllbyStory($storyid) 
    {
       $db =& Database::getInstance();
       $ret = array();
       $sql = "SELECT * FROM ".$this->table." WHERE storyid=".$storyid."";
       $result = $db->query($sql);
       while( $myrow = $db->fetchArray($result) ) 
       {
			$ret[] = new sFiles($myrow);
       }
       return $ret;
    }

    function getFile($id)
    {
       $sql = "SELECT * FROM ".$this->table." WHERE fileid=".$id."";
       $array = $this->db->fetchArray($this->db->query($sql));
       $this->makeFile($array);
    }

    function makeFile($array)
    {
       foreach($array as $key=>$value)
       {
               $this->$key = $value;
       }
    }

    function store()
    {
       $myts =& MyTextSanitizer::getInstance();
       $fileRealName = $myts->addSlashes($this->filerealname);
       $downloadname = $myts->addSlashes($this->downloadname);
       $date = time();
       $mimetype = $myts->addSlashes($this->mimetype);
       $counter = intval($this->counter);
       $storyid = intval($this->storyid);

       if(!isset($this->fileid))
       {
			$newid = $this->db->genId($this->table."_fileid_seq");
            $sql = "INSERT INTO ".$this->table." (fileid, storyid, filerealname, date, mimetype, downloadname, counter) "."VALUES (".$newid.",".$storyid.",'".$fileRealName."','".$date."','".$mimetype."','".$downloadname."',".$counter.")";
       }else{
            $sql = "UPDATE ".$this->table." SET storyid=".$storyid.",filerealname='".$this->filerealname."',date=".$date.",mimetype='".$mimetype."',downloadname='".$downloadname."',counter=".$counter." WHERE fileid=".$this->fileid;
       }
       if(!$this->db->query($sql))
       {
			return false;
       }
       return true;
    }

	function delete($workdir=XOOPS_UPLOAD_PATH)
    {
		$sql = "DELETE FROM ".$this->table." WHERE fileid=".$this->fileid."";
		if(!$this->db->query($sql)){
			return false;
		}
		if (file_exists($workdir."/".$this->downloadname)) unlink($workdir."/".$this->downloadname);
       	return true;
    }

    function updateCounter()
    {
		$sql = "UPDATE ".$this->table." SET counter=counter+1 WHERE fileid=".$this->fileid."";
		if(!$this->db->queryF($sql))
		{
			return false;
        }
        return true;
    }
}
?>