/*This code adds an event listener to the form element and prevents the default form submission behavior. 
Then it gets the input elements and their values, validates them, and shows an alert message if they are invalid. 
If the input values are valid, it submits the form. 
You can customize the validation and error messages to your specific needs.  */



// Get the form element
const form = document.querySelector('form');

// Add an event listener to the form on submit
form.addEventListener('submit', function(event) {
  // Prevent the default form submission
  event.preventDefault();

  // Get the input elements
  const usernameInput = document.getElementById('username');
  const passwordInput = document.getElementById('password');

  // Get the input values
  const username = usernameInput.value.trim();
  const password = passwordInput.value.trim();

  // Validate the input values
  if (username === '') {
    alert('Please enter a username');
    return;
  }

  if (password === '') {
    alert('Please enter a password');
    return;
  }

  // If the input values are valid, submit the form
  form.submit();
});