<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main>
    <div class="signup-main">
      <div class="signup-form">
        <h1>Sign Up</h1>
        <?php if(isset($_SESSION['SIGNUP_ERROR_MESSAGE'])) {?>
        <p class="error"><?php echo $_SESSION['SIGNUP_ERROR_MESSAGE'];?></p>
        <?php } ?>
        <form action="../controllers/submit_signup.php" method="POST">
          <input type="text" name="name" required placeholder="username">
          <input type="email" name="email" placeholder="email" required>
          <input type="password" name="password" placeholder="password" required>
          <button type="submit">Submit</button>
        </form>

        <p>Already Registered? <a href="login.php">Login</a></p>
      </div>
    </div>
  </main>
</body>
</html>