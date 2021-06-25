<?php
ini_set("session.save_path", "/home/unn_w17004946/sessionData");
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login process script</title>
</head>
<body>

<?php // This checks if the 'username' and 'password' variable exist.
$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
$username = trim($username);
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$password = trim($password);

if (empty($username) || empty($password)) {
    echo "<p>You need to provide a username and a password. Please try 
          <a href='loginForm.php'>again</a>.</p>\n";
    // This displays a message telling the user they must enter a username and password.
}
else {
    try {
        unset($_SESSION['username']);
        unset($_SESSION['logged-in']);

        require_once("functions.php"); // Connects to the database through the functions page.
        $dbConn = getConnection();

        $querySQL = "SELECT passwordHash FROM NE_users WHERE username = :username"; // Checks mySQL for the correct Username and Password.
        $stmt = $dbConn->prepare($querySQL);
        $stmt->execute(array(':username' => $username));
        $user = $stmt->fetchObject();

        if ($user) {
            if (password_verify($password, $user->passwordHash)) {
                echo "<p> Logon Success!</p>\n"; // If the username and password check was successful this message will be displayed.
                echo "<a href='admin.php'>Admin page</a>\n"; // The user will then be displayed a link to the admin page.

                $_SESSION['logged-in'] = true; // 'true' means that the user is logged in.
                $_SESSION['username'] = $username;
            } else { // if the username or password was incorrect the following will be displayed.
                echo "<p>The username or password were incorrect. Please try 
                <a href='index.php'>again</a>.</p>\n";
            }
        } else {
            echo "<p>The username or password were incorrect. Please try
                  <a href='index.php'>again</a>.</p>\n";
        }
    } catch (Exception $e) {
        echo "Record not found: " . $e->getMessage(); // The console will show this if the username and password is incorrect.
    }

}
?>
</body>
</html>






