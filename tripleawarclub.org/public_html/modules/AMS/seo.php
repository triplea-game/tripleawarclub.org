<?php
/*
 * $Id: seo.php 331 2007-12-23 16:01:11Z malanciault $
 * Module: AMS SEO, modified from SmartSection/
 * Author: Sudhaker Raj <http://xoops.biz>, NovaSmart Technology
 * Licence: GNU
 */
include "../../mainfile.php";     
//$seoOp = $_GET['seoOp'];
//$seoArg = $_GET['seoArg'];

$novaseo_op=$_GET['novaseo_op'];
$novaseo_id=$_GET['novaseo_id'];
$novaseo_pg=$_GET['novaseo_pg'];

//print $novaseo_op."-".$novaseo_id."-".$novaseo_pg."-";exit;

$novaseo_op_map = array(
	'0' => 'index.php',
	'1' => 'article.php',
	'2' => 'item.php',
	'3' => 'print.php'
);

if (! empty($novaseo_op))
{
	// module specific dispatching logic, other module must implement as
	// per their requirements.
	$newUrl = '/modules/AMS/' . $novaseo_op_map[$novaseo_op];

	$_ENV['PHP_SELF'] = $newUrl;
	$_SERVER['SCRIPT_NAME'] = $newUrl;
	$_SERVER['PHP_SELF'] = $newUrl;
	switch ($novaseo_op) {
		case '0':
            //http://xoops.novasmarttechnology.com/modules/AMS/index.php?storytopic=0&start=5
			$_SERVER['REQUEST_URI'] = $newUrl . '?storytopic=' . $novaseo_id . '&start=' . $novaseo_pg;
			$_GET['storytopic'] = $novaseo_id;
			$_GET['start'] = $novaseo_pg;
			break;
		case '1':
			$_SERVER['REQUEST_URI'] = $newUrl . '?storyid=' . $novaseo_id . '&page=' . $novaseo_pg;
			$_GET['storyid'] = $novaseo_id;
			$_GET['page'] = $novaseo_pg;
			break;
		case '2':
		default:
			$_SERVER['REQUEST_URI'] = $newUrl . '?storyid=' . $novaseo_id . '&page=' . $novaseo_pg;
			$_GET['storyid'] = $novaseo_id;
			$_GET['page'] = $novaseo_pg;
	}

	include( $novaseo_op_map[$novaseo_op]);
}

exit;

?>