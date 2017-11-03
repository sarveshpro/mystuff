<?php
/**
 * search
 * 
 * @package Sngine v2+
 * @author Zamblek
 */

// fetch bootstrap
require('bootstrap.php');

// user access
if(!$system['system_public']) {
	user_access();
}

// page header
page_header($system['system_title'].' - '.__("Search"));

try {

	// search
	if(isset($_GET['query'])) {
		/* get results */
		$results = $user->search($_GET['query']);
		/* assign variables */
		$smarty->assign('query', $_GET['query']);
		$smarty->assign('results', $results);
		$smarty->assign('results_num', count($results));
	}

	// get ads
	$ads = $user->ads('search');
	/* assign variables */
	$smarty->assign('ads', $ads);

	// get widget
	$widget = $user->widget('search');
	/* assign variables */
	$smarty->assign('widget', $widget);

} catch (Exception $e) {
	_error(__("Error"), $e->getMessage());
}

// page footer
page_footer("search");

?>