
// script.js
const openOverlayButton = document.querySelector('.btnopen');
const closeOverlayButton = document.querySelector('.btnclose');
const overlay = document.getElementById('myNav');
const body = document.body;

openOverlayButton.addEventListener('click', () => {
  overlay.style.height = '0px'; // Set to a large value to trigger the transition
  overlay.style.display = 'block'; // Show the overlay
  setTimeout(() => {
    overlay.style.height = '100%'; // Set to 100% after a small delay
  }, 10); // A small delay to ensure the transition triggers
  document.body.style.overflowY = 'hidden';

});

closeOverlayButton.addEventListener('click', () => {


  overlay.style.height = '100%'; // Set to a large value to trigger the transition
  overlay.style.display = 'block'; // Show the overlay
  setTimeout(() => {
    overlay.style.height = '0%'; // Set to 100% after a small delay
  }, 10); // A small delay to ensure the transition triggers
  document.body.style.overflowY = 'auto';
});





//background patterns i hope
const menu = document.getElementById("myNav");

Array.from(document.getElementsByClassName("links"))
  .forEach((item, index) => {
    item.onmouseover = () => {
      menu.dataset.activeIndex = index;
    }
  });






//this part is used for the scrolling animation until line 44
const boxes = document.querySelectorAll('.items');

window.addEventListener('scroll',checkboxes);

checkboxes();

function checkboxes() {
    const triggerBottom = window.innerHeight /1.5;
    boxes.forEach((items) => {
        const boxTop = items.getBoundingClientRect().top;
        
        if (boxTop < triggerBottom) {
            items.classList.add('show');
        }else{
            items.classList.remove('show');
        }
    });
}



