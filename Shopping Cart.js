
/*
This code attaches a click event listener to the "Add to Cart" button, 
which prevents the default behavior of the button (submitting the form) 
and checks if a size and quantity have been selected. 
If either field is empty, it displays an alert message to the user. 
Otherwise, the code can proceed to add the product to the cart.
 
 */

const addToCartBtn = document.getElementById("add-to-cart");

addToCartBtn.addEventListener("click", function(event) {
  event.preventDefault();
  
  const sizeSelect = document.getElementById("size");
  const quantitySelect = document.getElementById("quantity");
  
  if (sizeSelect.value === "" || quantitySelect.value === "") {
    alert("Please select a size and quantity before adding to cart.");
  } else {
    // Add product to cart
  }
});