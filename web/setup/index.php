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
			Welcome. This tool creates the database setup required for SubSystem, and also the admin user account that you will use to manage it.</p>
			<p>If you\'ve just deployed the app to Heroku, it will have created a free <a href="https://devcenter.heroku.com/articles/heroku-postgres-plans" target="new">Hobby Dev</a> database for you. This has row and uptime limits. You may wish to remove it now, and replace it with a paid-for database before continuing.</p>
		
			<form action="#" method="post">
			<input type="hidden" name="s" value="1">
			<div class="form-row">
                <label>Company or Business Name</label>
                <input type="text" size="40" autocomplete="off" name="c1" />
            </div>
            <div class="form-row">
                <label>System URL (include https://)</label>
                <input type="text" size="40" autocomplete="off" value = "https://'.$_SERVER['SERVER_NAME'].'"name="u1" />
            </div>
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
            
            <button type="submit" class="submit-button">Save Settings</button>
		'; 
		$page_out = array('SubSystem Setup',$page_form);		
	}	
	else {
		// received form, process it
		// get data from form
		$f_company = $_POST['c1'];
		$f_urlbase = $_POST['u1'];
		$f_email = $_POST['e1'];
		$f_pass1 = $_POST['p1'];
		$f_pass2 = $_POST['p2'];
		
		// check data
		$form_errors = 0;
		$form_errortext = "";
		
		if ($f_pass1 != $f_pass2){
			$form_errors = 1;
			$form_errortext = "Passwords did not match.";	
		};
		// todo
		
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
