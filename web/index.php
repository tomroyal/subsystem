<?php

// public index, to come

// connect to db
include './inc/database.php';

$page_out = array('Welcome','This is the home page tbc.');		

// handle $page_out
include './inc/output_page.php';

// close db
pg_close($con);
?>
