<?php
    include "layout/Header.php";
?>

<form action="functions/loginUser.php" class="prijava" method="POST">
    <h3>Prijava</h3>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" >
    </div>
    <div class="form-group">
        <label for="pass">Lozinka</label>
        <input type="password" class="form-control" id="pass" name="pass" >
    </div>

    <button class="btn btn-success" type="submit">Potvrdi</button>
    <hr>
    <p>Nemate nalog? <a href="signup.php">Registrujte se</a></p>
</form>