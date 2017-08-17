<?php
    // configuration
    require("../includes/config.php"); 

    // if button clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // the post count of the post whose button was clicked
        $postcount = (array_keys($_POST)[0]);

        $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return false;
        }

        // check if there already exists a row in the database for this post and user
        $sql = "SELECT upvotes FROM voting WHERE id = ? AND count = ? AND (upvotes = '1' OR downvotes = '1' OR favorites = '1')";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["id"], $postcount);
        mysqli_stmt_execute($stmt);
        $results = mysqli_stmt_get_result($stmt);
        $rows = mysqli_fetch_all($results);
        mysqli_stmt_close($stmt);

        // if the user has upvoted, downvoted, or favorited this post before
        if ($rows) {

            // prevent duplicate action
            if ($rows[0][0] == '1') {
                apologize("You've already upvoted this post!");
            } else {
                $sql = "UPDATE voting SET upvotes = '1' WHERE id = ? AND count = ?";
            }      
        } else {
            $sql = "INSERT INTO voting (id, count, upvotes) VALUES (?, ?, '1')";
        }
        
        // Update voting history table
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $_SESSION["id"], $postcount);
        $vote = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // check if recorded that user has used his/her 1 upvote for the post
        if ($vote === false)
        {
            apologize("Error: Could not update voting history.");
        }               
    
        // update submission display on homepage
        $sql = "UPDATE submissions SET upvotes = upvotes + 1 WHERE count = ?";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "s", $postcount);
        $update = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        // check if recorded vote count
        if ($update === false)
        {
            apologize("Error: Could not record upvote.");
        }

        // close connection to database
        $mysqli->close();
        
        // uses javascript history so that page doesn't load from very top when returns, but rather where clicked
        notify("You upvoted!");
    }
?>
