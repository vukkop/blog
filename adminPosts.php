<?php
    include "layout/adminHeader.php";
    include "connection/conn.php";

    $sql = "SELECT objava.id, objava.naslov, objava.tekst, objava.foto, objava.id_kategorije,
                   objava.istaknuto, kategorija.naziv AS kategorija
            FROM objava
            LEFT JOIN kategorija ON objava.id_kategorije = kategorija.id";
    $result = $conn->query($sql);
?>
<br>
<h1 class="title">Pregled Objava</h1>
<hr>
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Broj</th>
      <th scope="col">Naslov</th>
      <th scope="col">Text</th>
      <th scope="col">Fotografija</th>
      <th scope="col">Kategorija</th>
      <th scope="col">Istaknuto</th>
      <th scope="col">Uredi</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if ($result->num_rows > 0) {
            $broj = 1;
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$broj.".</td>";
              echo "<td title='".$row["naslov"]."'>".substr($row["naslov"],0,30)." ...</td>";
              echo "<td>".substr($row["tekst"],0,40)." ...</td>";
              echo "<td><img src='images/".$row["foto"]."'/></td>";
              echo "<td>".$row["kategorija"]."</td>";
              if($row["istaknuto"]) {
                echo "<td>DA</td>";
              } else { echo "<td>NE</td>";};
              echo "<td>
                        <a class='btn btn-danger' href='functions/deletePost.php?id=".$row['id']."'>
                            <i class='fas fa-trash-alt'></i>
                        </a>
                        <a class='btn btn-warning' href='adminAddPost.php?id=".$row['id']."'>
                            <i class='fas fa-pencil-alt'></i>
                        </a>
                    </td>";
              echo "</tr>";
              $broj++;
            }
        } else {
          echo "<h1>Nema rezultata</h1>";
        }
      
    ?>


  </tbody>
</table>

<?php
    include "layout/adminFooter.php"
?>