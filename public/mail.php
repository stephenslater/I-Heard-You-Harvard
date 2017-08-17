<?php
    // configuration
    require("../includes/config.php"); 

    // if button clicked
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["subject"]) || empty($_POST["message"]))
        {
            apologize("Must complete form.");
        }

        // store email in database
        $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
            return false;
        }

        $sql = "INSERT INTO emails (subject, message) VALUES (?, ?)";
        $stmt = mysqli_prepare($mysqli, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $_POST["subject"], $_POST["message"]);
        $store = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $mysqli->close();

        // receiver of email
        $to = "stephen.slater95@gmail.com";
        
        // subject of email
        $subject = $_POST["subject"];
        
        // email message
        $message = $_POST["message"];      
        
        // from email
        $from = "stephenslatertest@gmail.com";
        
        // header variable
        $headers = "From: " . $from;

        // send the mail
        $result = mail($to, $subject, $message, $headers);
        
        // check if sent, but still let user know message was stored in db even if email failed
        if ($result === true)
        {
            // if SQL storage failed
            if ($store === false)
            {
                apologize("Error: could not store email in database");
            }
        }
        notify("We have received your message. Thanks! You can now navigate to a different page using the menu above, or go back to review your submission.");
    }
    
    // contact us form
    else
    {
        render("../templates/mail_form.php");
    }
?>
