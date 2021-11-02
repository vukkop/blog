<?php
    include "layout/header.php";
    include "connection/conn.php";
    $id = $_GET["id"];
    $sql = "SELECT * FROM objava WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sqlC = "SELECT komentar.tekst, korisnik.ime FROM komentar 
            INNER JOIN korisnik ON komentar.id_autora = korisnik.id
            WHERE komentar.id_objave = $id ORDER BY komentar.id DESC";
    $resultC = $conn->query($sqlC);
?>

    <div class="row pocetna">
      <div class="col col-sm-3"></div>
      <div class="col col-sm-6">

        <?php
            echo "<br><h2>".$row['naslov']."</h2><hr>
            <img src='images/".$row["foto"]."'/><br><br>
            <p>".$row["tekst"]."</p>";
            echo "<hr>";
            echo "<form action='functions/addComment.php?id=$id' method='POST'>";
        
            if(isset($_SESSION['id'])) {
                echo "<form action='functions/addComment.php?id=$id' method='POST'>";
                echo '<div class="form-group">
                        <label for="komentar">Vas komenta:</label>
                        <textarea class="form-control" id="komentar" rows="3" name="komentar"></textarea>
                     </div>
                        <button class="btn btn-success" type="submit">Potvrdi</button>';
            } else {
                echo "<h5>Ukoliko zelite da ostavite komentar potebno je da se <a href='login.php'>prijavite</a></h5>";
            }
        
        
        ?>
        <hr>
        <?php
            while($rowC = $resultC->fetch_assoc()) {
                echo "<div>
                        <h4>".$rowC['ime']."</h4>
                        <p>".$rowC['tekst']."</p>";
            }
        ?>
        </form>
      </div>
      <div class="col col-sm-3"></div>
    </div>
 

