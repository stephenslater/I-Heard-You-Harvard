<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Adequately 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20130910
-->
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>i heard you harvard</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="../public/css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="../public/css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="logo">
		    <h1><a href="../index.php">i heard you harvard</a></h1>
            <h3>
            	<i>share funny comments from campus</i>
            </h3>
        </div>
        <div id="top">
	        <div id="header" class="container">
		        <div id="menu">
			        <ul>
				        <li class="homepage"><a href="../index.php">Homepage</a></li>
				        <li><a href="../public/submit.php">Submit A Story</a></li>
				        <li><a href="../public/statistics.php">Statistics</a></li>
				        <li><a href="../public/popular.php">Popular</a></li>
				        <?php
				            if (empty($_SESSION["id"]))
				            {
				                print("<li><a href=" . "../public/login.php" . ">" . "Log In" . "</a></li>");
				            }
				            else
				            {
				                print("<li><a href=" . "../public/logout.php" . ">" . "Log Out" . "</a></li>");
				            }
				        
				            if (!empty($_SESSION["id"]))
				            {
				                print("<li><a href=" . "../public/account.php" . ">" . "My Account" . "</a></li>");
				            }
				        ?>	
				        <li><a href="../public/mail.php">Contact Us</a></li>	
			        </ul>
		        </div>
            </div>
