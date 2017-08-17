<?php

// configuration
require("../includes/config.php");

// form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    // form not blank
    if (empty($_POST["oldpass"]) || empty($_POST["newpass"]) || empty($_POST["confirmnewpass"]))
    {
        apologize("You must provide old password, new password, and confirmation.");    
    }
    
    $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        return false;
    }

    // get password
    $sql = "SELECT hash FROM users WHERE id = ?";
    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "s", $_SESSION["id"]);
    mysqli_stmt_execute($stmt);
    $results = mysqli_stmt_get_result($stmt);
    $passrows = mysqli_fetch_all($results);
    mysqli_stmt_close($stmt);

    // get current hash
    //$passrows = query("SELECT hash FROM users WHERE id = ?", $_SESSION["id"]); 
    
    // make sure query worked
    if ($passrows === false)
    {
        apologize("Error: could not validate current password.");
    }
    
    // only one row
    $passrow = $passrows[0];
    
    // must have correct current password
    if (crypt($_POST["oldpass"], $passrow[0]) !== $passrow[0])
    {
        apologize("Please enter correct current password.");
    }
    
    // ensures passwords are identical
    if ($_POST["newpass"] !== $_POST["confirmnewpass"])
    {
        apologize("Passwords do not match.");
    }

    $newpass = crypt($_POST["newpass"]);

    $sql = "UPDATE users SET hash = ? WHERE id = ?";
    $stmt = mysqli_prepare($mysqli, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $newpass, $_SESSION["id"]);
    $updated = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    if ($updated === false) {
        apologize("Error: Could not reset password. Please try again.");
    }
    $mysqli->close();

    notify("Congrats! You successfully changed your password. Please navigate to your new destination using the menu above.");
    // sends user back to account page
    //redirect("account.php");
}
    
else
{
    // else display form
    require("../templates/changepass_form.php");
    require("../templates/footer.php");
}
?>
