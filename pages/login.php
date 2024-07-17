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
    <div class="login-main">
      <div class="login-form">
        <h1>Login</h1>
        <?php if(isset($_SESSION['LOGIN_ERROR_MESSAGE'])) {?>
        <p class="error"><?php echo $_SESSION['LOGIN_ERROR_MESSAGE'];?></p>
        <?php } ?>
        <form action="../controllers/submit_login.php" method="POST">
          <input type="email" name="email" placeholder="email" required>
          <input type="password" name="password" placeholder="password" required>
          <button type="submit">Submit</button>
        </form>

        <p>Not Registered? <a href="signup.php">Sign Up</a></p>
      </div>
    </div>
  </main>
</body>
</html>