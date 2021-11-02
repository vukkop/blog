<?php
    include "layout/adminHeader.php";
    include "connection/conn.php";

    $sql = "SELECT * FROM kategorija";
    $result = $conn->query($sql);

    $izmena = false;
    $id = 0;
    $naslov = $tekst = $kategorija = "";
    $istaknuto = false;
    if (isset($_GET["id"])) {
      $izmena = true;
      $id = $_GET["id"];
      $sql_post = "SELECT * FROM objava WHERE id=$id";
      $post_result = $conn->query($sql_post);
      $post = $post_result->fetch_assoc();
      $naslov = $post['naslov'];
      $tekst = $post['tekst'];
      $istaknuto = $post['istaknuto'];
      $kategorija = $post['id_kategorije'];
      
    }
?>
<br>
<?php
  if ($izmena) {
    echo '<h1 class="title">Izmena Objave</h1>';
  } else {
    echo '<h1 class="title">Nova Objava</h1>';
  }
?>

<hr>
<?php
  if ($izmena) {
    echo "<form action='functions/addPost.php?id=$id' method='POST' enctype='multipart/form-data'>";
  } else {
    echo '<form action="functions/addPost.php" method="POST" enctype="multipart/form-data">';
  }
?>

  <div class="form-group">
    <label for="naziv">Naslov objave</label>
    <input type="text" class="form-control" id="naziv" name="naslov" value="<?php echo $naslov;?>">
  </div>
  <div class="form-group">
    <label for="tekst">Tekst objave</label>
    <textarea class="form-control" id="tekst" rows="3" name="tekst"><?php echo $tekst;?></textarea>
  </div>
  <div class="form-group">
    <label for="kategorija">Izaberite kategoriju</label>
    <select class="form-control" id="kategorija" name="kategorija">
      <?php
         if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            if ($row["id"] == $kategorija) {
              echo "<option selected value='".$row["id"]."'>".$row["naziv"]."</option>";
            } else {
              echo "<option value='".$row["id"]."'>".$row["naziv"]."</option>";
            }
            
          }
      } else {
        echo "<h1>Nema rezultata</h1>";
      }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="foto">Fotografija</label>
    <input type="file" id="foto" name="foto">
  </div>
  <div class="form-group">
    <label for="istaknuto">Istaknuto</label>
    <input type="checkbox" id="istaknuto" name="istaknuto" class="checkbox" <?php if($istaknuto) {echo 'checked';}?>>
  </div>
  <button class="btn btn-success" type="submit">Potvrdi</button>
</form>


<?php
    include "layout/adminFooter.php"
?>