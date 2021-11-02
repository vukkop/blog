<?php
    include "layout/header.php";
    include "connection/conn.php";

    $sql = "SELECT * FROM objava";
    $result = $conn->query($sql);

?>

    <br>
    <div class="row pocetna">
      <div class="col col-sm-3"></div>
      <div class="col col-sm-6">
        <?php include "layout/carousel.php" ?>

        <h3>Najnovije objave</h3>
        <hr>
      <?php
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            echo "<div class='row post'>";
            echo "<div class='col col-sm-4'>
                    <img class='img-thumbnail' src='images/".$row["foto"]."'/>
                  </div>";
            echo "<div class='col col-sm-8'>
                    <h2>".$row["naslov"]."</h2>
                    <p>".substr($row["tekst"],0,200)." ...</p>
                    <a href='singlePost.php?id=".$row['id']."' class='btn btn-info btn-sm'>Procitaj vise</a>
                  </div></div>";
            }
          } else {
            echo "<h1>Nema rezultata</h1>";
          }
      ?>
      </div>
      <div class="col col-sm-3"></div>
    </div>
 


<?php
    include "layout/footer.php"
?>