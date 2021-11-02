<?php
    include "../connection/conn.php";
    session_start();

    $email = $_POST["email"];
    $loz = $_POST["pass"];

    $sql = "SELECT * FROM korisnik WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        if ($loz != $row['lozinka']) {
            echo "Pogresna lozinka";
        } else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['ime'] = $row['ime'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['admin'] = $row['admin'];
            header("Location: ../index.php");
        }
    } else {
        echo "Pogresan email";
    }