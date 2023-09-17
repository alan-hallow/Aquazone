const panels = document.querySelectorAll('.panel')

panels.forEach(panel => {
    panel.addEventListener('click', () => {
        removeActiveClasses()
        panel.classList.add('active')
    })
})

function removeActiveClasses() {
    panels.forEach(panel => {
        panel.classList.remove('active')
    })
}


// document.addEventListener("DOMContentLoaded", function () {
//     const orderButtons = document.querySelectorAll(".watersupplyordernowbutton");

//     orderButtons.forEach((button, index) => {
//         button.addEventListener("click", function (e) {
//             e.preventDefault(); // Prevent the default link behavior

//             // Add a console.log statement to check if the event listener is executed
//             console.log("Button clicked!");

//             // Display a confirmation dialog
//             const isConfirmed = window.confirm(`Are you sure you want to place this order for ${button.previousElementSibling.textContent}?`);

//             if (isConfirmed) {
//                 // If confirmed, you can proceed with the order or redirection
//                 window.location.href = "includes/watersupply-inc.php"; // Add your order processing or redirection logic here
//             } else {
//                 // If not confirmed, do nothing or provide feedback to the user
//                 console.log(`Order for ${button.previousElementSibling.textContent} was not placed.`);
//             }
//         });
//     });
// });



function updateQuantity(quantity) {
    // Update the hidden input field with the selected quantity
    document.getElementById("quantity").value = quantity;
}