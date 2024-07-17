<?php
session_start();
require_once 'functions.php';
require_once '../config/connectdb.php';

if(isset($_POST['name'])&& isset($_POST['email'])&&isset($_POST['password'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $emailExists = $mysqlClient ->prepare('SELECT email FROM users WHERE email = :email');
  $emailExists-> execute([
    'email'=>$email
  ]);
  $emailExists = $emailExists->fetch(PDO::FETCH_ASSOC);

  if($emailExists){
    $_SESSION['SIGNUP_ERROR_MESSAGE']= 'Email is already in use';
    redirect('../pages/signup.php');
  }else{
    $newUser = $mysqlClient ->prepare('INSERT INTO users(name, email, password) VALUES(:name, :email, :password)');
    $newUser-> execute([
      'name'=>$name,
      'email'=>$email,
      'password'=>$password
    ]);


    redirect('../pages/login.php');
  }
}else{
  redirect('../pages/signup.php');
}