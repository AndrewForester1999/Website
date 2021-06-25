<?php
// Makes the page start, Creates a header Title and gets the navigation menu from functions.php.
require_once('functions.php');
getSession();
echo makePageStart("Review it!", "style.css");
echo makeHeader("North East Events");
echo makeNavMenu("Categories");
echo startMain();
?>

<form method="post" action="login.php"> <!-- Connects to the login page. -->
    Username <input type="text" name="username"> <!-- Enter username. -->
    Password <input type="password" name="password"> <!-- Enter password. -->
    <input type="submit" value="Login"> <!-- Login button. -->
</form>
<!-- Allows the user to logout of the session. -->
Logout <a href = "logout.php" title = "Logout">Session.</a>


<?php
if (isset ($_SESSION['logged-in']) && $_SESSION['logged-in'])
{

    try {
        require_once("functions.php");
        $dbConn = getConnection(); // Connects to the MySQL Database.

        // This tells the server where to get the database details from.
        $sqlQuery = "SELECT eventID, eventTitle, venueName, catDesc, location, eventStartDate, eventEndDate, eventPrice
				 FROM NE_events
				 INNER JOIN NE_venue
				 ON NE_venue.venueID = NE_events.venueID
				 INNER JOIN NE_category
				 ON NE_category.catID = NE_events.catID
				 ORDER BY eventID";
        $queryResult = $dbConn->query($sqlQuery);

        while ($rowObj = $queryResult->fetchObject()) {
            echo "<div class='movie'>\n
                   <table> <!-- Displays the database data within a table. -->
                   <tr>
				   <td class='eventTitle'><a href='edit.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a></td>\n
				   <td class='venueName'>{$rowObj->venueName}</td>\n
				   <td class='catDesc'>{$rowObj->catDesc}</td>\n
				   <td class='location'>{$rowObj->location}</td>\n
				   <td class='eventStartDate'>{$rowObj->eventStartDate}</td>\n
				   <td class='eventStartDate'>{$rowObj->eventEndDate}</td>\n
				   </tr>
				   </table>
			  </div>\n";
        }
    } catch (Exception $e) {
        echo "<p>Query failed: " . $e->getMessage() . "</p>\n"; // If the database connection fails this message will be displayed.
    }

} else {
    echo "<p>You Must Be Logged In To Access This Page</p>";
    // If the user is not logged in they will not be able to access the admin.php page and this message will be displayed.


    echo endMain();
    echo makeFooter();
    echo makePageEnd();
    // Gets the function.php page footer and ends the page.
}

?>

