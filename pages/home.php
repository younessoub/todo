<?php 
session_start();

require_once('../controllers/functions.php');

if(!isset($_SESSION['LOGGED_USER'])){
  redirect('login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Home</title>

    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/icons/font/bootstrap-icons.min.css" rel="stylesheet" />
  </head>
  <body>
  <header>
  <div class="container">
        <div
          class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
          <div class="col-md-3 mb-2 mb-md-0">
            <a
              href="/"
              >
              <!-- <svg
                class="bi"
                width="40"
                height="32"
                role="img"
                aria-label="To Do">
                <use xlink:href="#bootstrap" />
              </svg> -->
              <i class="bi bi-check2-circle"   width="50"
              height="52"></i>
             
            </a>
          </div>

          <ul
            class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="#" class="nav-link px-2">Features</a></li>
            <li><a href="#" class="nav-link px-2">Pricing</a></li>
            <li><a href="#" class="nav-link px-2">FAQs</a></li>
            <li><a href="#" class="nav-link px-2">About</a></li>
          </ul>

          <div class="col-md-3 text-end">
            <!-- <button type="button" class="btn btn-outline-primary me-2">
              Login
            </button> -->
            <a href="../controllers/signout.php" type="button" class="btn btn-primary">Sign-Out</a>
          </div>
        </div>
      </div>
  </header>  
  <main>
      <h1>Home page</h1>

    </main>

    <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->
  </body>
</html>
