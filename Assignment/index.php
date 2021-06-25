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

<h3>Special Offers</h3>
<aside id="offers"></aside>

<script>
    window.addEventListener('load', function () { // Creates a function.
        "use strict";

        const GET_OFFERS = 'getOffers.php'; // Connects to the getOffers page.

        function getURLOffers() {
            fetch(GET_OFFERS)
                .then(
                    function (response) {
                        return response.text();
                    })
                .then(
                    function (data) {
                        console.log(data);
                        document.getElementById('offers').innerHTML = "<p>" + data + "</p>"; // Gets the event Title, event Category and event price from getOffers page.
                    })
                .catch(
                    function (err) {
                        console.log("Something went wrong!", err); // If an error occurs this message will show within the console.
                    });
        }
        getURLOffers();
        setInterval(function () { getURLOffers () }, 5000); // This sets the interval as 5 seconds. Every 5 seconds the special offer will refresh.

    });
</script>


<h3>XML Offers</h3>
<aside id="XMLOffers"></aside>

<script>

    window.addEventListener('load', function () {
        "use strict";

        const GET_XML_OFFERS = 'getOffers.php?useXML'; // Gets XML offers from the getOffers.php page.

        function getXMLOffers() {
            fetch(GET_XML_OFFERS) // Gets the offers.
                .then(
                    function (response) {
                        return response.text();
                    })
                .then(
                    function (data) {
                        console.log(data);
                        let parser = new DOMParser();
                        let xmlDoc = parser.parseFromString(data, "text/xml");
                        let text = document.getElementById("XMLOffers");
                        let catDesc = xmlDoc.getElementsByTagName("catDesc")[0].innerHTML; // Gets the description of the order.
                        let eventPrice = xmlDoc.getElementsByTagName("eventPrice")[0].innerHTML; // Gets the price of the order.
                        let eventTitle = xmlDoc.getElementsByTagName("eventTitle")[0].innerHTML; // Gets the event Title of the offer.
                        text.innerHTML = eventTitle + catDesc + eventPrice;
                    })
                .catch(
                    function (err) {
                        console.log("Something went wrong!", err); // If an error occurs this message is displayed within the browser console.
                    });
        }
        getXMLOffers(); // If success full the XML offers will show on the page.

    });

</script>

<!-- Gets the function.php page footer and ends the page. -->

<?php
echo endMain();
echo makeFooter();
echo makePageEnd();
?>

