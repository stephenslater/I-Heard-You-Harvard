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
        <title>submit a story</title>
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
        <link href="css/default.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/fonts.css" rel="stylesheet" type="text/css" media="all" />
        <!-- js form validation
        <script src="/js/jquery-1.10.2.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/scripts.js"></script>
        <script src="http://code.jquery.com/jquery-1.10.1.min.js">

            $(document).ready(function()
            {
                $('#inputs').submit(function()
                {
                    if ($('#username').val() == '' || $('#password').val() == '')
                    {
                        alert('Must enter username and password!');
                    }
                }
            }
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
			            <?php
			                if (empty($_SESSION["id"]))
			                {
			                    print("<li><a href=" . "login.php" . ">" . "Log In" . "</a></li>");
			                }
			                else
			                {
			                    print("<li><a href=" . "logout.php" . ">" . "Log Out" . "</a></li>");
			                }
			            
			                if (!empty($_SESSION["id"]))
			                {
			                    print("<li><a href=" . "account.php" . ">" . "My Account" . "</a></li>");
			                }
			            ?>
			            <li><a href="mail.php">Contact Us</a></li>
		            </ul>
	            </div>
            </div>
            <form id="inputs" action="submit.php" method="post">
                <div class="form-group">
                    <textarea id="item1" name="title" maxlength="50" placeholder="Title" style="min-height: 30px;"></textarea>
                </div>
                <div class="form-group">
                    <textarea id="item2" name="location" maxlength="50" placeholder="Location" style="min-height: 30px;"></textarea>
                </div>
                <div class="form-group">
                    <textarea id="item3" name="heardby" maxlength="50" placeholder="Your display name" style="min-height: 30px;"></textarea>
                </div>
                <div class="form-group">
                    <textarea id="item4" name="story" maxlength="200" placeholder="Story" style="min-height: 120px;"></textarea>
                </div>
                <div class="form-group">
                        <p>What year are you? (For stats purposes only--it won't show with your post)</p>
					    <select id="item5" name="statyear">
						    <option value=""></option>
						    <option value="freshman">Freshman</option>
						    <option value="sophomore">Sophomore</option>
						    <option value="junior">Junior</option>
						    <option value="senior">Senior</option>
						    <option value="otheryear">Other</option>
					    </select>
                </div>
                <div class="form-group">
                        <p>Where did you hear this? (For stats purposes only--it won't show with your post)</p>
						<select id="item6" name="statloc">
							<option value=""></option>
							<option value="dhall">Dhall</option>
							<option value="dorm">Dorm/House</option>
							<option value="bathroom">Bathroom</option>
							<option value="classroom">Classroom</option>
							<option value="outside">Outside</option>
							<option value="otherloc">Other</option>
						</select>
                </div>                
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Submit what you heard!</button>
                    <p>Once approved, your submission will appear on the homepage!</p>
                </div>
                <br/>
            </form>
