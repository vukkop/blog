<?php
    include "../connection/conn.php";
    session_start();

    $id = $_GET["id"];
    $sql = "DELETE FROM kategorija WHERE id=$id";
    $conn->query($sql);
    header("Location: ../adminCategory.php");
?>