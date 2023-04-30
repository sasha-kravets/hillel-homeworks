<?php
session_start();
require __DIR__ . '/functions/functions.php';
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <title>Registration</title>
</head>
<body>

<div class="container-fluid">
  <div class="row justify-content-md-center">
    <div class="mt-5">

      <h2>Registration Page</h2>

      <form action="controllers/registration.php" method="post">
        <div class="form-group">
          <label for="exampleInputEmail1">Full Name</label>
          <input type="text" value="<?= getValue('register_form', 'name') ?>" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter full name">
        </div>

        <?php displayMessages('name') ?>

        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" value="<?= getValue('register_form', 'email') ?>" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        </div>

        <?php displayMessages('email') ?>

        <div class="form-group">
          <label for="exampleInputPassword1">Password</label>
          <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <?php displayMessages('password') ?>

        <div class="form-group">
          <label for="exampleInputPassword1">Password Confirm</label>
          <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword1" placeholder="Password">
        </div>

        <?php displayMessages('password_confirm') ?>

        <button type="submit" class="btn btn-primary">Submit</button>

        <div style="margin-top: 20px">
          <a href="closed.php">Link to closed page</a>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>