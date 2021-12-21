<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="container">
    <div class="content">
        <form action="index.php" method="POST" onSubmit="alert('Thank you for your feedback.');">
            <div class="user-details">
                <div class="input-box">
                    <span class="details">Title/Salutation</span>
                    <select>
                        <option>Pick a Title</option>
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                        <option value="Miss">Miss</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="input-box">
                </div>
                <div class="input-box">
                    <span class="details">First Name</span>
                    <input type="text" placeholder="e.g John" required>
                </div>
                <div class="input-box">
                    <span class="details">Last Name</span>
                    <input type="text" placeholder="e.g Smith" required>
                </div>
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="text" placeholder="e.g name@url" required>
                </div>
                <div class="input-box">
                    <span class="details">Mobile</span>
                    <input type="text" placeholder="e.g 07944 894 059" required>
                </div>
            </div>
            <div class="Terms">
                <input type="radio" name="gender" id="square-1">
                <span class="term-title"></span>
                <div class="category">
                    <label for="square-1">
                        <span class="square one"></span>
                        <span class="gender">I confirm that I am over 18 and <br>I have read and agreed to the <br><b><a href=https://www.google.com/">Terms and Conditions</a>, <a href=https://www.google.com/"><br>Privacy policy</a> and <a href=https://www.google.com/">Cookie Notice</a></b></span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Submit Form">
            </div>
        </form>
    </div>
</div>

</body>
</html>