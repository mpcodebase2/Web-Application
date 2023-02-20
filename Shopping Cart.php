<?php  // PHP validation for the "Add to Cart" button

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  // Retrieve the values of the size and quantity fields
  $size = $_POST["size"];
  $quantity = $_POST["quantity"];
  
  // Check if the values of size and quantity are valid
  if (empty($size) || empty($quantity) || !is_numeric($quantity) || $quantity <= 0) {
    // Show an error message to the user
    echo "Please select a valid size and quantity before adding to cart.";
  } else {
    // Add the product to the cart by performing necessary database operations
    // ...
    // Redirect the user to the cart page
    header("Location: cart.php");
    exit();
  }
}
?>
