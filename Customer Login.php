<?php //PHP script that validates the login form and checks the user credentials against the user table in the database

// Get the form input values
$username = $_POST['username'];
$password = $_POST['password'];

// Validate the input values
if (empty($username) || empty($password)) {
  echo "Please enter a username and password";
  exit;
}

// Connect to the database
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Query the user table to check for a matching user record
$sql = "SELECT * FROM User WHERE name='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  // If a matching user record is found, redirect the user to the home page
  header("Location: home.php");
} else {
  // If no matching user record is found, display an error message
  echo "Invalid username or password";
}

$conn->close();

?>
