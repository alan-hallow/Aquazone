document.addEventListener("DOMContentLoaded", function() {


const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const address = document.getElementById('address');
const phoneno = document.getElementById('phoneno');
const postal = document.getElementById('postal');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');


form.addEventListener("submit", function(e) {
	if (!checkInputs()) {
		e.preventDefault();
	}
	else{
		return true;
	}

});


function checkInputs() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
	const addressValue = address.value.trim();
	const phoneNoValue = phoneno.value.trim();
	const postalValue = postal.value.trim();
	const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	
	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
    if(addressValue === '') {
		setErrorFor(address, 'Address cannot be blank');
	} else {
		setSuccessFor(address);
	}
	if (postalValue === '') {
		setErrorFor(postal, 'Postal code cannot be blank');
	} else if (postalValue.length !== 6) {
		setErrorFor(postal, 'Postal code must contain exactly 6 numbers');
	} else {
		setSuccessFor(postal);
	}
	if (phoneNoValue === '') {
		setErrorFor(phoneno, 'Phone number cannot be blank');
	} else if (phoneNoValue.length !== 10) {
		setErrorFor(phoneno, 'Phone number must contain exactly 10 numbers');
	} else {
		setSuccessFor(phoneno);
	}
	
	if(passwordValue === '') {
		setErrorFor(password, 'Password cannot be blank');
	} else {
		setSuccessFor(password);
	}
	
	if(password2Value === '') {
		setErrorFor(password2, 'Confirm password cannot be blank');
	} else if(passwordValue !== password2Value) {
		setErrorFor(password2, 'Passwords does not match');
	} else{
		setSuccessFor(password2);
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}


});