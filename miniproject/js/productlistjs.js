// script.js

// Select the open overlay button, close overlay button, and overlay element
const openOverlayButton = document.querySelector('.btnopen');
const closeOverlayButton = document.querySelector('.btnclose');
const overlay = document.getElementById('myNav');
const body = document.body;

// Event listener for opening the overlay
openOverlayButton.addEventListener('click', () => {
  overlay.style.height = '0px'; // Set to a large value to trigger the transition
  overlay.style.display = 'block'; // Show the overlay
  setTimeout(() => {
    overlay.style.height = '100%'; // Set to 100% after a small delay
  }, 10); // A small delay to ensure the transition triggers
  document.body.style.overflowY = 'hidden'; // Prevent scrolling of the page
});

// Event listener for closing the overlay
closeOverlayButton.addEventListener('click', () => {
  overlay.style.height = '100%'; // Set to a large value to trigger the transition
  overlay.style.display = 'block'; // Show the overlay
  setTimeout(() => {
    overlay.style.height = '0%'; // Set to 0% after a small delay to close the overlay
  }, 10); // A small delay to ensure the transition triggers
  document.body.style.overflowY = 'auto'; // Allow scrolling of the page
});

// Background patterns hover effect
const menu = document.getElementById("myNav");
const links = document.getElementsByClassName("links");

// Loop through each link and add a mouseover event listener
Array.from(links).forEach((item, index) => {
  item.addEventListener("mouseover", () => {
    menu.dataset.activeIndex = index; // Highlight the menu link on hover
  });
});

// Scrolling animation
const boxes = document.querySelectorAll('.items');

// Trigger the checkboxes function on scroll and on initial page load
window.addEventListener('scroll', checkboxes);
checkboxes();

// Function to handle checkboxes animation on scroll
function checkboxes() {
  const triggerBottom = window.innerHeight / 1.5;
  // Loop through each box (item) and check if it's in the viewport
  boxes.forEach((item) => {
    const boxTop = item.getBoundingClientRect().top;
    
    if (boxTop < triggerBottom) {
      item.classList.add('show'); // Add the 'show' class to animate
    } else {
      item.classList.remove('show'); // Remove the 'show' class
    }
  });
}
