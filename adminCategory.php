<?php
    include "layout/adminHeader.php";
    include "connection/conn.php";

    $sql = "SELECT * FROM kategorija";
    $result = $conn->query($sql);
?>
<br>
<h1 class="title">Pregled kategorija</h1>
<hr>

<div class="row">
    <div class="col col-sm-4">
        <form action="functions/addCategory.php" method="POST">
            <div class="form-group">
                <label for="naziv">Naziv kategorije</label>
                <input type="text" class="form-control" id="naziv" name="naziv">
            </div>  
            <button class="btn btn-success" type="submit">Potvrdi</button>
        </form>
    </div>
    <div class="col col-sm-8">
        <table class="table">
        <thead class="thead-dark">
            <tr>
            <th scope="col">Broj</th>
            <th scope="col">Naziv</th>
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
                        echo "<td>".$row["naziv"]."</td>";
                        echo "<td>
                                    <a class='btn btn-danger' href='functions/deleteCategory.php?id=".$row['id']."'>
                                        <i class='fas fa-trash-alt'></i>
                                    </a>
                                    <button class='btn btn-warning'>
                                        <i class='fas fa-pencil-alt'></i>
                                    </button>
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
    </div>
</div>


<?php
    include "layout/adminFooter.php"
?>