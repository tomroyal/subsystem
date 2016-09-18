<?php

// output a page with heading and content (in array $page_out) using the template

// set some defaults if not known
if ($ss_company == ""){
	$ss_company = "SubSystem Payments";	
};
if ($ss_footer == ""){
	$ss_footer = "Powered by SubSystem Payments";	
}; 
if ($ss_urlbase == ""){
	$ss_urlbase = 'https://'.$_SERVER['SERVER_NAME'];	// https should be required.	
}; 

// top
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?echo($ss_company);?></title>
  
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="<?echo($ss_urlbase);?>/inc/css/normalize.css">
  <link rel="stylesheet" href="<?echo($ss_urlbase);?>/inc/css/skeleton.css">

</head>
<body>

  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
	  	<div class="twelve columns">
			<h1 class="remove-bottom" style="margin-top: 40px"><?echo($ss_company);?></h1>
			<hr />
		</div>

    
		<div class="twelve columns u-pull-left">	
		
<?php

// content
echo('<h3>'.$page_out[0].'</h3>');	
echo('<p>'.$page_out[1].'</p>');			

// bottom

?>
		<div class="u-cf">&nbsp;</div>
		<div class="twelve columns">
			<hr />
			<p><?echo($ss_footer);?></p>
			<p>All payments are processed securely using <a href="https://stripe.com">Stripe</a>. No card details are stored on this server.</p> 
		</div>
	</div><!-- container-->
</body>
</html>

<?php

?>
