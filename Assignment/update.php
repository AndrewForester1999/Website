// Makes the page start, Creates a header Title and gets the navigation menu from functions.php.
<?php
require_once('functions.php');
echo makePageStart("Review it!", "style.css");
echo makeHeader("North East Events");
echo makeNavMenu("Categories");
echo startMain();

if (isset ($_SESSION['logged-in']) && $_SESSION['logged-in']) // Only allows acces to the page if the user is logged in.
{
// This checks if the following variables exist.
$eventID = filter_has_var(INPUT_GET, 'eventID') ? $_GET['eventID'] : null;
$eventTitle = filter_has_var(INPUT_GET, 'eventTitle') ? $_GET['eventTitle'] : null;
$venueName = filter_has_var(INPUT_GET, 'venueName') ? $_GET['venueName'] : null;
$catDesc = filter_has_var(INPUT_GET, 'catDesc') ? $_GET['catDesc'] : null;
$eventStartDate = filter_has_var(INPUT_GET, 'eventStartDate') ? $_GET['eventStartDate'] : null;
$eventEndDate = filter_has_var(INPUT_GET, 'eventEndDate') ? $_GET['eventEndDate'] : null;
$eventPrice = filter_has_var(INPUT_GET, 'eventPrice') ? $_GET['eventPrice'] : null;


$errors = false; // if they don't exist this will catch the error.

if (empty($eventID)) {
    echo "<p>You need to have selected an Event.</p>\n"; // The user must select an event or they cannot update the page.
    $errors = true;
}
if (empty($eventTitle)) {
    echo "<p>You need to have entered a Title.</p>\n"; // The user must select a Title or they cannot update the page.
    $errors = true;
}
if (empty($venueName)) {
    echo "<p>You need to choose a Venue.</p>\n"; // The user must select a venue name or they cannot update the page.
    $errors = true;
}
if (empty($catDesc)) {
    echo "<p>You need to choose a catID.</p>\n"; // The user must select a Description or they cannot update the page.
    $errors = true;
}
if (empty($eventStartDate)) {
    echo "<p>You need to choose an Event Start Date.</p>\n"; // The user must select an event start date or they cannot update the page.
    $errors = true;
}
if (empty($eventEndDate)) {
    echo "<p>You need to choose an Event End Date.</p>\n"; // The user must select an event end date or they cannot update the page.
    $errors = true;
}
if (empty($eventPrice)) {
    echo "<p>You need to choose an Event Price.</p>\n"; // The user must select an event price or they cannot update the page.
    $errors = true;
}
if ($errors === true) {
    echo "<p>Please try <a href='admin.php'>again</a>.</p>\n"; // If any errors occur the user will be redirected to the admin page.
}
else {
    try {
        require_once("functions.php");
        $dbConn = getConnection(); // Establishes a connection to the database through the functions.php page.

        // Updates the NE_events Database
        $updateSQL = "UPDATE NE_events 
                        SET eventTitle='$eventTitle', venueID='$venueName', catID='$catDesc', eventStartDate='$eventStartDate', eventEndDate='$eventEndDate', eventPrice='$eventPrice' 
                        WHERE eventID='$eventID'";
        $dbConn->exec($updateSQL);
        echo "<p>Event</p>\n";
    } catch (Exception $e) {
        echo "<p>Event not updated: " . $e->getMessage() . "</p>\n"; // This will be shown if errors occur.
    }
}

} else {
    echo "<p>You Must Be Logged In To Access This Page</p>"; // If the user is not logged in this will show and they will not be able to access the admin page.

    echo endMain();
    echo makeFooter();
    echo makePageEnd();
    // Gets the function.php page footer and ends the page.
}
