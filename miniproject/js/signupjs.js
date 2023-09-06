document.addEventListener("DOMContentLoaded", function() {
    const form = document.getElementById('form');
    const fields = {
        username: document.getElementById('username'),
        email: document.getElementById('email'),
        address: document.getElementById('address'),
        phoneno: document.getElementById('phoneno'),
        postal: document.getElementById('postal'),
        password: document.getElementById('password'),
        password2: document.getElementById('password2')
    };

    form.addEventListener("submit", function(e) {
        if (!checkInputs()) {
            e.preventDefault();
        }
    });

    function checkInputs() {
        let isValid = true;

        for (const fieldName in fields) {
            if (fields.hasOwnProperty(fieldName)) {
                const input = fields[fieldName];
                const inputValue = input.value.trim();
                let errorMessage = '';

                switch (fieldName) {
                    case 'username':
                        errorMessage = inputValue === '' ? 'Username cannot be blank' : '';
                        break;
                    case 'email':
                        errorMessage = inputValue === '' ? 'Email cannot be blank' : (isEmail(inputValue) ? '' : 'Not a valid email');
                        break;
                    case 'address':
                        errorMessage = inputValue === '' ? 'Address cannot be blank' : '';
                        break;
                    case 'phoneno':
                        errorMessage = inputValue === '' ? 'Phone number cannot be blank' : (inputValue.length === 10 ? '' : 'Phone number must contain exactly 10 numbers');
                        break;
                    case 'postal':
                        errorMessage = inputValue === '' ? 'Postal code cannot be blank' : (inputValue.length === 6 ? '' : 'Postal code must contain exactly 6 numbers');
                        break;
                    case 'password':
                        errorMessage = inputValue === '' ? 'Password cannot be blank' : '';
                        break;
                    case 'password2':
                        errorMessage = inputValue === '' ? 'Confirm password cannot be blank' : (inputValue === fields.password.value.trim() ? '' : 'Passwords do not match');
                        break;
                }

                if (errorMessage) {
                    setErrorFor(input, errorMessage);
                    isValid = false;
                } else {
                    setSuccessFor(input);
                }
            }
        }

        return isValid;
    }

    function setErrorFor(input, message) {
        const formControl = input.parentElement;
        const small = formControl.querySelector('small');
        formControl.classList.add('error');
        formControl.classList.remove('success');
        small.innerText = message;
    }

    function setSuccessFor(input) {
        const formControl = input.parentElement;
        formControl.classList.add('success');
        formControl.classList.remove('error');
    }

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }
});
