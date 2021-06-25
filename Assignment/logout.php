<?php
session_start();
unset($_SESSION["username"]); // Clears the Session data Username.
unset($_SESSION["password"]); // Clears the Session data Password.

echo 'You have successfully logged out'; // If successful this message will be displayed.
header('Refresh: 2; URL = login.php'); // After 2 seconds the page will direct you to login.php.
