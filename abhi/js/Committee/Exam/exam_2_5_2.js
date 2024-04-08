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
  

//////////////////////////////////////////////////////////////////////////////     Number of complaints about Evaluation     //////////////////////////////////////////////
  function validatenumberEvaluation(inputElement) {
    var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    inputElement.value = sanitizedValue; // Set sanitized value back into the input field
  
    var enteredValue = parseInt(sanitizedValue);
    var minLimit = parseInt(inputElement.getAttribute("min"));
    var maxLimit = parseInt(inputElement.getAttribute("max"));
  
    // Check if the entered value is within the specified limits
    if (sanitizedValue.length === 0) {
        document.getElementById("numberofComplaintsError").style.display = "none"; // Hide the error message
        inputElement.setCustomValidity(""); // Clear custom validity
    } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
        document.getElementById("numberofComplaintsError").style.display = "block";
        inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
    } else {
        document.getElementById("numberofComplaintsError").style.display = "none";
        inputElement.setCustomValidity("");
    }
  }
  
  // Add an event listener to the input field
  document.getElementById("numberofComplaints").addEventListener("input", function () {
    validatenumberEvaluation(this);
  });



//////////////////////////////////////////////////////////////////////////////     Number of Students appeared in examination     //////////////////////////////////////////////
function validatenumberexamination(inputElement) {
    var sanitizedValue = inputElement.value.replace(/\D/g, ''); // Remove non-numeric characters
    inputElement.value = sanitizedValue; // Set sanitized value back into the input field
  
    var enteredValue = parseInt(sanitizedValue);
    var minLimit = parseInt(inputElement.getAttribute("min"));
    var maxLimit = parseInt(inputElement.getAttribute("max"));
  
    // Check if the entered value is within the specified limits
    if (sanitizedValue.length === 0) {
        document.getElementById("numberofStudentsError").style.display = "none"; // Hide the error message
        inputElement.setCustomValidity(""); // Clear custom validity
    } else if (isNaN(enteredValue) || enteredValue < minLimit || enteredValue > maxLimit) {
        document.getElementById("numberofStudentsError").style.display = "block";
        inputElement.setCustomValidity("Invalid value. Enter a number between " + minLimit + " and " + maxLimit + ".");
    } else {
        document.getElementById("numberofStudentsError").style.display = "none";
        inputElement.setCustomValidity("");
    }
  }
  
  // Add an event listener to the input field
  document.getElementById("numberofStudents").addEventListener("input", function () {
    validatenumberexamination(this);
  });



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
  
  function validateminutesofGrievance(event) {
      validateDoc(event, "minutesofGrievanceError");
  }