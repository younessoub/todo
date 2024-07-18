<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Signin</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/css/sign-in.css" rel="stylesheet">
</head>

<body>
  <header>
    <div class="container">

      <div
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="home.php">
            <img class="img-fluid" style="max-width:100px" src="../assets/images/logo.png" alt="logo">

          </a>
        </div>
        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="home.php" class="nav-link px-2 link-secondary">Home</a></li>

        </ul>

        <div class="col-md-3 text-end">
          <a href="signup.php" type="button" class="btn btn-primary">Sign Up</a>
        </div>
      </div>
    </div>
  </header>
  <main class="form-signin w-100 m-auto">
    <form action="../controllers/submit_login.php" method="POST">
      <img class="mb-4" src="../assets/images/logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) { ?>
        <p class="text-danger"><?php echo $_SESSION['LOGIN_ERROR_MESSAGE'] ?></p>
      <?php } ?>
      <div class="form-floating">
        <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com"
          required>
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password"
          required>
        <label for="floatingPassword">Password</label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-body-secondary">Not Registered? <a href="signup.php">Sign Up</a></p>
    </form>
  </main>

</body>

</html>