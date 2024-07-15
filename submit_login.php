<?php

require_once(__DIR__.'/config/connectdb.php');
require_once(__DIR__.'/functions.php');

if(isset($_POST['email']) && isset($_POST['password'])){
  $email = $_POST['email'];
  $password = $_POST['password'];

  
  
}else{
  redirect('index.php');
}
