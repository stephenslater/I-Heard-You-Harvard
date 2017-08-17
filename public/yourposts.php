<?php
    // configure page
    require("../includes/config.php");
    
    $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return false;
    }

    $sql = "SELECT count, title, location, heardby, story, upvotes, downvotes, favorites FROM submissions WHERE id = ? AND verified='1' order by count desc";
    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    $yourposts = mysqli_fetch_all($results);
    mysqli_stmt_close($stmt);
    $mysqli->close();

    // check for error
    if ($yourposts === false)
    {
        apologize("Error: Could not retrieve stories.");
    }    
    
    // to render right header in render function
    $_SESSION["fromacc"] = true;
    
    // display form
    render("../templates/yourposts_view.php", ["yourposts" => $yourposts]);
?> 
