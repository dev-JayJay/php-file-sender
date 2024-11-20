<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../styles/login.css" />
    <title>Login</title>
    <?php 
    include "../config.php";
    session_start();

    if (isset($_POST['btn_login'])) {
      try {
       $email = trim($_POST['email']);
       $password = trim($_POST['password']);
 
       if (!$email || !$password) {
         throw new Exception ("All Fields are required");
       }
 
       $conn = connection();
       if ($conn) {
         $sql = "SELECT * FROM users WHERE email = ?";
         $stmt = $conn->prepare($sql);
         if ($stmt) {
           $stmt->bind_param("s",$email);
           $stmt->execute();
           $result = $stmt->get_result();
           if ($result->num_rows > 0) {
             $user = $result->fetch_assoc();
             if(password_verify($password, $user['password'])) {
               echo "Login successful";
               $_SESSION['user_data'] = $user;
               header("Location: dashboard.php"); 
               exit();
             } else {
               echo "password is incorrect";
             }
           }
         } else {
           echo "No user with this email found";
         }
       }
 
      }  catch (Exception $e) {
       echo "Caught Exception: " . $e->getMessage();
     }
    }
    ?>
  </head>
  <body>
    <form action="" method="post" class="form">
      <h3 class="login_title">Sign In your account</h3>
      <div class="container">
        <div class="input_wrapper">
          <label>Email:</label>
          <input type="email" placeholder="exampl@gmail.com" name="email" />
        </div>
        <div class="input_wrapper">
          <label>Password:</label>
          <input type="password" name="password" />
        </div>
        <button class="btn_login" name="btn_login">Sign In</button>
      </div>
    </form>
  </body>
</html>
