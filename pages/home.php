<?php
session_start();

require_once ('../controllers/functions.php');

if (!isset($_SESSION['LOGGED_USER'])) {
  redirect('signup.php');
}

require_once ('../config/connectdb.php');

$query = $mysqlClient->prepare('SELECT * FROM todos WHERE user_id = :user_id ORDER BY id DESC;');
$query->execute([
  'user_id' => $_SESSION['LOGGED_USER']['user_id']
]);

$results = $query->fetchAll(PDO::FETCH_ASSOC);


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

    <section>
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

                      <th scope="col" style="width:60%">Todo item</th>

                      <th scope="col" style="width:40%">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (empty($results)) { ?>
                      <p class="text-center">No Tasks Yet</p>
                    <?php } else {
                      foreach ($results as $item) { ?>
                        <tr>

                          <td <?php if ($item['finished'] === 1) {
                            echo 'class="text-decoration-line-through"';
                          } ?>>
                            <?php echo $item['content']; ?>
                          </td>

                          <td>
                            <form action="../controllers/task_action.php" method="POST">
                              <input type="number" class="visually-hidden" name="id" value="<?php echo $item['id']; ?>">
                              <div class="d-flex flex-column flex-sm-row align-items-stretch">
                                <button type="submit" name="delete" class="btn btn-danger mb-2 mb-sm-0">Delete</button>
                                <button type="submit" name="finish" class="btn btn-success ms-sm-2">Finished</button>
                              </div>
                            </form>
                          </td>
                        </tr>
                        <?php
                      }
                    } ?>
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