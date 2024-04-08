//////////////////////////////////////////////////////////////////////////////      In which Academic Year you want to Store Data ?     //////////////////////////////////////////////
$(document).ready(function () {
    var currentYear = new Date().getFullYear(); // Get the current year
  
    $("#datepicker").datepicker({
      format: "yyyy",
      viewMode: "years",
      minViewMode: "years",
      startDate: "2022",
      //endDate: "currentYear", // Remove the quotes around currentYear to use the variable
      autoclose: true,
    });
  
    // Add an input event handler to validate numeric input
    $("#datepicker").on("input", function () {
      var inputValue = $(this).val();
      var numericValue = parseInt(inputValue);
  
      if (isNaN(numericValue)) {
        $(this).val(""); // Clear the input
      }
    });
  });
  
  
  
/////////////////////////////////////////////////////////////////////////////   Program Code    ///////////////////////////////////////////////////////////////////////////////
 function validateProgramCode() {
    var regName = /^[A-Z0-9() -]+$/;
    var name = document.getElementById("programcode").value.toUpperCase();
    var error = document.getElementById("programcodeError");
  
    var sanitizedName = name.replace(/[^A-Z0-9() -]/g, "");
  
    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function (word) {
      return word.charAt(0).toUpperCase() + word.slice(1);
    });
  
    var finalprogramcode = capitalizedWords.join(" ");
    document.getElementById("programcode").value = finalprogramcode;
  
    if (finalprogramcode.length === 0 || regName.test(finalprogramcode)) {
      error.style.display = "none";
    } else {
      error.style.display = "block";
    }
  }
  
  document
    .getElementById("programcode")
    .addEventListener("input", validateProgramCode);
  
  


/////////////////////////////////////////////////////////////////////////////   Program Name    ///////////////////////////////////////////////////////////////////////////////
function validateProgramName() {
    var regName = /^[a-zA-Z0-9 ]+$/;
    var name = document.getElementById("program_name").value;
    var error = document.getElementById("programNameError");
  
    var sanitizedName = name.replace(/[^a-zA-Z0-9 ]/g, "");
  
    var words = sanitizedName.split(" ");
    var capitalizedWords = words.map(function (word) {
      return word.charAt(0).toUpperCase() + word.slice(1);
    });
  
    var finalprogram_name = capitalizedWords.join(" ");
    document.getElementById("program_name").value = finalprogram_name;
  
    if (finalprogram_name.length === 0 || regName.test(finalprogram_name)) {
      error.style.display = "none";
    } else {
      error.style.display = "block";
    }
  }
  
  document
    .getElementById("program_name")
    .addEventListener("input", validateProgramName);
  
  
 //////////////////////////////////////////////////////////////////////////////     Fresh Student appeared in Final Year     //////////////////////////////////////////////
 function validatefreshStudent(inputElement) {
    var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    inputElement.value = sanitizedValue; // Set sanitized value back into the input field
  
    var enteredValue = parseInt(sanitizedValue);
    var minLimit = parseInt(inputElement.getAttribute("min"));
    var maxLimit = parseInt(inputElement.getAttribute("max"));
  
    // Check if the entered value is within the specified limits
    if (sanitizedValue.length === 0) {
        document.getElementById("numberrFreshStudAppearedError").style.display = "none"; // Hide the error message
        inputElement.setCustomValidity(""); // Clear custom validity
    } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
        document.getElementById("numberrFreshStudAppearedError").style.display = "block";
        inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
    } else {
        document.getElementById("numberrFreshStudAppearedError").style.display = "none";
        inputElement.setCustomValidity("");
    }
  }
  
  // Add an event listener to the input field
  document.getElementById("numberrFreshStudAppeared").addEventListener("input", function () {
    validatefreshStudent(this);
  });



//////////////////////////////////////////////////////////////////////////////     Passed in Final Year     //////////////////////////////////////////////
function validatePassed(inputElement) {
    var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    inputElement.value = sanitizedValue; // Set sanitized value back into the input field

    var enteredValue = parseInt(sanitizedValue);
    var minLimit = parseInt(inputElement.getAttribute("min"));
    var maxLimit = parseInt(inputElement.getAttribute("max"));

    // Get the value of Fresh Student appeared in Final Year
    var freshStudentValue = parseInt(document.getElementById("numberrFreshStudAppeared").value);

    // Check if the entered value is within the specified limits and not greater than Fresh Student value
    if (sanitizedValue.length === 0) {
        document.getElementById("passedInFinalError").style.display = "none"; // Hide the error message
        inputElement.setCustomValidity(""); // Clear custom validity
    } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit || enteredValue > freshStudentValue) {
        document.getElementById("passedInFinalError").style.display = "block";
        inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + Math.min(maxLimit, freshStudentValue) + ".");
    } else {
        document.getElementById("passedInFinalError").style.display = "none";
        inputElement.setCustomValidity("");
    }
}

// Add an event listener to the input field
document.getElementById("passedInFinal").addEventListener("input", function () {
    validatePassed(this);
});


//////////////////////////////////////////////////////////////////////////////     Percentage(%) of Passing      //////////////////////////////////////////////
function updatePercentage() {
    // Get the error message element for Passed in Final Year
    var passedErrorElement = document.getElementById("passedInFinalError");
  
    // Check if the error message is visible for Passed in Final Year
    if (passedErrorElement.style.display === "block") {
        // If error message is visible, hide the percentage field and return
        document.getElementById("percentageofPassing").value = '';
        return;
    }

    // If no error, calculate the percentage
    var freshStudentValue = parseInt(document.getElementById("numberrFreshStudAppeared").value);
    var passedValue = parseInt(document.getElementById("passedInFinal").value);
    
    // Calculate percentage
    var percentage = (passedValue / freshStudentValue) * 100;

    // Check if the calculation is valid
    if (!isNaN(percentage) && isFinite(percentage)) {
        document.getElementById("percentageofPassing").value = percentage.toFixed(2); // Display percentage with 2 decimal places
    } else {
        document.getElementById("percentageofPassing").value = ''; // Clear the field if calculation is not valid
    }
}

// Add event listeners to both input fields
document.getElementById("numberrFreshStudAppeared").addEventListener("input", updatePercentage);
document.getElementById("passedInFinal").addEventListener("input", updatePercentage);



///////////////////////////////////////////////////////////////    Uploads     ///////////////////////////////////////////////////////////////////////////////////////
function validateDoc(event, errorElementId) {
    const file = event.target.files[0];
    const errorElement = document.getElementById(errorElementId);
  
    const maxFileSizeInBytes = 2 * 1024 * 1024; // 2 MB
  
    if (!file.type.match("application/pdf")) {
      errorElement.textContent = "File is not a PDF.";
      event.target.value = ""; // Clear the file input
      return;
    }
  
    if (file.size > maxFileSizeInBytes) {
      errorElement.textContent = "File is too big. Maximum size is 2 MB.";
      event.target.value = ""; // Clear the file input
      return;
    }
  
    // If the file is valid, clear the error message
    errorElement.textContent = "";
  }
  
function validateAnnualReport(event) {
    validateDoc(event, "annualReportError");
}

function validateCertifiedReport(event) {
    validateDoc(event, "certifiedReportError");
}