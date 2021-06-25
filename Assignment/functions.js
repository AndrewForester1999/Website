

window.addEventListener('load', function() { // This makes a function that will run when the page is loaded up.
    'use strict';
    // The following constants are all used for certain parts of the form.
    // This is done by either ID or Name.
    const tAC = document.getElementsByName("termsChkbx")[0];
    const l_form = document.getElementById('bookingForm');
    const button = document.getElementsByName("submit")[0];
    const tACText = document.getElementById("termsText");
    const events = document.getElementsByName("event[]");
    const noOfEvents = events.length;
    const tradeCustomer = document.getElementById("tradeCustDetails");
    const customerType = document.getElementsByName("customerType")[0];
    const collection = document.getElementsByName("deliveryType");
    const noOfCollections = collection.length;
    const companyName = document.getElementsByName("companyName")[0];
    const retailCustomer = document.getElementById("retCustDetails");
    let total = 0;
    let prevColl = 0;
    // Calls the function called collCharge.
    collCharge();
    l_form.total.value = total;
    // Sets the total.


    for (let i = 0; i < noOfEvents; i++) {  // This should loop the number of events. This loops through the events multiple times to make sure an event has been checked by the user.
        events[i].addEventListener('click', function() {
            let value = parseFloat(events[i].getAttribute('data-price'));
            if (events[i].checked) { // If and when the check box is checked.
                total = total + value; // Total is equal to itself and plus the value.
            } else { // if not this command will run.
                total = total - value; // The value of total is equal to itself minus the value of value.
            }
            if (total <= 0) { // this see's if the amount for the total is equal to or less than 0 and then sets it to 0.
                total = 0;
            }
            collCharge();
            let roundedTotal = total.toFixed(2); // Makes a rounded total.
            l_form.total.value = roundedTotal; // Sets the form to the value of roundedTotal.
        });

    }

    for (let x = 0; x < noOfCollections; x++) {
        collection[x].addEventListener('click', function () { // if activated the following commands will be executed.
            collCharge();
            let roundedTotal = total.toFixed(2); // Creates a rounded total and then stores it in roundedTotal.
            l_form.total.value = roundedTotal;
            // Makes the value to the value of roundedTotal

        });
    }

    function collCharge() {
        for (let x = 0; x < noOfCollections; x++) {  // This should loop the number of events. This loops through the events multiple times to make sure an event has been checked by the user.
            let collCost = parseFloat(collection[x].getAttribute('data-price')); // This gets the value of data-price, it then parses it.
            if (collection[x].checked) { // If and when the check box is checked.
                if (collCost != prevColl) { // If the value is not equal then...
                    total = total - prevColl; // This then takes away the previous value.
                    total = total + collCost; // This adds it to the total.
                    prevColl = collCost; // This then sets the old cost to the new cost.

                }
            }

        }
    }

    button.addEventListener('click', function() {
        checkForm();
    });
    function checkForm() { // Tis is the form validation.
        const customerForename = document.getElementsByName("forename")[0]; // Gets customers forename.
        const customerSurname = document.getElementsByName("surname")[0]; // Gets customers surname.
        let checked = 0;

        for (let i = 0; i < noOfEvents; i++) { // Loops as many times as the value of noOfEvents.
            if (events[i].checked === true) { // If and when the check box is checked.
                checked++; // Value of the variable checked goes up by 1.
            }
        }
        if (customerType.value.trim() === "") {  // If the user has not selected a customer type it will inform them that they must choose one.
            button.disabled = true;
            alert("Enter a customer type please");
            tAC.checked = false;
            text();
        } else if (customerType.value === "ret" && customerForename.value.trim() === "") {  // If a Forename is not chosen the user will be told this via a prompt and the submit button will be disabled.
            button.disabled = true;
            alert("Enter a forename please");
            tAC.checked = false;
            text();
        } else if (customerType.value === "ret" && customerSurname.value.trim() === "") { // If a Surname is not chosen the user will be told this via a prompt and the submit button will be disabled.
            // it will disable the submit button and launch the function text()
            button.disabled = true;
            alert("Enter a surname please");
            tAC.checked = false;
            text();
        }else if (customerType.value === "trd" && companyName.value.trim() === "") { // If the customer chooses company and the company name isn't set then the user will be told.

            button.disabled = true;
            alert("Enter a Company Name please");
            tAC.checked = false;
            text();
        }else if (checked < 1) {
            button.disabled = true;
            alert("You need to select at least one event");
            tAC.checked = false;
            text();
        }else {
            button.disabled = false;
        }
    }

    function text() {
        tACText.style.color = "red";
        tACText.style.fontWeight = "bold";
        button.disabled = true;
    }
    tAC.addEventListener('click', function() {
        if (tAC.checked === true) { // If and when the check box is checked.
            tACText.style.color = "black"; // It will change the text colour to black.
            tACText.style.fontWeight = ""; // It will remove the bold font.
            button.disabled = false; // This will then enable to submit button.
        } else { //Otherwise
            text(); // Links to the functions called text()
        }
    });
});