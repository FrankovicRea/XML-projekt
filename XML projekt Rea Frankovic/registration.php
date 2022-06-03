<?php
session_start();
if (isset($_POST["name"]) AND isset($_POST["surname"]) AND isset($_POST["username"]) AND isset($_POST["password"])){
    $ime= $_POST["name"];
    $prezime= $_POST["surname"];
    $username= $_POST["username"];
    $password= $_POST["password"];

    $_SESSION['username'] = $username;
    $_SESSION['prezime'] = $prezime;
    $_SESSION['ime'] = $ime;
    
    registracija($ime, $prezime, $username, $password);
}

	
function registracija($ime, $prezime, $username, $password) {
    
    $xml = simplexml_load_file('korisnici.xml');
    $user = $xml->addChild('user');
    $user->addChild('username', $username, );
    $user->addChild('password', $password, );
    $user->addChild('ime', $ime, );
    $user->addChild('prezime', $prezime, );
    file_put_contents('korisnici.xml', $xml->asXML());

    $rezultat = "Uspjesno ste registrirani!";
    $_SESSION['rezultat'] = $rezultat;

    header('Location: profile.php');
    exit;
    return;
}

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
        <div class="main">
            <div class="slika">
                <div id="natpis">
                    Welcome<br>new user!
                </div>
            </div>
            <div class="forma">
                <div id="container">
                    <h1>Registration</h1>
                    <p>Welcome new user!
                        <br>Create an account with the form below.
                    </p>
    
                    <form action="" method="POST">
                        <label for="name">Name</label>
                        <br>
                        <input name="name" type="text" required/>
                        <br>
                        <label for="surname">Surname</label>
                        <br>
                        <input name="surname" type="text" required/>
                        <br>
                        <label for="username">Username</label>
                        <br>
                        <input name="username" type="text" required/>
                        <br>
                        <label for="password">Password</label>
                        <br>
                        <input name="password" type="password" required/>
                        <br>
                        <input name="signup" type="submit" value="Signup" />
                    </form>
                    <br><h3>Already have an account?</h3>
                    <a href="login.php"><button>Login</button></a>
                </div>
                
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
