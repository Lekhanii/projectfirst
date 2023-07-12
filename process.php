<?php


// Start the session
session_start();

// Check if the form is submitted for login
if (isset($_POST['login'])) {
  // Get the submitted email and password
  $email = $_POST['email'];
  $password = $_POST['password'];

  // TODO: Perform validation and sanitization of the input data

  // TODO: Connect to your MySQL database
  // Replace the placeholders with your database credentials
  $host = 'localhost';
  $dbname = 'notes';
  $username = 'root';
  $password = '';

  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // TODO: Prepare and execute a query to retrieve user information based on the entered email
    $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // TODO: Validate the user's credentials
    if ($stmt->rowCount() > 0) {
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
      $storedPassword = $row['password'];

      // TODO: Compare the stored password with the entered password using password_verify() or any other hashing method
      if (password_verify($password, $storedPassword)) {
        // Successful login
        echo "Login successful!";
        // Redirect the user to the dashboard
            $_SESSION['user_id'] = $row['ID'];
            header("Location: index.php");
            exit();
      } else {
        // Invalid password
        echo "Invalid password!";
      }
    } else {
      // User not found
      echo "User not found!";
    }
  } catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
  }

  // TODO: Close the database connection
}

// Check if the form is submitted for signup
if (isset($_POST['signup'])) {
  // Get the submitted email and password
  $email = $_POST['email'];
  $password = $_POST['password'];

  // TODO: Perform validation and sanitization of the input data

  // TODO: Connect to your MySQL database
  // Replace the placeholders with your database credentials
  $host = 'localhost';
  $dbname = 'notes';
  $username = 'root';
  $password = '';
  try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // TODO: Prepare and execute a query to insert the new user into the database
    $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (:username, :email, :password)");
    $stmt->bindParam(':username', $_POST['username']);
    $stmt->bindParam(':email', $email);

    // TODO: Hash the password using password_hash() or any other hashing method
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt->bindParam(':password', $hashedPassword);

    if ($stmt->execute()) {
      // Successful signup
      echo "Signup successful!";
    } else {
      // Failed to insert user
      echo "Failed to signup!";
    }
  } catch (PDOException $e) {
    // Handle database connection errors
    echo "Error: " . $e->getMessage();
  }
 // TODO: Close the database connection
}
?>