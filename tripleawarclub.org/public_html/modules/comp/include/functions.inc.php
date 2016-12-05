<?php
/*
 * Created on 01.10.2006
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

/** 
 * Function to transform the SQL date into a user readable string
 * @param string date in yyyy-mm-dd format
 * @return string 
 */
function date2string($date) {
	list($year, $month, $day) = explode("-", $date);
	switch($month) {
		case "01": $month = _COMP_DATE_JAN;
			break;
		case "02": $month = _COMP_DATE_FEB;
			break;
		case "03": $month = _COMP_DATE_MAR;
			break;
		case "04": $month = _COMP_DATE_APR;
			break;
		case "05": $month = _COMP_DATE_MAY;
			break;
		case "06": $month = _COMP_DATE_JUN;
			break;
		case "07": $month = _COMP_DATE_JUL;
			break;
		case "08": $month = _COMP_DATE_AUG;
			break;
		case "09": $month = _COMP_DATE_SEP;
			break;
		case "10": $month = _COMP_DATE_OCT;
			break;
		case "11": $month = _COMP_DATE_NOV;
			break;
		case "12": $month = _COMP_DATE_DEC;
			break;
	}
	
	$string = "$month $day, $year";
	return $string;
}

/**
 * Returns an array to help with organizing pages that display many items per
 * page over multiple pages.
 *
 * @var $num_items the total number of items to diplay across all pages
 * @var $items_per_page the maximum number of items to display per page (0 means all)
 * @var $page_num the page number to display
 * @return a mixed array of values
 */
function getPageOrganization($num_items, $items_per_page = 20, $page_num = 1){
	$org = array();

	// Verify all the arguments
	if( is_numeric($num_items) && is_numeric($items_per_page) && is_numeric($page_num) && ($num_items > 0) ){
		$org['num_items'] = $num_items;

		// Check bounds
		switch(true) {
			// Display all items
			case ($items_per_page == 0 ):
				$org['items_per_page'] = $org['num_items'];
				break;
			// Argument out of bounds
			case (($items_per_page < 1) || ($items_per_page > $org['num_items'])):
				$org['items_per_page'] = 20;
				break;
			default:
				$org['items_per_page'] = $items_per_page;
				break;
		}

		// Calculate the number of pages
		$org['num_pages'] = intval(ceil($org['num_items'] / $org['items_per_page']));
		
		// Check bounds
		if( ($page_num < 1) || ($page_num > $org['num_pages']) ){
			$org['page_num'] = 1;
		}
		else{
			$org['page_num'] = $page_num;
		}

		// Get the first and one past last item to display
		$org['start_item'] = ($org['page_num'] - 1) * $org['items_per_page'];
		$org['end_item'] = $org['page_num'] * $org['items_per_page'];

		// Check for boundary condition
		if( $org['end_item'] > $org['num_items'] ){
			$org['end_item'] = $org['num_items'];
		}
	}
	
	return $org;
}

?>