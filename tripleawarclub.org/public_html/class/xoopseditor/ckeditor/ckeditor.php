<?php 
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code 
 which is considered copyrighted (c) material of the original comment or credit authors.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 *  FCKeditor adapter for XOOPS
 *
 * @copyright       The XOOPS Project http://sourceforge.net/projects/xoops/
 * @license         http://www.fsf.org/copyleft/gpl.html GNU public license
 * @package         class
 * @subpackage      editor
 * @since           2.3.0
 * @author          Taiwen Jiang <phppp@users.sourceforge.net>
 * @version         $Id: formckeditor.php 2154 2008-09-22 02:38:32Z phppp $
 */

xoops_load('XoopsEditor');

class XoopsFormCkeditor extends XoopsEditor
{
	/**
     * Constructor
     *
     * @param    array   $configs  Editor Options
     */
    function __construct($configs)
    {
        $this->rootPath = "/class/xoopseditor/ckeditor";
        parent::__construct($configs);
    }
    
    function XoopsFormCkeditor($configs)
    {
        $this->__construct($configs);
    }

    /**
     * prepare HTML for output
     *
     * @param   bool    decode content?
     * @return  sting HTML
     */
    function render($decode = true)
    {
		static $ckeditor_added;
		
		if ( is_object($GLOBALS['xoopsModule']) ) 
			$dirname = $GLOBALS['xoopsModule']->getVar('dirname');
		else
			$dirname = 'system';
		
		if ( is_object($GLOBALS['xoTheme']) ) {
			
			if ( $ckeditor_added==false ) {
				$GLOBALS['xoTheme']->addScript( XOOPS_URL . $this->rootPath . '/ckeditor/ckeditor.js' );
				
				if ( file_exists( XOOPS_URL . $this->rootPath . '/ckeditor/modules/config.'.$dirname.'.js' ) ) 
					$GLOBALS['xoTheme']->addScript( XOOPS_URL . $this->rootPath . '/ckeditor/modules/config.'.$dirname.'.js' );			
				else
					$GLOBALS['xoTheme']->addScript( XOOPS_URL . $this->rootPath . '/ckeditor/config.js' );
				$ckeditor_added = true;
			}
			
			$retb .= '<script type="text/javascript">//<![CDATA[
			CKEDITOR.replace( \'' . $this->getName() . '\' );
			//]]>
			</script>';
			
		} else {
			
			if ( $ckeditor_added==false ) {		
				$ret .= '<script src="' . XOOPS_URL . $this->rootPath . '/ckeditor/ckeditor.js' . '" type="text/javascript"></script>';

				if ( file_exists( XOOPS_URL . $this->rootPath . '/ckeditor/modules/config.'.$dirname.'.js' ) ) 
					$ret .= '<script src="' . XOOPS_URL . $this->rootPath . '/ckeditor/modules/config.'.$dirname.'.js' . '" type="text/javascript"></script>';
				else				
					$ret .= '<script src="' . XOOPS_URL . $this->rootPath . '/ckeditor/config.js' . '" type="text/javascript"></script>';
				$ckeditor_added=true;
			}
			
			$retb .= '<script type="text/javascript">//<![CDATA[
			CKEDITOR.replace( \'' . $this->getName() . '\' );
			//]]>
			</script>';
			
		}

        if ($decode) {
            $ts =& MyTextSanitizer::getInstance();
            $value = $ts->undoHtmlSpecialChars( $this->getValue() );
        } else {
            $value = $this->getValue();
        }
	
	   return $ret."<textarea name='" . $this->getName() . "' id='" . $this->getName() . "'  title='" . $this->getTitle() . "' rows='" . $this->getRows() . "' cols='" . $this->getCols() . "'" . $this->getExtra() . ">" . $value . "</textarea>".$retb;
		
    }

}
?>