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
    hhalloo
  </header>
  <main></main>
</body>
</html>