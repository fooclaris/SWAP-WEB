<?php


// Free this line for a test
// test();

function array2texttable($data) {
	require "array2texttable.php";

	echo "<pre>";
	$renderer = new ArrayToTextTable($data);
	$renderer->showHeaders(true);
	$renderer->render();
	echo "</pre>";
}

?>
