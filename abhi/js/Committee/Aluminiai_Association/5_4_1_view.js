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


//////////////////////////////////////////////////////// Name of Aluminai Assosiation /////////////////////////////////////////////////////////////////////////////////

function validatenameAluminai() {
    var regName = /^[a-zA-Z ]+$/;
    var name = document.getElementById('nameAluminai').value;
    var error = document.getElementById("nameAluminaiError");

    var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    });

    var finalnameAluminai = capitalizedWords.join(" ");
    document.getElementById('nameAluminai').value = finalnameAluminai;

    if (finalnameAluminai.length === 0 || regName.test(finalnameAluminai)) {
        error.style.display = "none";
    } else {
        error.style.display = "block";
    }
}

document.getElementById('nameAluminai').addEventListener('input', validatenameAluminai);



//////////////////////////////////////////////////////////////////////////////   Registration Number    /////////////////////////////////////////////////////////////////
function validateRegistrationNumber(inputElement) {
    var inputValue = inputElement.value;
    var sanitizedValue = inputValue.replace(/[^a-zA-Z0-9]/g, ''); // Remove hyphens
    inputElement.value = sanitizedValue.toUpperCase(); 

    validateRegistrationNumberFormat(); 
}

function validateRegistrationNumberFormat() {
    var subcode = document.getElementById("registrationNumberInput").value;
    var regsubcode = /^[A-Z0-9]+$/; // Only uppercase letters and numbers
    var error = document.getElementById("registrationNumberError");

    if (subcode.length === 0) {
        error.style.display = "none";
    } else if (!regsubcode.test(subcode)) {
        error.style.display = "block";
    } else {
        error.style.display = "none";
    }
}



//////////////////////////////////////////////////////// Aluminai Supported Activities /////////////////////////////////////////////////////////////////////////////////

function validatealuminaiSupported() {
    var regName = /^[a-zA-Z ]+$/;
    var name = document.getElementById('aluminaiSupported').value;
    var error = document.getElementById("aluminaiSupportedError");

    var sanitizedName = name.replace(/[^a-zA-Z ]/g, '');

    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function(word) {
        return word.charAt(0).toUpperCase() + word.slice(1);
    });

    var finalaluminaiSupported = capitalizedWords.join(" ");
    document.getElementById('aluminaiSupported').value = finalaluminaiSupported;

    if (finalaluminaiSupported.length === 0 || regName.test(finalaluminaiSupported)) {
        error.style.display = "none";
    } else {
        error.style.display = "block";
    }
}

document.getElementById('aluminaiSupported').addEventListener('input', validatealuminaiSupported);



///////////////////////////////////////////////////////////////    Uploads     ///////////////////////////////////////////////////////////////////////////////////////
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

function validateauditedSatement(event) {
    validateDoc(event, 'auditedSatementError');
}

function validatelistAluminai(event) {
    validateDoc(event, 'listAluminaiError');
}
