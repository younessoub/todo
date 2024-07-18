<?php
session_start();

require_once ('../controllers/functions.php');

if (!isset($_SESSION['LOGGED_USER'])) {
  redirect('signup.php');
}

require_once ('../config/connectdb.php');




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Home</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/favicon.png">

  <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="../assets/icons/font/bootstrap-icons.min.css" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="container">

      <div
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
          <a href="#">
            <img class="img-fluid" style="max-width:100px" src="../assets/images/logo.png" alt="logo">

          </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 link-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2">Contact</a></li>

        </ul>

        <div class="col-md-3 text-end">

          <a href="../controllers/signout.php" type="button" class="btn btn-primary">Sign-Out</a>
        </div>
      </div>
    </div>
  </header>
  <main>
    <h1 class="ms-5">Hello <?php echo $_SESSION['LOGGED_USER']['name'] ?></h1>

    <section class="vh-100">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col col-lg-9 col-xl-7">
            <div class="card rounded-3">
              <div class="card-body p-4">

                <h4 class="text-center my-3 pb-3">To Do App</h4>
                <?php if (isset($_SESSION['TASK_SUBMIT_ERROR'])) { ?>
                  <p class="text-danger"><?php echo $_SESSION['TASK_SUBMIT_ERROR'] ?></p>
                <?php } ?>
                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2"
                  action="../controllers/submit_task.php" method="POST">
                  <div class="col-12">
                    <div class="form-outline">
                      <input type="text" name="content" class="form-control" placeholder="Enter a task here" required />
                      <label class="form-label visually-hidden" for="form1">Enter a task here</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <button type="submit" class="btn btn-primary">Save</button>
                  </div>


                </form>

                <table class="table mb-4">
                  <thead>
                    <tr>

                      <th scope="col">Todo item</th>

                      <th scope="col">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>

                      <td>
                        Buy groceries for next week
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veniam, cumque voluptates! Magni
                        perferendis soluta, rerum voluptate aut maxime ea eveniet provident cum. Impedit facere
                        doloribus ipsam, aut esse cum modi.
                      </td>

                      <td>
                        <div class="d-flex flex-column flex-sm-row align-items-stretch">
                          <button type="submit" class="btn btn-danger mb-2 mb-sm-0">Delete</button>
                          <button type="submit" class="btn btn-success ms-sm-2">Finished</button>
                        </div>
                      </td>
                    </tr>
                    <tr>

                      <td>Renew car insurance</td>

                      <td>
                        <div class="d-flex flex-column flex-sm-row align-items-stretch">
                          <button type="submit" class="btn btn-danger mb-2 mb-sm-0">Delete</button>
                          <button type="submit" class="btn btn-success ms-sm-2">Finished</button>
                        </div>
                      </td>
                    </tr>
                    <tr>

                      <td>Sign up for online course</td>

                      <td>
                        <div class="d-flex flex-column flex-sm-row align-items-stretch">
                          <button type="submit" class="btn btn-danger mb-2 mb-sm-0">Delete</button>
                          <button type="submit" class="btn btn-success ms-sm-2">Finished</button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- <script src="../assets/js/bootstrap.bundle.min.js"></script> -->
</body>

</html>