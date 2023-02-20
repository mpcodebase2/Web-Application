/* This code adds an event listener to the form's submit event and prevents the form from being submitted by default. 
It then checks each form field for validity by checking if it is empty, if it contains the required data type (e.g. email, number), 
or if it matches a specific pattern (e.g. expiration date). If a field is found to be invalid, 
the code adds the CSS class invalid to the input element to highlight the error. 
If all fields are valid, the form is submitted programmatically. */


const checkoutForm = document.querySelector('form');
const fullNameInput = document.querySelector('#full-name');
const emailInput = document.querySelector('#email');
const addressInput = document.querySelector('#address');
const cityInput = document.querySelector('#city');
const stateInput = document.querySelector('#state');
const zipCodeInput = document.querySelector('#zip-code');
const cardNumberInput = document.querySelector('#card-number');
const expirationDateInput = document.querySelector('#expiration-date');
const cvvInput = document.querySelector('#cvv');

checkoutForm.addEventListener('submit', function(event) {
  event.preventDefault();

  let isValid = true;

  if (fullNameInput.value.trim() === '') {
    fullNameInput.classList.add('invalid');
    isValid = false;
  } else {
    fullNameInput.classList.remove('invalid');
  }

  if (emailInput.value.trim() === '' || !emailInput.value.includes('@')) {
    emailInput.classList.add('invalid');
    isValid = false;
  } else {
    emailInput.classList.remove('invalid');
  }

  if (addressInput.value.trim() === '') {
    addressInput.classList.add('invalid');
    isValid = false;
  } else {
    addressInput.classList.remove('invalid');
  }

  if (cityInput.value.trim() === '') {
    cityInput.classList.add('invalid');
    isValid = false;
  } else {
    cityInput.classList.remove('invalid');
  }

  if (stateInput.value.trim() === '') {
    stateInput.classList.add('invalid');
    isValid = false;
  } else {
    stateInput.classList.remove('invalid');
  }

  if (zipCodeInput.value.trim() === '' || isNaN(zipCodeInput.value)) {
    zipCodeInput.classList.add('invalid');
    isValid = false;
  } else {
    zipCodeInput.classList.remove('invalid');
  }

  if (cardNumberInput.value.trim() === '' || isNaN(cardNumberInput.value)) {
    cardNumberInput.classList.add('invalid');
    isValid = false;
  } else {
    cardNumberInput.classList.remove('invalid');
  }

  if (expirationDateInput.value.trim() === '' || !expirationDateInput.value.match(/^([0-9]{2})\/([0-9]{2})$/)) {
    expirationDateInput.classList.add('invalid');
    isValid = false;
  } else {
    expirationDateInput.classList.remove('invalid');
  }

  if (cvvInput.value.trim() === '' || isNaN(cvvInput.value)) {
    cvvInput.classList.add('invalid');
    isValid = false;
  } else {
    cvvInput.classList.remove('invalid');
  }

  if (isValid) {
    // Submit the form
    checkoutForm.submit();
  }
});
