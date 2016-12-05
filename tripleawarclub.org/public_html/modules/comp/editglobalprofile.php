<?php
/*
 * Created on Sep 18, 2006
 */
include '../../mainfile.php';
include XOOPS_ROOT_PATH.'/header.php';

$uid = isset($_POST['uid']) ? $_POST['uid'] : $_GET['uid'];
$action = $_POST['action'];
$country = $_POST['country'];
$status = $_POST['status'];
$date = $_POST['date'];

// Only useful for logged in users
if( !is_object($xoopsUser) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_NEED_LOGIN));
}
// Check for required value
elseif( !isset($uid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
}
// Check if current user is the profile to edit
elseif( ($xoopsUser->getVar('uid') != $uid) ){
	redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
}
else{

	// First display of page
	if( !isset($action) ){
		$player_handler =& xoops_getmodulehandler('player');
		$profile = $player_handler->getPlayerProfile($uid);

		include XOOPS_ROOT_PATH.'/class/xoopsformloader.php';

		$form = new XoopsThemeForm(ucwords(_COMP_EDIT).' '.ucwords(_COMP_PROFILE), 'profileupdate', 'editglobalprofile.php', 'POST');
		$form->addElement(new XoopsFormHidden('uid', $uid));

		$country_list = XoopsLists::getCountryList();
		$form->addElement(new XoopsFormLabel(ucwords(_COMP_CURRENT).' '.ucwords(_COMP_COUNTRY), $country_list[$profile['country']]));
		$country_select = new XoopsFormSelect(ucwords(_COMP_NEW).' '.ucwords(_COMP_COUNTRY), "country", $profile['country'], 1);
		$country_select->addOptionArray($country_list);
		$form->addElement(&$country_select);

		switch($profile['status']){
			// Player active
			case 0:
				$form->addElement(new XoopsFormLabel(ucwords(_COMP_CURRENT).' '.ucwords(_COMP_STATUS), ucwords(_COMP_STATUS_ACTIVE)));
				$status_radio = new XoopsFormRadio(ucwords(_COMP_NEW).' '.ucwords(_COMP_STATUS), "status", 0);
				$status_radio->addOption(0, ucwords(_COMP_STATUS_ACTIVE));
				$status_radio->addOption(1, ucwords(_COMP_STATUS_INACTIVE));
				$form->addElement(&$status_radio);
				$form->addElement(new XoopsFormTextDateSelect(ucwords(_COMP_RETURN_DATE), "date", 20, strtotime("+14 days")));
				$form->addElement(new XoopsFormButton("", "action", ucwords(_COMP_SAVE), "submit"));
				break;
			// Player inactive
			case 1:
				$form->addElement(new XoopsFormLabel(ucwords(_COMP_CURRENT).ucwords(_COMP_STATUS), ucwords(_COMP_STATUS_INACTIVE)));
				$status_radio = new XoopsFormRadio(ucwords(_COMP_NEW).' '.ucwords(_COMP_STATUS), "status", 1);
				$status_radio->addOption(0, ucwords(_COMP_STATUS_ACTIVE));
				$status_radio->addOption(1, ucwords(_COMP_STATUS_INACTIVE)); 
				$form->addElement(&$status_radio);
				$form->addElement(new XoopsFormTextDateSelect(ucwords(_COMP_RETURN_DATE), "date", 20, strtotime($profile['return_date'])));
				$form->addElement(new XoopsFormButton("", "action", ucwords(_COMP_SAVE), "submit"));
				break;
			// Player inactive or deleted
			default:
				redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
		}

		$form->display();
	}
	// Update the player's profile
	else{
		// Check for necessary values.
		if( !isset($country) || !isset($status) || !isset($date) ){
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_MISSING_VALUE));
		}
		// Check for invalid values.
		elseif( !is_numeric($status) ){
			redirect_header("index.php", 3, ucfirst(_COMP_ERRORS_INVALID_VALUE));
		}
		else{
			$user_handler =& xoops_getmodulehandler('user');
			redirect_header("profile.php?lid=".$lid, 3, $user_handler->updateGlobalProfile($country, $status, $date));
		}
	}
}

include XOOPS_ROOT_PATH.'/footer.php';

?>

