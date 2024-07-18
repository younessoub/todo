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
    $query = $mysqlClient->prepare('SELECT finished FROM todos WHERE id = :id;');
    $query->execute([
      'id' => $_POST['id']
    ]);
    $todo = $query->fetch(PDO::FETCH_ASSOC);
    if ($todo['finished'] === 1) {
      $finished = 0;
    } else {
      $finished = 1;
    }

    $query = $mysqlClient->prepare('UPDATE todos SET finished = :num WHERE id = :id;');
    $query->execute([
      'num' => $finished,
      'id' => $_POST['id']
    ]);
  }
}
redirect('../pages/home.php');