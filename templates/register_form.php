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
        <title>register</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js form validation
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script>
            $(document.ready(function()
            {
                $('#inputs').submit(function()
                {
                    if ($('#username').val() == "" || $('#password').val() == "" || $('#confirmation').val() == "")
                    {
                        alert('Must enter username, password, and confirmation!');
                    }
                    else if ($('#password').val() != $('#confirmation'))
                    {
                        alert('Passwords must match.');
                    }
                });
            });
        </script>-->
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
				        <li><a href="statistics.php">Statistics</a></li>
				        <li><a href="popular.php">Popular</a></li>
				        <li><a href="login.php">Log In</a></li>
				        <li><a href="mail.php">Contact Us</a></li>
			        </ul>
		        </div>
            </div>
            <form id="inputs" action="register.php" method="post">
                    <div class="form-group">
                        <input autofocus class="form-control" id="username" name="username" maxlength="16" placeholder="Username" type="text"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="password" name="password" maxlength="16" placeholder="Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="confirmation" name="confirmation" maxlength="16" placeholder="Confirm Password" type="password"/>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-default">Register</button>
                    </div>
            </form>
            <br/>
            <div class="or_this">
                or <a href="login.php">log in</a>
            </div>
            <br/>
