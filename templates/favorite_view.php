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
                                /** 
                                 * Unfortunately, this feature of the site does not follow perfect 
                                 * MVC model. I can't render the html and pass in the stories because 
                                 * it must print one submission a time, so I have to query w/ $stories here.
                                 */

                                // get the submissions that given user has favorited
                                $mysqli = new mysqli("localhost", "stesla57_harvard", "Project7695", "stesla57_harvard");
                                if ($mysqli->connect_errno) {
                                    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
                                    return false;
                                }

                                if ($yourfavs) {

                                    foreach ($yourfavs as $story) {
                                        $sql = "SELECT title, story, location, heardby, upvotes, downvotes, favorites FROM submissions WHERE count = ? order by count desc";
                                        $stmt = mysqli_prepare($mysqli, $sql);
                                        mysqli_stmt_bind_param($stmt, "s", $story[0]);
                                        mysqli_stmt_execute($stmt);
                                        $storyResults = mysqli_stmt_get_result($stmt);
                                        $submission = mysqli_fetch_all($storyResults);
                                        mysqli_stmt_close($stmt);

                                        if ($submission) {
                                            // display favorites
                                            print("<div class='submission'><strong>" . htmlspecialchars($submission[0][0]) . "</strong><br/><br/>");
                                            print("<div class='details'> " . htmlspecialchars($submission[0][1]) . "</div><br/>");
                                            print("<div class='details'> " . htmlspecialchars($submission[0][2]) . "</div>");
                                            print("<div class='details'> " . "Heard by: " . htmlspecialchars($submission[0][3]) . "</div>");
                                            print("<form action='upvote.php' method='post'><button type='submit' class='button' name='" . htmlspecialchars($story[0]) . "'>Up vote :-) " . htmlspecialchars($submission[0][4]) . "</button></form>");
                                            print("<form action='downvote.php' method='post'><button type='submit' class='buttondown' name='" . htmlspecialchars($story[0]) . "'>Down vote :-( " . htmlspecialchars($submission[0][5]) . "</button></form>"); 
                                            print("<form action='../public/favorite.php' method='post'><button type='submit' class='buttonfav' name='" . htmlspecialchars($story[0]) . "'>Favorite! " . htmlspecialchars($submission[0][6]) . "</button></form></div>");
                                        } else {
                                            apologize("Error: Could not retrieve your favorites.");
                                        }
                                    }

                                } else {
                                    print("
                                            <div class='title'>
                                                <br/>
                                                <span class='byline'>You have no favorited posts!</span>
                                                <br/>
                                                <br/>
                                                <br/>
                                            </div>
                                           ");                               
                                }
                                ?>
                            <br/>
                        </div>
                    </div>
                </div>
            </div>
