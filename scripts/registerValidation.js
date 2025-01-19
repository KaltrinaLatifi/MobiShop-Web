const registerForm = document.getElementById('registerForm');
const registerFirstName = document.getElementById('registerFirstName');
const registerLastName = document.getElementById('registerLastName');
const registerEmail = document.getElementById('registerEmail');
const registerPassword = document.getElementById('registerPassword');
const registerConfrimPassword = document.getElementById('registerConfrimPassword');


registerForm.addEventListener('submit', (event) => {
    event.preventDefault();
    validateInputs();
});

const setError = (element, message) => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = message;
    inputControl.classList.add('error');
    inputControl.classList.remove('success')
}

const setSuccess = element => {
    const inputControl = element.parentElement;
    const errorDisplay = inputControl.querySelector('.error');

    errorDisplay.innerText = '';
    inputControl.classList.add('success');
    inputControl.classList.remove('error');
};

const isValidEmail = email => {
    var regex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;
    return regex.test(String(email)); 
}

const validateInputs = () => {
    let isValid = true;
    const registerFirstNameValue = registerFirstName.value.trim();
    const registerLastNameValue = registerLastName.value.trim();
    const registerEmailValue = registerEmail.value.trim();
    const registerPasswordValue = registerPassword.value.trim();
    const registerConfrimPasswordValue=registerConfrimPassword.value.trim();

    if(registerFirstNameValue === '') {
        setError(registerFirstName, 'FirstName is required');
        isValid = false;
    } else {
        if (isValid) {
        setSuccess(registerFirstName);
        }
    }
    if(registerLastNameValue === '') {
        setError(registerLastName, 'LastName is required');
        isValid = false;
    } else {
        if (isValid) {
        setSuccess(registerLastName);
        }
    }

    if(registerEmailValue === '') {
        setError(registerEmail, 'Email is required');
        isValid = false;
    } else if (!isValidEmail(registerEmailValue)) {
        setError(registerEmail, 'Provide a valid email address');
        isValid = false;
    } else {
        if (isValid) {
        setSuccess(registerEmail);
        }
    }

    if(registerPasswordValue === '') {
        setError(registerPassword, 'Password is required');
        isValid = false;
    } else if (registerPasswordValue.length < 8 ) {
        setError(registerPassword, 'Password must be at least 8 character.')
        isValid = false;
    } else {
        if (isValid) {
            setSuccess(registerPassword);
        }
    }

    if(registerConfrimPasswordValue === '') {
        setError(registerConfrimPassword, 'Please confirm your password');
        isValid = false;
    } else if (registerConfrimPasswordValue !==registerPasswordValue  ) {
        setError(registerConfrimPassword, "Passwords doesn't match");
        isValid = false;
    } else {
        if (isValid) {
            setSuccess(registerConfrimPassword);
        }
    }
    
};

