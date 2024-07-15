<?php 
session_start();

require_once(__DIR__.'/functions.php');

if(!isset($_SESSION['LOGGED_USER'])){
  redirect('login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My To Dos</title>
</head>
<body>
  <header>
    <nav>
      <h1>My To Dos</h1>
      <ul>
        <li><a href="signout.php">sign out</a></li>
      </ul>
    </nav>
  </header>
  <main>
    hello <?php echo $_SESSION['LOGGED_USER']['name'];?>
  </main>
</body>
</html>