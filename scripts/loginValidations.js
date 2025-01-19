const loginForm = document.getElementById('loginForm');
const loginEmail = document.getElementById('loginEmail');
const loginPassword = document.getElementById('loginPassword');

loginForm.addEventListener('submit', () => {
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
    const loginEmailValue = loginEmail.value.trim();
    const loginPasswordValue = loginPassword.value.trim();
    if(loginEmailValue === '') {
        setError(loginEmail, 'Email is required');
    } else if (!isValidEmail(loginEmailValue)) {
        setError(loginEmail, 'Provide a valid email address');
    } else {
        setSuccess(loginEmail);
    }

    if(loginPasswordValue === '') {
        setError(loginPassword, 'Password is required');
    } else {
        setSuccess(loginPassword);
    }
};
