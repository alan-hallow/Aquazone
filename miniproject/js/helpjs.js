const form = document.getElementById('form');
const helptextInput = document.getElementById('helptext');

// Add an event listener to the form's submit event
form.addEventListener('submit', function(event) {
    // Trim the input value to remove leading and trailing whitespace
    const inputValue = helptextInput.value.trim();
    
    // Check if the input is empty
    if (inputValue === '') {
        // Prevent the form from submitting
        event.preventDefault();
        
        // Show a popup message
        alert('Please write something in the box, we cant read minds');
    }
});