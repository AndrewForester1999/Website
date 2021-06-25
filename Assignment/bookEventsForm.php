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

<?php
/* This code dynamically generates a web page containing a form designed with the html required to display one
checkbox for each of the records currently held in the nmc_records database table has been provided for you in the
assessment section for the module on blackboard. The user can select one or more records that they are interested in
ordering by clicking the checkboxes.
Use the browser to look at the structure of the html generated by the php code. */

$url = "http://unn-izge1.newnumyspace.co.uk/KF5002/assessment/bookEventsFormInc.php"; // bookEventsForm HTML
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl);
curl_close($curl);
echo $result;
?>

<script type="text/javascript"  src="functions.js">

</script>

<?php
echo endMain();
echo makeFooter();
echo makePageEnd();
// Gets the function.php page footer and ends the page.
?>
