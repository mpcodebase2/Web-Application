
<?php   // PHP script to validate the form and insert the data into the customers table

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $full_name = test_input($_POST["full-name"]);
  $email = test_input($_POST["email"]);
  $address = test_input($_POST["address"]);
  $city = test_input($_POST["city"]);
  $state = test_input($_POST["state"]);
  $zip_code = test_input($_POST["zip-code"]);
  $card_number = test_input($_POST["card-number"]);
  $expiration_date = test_input($_POST["expiration-date"]);
  $cvv = test_input($_POST["cvv"]);

  $servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "myDB";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Insert data into customers table
  $sql = "INSERT INTO customers (full_name, email, address, city, state, zip_code)
          VALUES ('$full_name', '$email', '$address', '$city', '$state', '$zip_code')";

  if ($conn->query($sql) === TRUE) {
    $customer_id = $conn->insert_id;
    // Insert data into orders table
    $sql = "INSERT INTO orders (customer_id, card_number, expiration_date, cvv)
            VALUES ('$customer_id', '$card_number', '$expiration_date', '$cvv')";

    if ($conn->query($sql) === TRUE) {
      echo "Order placed successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
