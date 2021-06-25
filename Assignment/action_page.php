<?php
$forename = isset ($_REQUEST['eventTitle']) ? $_REQUEST['eventTitle'] : null;
$surname = isset ($_REQUEST['eventDescription']) ? $_REQUEST['eventDescription'] : null;
$email = isset ($_REQUEST['venueID']) ? $_REQUEST['venueID'] : null;
$landLineTelNo = isset ($_REQUEST['catID']) ? $_REQUEST['catID'] : null;
$mobileTelNo = isset ($_REQUEST['eventStartDate']) ? $_REQUEST['eventStartDate'] : null;
$postalAddress = isset ($_REQUEST['eventEndDate']) ? $_REQUEST['eventEndDate'] : null;
$sendMethod = isset ($_REQUEST['eventPrice']) ? $_REQUEST['eventPrice'] : null;

$errors = false;




if (empty($eventTitle)) {
    echo "<p>You Have Not Entered Your Forename</p>\n";
}
elseif($eventTitle){
    echo "<p>$eventTitle</p>\n";
}

if (empty($eventDescription)) {
    echo "<p>You Have Not Entered Your Surname</p>\n";
}
elseif($eventDescription){
    echo "<p>$eventDescription</p>\n";
}

if (empty($venueID)) {
    echo "<p>You Have Not Entered Your email</p>\n";
}
elseif($venueID){
    echo "<p>$venueID</p>\n";
}

if (empty($catID)) {
    echo "<p>You Have Not Entered Your LandLine Telephone Number</p>\n";
}
elseif($catID){
    echo "<p>$catID</p>\n";
}

if (empty($eventStartDate)) {
    echo "<p>You Have Not Entered Your Mobile Telephone Number</p>\n";
}
elseif($eventStartDate){
    echo "<p>$eventStartDate</p>\n";
}

if (empty($eventEndDate)) {
    echo "<p>You Have Not Entered Your Postal Address</p>\n";
}
elseif($eventEndDate){
    echo "<p>$eventEndDate</p>\n";
}

if (empty($eventPrice)) {
    echo "<p>You Have Not chosen a Contact method</p>\n";
}
elseif($eventPrice){
    echo "<p>$eventPrice</p>\n";
}


include 'database_conn.php';		         // db connection

$forename = $dbConn->real_escape_string($eventTitle);
$surname = $dbConn->real_escape_string($eventDescription);
$email = $dbConn->real_escape_string($venueID);
$landLineTelNo = $dbConn->real_escape_string($catID);
$mobileTelNo = $dbConn->real_escape_string($eventStartDate);
$postalAddress = $dbConn->real_escape_string($eventEndDate);
$sendMethod = $dbConn->real_escape_string($eventPrice);


$sql = "INSERT INTO NE_events (eventTitle, eventDescription, venueID, catID, eventStartDate, eventEndDate, eventPrice)
                VALUES ($eventTitle, $eventDescription, $venueID, $catID, $eventStartDate, $eventEndDate, $eventPrice";

$success = $dbConn->query($sql);

// Check for and handle query failure
if($success === false) {
    echo "<p>Try Again</p>\n";
    exit;
}

else {
    echo "<p>Thank You</p>\n";
}

$success->close();
mysqli_close($dbConn);





