<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["title"]) || empty($_POST["location"]) || 
                empty($_POST["heardby"]) || empty($_POST["story"]) || empty($_POST["statyear"]) || empty($_POST["statloc"]))
        {
            apologize("You must fill in all items.");
        }
    
        $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return false;
        }

        // if user isn't logged in
        if (empty($_SESSION["id"]))
        {
            $sql = "INSERT INTO submissions (title, location, heardby, story, statyear, statloc) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($mysqli, $sql);
            mysqli_stmt_bind_param($stmt, "ssssss", $_POST["title"], $_POST["location"], $_POST["heardby"], $_POST["story"], 
                $_POST["statyear"], $_POST["statloc"]);
            
        }
        
        // user is logged in
        else
        {
            // store the submission and the logged-in user, used for the user's own posts page
            $sql = "INSERT INTO submissions (id, title, location, heardby, story, statyear, statloc) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($mysqli, $sql);
            mysqli_stmt_bind_param($stmt, "sssssss", $_SESSION["id"], $_POST["title"], $_POST["location"], $_POST["heardby"], $_POST["story"], 
                $_POST["statyear"], $_POST["statloc"]);
        }

        // insert story
        $submit = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $mysqli->close();

        // check if couldn't submit story
        if ($submit === false)
        {
            apologize("Error submitting story :(");
        }
        
        if ($_POST["statyear"] == 'freshman')
        {
            // store year of user who submitted
            $store = query("UPDATE statistics SET freshman = freshman + 1");
        }
        else if($_POST["statyear"] == 'sophomore')
        {
            // store year of user who submitted
            $store = query("UPDATE statistics SET sophomore = sophomore + 1");
        }
        else if ($_POST["statyear"] == 'junior')
        {
            // store year of user who submitted
            $store = query("UPDATE statistics SET junior = junior + 1");
        }
        else if($_POST["statyear"] == 'senior')
        {
            // store year of user who submitted
            $store = query("UPDATE statistics SET senior = senior + 1");
        }
        else
        {
            // store year of user who submitted
            $store = query("UPDATE statistics SET other = other + 1");        
        }
        
        // store location of user's story
        if ($_POST["statloc"] == 'dhall')
        {
            $locate = query("UPDATE statistics SET dhall = dhall + 1");
        }
        else if($_POST["statloc"] == 'dorm')
        {
            $locate = query("UPDATE statistics SET dorm = dorm + 1");
        }
        else if ($_POST["statloc"] == 'bathroom')
        {
            $locate = query("UPDATE statistics SET bathroom = bathroom + 1");
        }
        else if ($_POST["statloc"] == 'classroom')
        {
            $locate = query("UPDATE statistics SET classroom = classroom + 1");
        }
        else if ($_POST["statloc"] == 'outside')
        {
            $locate = query("UPDATE statistics SET outside = outside + 1");        
        }
        else
        {
            $locate = query("UPDATE statistics SET otherloc = otherloc + 1");
        }

        // check for error
        if ($store === false || $locate === false)
        {
            apologize("Error: could not store class year or location.");
        }

        notify("Thank you for submitting! Your story is being reviewed. You can now navigate to a different page using the menu above, or go back to review your submission.");
    }

    else
    {
        // else render form
        require("../templates/submit_form.php");
        require("../templates/footer.php");
    }
?>
