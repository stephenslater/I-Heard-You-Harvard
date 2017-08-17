            <div id="wrapper1">
	            <div id="welcome" class="container">
		            <div class="title">
			            <?php
			                if (!empty($_SESSION["id"]))
			                {
			                    print("<span class='byline'>Welcome, " . htmlspecialchars($_SESSION["username"]) . "!</span>");
			                }
			            ?> 
	                </div>
		            <div class="content">
			            <div id="content">
                            <?php
                                // every submission
                                foreach ($stories as $i)
                                {
                                    $submission["count"] = $i[0];
                                    $submission["title"] = $i[1];
                                    $submission["location"] = $i[2];
                                    $submission["heardby"] = $i[3];
                                    $submission["story"] = $i[4];
                                    $submission["upvotes"] = $i[5];
                                    $submission["downvotes"] = $i[6];
                                    $submission["favorites"] = $i[7];            

                                    // print each story
                                    print("<div class='submission'><strong>" . htmlspecialchars($submission["title"]) . "</strong><br/><br/>");
                                    print("<div class='details'> " . htmlspecialchars($submission["story"]) . "</div><br/>");
                                    print("<div class='details'> " . htmlspecialchars($submission["location"]) . "</div>");
                                    print("<div class='details'> " . "Heard by: " . htmlspecialchars($submission["heardby"]) . "</div>");
                                    print("<form action='../public/upvote.php' method='post'><button type='submit' class='button' name='" . htmlspecialchars($submission["count"]) . "'>Upvote :-) " . htmlspecialchars($submission["upvotes"]) . "</button></form>");
                                    print("<form action='../public/downvote.php' method='post'><button type='submit' class='buttondown' name='" . htmlspecialchars($submission["count"]) . "'>Downvote :-( " . htmlspecialchars($submission["downvotes"]) . "</button></form>");
                                    print("<form action='../public/favorite.php' method='post'><button type='submit' class='buttonfav' name='" . htmlspecialchars($submission["count"]) . "'>Favorite! " . htmlspecialchars($submission["favorites"]) . "</button></form></div>");
                                } 
                            ?>
                            <br/>
                        </div>
                    </div>
	            </div>
            </div>
