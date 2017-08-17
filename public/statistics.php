 <?php   
    require("../includes/config.php");

    // get statistics data from SQL
    $statistics = query("SELECT * FROM statistics");
    
    // check for error
    if ($statistics === false) {
        apologize("Error: Could not fetch statistics.");
    }

    if (empty($_SESSION["id"])) {
        $_SESSION["fromacc"] = false;
    } else {
        $_SESSION["fromacc"] = true;
    }

    // display page
    render("../templates/statistics_view.php", ["statistics" => $statistics]);
?>
