// Get the logo element and all its child images
const logo = document.getElementById("logo");
const images = logo.querySelectorAll("img");

// Check if the logo is currently active
const getActive = () => document.body.dataset.active === "true";

// Set the active status of the logo
const setActiveTo = active => document.body.dataset.active = active;

// Shift an image's position and scale
const shift = (image, index, rangeX, rangeY) => {
  const active = getActive();
  
  // Determine the translation intensity and maximum translation
  const translationIntensity = active ? 24 : 4;
  const maxTranslation = translationIntensity * (index + 1);
  const currentTranslation = `${maxTranslation * rangeX}% ${maxTranslation * rangeY}%`;
  
  // Determine the scale factor
  const scale = active ? 1 + (index * 0.4) : 1;
  
  // Animate the image's translation and scale
  image.animate(
    { translate: currentTranslation, scale },
    { duration: 750, fill: "forwards", easing: "ease" }
  );
};

// Shift all images
const shiftAll = (images, rangeX, rangeY) => 
  images.forEach((image, index) => shift(image, index, rangeX, rangeY));

// Shift the logo based on mouse position
const shiftLogo = (e, images) => {  
  const rect = logo.getBoundingClientRect();
  const radius = 1000;
  
  // Calculate center coordinates and ranges based on mouse position
  const centerX = rect.left + (rect.width / 2);
  const centerY = rect.top + (rect.height / 2);
  
  const rangeX = (e.clientX - centerX) / radius;
  const rangeY = (e.clientY - centerY) / radius;
  
  // Shift all images based on the calculated ranges
  shiftAll(images, rangeX, rangeY);
};

// Reset the logo's state
const resetLogo = () => {
  setActiveTo(false);
  shiftAll(images, 0.4, -0.7);
};

// Handle mouse events

// Shift the logo on mouse move
window.onmousemove = e => shiftLogo(e, images);

// Reset the logo when the mouse leaves the window
document.body.onmouseleave = () => {
  if (!getActive()) resetLogo();
};

// Activate the logo on mouse down and shift based on mouse position
window.onmousedown = e => {
  setActiveTo(true);
  shiftLogo(e, images);
};

// Reset the logo on mouse up
window.onmouseup = e => resetLogo();

// Reset the logo's state initially
resetLogo();
