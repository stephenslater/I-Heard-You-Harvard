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
        <title>change password</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
    </head>
    <body>
        <div id="logo">
		    <h1><a href="../index.php">i heard you harvard</a></h1>
            <h3><i>share funny comments from campus</i></h3>
        </div>
        <div id="top">
	        <div id="header" class="container">
		        <div id="menu">
			        <ul>
				        <li class="homepage"><a href="../index.php">Homepage</a></li>
				        <li><a href="submit.php">Submit A Story</a></li>
				        <li><a href="yourposts.php">Your Posts</a></li>
				        <li><a href="yourfavorites.php">Favorites</a></li>
				        <li><a href="logout.php">Log Out</a></li>			    
			        </ul>
		        </div>
            </div>
            <form action="changepass.php" method="post">
                    <div class="form-group">
                        <input autofocus class="form-control" name="oldpass" placeholder="Old Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="newpass" placeholder="New Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="confirmnewpass" placeholder="Confirm New Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Create New Password</button>
                    </div>
            </form>
            <br/>
            <div class="or_this">
                or return to <a href="account.php">my account</a>
            </div>
            <br/>
