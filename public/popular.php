<?php
    require("../includes/config.php");
    
    $populars = query("SELECT count, title, location, heardby, story, upvotes, downvotes, favorites FROM submissions WHERE verified='1' 
                    && (upvotes - downvotes) >= 0 order by (upvotes - downvotes) desc LIMIT 10");
                    
    if ($populars === false)
    {
        apologize("Error: Could not retrieve most popular posts!");
    }
    
    render("../templates/popular_view.php", ["populars" => $populars]);
?>  
