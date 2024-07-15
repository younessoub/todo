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
        
        <form action="submit_login.php" method="POST">
          <input type="email" name="email" placeholder="email">
          <input type="password" name="password" placeholder="password">
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </main>
</body>
</html>