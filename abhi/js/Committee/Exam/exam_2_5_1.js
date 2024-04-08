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


/////////////////////////////////////////////////////////////////////////////   Semester    ///////////////////////////////////////////////////////////////////////////////
function validateSemester() {
  var regName = /^[A-Z -]+$/;
  var name = document.getElementById("semester").value.toUpperCase();
  var error = document.getElementById("semesterError");

  var sanitizedName = name.replace(/[^A-Z -]/g, "");

  var words = sanitizedName.split(" ");
  var capitalizedWords = words.map(function (word) {
    return word.charAt(0).toUpperCase() + word.slice(1);
  });

  var finalSemester = capitalizedWords.join(" ");
  document.getElementById("semester").value = finalSemester;

  if (finalSemester.length === 0 || regName.test(finalSemester)) {
    error.style.display = "none";
  } else {
    error.style.display = "block";
  }
}

document.getElementById("semester").addEventListener("input", validateSemester);


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


/////////////////////////////////////////////////////////////////////////////   Last Date of the semester end   ///////////////////////////////////////////////////////////////////////////////
function datepicker2Validation() {
  // Validation for the Date
  const dobDateInput = document.getElementById("datepicker2");

  // Set the minimum date allowed (2019-01-01 in this case)
  const minDate = new Date("2019-01-01");

  // Function to set the maximum date allowed to the current date
  function setMaxDate() {
    const today = new Date();
    const maxDate = today.toISOString().split("T")[0]; // Format as "YYYY-MM-DD"
    dobDateInput.max = maxDate;
  }

  // Call the setMaxDate1 function to set the maximum date initially
  setMaxDate();

  // Attach an event listener to the input element to dynamically update the maximum date
  dobDateInput.addEventListener("input", setMaxDate);

  // Function to validate the selected date on form submission
  function validateRegDate() {
    const selectedDate = new Date(dobDateInput.value);
    if (selectedDate < minDate) {
      alert("Please select a date on or after 2019-01-01.");
      return false;
    }
    return true;
  }

  // Attach an event listener to the form to validate the date on form submission
  const form = document.querySelector("form");
  form.addEventListener("submit", validateRegDate);
}

// Call the datepicker2Validation function to set up the validation for this specific element
datepicker2Validation();


/////////////////////////////////////////////////////////////////////////////       Date of declaration of result   /////////////////////////////////////////////////////////////////////////////
function datepicker3Validation() {
  // Validation for the Date
  const dobDateInput = document.getElementById("datepicker3");

  // Set the minimum date allowed (2019-01-01 in this case)
  const minDate = new Date("2019-01-01");

  // Function to set the maximum date allowed to the current date
  function setMaxDate() {
    const today = new Date();
    const maxDate = today.toISOString().split("T")[0]; // Format as "YYYY-MM-DD"
    dobDateInput.max = maxDate;
  }

  // Call the setMaxDate1 function to set the maximum date initially
  setMaxDate();

  // Attach an event listener to the input element to dynamically update the maximum date
  dobDateInput.addEventListener("input", setMaxDate);

  // Function to validate the selected date on form submission
  function validateRegDate() {
    const selectedDate = new Date(dobDateInput.value);
    if (selectedDate < minDate) {
      alert("Please select a date on or after 2019-01-01.");
      return false;
    }
    return true;
  }

  // Attach an event listener to the form to validate the date on form submission
  const form = document.querySelector("form");
  form.addEventListener("submit", validateRegDate);
}

// Call the datepicker2Validation function to set up the validation for this specific element
datepicker3Validation();


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

function validateExaminationtt(event) {
    validateDoc(event, "examinationttError");
}

function validateResultSheet(event) {
    validateDoc(event, "resultsheetError");
}

function validatePolicyDoc(event) {
    validateDoc(event, "policydocumentError");
}

function validateReportfromCOE(event) {
    validateDoc(event, "reportfromCOEError");
}
  