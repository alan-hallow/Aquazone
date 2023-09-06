// Add an event listener to all elements with class 'btndelete'
const deleteButtons = document.querySelectorAll('.btndelete');

deleteButtons.forEach(button => {
    button.addEventListener('click', function(event) {
        event.preventDefault(); // Prevent default link behavior
        const productId = this.getAttribute('data-id');
        
        // Show a confirmation dialog
        const shouldDelete = confirm("Are you sure you want to remove this item from your cart?");
        
        if (shouldDelete) {
            // Redirect to the same page with the product ID as a parameter
            window.location.href = `mycart.php?id=${productId}`;
        }
    });
});
