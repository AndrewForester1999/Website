<?php

function getSession() {

   ini_set("session.save_path","/home/unn_w17004946/sessionData");
   session_start();
}

function getConnection()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w17004946",
            "unn_w17004946", "4CNZzd4MWPqJfj7J"); // Established a connection to mySQL.
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {

        throw new Exception("Connection error " . $e->getMessage(), 0, $e); // If an error occurs this message will be displayed.
    }
}



function makePageStart($maketitle,$css) {
    $pageStartContent = <<<PAGESTART
	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>$maketitle</title>  <!-- Creates the page title, "North East Events" -->
		<link href="$css" rel="stylesheet" type="text/css"> <!-- Style sheet for each page. -->
	</head>
	<body>
<div id="gridContainer">



PAGESTART;
    $pageStartContent .="\n";
    return $pageStartContent; // Makes the page start when executed
}

function makeHeader($makeHeader){
    $headContent = <<<HEAD
		<header>
			<h4>$makeHeader</h4> <!-- Creates the header of the page. -->
		</header>

HEAD;
    $headContent .="\n"; // Creates the content of the header.
    return $headContent;
}

function makeNavMenu() {
    $navMenuContent = <<<NAVMENU
        <!-- This creates the navigation bar at the top of each page. -->
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="bookEventsForm.php">Events</a></li>
				<li><a href="admin.php">Admin</a></li>
				<li><a href="credit.php">Credits</a></li>
				<li><a href="loginForm.php">Login</a></li>
			</ul>	
		</nav>
NAVMENU;
    $navMenuContent .= "\n";
    return $navMenuContent;
}


function startMain() {
    return "<main>\n";
}

function endMain() {
    return "</main>\n";
}


function makeFooter() { // Creates the footer of each page.
    $footContent = <<<FOOT
<footer>

</footer>
FOOT;
    $footContent .="\n"; // Creates the content of the footer
    return $footContent;
}

function makePageEnd() {
    return "</div>\n</body>\n</html>";
}

