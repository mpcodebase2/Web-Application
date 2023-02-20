/*This code adds a submit event listener to the form, 
which prevents the form from being submitted until it has been validated. 
The validateEmail function uses a regular expression to check the email format. 
If there are any validation errors, they are added to an array and displayed in an alert message. 
If there are no errors, the form is submitted. */


const form = document.querySelector('form');
const username = document.getElementById('username');
const password = document.getElementById('password');
const email = document.getElementById('email');

form.addEventListener('submit', function(event) {
  event.preventDefault();
  let errors = [];

  if (username.value.trim() === '') {
    errors.push('Username is required');
  }

  if (password.value.trim() === '') {
    errors.push('Password is required');
  }

  if (email.value.trim() === '') {
    errors.push('Email is required');
  } else if (!validateEmail(email.value)) {
    errors.push('Please enter a valid email');
  }

  if (errors.length > 0) {
    alert(errors.join('\n'));
  } else {
    // Submit the form if there are no errors
    form.submit();
  }
});

function validateEmail(email) {
  // A simple regular expression to validate email format
  const regex = /^\S+@\S+\.\S+$/;
  return regex.test(email);
}

