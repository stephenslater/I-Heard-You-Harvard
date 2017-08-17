<?php
    // configures page
    require("../includes/config.php");
    
    // to render the account page header later
    $_SESSION["fromacc"] = true;
    
    // displays page
    render("../templates/account_view.php");
?>
