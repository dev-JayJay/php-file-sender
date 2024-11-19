<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/register.css" />
    <title>Register</title>
    <?php 
      include '../config.php';

      if (isset($_POST['btn_register'])) {
        try {
          $firstName = trim($_POST['firstName']);
          $lastName = trim($_POST['lastName']);
          $userName = trim($_POST['userName']);
          $email = trim($_POST['email']);
          $password = trim($_POST['password']);
          $confirm_password = trim($_POST['confirm_password']);

          if (!$firstName || !$lastName || !$userName || !$email || !$password || !$confirm_password) {
            throw new Exception("All fields are required");
          }
          if ($password !== $confirm_password) {
            throw new Exception("password does not match");
          }

          // logic to insert data to the database
          $conn = connection();
          if ($conn) {
            $sql = "INSERT INTO users (first_name, last_name, user_name, email, password) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            if($stmt) {
              $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
              $stmt->bind_param("sssss", $firstName, $lastName, $userName, $email, $hashedPassword);
              if ($stmt->execute()) {
                echo "Registration successful!";
              } else {
                throw new Exception("Error registering new user: " . $stmt->error);
              }
            }
          } else {
            throw new Exception("Error preparing the statement: " . $conn->error);
          }
          $stmt->close();
        } catch (Exception $e) {
          echo "Caught Exception: " . $e->getMessage();
        }
      }

    ?>
  </head>
  <body>
    <form action="" method="post" class="form">
      <h3 class="register_title">Sign Up a new account</h3>
      <div class="container">
        <div class="input_wrapper">
          <label>FirstName:</label>
          <input type="text" placeholder="Joe" name="firstName" />
        </div>
        <div class="input_wrapper">
          <label>LastName:</label>
          <input type="text" placeholder="Paul" name="lastName" />
        </div>
        <div class="input_wrapper">
          <label>UserName:</label>
          <input type="text" placeholder="Joe_Paul01" name="userName" />
        </div>
        <div class="input_wrapper">
          <label>Email:</label>
          <input type="email" placeholder="exampl@gmail.com" name="email" />
        </div>
        <div class="input_wrapper">
          <label>Password:</label>
          <input type="password" name="password" />
        </div>
        <div class="input_wrapper">
          <label>Confirm Password:</label>
          <input type="password" name="confirm_password" />
        </div>
        <button class="btn_register" name="btn_register">Sign Up</button>
      </div>
    </form>
  </body>
</html>
