<?php
// Makes the page start, Creates a header Title and gets the navigation menu from functions.php.
require_once('functions.php');
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


<h1>Credits Page</h1>
<h2>Andrew Forester</h2>
<h2>Student ID - w17004946</h2>
<h2>https://www.w3schools.com</h2>

<?php
echo endMain();
echo makeFooter();
echo makePageEnd();
?>


