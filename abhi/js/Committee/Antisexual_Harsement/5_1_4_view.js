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

function validateannualReprt(event) {
    validateDoc(event, 'annualReprtError');
}

function validaterelevantDoc(event) {
    validateDoc(event, 'relevantDocError');
}
