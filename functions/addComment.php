<?php
    include "../connection/conn.php";
    session_start();

    $tekst = $_POST["komentar"];
    $id_objave = $_GET['id'];
    $id_autora = $_SESSION['id'];

    $sql = "INSERT INTO `komentar` (`tekst`,`id_autora`,`id_objave`)
            VALUES ('$tekst', $id_autora , $id_objave)";
    
    $conn->query($sql);
    
    header("Location: ../singlePost.php?id=$id_objave");
?>