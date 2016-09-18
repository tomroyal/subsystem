<?php

// setup script for first-time use

// connect to db
include './../inc/database.php';

// does config table data exist? 
$rs1 = pg_query($con, 'SELECT * FROM '.$schemaname.'.config');

if (pg_num_rows($rs1) != 1){
	// no config row, so not yet setup
	if ($_POST['s'] != 1){
		// not yet sent form
		$page_form = '
			<form action="#" method="post">
			<input type="hidden" name="s" value="1">
			<div class="form-row">
                <label>Your Email Address</label>
                <input type="email" size="40" autocomplete="off" name="e1" />
            </div>
            <div class="form-row">
                <label>Choose a Password</label>
                <input type="password" size="40" autocomplete="off" name="p1" />
            </div>
            <div class="form-row">
                <label>Confirm Password</label>
                <input type="password" size="40" autocomplete="off" name="p2" />
            </div>
            <div class="form-row">
                <label>Company or Business Name</label>
                <input type="text" size="40" autocomplete="off" name="c1" />
            </div>
            <button type="submit" class="submit-button">Save Settings</button>
		'; 
		$page_out = array('SubSystem Setup',$page_form);		
	}	
	else {
		// received form, process
	};
}
else {
	// already set up
	$page_out = array('Already Setup','Setup is already complete.');		
};


// handle $page_out
include './../inc/output_page.php';

// close db
pg_close($con);
?>
