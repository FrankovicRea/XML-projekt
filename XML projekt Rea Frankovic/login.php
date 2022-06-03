<?php

$rezultat = "";
if (isset($_POST["username"]) AND isset($_POST["password"])){
	$username= $_POST["username"];
	$password= $_POST["password"];

	session_start();
	$_SESSION['username'] = $username;

	$rezultat = provjera($username,$password);
}

function provjera($username, $password) {
	

	$xml = simplexml_load_file('korisnici.xml');
	
	
	foreach ($xml->user as $usr) {
  	 	$usrn = $usr->username;
		$usrp = $usr->password;
		$usrime=$usr->ime;
		$usrprezime=$usr->prezime;

		if($usrn==$username){
			if($usrp == $password){
				$rezultat = "Prijavljeni ste kao $usrime $usrprezime";
				$_SESSION['rezultat'] = $rezultat;

				$prezime = "$usrprezime";
				$_SESSION['prezime'] = $prezime;

				$ime = "$usrime";
				$_SESSION['ime'] = $ime;
				
				header('Location: profile.php');
				exit;
				}
			else{
				$rezultat = "Password is incorrect!";
				return $rezultat;
				}
			}
		}
		
    $rezultat = "This user does not exist.";
	return $rezultat;
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
                    Welcome<br>back!
                </div>
            </div>
            <div class="forma">
                <div id="container">
                    <h1>Login</h1>
                    <p>Welcome back!
                        <br>Log into your account with your Username and Password.
                    </p>
    
                    <form action="" method="POST">
                        <label for="username">Username</label>
                        <br>
                        <input name="username" type="text" required/>
                        <br>
                        <label for="password">Password</label>
                        <br>
                        <input name="password" type="password" required/>
                        <br>
                        <input name="login" type="submit" value="Login" />
					</form>

					<h2><?php echo"$rezultat";?></h2>

                    <br><h3>New user?</h3>
                    <a href="registration.php"><button>Signup</button></a>
                        
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
