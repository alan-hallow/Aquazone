
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


  //this is how the images change

const mainImage = document.getElementById('mainImage');
const thumbnails = document.querySelectorAll('.thumbnail');

thumbnails.forEach((thumbnail) => {
  thumbnail.addEventListener('click', () => {
    const thumbnailSrc = thumbnail.src;
    mainImage.src = thumbnailSrc;
  });
});

mainImage.src = thumbnails[0].src;
//sliding image code ends here


//increment and decrement counter

let valueresult = 1; // Initial value
const minValue = 1;
const maxValue = 20;


const valueresultone = 460;//price goes here



function updateValue() {
    const valueSpan = document.getElementById('valueresult');
    valueSpan.textContent = valueresult;
}

function increment() {
    if (valueresult < maxValue) {
        valueresult++;
        updateValue();
    }
    var value1 = valueresultone;
    var value2 = valueresult;

    var result = value1 * value2;
    document.getElementById("totvalue").innerHTML ="$" + result;
}

function decrement() {
    if (valueresult > minValue) {
        valueresult--;
        updateValue();
    }
    var value1 = valueresultone;
    var value2 = valueresult;

    var result = value1 * value2;
    document.getElementById("totvalue").innerHTML = "$" + result;
}
//increment and decrement code ends here


