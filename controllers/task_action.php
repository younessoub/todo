<?php
session_start();

require_once 'functions.php';
require_once '../config/connectdb.php';

if (isset($_POST['id'])) {
  if (isset($_POST['delete'])) {
    $query = $mysqlClient->prepare('DELETE FROM todos WHERE id = :id;');
    $query->execute([
      'id' => $_POST['id']
    ]);
  } elseif (isset($_POST['finish'])) {
    $query = $mysqlClient->prepare('UPDATE todos SET finished = 1 WHERE id = :id;');
    $query->execute([
      'id' => $_POST['id']
    ]);
  }
}
redirect('../pages/home.php');