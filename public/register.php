<?php
    // configuration
    require("../includes/config.php");

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {    
        // ensures user typed a username
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["confirmation"]))
        {
            apologize("You must provide your username, password, and confirmation :)");
        }
        
        // passwords are identical
        if ($_POST["password"] !== $_POST["confirmation"])
        {
            apologize("Passwords do not match.");
        }
        
        // insert a new user into database
        $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return false;
        }

        $password = crypt($_POST["password"]);
        $sql = "INSERT INTO users (username, hash) VALUES (?, ?)";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $_POST["username"], $password);
        $submit = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $mysqli->close();

        // if couldn't add new user, not unique
        if ($submit === false)
        {
            apologize("Username might already exist, or another problem.");
        }

        // remembers id
        else
        {
            $rows = query("SELECT LAST_INSERT_ID() AS id");
            $id = $rows[0][0];
            $_SESSION["id"] = $id;
            
            notify("Congrats on registering an account, " . $_POST["username"] . "! Now you can see and record your own posts, including those you've favorited, after going to your My Account page. Click the log in button above to enter your account.");
        }
    }

    // register form
    else
    {
        require("../templates/register_form.php");
        require("../templates/footer.php");
    }
?>
