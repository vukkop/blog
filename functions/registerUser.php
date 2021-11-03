<?php
    include "../connection/conn.php";
    session_start();


    $ime = $_POST["ime"];
    $email = $_POST["email"];
    $loz1 = $_POST["pass1"];
    $loz2 = $_POST["pass2"];

    $lokacija = "Location: ../signup.php?";
    $postojiGreska = false;

    if(empty($ime)) {
        $lokacija = $lokacija . "ime=prazno&";
        $postojiGreska = true;
    } else if (!preg_match("/^[a-zA-Z0-9 ]*$/", $ime)) {
        $lokacija = $lokacija . "ime=pogresno&imevrednost=$ime&";
        $postojiGreska = true;
    } else {
        $lokacija = $lokacija . "ime=ok&imevrednost=$ime&";
    }

    if(empty($email)) {
        $lokacija = $lokacija . "email=prazno&";
        $postojiGreska = true;
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $lokacija = $lokacija . "email=pogresno&emailvrednost=$email&";
        $postojiGreska = true;
    } else {
        $lokacija = $lokacija . "email=ok&emailvrednost=$email&";
    }

    if(empty($loz1)) {
        $lokacija = $lokacija . "loz1=prazno&";
        $postojiGreska = true;
    } elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/", $loz1)) {
        $lokacija = $lokacija . "loz1=pogresno&";
        $postojiGreska = true;
    }

    if(empty($loz2)) {
        $lokacija = $lokacija . "loz2=prazno&";
        $postojiGreska = true;
    } elseif ($loz1 !== $loz2) {
        $lokacija = $lokacija . "loz2=pogresno&";
        $postojiGreska = true;
    }



    header($lokacija);

    if ($postojiGreska) {
        header($lokacija);
        exit();
    } else {

        $sql = "INSERT INTO `korisnik` (`ime`,`email`,`lozinka`)
        VALUES (?,?,?);";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt, "sss", $ime, $email, $loz1);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header("Location: ../index.php");
    }

?>