<?php 
    session_start();
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>XML</title>
        <meta charset="utf-8" />
        <meta name="author" content="Rea Franković" />
        <meta name="description" content="XML Programiranje: Zavrsni projekt" />


        <link rel="stylesheet" href="css/style.css" type="text/css" />
        <link rel="icon" href="images/favicon.ico" />

    </head>

    <body>
        <header>
            <h3>
                <?php 
                echo $_SESSION['rezultat'];
                ?>
            </h3>
            <a href="login.php"><button id="signout">Sign Out</button></a>
        </header>
        <div class="sadrzaj">
            <div class="profil">
                <img src="slike/profil.png" alt="Profilna slika">
                <h1>
                    <?php 
                    echo $_SESSION['username'];
                    ?>
                </h1>
                <br>
                <h2>Ime: 
                    <?php 
                    echo $_SESSION['ime'];
                    ?>
                </h2>
                <h2>Prezime:
                    <?php 
                    echo $_SESSION['prezime'];
                    ?>
                </h2>
            </div>
        </div>
        <footer>
            <p>
                <br> Rea Franković
                <br>rfrankovi@tvz.hr<br><br>
                <i>XML Programiranje 2021./22.</i>
              </p>
          </footer>
    </body>
</html>