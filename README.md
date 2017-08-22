# I Heard You Harvard
CS50 Final Project by Stephen Slater  
Harvard University, Fall 2013   
iheardyouharvard.com    

My project is iheardyouharvard.com. I Heard You Harvard is a site for people to share funny 
comments (anonymously) that they hear around Harvard campus--be they odd, humorous, disturbing, 
out of context, or all four. 

### Site Features ###
From the homepage of iheardyouharvard.com, users can access via clicking the menu bar:
-	Submit a Story: here users will find text boxes to record the title of their story, 
    the location where they heard it, a pseudonym for themselves (often a funny phrase), and the story itself. After submissions are approved in the database, they will show up in all appropriate locations on the site (homepage, popular posts, favorites, your posts)
-	Statistics: Users can see submission statistics in two pie charts. The first shows the year of the submitter, and the second shows the location.
-	Popular: this feature ranks the top 10 posts on the website in order of the highest positive vote count (upvotes are positive, downvotes are negative).
-	Log In/Log Out: users can choose to register and log in to the site. If the user is currently logged in,
    this link will display Log Out.
-	My Account: see features below.
-	Contact Us: Here users can submit a quick form to send an email to the website’s administrator.

### Account Features ###
For the user's My Account page (once logged in):
-	Submit a Story: same form as above, except now that the user is logged in, the website will store 
    the post with the user’s unique id for access in the Your Posts section later.
-	Your Posts: this is a history of a user’s posts that were submitted while the user was logged in.
-	Favorites: this is perhaps one of the coolest features of the site. Users have the ability to 
    mark posts in the Homepage and Your Posts as favorites, and then when the users view Favorites within 
    My Account, they will see a record of the posts the have marked as favorites.
-	Change Password: Not happy with your previous password? Afraid someone is going to hack your 
    anonymous account? For whatever reason, users can change their password here.
-	Log Out: self-explanatory.

### Notes ###
As far as the Homepage (and Your Posts and Favorites pages), users are able to vote on stories—but a given 
user is allowed just one upvote and one downvote per story (design explained in the design document). The way 
I implemented this, I did not have to deal with IP addresses or cookies to ensure that one user never gets 
to vote twice in the same direction.

There are also links to other entertaining online Harvard websites, like I Saw You Harvard, 
cs50, and even one secret link (try it out for yourself!). These are in the footer of the page, for anyone who 
wants “more harvard.”

## Credits

**Author:** Created and Designed by *Stephen Slater*

---

###### Copyright © 2013 iheardyouharvard.com. All rights reserved.
