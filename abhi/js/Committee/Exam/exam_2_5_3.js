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
  


// Function to enforce the word limit on the textarea******************************************Word Limit******************************************************8
function enforceWordLimit(event, textareaId, remainingWordsId) {
    const wordLimit = 200; // Set your desired word limit here
    const textarea = document.getElementById(textareaId);
    const remainingWordsSpan = document.getElementById(remainingWordsId);
    const words = textarea.value.trim().split(/\s+/);
    const remainingWords = wordLimit - words.length;

    if (remainingWords < 0) {
        // If the user exceeds the word limit, prevent further input
        event.preventDefault();
        textarea.value = words.slice(0, wordLimit).join(' ');
    }

    // Update the remaining words count
    remainingWordsSpan.textContent = Math.max(remainingWords, 0);
}

// Attach the event listener to the textareas
const examinationProcedureTextarea = document.getElementById('examinationProcedureTextarea');
examinationProcedureTextarea.addEventListener('input', (event) => {
    enforceWordLimit(event, 'examinationProcedureTextarea', 'examinationProcedureRemainingWords');
});

const processIntegratingITTextarea = document.getElementById('processIntegratingITTextarea');
processIntegratingITTextarea.addEventListener('input', (event) => {
    enforceWordLimit(event, 'processIntegratingITTextarea', 'processIntegratingITRemainingWords');
});

const continuousInternalTextarea = document.getElementById('continuousInternalTextarea');
continuousInternalTextarea.addEventListener('input', (event) => {
    enforceWordLimit(event, 'continuousInternalTextarea', 'continuousInternalRemainingWords');
});