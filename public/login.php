<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["username"]) || empty($_POST["password"]))
        {
            apologize("You must provide your username and password.");
        }

        // query database for user        
        $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return false;
        }

        $sql = "SELECT id, hash FROM users WHERE username = ?";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "s", $_POST["username"]);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($results);
        mysqli_stmt_close($stmt);
        mysqli_close($link);

        if ($rows === false)
        {
            apologize("Error: Could not look up your account.");
        }

        // if we found user, check password
        if (count($rows) == 1)
        {
            // first (and only) row
            $row = $rows[0];

            // compare hash of user's input against hash that's in database
            if (crypt($_POST["password"], $row[1]) == $row[1])
            {
                // remember that user's now logged in by storing user's ID in session
                $_SESSION["id"] = $row[0];
                $_SESSION["fromacc"] = true;

                // remember username for display
                $_SESSION["username"] = $_POST["username"];
                  
                redirect("../index.php");
            }
        }

        // else apologize
        apologize("Invalid username and/or password.");
    }

    // login form
    else
    {
        require("../templates/login_form.php");
        require("../templates/footer.php");
    }

?>
