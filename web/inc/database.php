<?php

// link to database - postgres heroku
	$schemaname = getenv('DB_SCHEMA');
	$con = pg_connect(getenv('DATABASE_URL')); 
// done

?>
