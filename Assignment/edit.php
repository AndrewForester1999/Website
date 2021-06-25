<?php
// Makes the page start, Creates a header Title and gets the navigation menu from functions.php.
require_once('functions.php');
echo makePageStart("Review it!", "style.css");
echo makeHeader("North East Events!");
echo makeNavMenu("Categories");
echo startMain();


// The edit page is fully functional however you cannot access it due to the login feature not working properly.

if (isset ($_SESSION['logged-in']) && $_SESSION['logged-in'])
{
// This  odes checks if these variables exist.
$eventID = filter_has_var(INPUT_GET, 'eventID') ? $_GET['eventID'] : null;
$venueID = filter_has_var(INPUT_GET, 'venueID') ? $_GET['venueID'] : null;
$catID = filter_has_var(INPUT_GET, 'catID') ? $_GET['catID'] : null;
if (empty($eventID)) {
    echo "<p>Please <a href='admin.php'>choose</a> an Event.</p>\n";
}
else {
    try {
        require_once("functions.php"); // Connects to the functions page.
        $dbConn = getConnection();
        // This tells the server where to get the database details from.
        $sqlQuery = "SELECT eventID, eventTitle, venueName, catDesc, eventStartDate, eventEndDate, eventPrice, NE_events.catID, NE_events.venueID
				 FROM NE_events
				 INNER JOIN NE_venue
				 ON NE_venue.venueID = NE_events.venueID
				 INNER JOIN NE_category
				 ON NE_category.catID = NE_events.catID
				 ORDER BY eventID";
        $result = $dbConn->query($sqlQuery);

        // Which data should be queried.
        $categoryQuery = "SELECT catID, catDesc
                          FROM NE_category
                          ORDER BY catID";
        $categoryOut = $dbConn->query($categoryQuery);

        // Which data should be queried.
        $venueQuery = "SELECT venueID, venueName 
                        FROM NE_venue
                        ORDER BY venueID";
        $venueOut = $dbConn->query($venueQuery);


        $row = $result->fetchObject();

        echo "
		<h1>Update '{$row->eventTitle}'</h1> // Gets the title of the event which is being changed.
		<form id='update' action='update.php' method='get'>
			<p>Event ID <input type='text' name='eventID' value='$eventID' readonly /></p>
			<p>Title <input type='text' name='title' size='50' value='{$row->eventTitle}' /></p>
			<select name='venueName'>
			<p>Venue <option value='{$row->venueID}'>{$row->venueName}</p>"; // Gets the venue of the event which is being changed.
             while ($venue = $venueOut->fetchObject()) {
                if ($venueID = $venue->venueID) {
                 echo "<option value='{$venue->venueID}'>{$venue->venueName}</option>";
            }
        }
            echo "
			</select>
			<select name='catDesc'> // Gets the description of the event which is being changed.
			<p>category <option value='{$row->catID}'>{$row->catDesc}</p>";
            while ($category = $categoryOut->fetchObject()) {
                if ($catID = $category->catID) {
                    echo "<option value='{$category->catID}'>{$category->catDesc}</option>";
                }
            }
            echo"
			</select>
			<p>Event Start Date <input type='text' name='eventStart' value='{$row->eventStartDate}' /></p> // Gets the event Start Date of the event which is being changed.
			<p>Event End Date <input type='text' name='eventEndDate' value='{$row->eventEndDate}' /></p> // Gets the event End Date of the event which is being changed.
			<p>Event Price <input type='text' name='eventPrice' value='{$row->eventPrice}' /></p>
			<p><input type='submit' name='submit' value='Update Event'></p>
		</form>
		";
    }
    catch (Exception $e){
        echo "<p>Event details not found: ".$e->getMessage()."</p>\n"; // If an error is found this message will be displayed to the user.
    }
}

} else {
    echo "<p>You Must Be Logged In To Access This Page</p>"; // If the user is not logged in this message will display as they cannot access this page.

    echo endMain();
    echo makeFooter();
    echo makePageEnd();
    // Gets the function.php page footer and ends the page.


}