<?php
$dbConn = new mysqli('localhost', 'unn_w17004946', '4CNZzd4MWPqJfj7J', 'unn_w17004946');
if ($dbConn->connect_error) {
    echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
    exit;
}
// Connects to mySQL Database.
