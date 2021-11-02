<?php
    include "../connection/conn.php";
    session_start();

    $id = $_GET["id"];
    $sql = "SELECT * FROM objava WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $img = $row["foto"];
    unlink("../images/$img");
    $sql = "DELETE FROM objava WHERE id=$id";
    $conn->query($sql);
    header("Location: ../adminPosts.php");
?>