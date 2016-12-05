<?php
//switch first and second article position
// save first article in temp variable
$temp = $block['spotlights'][0];
// set first array value to the second article
$block['spotlights'][0] = $block['spotlights'][1];
// set second array value (main position) to the temp variable
$block['spotlights'][1] = $temp;
// clean up
unset($temp);
?>
