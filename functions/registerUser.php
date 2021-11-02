<?php
    include "../connection/conn.php";
    session_start();


    $ime = $_POST["ime"];
    $email = $_POST["email"];
    $loz1 = $_POST["pass1"];
    $loz2 = $_POST["pass2"];


    $sql = "INSERT INTO `korisnik` (`ime`,`email`,`lozinka`)
    VALUES ('$ime', '$email', '$loz1')";

    $conn->query($sql);

    header("Location: ../index.php");
?>