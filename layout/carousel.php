<?php
    include "connection/conn.php";
    $sqli = "SELECT * FROM objava WHERE istaknuto=1";
    $res = $conn->query($sqli);

?>


<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
            <?php
                $prva = true;
                while($row = $res->fetch_assoc()) {
                    if($prva){
                        echo "<div class='carousel-item active'>";
                             $prva = false;
                    } else {
                        echo "<div class='carousel-item'>";         
                    } 
                    echo  "<img class='d-block w-100' src='images/".$row['foto']."'>
                                <div class='carousel-caption d-none d-md-block'>
                                    <a href='singlePost.php?id=".$row['id']."'><h5>".$row['naslov']."</h5>
                                    <p>".substr($row["tekst"],0,40)." ...</p>
                                </div>
                            </div>";
                }
            ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
    </a>
</div>
<br>