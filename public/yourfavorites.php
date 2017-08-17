<?php
    // configure page
    require("../includes/config.php");

    $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return false;
    }

    $sql = "SELECT count FROM voting WHERE id = ? AND favorites = '1' order by count desc";
    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    $yourfavs = mysqli_fetch_all($results);
    mysqli_stmt_close($stmt);
    $mysqli->close();

    // query the posts that user has marked as favorites
    // $yourfavs = query("SELECT count FROM voting WHERE favorite='1' AND id = ? order by count desc", 
    //                 $_SESSION["id"]);
    
    // check if queried the user's favorites
    if ($yourfavs === false)
    {
        apologize("Error: Could not retrieve favorites.");
    }  
    
    // to display proper account page header
    $_SESSION["fromacc"] = true;    
    
    // display page
    render("../templates/favorite_view.php", ["yourfavs" => $yourfavs]);
?>
