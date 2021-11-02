<?php
    include "../connection/conn.php";
    session_start();


    $izmena = false;
    $id = 0;

    if (isset($_GET["id"])) {
        $izmena = true;
        $id = $_GET["id"];
    }



    $naslov = $_POST["naslov"];
    $tekst = $_POST["tekst"];
    if ($_POST["istaknuto"]) {
        $istaknuto = 1;
    } else $istaknuto = 0;
    $foto = $_FILES["foto"];
    $kategorija = $_POST["kategorija"];


    $novoImeSlike = "";

    if ($_FILES["foto"]["size"] > 0) {
        $imeSlike = $foto["name"];
        $tip = $foto["type"];
        $imeSlikeTmp = $foto["tmp_name"];
        $greska = $foto["error"];
        $velicina = $foto["size"];

        $niz = explode ('.',$imeSlike);
        $ekst = $niz[count($niz) - 1];
        
        $dozvoljeneEkst = ['png','PNG','jpg','JPG','jpeg','JPEG','ico','ICO','heic','HEIC'];

        if (in_array($ekst,$dozvoljeneEkst)) {
            if ($greska === 0) {
                if ($velicina < 20000000) {
                    $novoImeSlike = uniqid('post',true).".".$ekst;
                    $destinacija = "../images/".$novoImeSlike;
                    BrisanjeFotografije($id);
                    move_uploaded_file($imeSlikeTmp,$destinacija);
                } else {
                    echo "Slika je prevelikog formata";
                }
            } else {
                echo "Greska prilikom prenosa fotografije";
            }
        } else {
            echo "Format nije dozvoljen";
        }
    }

    $sql = ";";

    function BrisanjeFotografije($id)
    {
        global $conn;
        $sql = "SELECT * FROM objava WHERE id=$id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $img = $row["foto"];
        unlink("../images/$img");
    }

    if ($izmena) {
        if ($_FILES["foto"]["size"] > 0) {
                $sql = "UPDATE `objava` SET `naslov`='$naslov',`tekst`='$tekst',
                    `foto`='$novoImeSlike',`id_kategorije`= $kategorija, `istaknuto` = $istaknuto WHERE id=$id";
        } else {
            $sql = "UPDATE `objava` SET `naslov`='$naslov',`tekst`='$tekst',
                    `id_kategorije`= $kategorija, `istaknuto` = $istaknuto WHERE id=$id";
        }
        
    } else {
        $sql = "INSERT INTO `objava` (`naslov`,`tekst`,`foto`,`id_kategorije`,`istaknuto`)
            VALUES ('$naslov','$tekst','$novoImeSlike', $kategorija, $istaknuto)";
    }       
    
    $conn->query($sql);

    header("Location: ../adminPosts.php");
?>