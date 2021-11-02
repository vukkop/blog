<?php
    include "layout/Header.php";
?>

<form action="functions/registerUser.php" class="prijava" method="POST">
    <h3>Registracija</h3>
    <div class="form-group">
        <label for="ime">Ime i prezime</label>
        <input type="text" class="form-control" id="ime" name="ime" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" >
    </div>
    <div class="form-group">
        <label for="pass1">Lozinka</label>
        <input type="password" class="form-control" id="pass1" name="pass1" >
    </div>
    <div class="form-group">
        <label for="pass2">Potvrda Lozinke</label>
        <input type="password" class="form-control" id="pass2" name="pass2" >
    </div>
    <button class="btn btn-success" type="submit">Potvrdi</button>
    <hr>
    <p>Vec imate nalog? <a href="login.php">Prijavite se</a></p>
</form>