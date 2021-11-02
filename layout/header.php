<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/home.css">
    <title>Hello, world!</title>
  </head>
<?php
include "connection/conn.php";
session_start();

$sql = "SELECT * FROM kategorija";
$result = $conn->query($sql);

?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-item nav-link" href="index.php">Pocetna <span class="sr-only">(current)</span></a>
              <a class="nav-item nav-link" href="about.php">O Nama</a>
              <?php
               if(isset($_SESSION['id'])) {
                  if ($_SESSION['admin']) {
                      echo '<a class="nav-item nav-link btn btn-outline-info" href="adminIndex.php">Admin</a>';
                  }
               }
              ?>
              
            </div>
            <div class="navbar-nav navbar-right">
              <?php
                if(isset($_SESSION['id'])) {
                    echo '<a class="nav-item nav-link btn btn-outline-danger my-2 my-sm-0" href="functions/logout.php">Odjava</a>';
                } else {
                  echo '<a class="nav-item nav-link" href="signup.php">Registracija</a>
                        <a class="nav-item nav-link btn btn-outline-info my-2 my-sm-0" href="login.php">Prijava</a>';
                }
              ?>
            </div>
        </div>     
    </nav>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php
        while($row = $result->fetch_assoc()) {
          echo "<li class='nav-item'>
                  <a class='nav-link' href='categoryPosts.php?id=".$row['id']."'>".$row['naziv']."</a>
                </li>";
        }
      ?>
    </ul>
  </div>
</nav>
