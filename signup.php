<?php
    include "layout/Header.php";
    $greskaIme = "";
    $greskaImePolje = "";
    $imeVrednost = "";

    $greskaEmail = "";
    $greskaEmailPolje = "";
    $emailVrednost = "";

    $greskaLoz1 = "";
    $greskaLoz1Polje = "";

    $greskaLoz2 = "";
    $greskaLoz2Polje = "";


    if (isset($_GET['ime'])) {
        if ($_GET['ime'] == "prazno") {
            $greskaIme = "Ime nije uneto.";
            $greskaImePolje = "greskaPolje";
        } 
        elseif ($_GET['ime'] == "pogresno") {
            $greskaIme = "Ime je pogresno uneto nisu dozvoljeni specijalni simboli.";
            $greskaImePolje = "greskaPolje";
            $imeVrednost = $_GET['imevrednost'];
        } 
        elseif ($_GET['ime'] == "ok") {
            $imeVrednost = $_GET['imevrednost'];
        }
    }
    if (isset($_GET['email'])) {
        if ($_GET['email'] == "prazno") {
            $greskaEmail = "Email nije unet.";
            $greskaEmailPolje = "greskaPolje";
        } 
        elseif ($_GET['email'] == "pogresno") {
            $greskaEmail = "Email nije pravilno unet.";
            $greskaEmailPolje = "greskaPolje";
            $emailVrednost = $_GET['emailvrednost'];
        }
        elseif ($_GET['email'] == "ok") {
            $emailVrednost = $_GET['emailvrednost'];
        }
    }    
    if (isset($_GET['loz1'])) {
        if ($_GET['loz1'] == "prazno") {
            $greskaLoz1 = "Lozinka nije uneta.";
            $greskaLoz1Polje = "greskaPolje";
        }
        elseif ($_GET['loz1'] == "pogresno") {
            $greskaLoz1 = "Lozinka mora sadrzati minimum 6 karaktera, 1 veliko, 1 malo slovo i broj.";
            $greskaLoz1Polje = "greskaPolje";
        }
    }
    if (isset($_GET['loz2'])) {
        if ($_GET['loz2'] == "prazno") {
            $greskaLoz2 = "Potvrda lozinke nije uneta.";
            $greskaLoz2Polje = "greskaPolje";
        }elseif ($_GET['loz2'] == "pogresno") {
            $greskaLoz2 = "Lozinke se ne poklapaju.";
            $greskaLoz2Polje = "greskaPolje";
        }
    }


?>
<!-- event.preventDefault(); provera(); -->
<form action="functions/registerUser.php" class="prijava" method="POST"
      name="registracija" onsubmit=""> 
    <h3>Registracija</h3>
    <div class="form-group">
        <label for="ime">Ime i prezime</label>
        <input type="text" class="form-control <?php echo $greskaImePolje?>" id="ime" name="ime" value="<?php echo $imeVrednost?>">
        <p id="greskaIme" class="ispisGreske"><?php echo $greskaIme ?></p>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control <?php echo $greskaEmailPolje?>" id="email" name="email" value="<?php echo $emailVrednost?>">
        <p id="greskaEmail" class="ispisGreske"><?php echo $greskaEmail?></p>
    </div>
    <div class="form-group">
        <label for="pass1">Lozinka</label>
        <input type="password" class="form-control <?php echo $greskaLoz1Polje?>" id="pass1" name="pass1" >
        <p id="greskaLoz1" class="ispisGreske"><?php echo $greskaLoz1?></p>
    </div>
    <div class="form-group">
        <label for="pass2">Potvrda Lozinke</label>
        <input type="password" class="form-control <?php echo $greskaLoz2Polje?>" id="pass2" name="pass2" >
        <p id="greskaLoz2" class="ispisGreske"><?php echo $greskaLoz2?></p>
    </div>
    <button class="btn btn-success" type="submit">Potvrdi</button>
    <hr>
    <p>Vec imate nalog? <a href="login.php">Prijavite se</a></p>
</form>

<script>
    // function provera(e) {
    //     let reg = document.registracija;
    //     let ime = reg.ime;
    //     let email = reg.email;
    //     let pass1 = reg.pass1;
    //     let pass2 = reg.pass2;

    //     let greskaIme = document.getElementById("greskaIme");
    //     let greskaEmail = document.getElementById("greskaEmail");
        
    //     let greska = false;

    //     if (ime.value.trim().length < 1) {
    //         greskaIme.innerHTML = "Ime nije uneto.";
    //         ime.classList.add("greskaPolje");
    //         greska = true;
    //     } 
    //     if (email.value.trim().length < 1) {
    //         greskaEmail.innerHTML = "Email nije unet.";
    //         email.classList.add("greskaPolje");
    //         greska = true;
    //     }
    //     if(greska) return false
    //     reg.submit();
    // }
</script>