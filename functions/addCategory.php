<?php
include "../connection/conn.php";
session_start();


    $naziv = $_POST["naziv"];


    $sql = "INSERT INTO `kategorija` (`naziv`)
            VALUES ('$naziv')";
    
    $conn->query($sql);

    header("Location: ../adminCategory.php");
?>