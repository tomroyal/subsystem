<?php

// setup script for first-time use

// connect to db
include './../inc/database.php';

// does config table data exist? 
$rs1 = pg_query($con, 'SELECT * FROM '.$schemaname.'.config');

if (pg_num_rows($rs1) != 1){
	// no config row, so not yet setup
	if ($_GET['s'] != 1){
		// not yet sent form
		
		
	}	
	else {
		// received form, process
	};
}
else {
	// already set up
	$page_out = array('Already Setup','<p>Setup is already complete.</p>');		
};


// handle $page_out

// close db
pg_close($con);
?>
