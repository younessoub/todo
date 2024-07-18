<?php
session_start();
require_once 'functions.php';
require_once '../config/connectdb.php';

if (isset($_POST['content'])) {
  try {
    $query = $mysqlClient->prepare('INSERT INTO todos (content, finished, user_id) VALUES(:content, :finished, :user_id);');
    $query->execute([
      'content' => $_POST['content'],
      'finished' => 0,
      'user_id' => $_SESSION['LOGGED_USER']['user_id']
    ]);
    unset($_SESSION['TASK_SUBMIT_ERROR']);
    redirect('../pages/home.php');
  } catch (Exception) {
    $_SESSION['TASK_SUBMIT_ERROR'] = 'An Error has occured, Please Try Again Later';
    redirect('../pages/home.php');
  }

} else {
  redirect('../pages/home.php');
}