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



/////////////////////////////////////////////////////////////////////////   From to To Date  ///////////////////////////////////////////////////////////////////////////

document.addEventListener("DOMContentLoaded", function() {
    var currentDate = new Date();
    currentDate.setHours(0, 0, 0, 0); // Set current time to midnight (00:00:00)

    var fromdateInput = document.getElementById("fromdate");
    var todateInput = document.getElementById("todate");

    // Set the maximum date for the Joining Date
    fromdateInput.setAttribute("max", formatDate(currentDate));

    // Attach input event listener to the Joining Date input
    fromdateInput.addEventListener("input", function() {
        var jDate = new Date(fromdateInput.value);

        // Set the minimum date for the Leaving Date based on the Joining Date
        todateInput.setAttribute("min", formatDate(jDate));

        // Set the maximum date for the Leaving Date as today's date
        var maxDate = new Date();
        maxDate.setHours(0, 0, 0, 0); // Set current time to midnight (00:00:00)
        todateInput.setAttribute("max", formatDate(maxDate));

        // Reset the Leaving Date field if it is earlier than the Joining Date or not set
        if (todateInput.value < fromdateInput.value) {
            todateInput.value = "";
        }
    });

    function formatDate(date) {
        var dd = String(date.getDate()).padStart(2, "0");
        var mm = String(date.getMonth() + 1).padStart(2, "0"); // January is 0!
        var yyyy = date.getFullYear();
        return yyyy + "-" + mm + "-" + dd;
    }
});

// // // // //Script for hiding the date // // // // 
function enableToDate() {
    var fromDateInput = document.getElementById('fromdate');
    var toDateInput = document.getElementById('todate');

    if (fromDateInput.value !== '') {
        toDateInput.removeAttribute('disabled');
    } else {
        toDateInput.setAttribute('disabled', 'disabled');
    }
}



///////////////////////////////////////////////////////////////    Uploads pdf's     ///////////////////////////////////////////////////////////////////////////////////////
function validateDoc(event, errorElementId) {
    const file = event.target.files[0];
    const errorElement = document.getElementById(errorElementId);

    const maxFileSizeInBytes = 2 * 1024 * 1024; // 2 MB

    if (!file.type.match('application/pdf')) {
        errorElement.textContent = 'File is not a PDF.';
        event.target.value = ''; // Clear the file input
        return;
    }

    if (file.size > maxFileSizeInBytes) {
        errorElement.textContent = 'File is too big. Maximum size is 2 MB.';
        event.target.value = ''; // Clear the file input
        return;
    }

    // If the file is valid, clear the error message
    errorElement.textContent = '';
}

function validateNotice(event) {
    validateDoc(event, 'NoticeError');
}

function validateReportEvent(event) {
    validateDoc(event, 'reportEventError');
}




///////////////////////////////////////////////////////////////    Number of Participants     ///////////////////////////////////////////////////////////////////////////////////////

function validatenumberParticipants(inputElement) {
    var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    inputElement.value = sanitizedValue; // Set sanitized value back into the input field
  
    var enteredValue = parseInt(sanitizedValue);
    var minLimit = parseInt(inputElement.getAttribute("min"));
    var maxLimit = parseInt(inputElement.getAttribute("max"));
  
    // Check if the entered value is within the specified limits
    if (sanitizedValue.length === 0) {
        document.getElementById("numberParticipantsError").style.display = "none"; // Hide the error message
        inputElement.setCustomValidity(""); // Clear custom validity
    } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
        document.getElementById("numberParticipantsError").style.display = "block";
        inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
    } else {
        document.getElementById("numberParticipantsError").style.display = "none";
        inputElement.setCustomValidity("");
    }
  }
  
  // Add an event listener to the input field
  document.getElementById("numberParticipants").addEventListener("input", function () {
    validatenumberParticipants(this);
  });



///////////////////////////////////////////////////////////////    Uploads photo's     ///////////////////////////////////////////////////////////////////////////////////////
function validatePhoto(event, errorElementId, isGeotag) {
    const file = event.target.files[0];
    const errorElement = document.getElementById(errorElementId);

    const maxFileSizeInBytes1 = isGeotag ? 2 * 1024 * 1024 : 500 * 1024; // Adjusted maximum file size based on geotag or non-geotag
    const maxFileSizeInBytes2 = 2 * 1024 * 1024; // Maximum size for geotag photos

    if (!file.type.match('image/jpeg') && !file.type.match('image/png') && !file.type.match('image/jpg')) {
        errorElement.textContent = 'File is not in correct format.';
        event.target.value = ''; // Clear the file input
        return;
    }
    
    if (file.size > maxFileSizeInBytes1) {
        errorElement.textContent = isGeotag ? 'File is too big. Maximum size is 2 MB.' : 'File is too big. Maximum size is 500 KB.';
        event.target.value = ''; // Clear the file input
        return;
    }

    // If the file is valid, clear the error message
    errorElement.textContent = '';
}

function validateGeoTagPhoto(event) {
    validatePhoto(event, 'GeoPError', true); 
}

function validateGeoTagPhoto1(event) {
    validatePhoto(event, 'GeoP1Error', true); 
}

function validateCurrentPhoto(event) {
    validatePhoto(event, 'currentphotoError', false); 
}

function validateCurrentPhoto1(event) {
    validatePhoto(event, 'currentphoto1Error', false); 
}
