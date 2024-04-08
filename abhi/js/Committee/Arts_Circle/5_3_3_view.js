//////////////////////////////////////////////////////////////////////////////      In which Academic Year you want to Store Data ?     //////////////////////////////////////////////
$(document).ready(function() {
    var currentYear = new Date().getFullYear(); // Get the current year

    $("#datepicker").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
        startDate: "2022",
        //endDate: "currentYear", // Remove the quotes around currentYear to use the variable
        autoclose: true
    });

    // Add an input event handler to validate numeric input
    $("#datepicker").on("input", function() {
        var inputValue = $(this).val();
        var numericValue = parseInt(inputValue);
        
        if (isNaN(numericValue)) {
            $(this).val(""); // Clear the input
        }
    });
});


//////////////////////////////////////////////////////////////////////////////      Date of Event/Competition      //////////////////////////////////////////////
function datepicker2Validation() {
    // Validation for the Date
    const dobDateInput = document.getElementById('datepicker2');

    // Set the minimum date allowed (2019-01-01 in this case)
    const minDate = new Date('2019-01-01');

    // Function to set the maximum date allowed to the current date
    function setMaxDate() {
        const today = new Date();
        const maxDate = today.toISOString().split('T')[0]; // Format as "YYYY-MM-DD"
        dobDateInput.max = maxDate;
    }

    // Call the setMaxDate1 function to set the maximum date initially
    setMaxDate();

    // Attach an event listener to the input element to dynamically update the maximum date
    dobDateInput.addEventListener('input', setMaxDate);

    // Function to validate the selected date on form submission
    function validateRegDate() {
        const selectedDate = new Date(dobDateInput.value);
        if (selectedDate < minDate) {
            alert('Please select a date on or after 2019-01-01.');
            return false;
        }
        return true;
    }

    // Attach an event listener to the form to validate the date on form submission
    const form = document.querySelector('form');
    form.addEventListener('submit', validateRegDate);
}

// Call the datepicker2Validation function to set up the validation for this specific element
datepicker2Validation();



//////////////////////////////////////////////////////////////////////////////     Name of the Event/Competition     //////////////////////////////////////////////

function validatenameEvent() {
    var regName = /^[a-zA-Z ]+$/;
    var name = document.getElementById('nameEvent').value;
    var error = document.getElementById("nameEventError");

    var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    });

    var finalnameEvent = capitalizedWords.join(" ");
    document.getElementById('nameEvent').value = finalnameEvent;

    if (finalnameEvent.length === 0 || regName.test(finalnameEvent)) {
        error.style.display = "none";
    } else {
        error.style.display = "block";
    }
}

document.getElementById('nameEvent').addEventListener('input', validatenameEvent);



/////////////////////////////////////////////      Type of the Event/Competition(Sport/cultural/Technical/academic fest/ant other event through active club/forum)     //////////////////////////////////////////////////////////////////////////////

function validatetypeEvent() {
    var regName = /^[a-zA-Z ]+$/;
    var name = document.getElementById('typeEvent').value;
    var error = document.getElementById("nameEventError");

    var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    });

    var finaltypeEvent = capitalizedWords.join(" ");
    document.getElementById('typeEvent').value = finaltypeEvent;

    if (finaltypeEvent.length === 0 || regName.test(finaltypeEvent)) {
        error.style.display = "none";
    } else {
        error.style.display = "block";
    }
}

document.getElementById('typeEvent').addEventListener('input', validatenameEvent);


////////////////////////////////////////////////////////////////////////////////      Validation for link       //////////////////////////////////////////////////////////////////////////////      
function validateLink() {
    var linkInput = document.getElementById('enterLink');
    var linkValidationError = document.getElementById('linkValidationError');
    var linkRegex = /^(ftp|http|https):\/\/[^ "]+$/;

    if (linkInput.value.trim() === '') {
        // Empty input, hide error message
        linkValidationError.style.display = 'none';
    } else if (!linkRegex.test(linkInput.value)) {
        // Invalid link format, show error message
        linkValidationError.style.display = 'block';
    } else {
        // Valid link format, hide error message
        linkValidationError.style.display = 'none';
    }
}

// Attach event listener to validate link on keyup
document.getElementById('enterLink').addEventListener('keyup', validateLink);

