<?php         // PHP script that performs server-side validation and inserts a new user into the database

// Establish a connection to the database
$host = "localhost";
$user = "username";
$password = "password";
$database = "database_name";
$mysqli = new mysqli($host, $user, $password, $database);

// Check for any errors with the database connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Validate the username
    if (empty($_POST["username"])) {
        $errors[] = "Username is required";
    } else {
        $username = $_POST["username"];
        // Check if the username already exists in the database
        $query = "SELECT * FROM User WHERE name='$username'";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            $errors[] = "Username already exists";
        }
    }

    // Validate the password
    if (empty($_POST["password"])) {
        $errors[] = "Password is required";
    } else {
        $password = $_POST["password"];
    }

    // Validate the email
    if (empty($_POST["email"])) {
        $errors[] = "Email is required";
    } else {
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Please enter a valid email";
        }
        // Check if the email already exists in the database
        $query = "SELECT * FROM User WHERE email='$email'";
        $result = $mysqli->query($query);
        if ($result->num_rows > 0) {
            $errors[] = "Email already exists";
        }
    }

    // Validate the name
    if (empty($_POST["name"])) {
        $name = "";
    } else {
        $name = $_POST["name"];
    }

    // If there are no errors, insert the new user into the database
    if (count($errors) == 0) {
        $query = "INSERT INTO User (name, email, password, payment_info)
                  VALUES ('$name', '$email', '$password', '')";
        if ($mysqli->query($query) === TRUE) {
            echo "New user created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $mysqli->error;
        }
    } else {
        // If there are errors, display them to the user
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
}
$mysqli->close();
?>