<?php
    $server = "localhost";
    $user = "root";
    $password = "root";
    $db_name = "vukasin_blog";

    $conn = new mysqli($server,$user,$password,$db_name);

    // if ($conn->connect_error) {
    //     echo $conn->connect_error;
    // } else{
    //     echo "<h1>Uspesna konekcija</h1>";
    // }

?>