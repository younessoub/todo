<?php
session_start();
require_once(__DIR__.'/config/connectdb.php');
require_once(__DIR__.'/functions.php');

if(isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  $userInfo = $mysqlClient->prepare("SELECT * FROM users WHERE email = :email");
  $userInfo -> execute([
    'email'=>$email
  ]);
  $userInfo = $userInfo -> fetch(PDO::FETCH_ASSOC);
  if(!$userInfo or $userInfo['password']!==$password){
    $_SESSION['LOGIN_ERROR_MESSAGE'] = 'Wrong email or password';
    redirect('login.php');
  }else{
    // login successful
    $_SESSION['LOGGED_USER'] = [
      'user_id' => $userInfo['user_id'],
      'name' => $userInfo['name'],
      'email' => $userInfo['email']
    ];

    redirect('index.php');

  }
  
}else{
  redirect('index.php');
}
