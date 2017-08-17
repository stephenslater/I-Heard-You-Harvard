<?php
    // configure page
    require("includes/config.php");
    
    // get stories
    $stories = query("SELECT count, title, location, heardby, story, upvotes, downvotes, favorites FROM submissions WHERE verified='1' order by count desc");
    
    // check for correct
    if ($stories === false)
    {
        apologize("Error: Could not retrieve stories.");
    }    
    
    // display homepage
    render("templates/homepage.php", ["stories" => $stories]);
?>
