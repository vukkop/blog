<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/admin.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <title>Hello, world!</title>
    </head>
    <body>
        <?php
            session_start();
            if(isset($_SESSION['id'])) {
                if (!$_SESSION['admin']) {
                    header("Location: index.php");
                }
            }else {
                header("Location: index.php");
            }
        ?>
        <div class="row main">
            <div class="col col-sm-2">
                <ul class="nav flex-column bg-dark">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Sajt Pocetna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="adminIndex.php">Admin Pocetna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminPosts.php">Objave</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminAddPost.php">Nova Objava</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="adminCategory.php">Kategorije</a>
                    </li>
                </ul>
            </div>
            <div class="col col-sm-9">