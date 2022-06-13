<?php
@$nom = $_POST["nom"];
@$prenom = $_POST["prenom"];
@$login = $_POST["login"];
@$pass = md5( $_POST["pw"]);
@$repass = md5($_POST["pwc"]);
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    if (empty($nom)) {
        $erreur = "Nom laissé vide!";
        @$nom;
    } elseif (empty($prenom)) {
        $erreur = "Prénom laissé vide!";
        @$prenom;
    } elseif (empty($login)) {
        $erreur = "Login laissé vide!";
        @$login;
    } elseif (empty($pass)) {
        $erreur = "Mot de passe laissé vide!";
        @$pass;
    } elseif ($pass != $repass) {
        $erreur = "Mots de passe non identiques!";
        @$repass;
    } else {
        include("connexion.php");
        $sel = $pdo->prepare("select id from tabadmin where login=? limit 1");
        $sel->execute(array($login));
        $tab = $sel->fetchAll();
        if (count($tab) > 0)
            $erreur = "Login existe déjà!";
        else {
            $ins = $pdo->prepare("insert into tabadmin(nom,prenom,login,pass) values(?,?,?,?)");
            if ($ins->execute(array($nom, $prenom, $login, $pass)))
                header("location:login.php");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="styleinscription.css">
    <link rel="shortcut icon" href="images/book.png" type="Ecole" id="ensah" />
    <script type="text/javascript" src="script.js"></script>
    <style>
        .erreur {
            background-color: red;
            color: white;
        }

        input[type="password"] {
            padding: 12px 20px;
            margin: 8px 0;
            border: none;
            background-color: blue;
            color: white;
        }
    </style>
</head>

<body>
    <div id="Bloc_page">
        <?php  
        include("header.html");
        ?>
        <div class="forum">
            <div class="form-info-genral">
                <div class="erreur"><?php echo $erreur ?></div>
                <form name="fo" method="post" action="" onsubmit="effacer()">
                    <fieldset>
                        <legend>Inscription Admin</legend>
                        <label for="nom"> nom:<input type="text" name="nom" placeholder="Nom" id="nom" value="<?php echo $nom ?>" onblur="validateNom()" /><br /> </label>
                        <span id="errornom"></span>
                        <label for="prenom"> prenom:<input type="text" name="prenom" id="prenom" placeholder="Prénom" value="<?php echo $prenom ?>" onblur="validatePrenom()" /><br /> </label> <br>
                        <span class="erreurspan" id="errorprenom"></span>
                        <label for="login"> Login:<input type="text" name="login" id="login" placeholder="Login" value="<?php echo $login ?>" onblur="validateLogin()" /><br /> </label> <br>
                        <span class="erreurspan" id="errorlogin"></span>
                        <label for="pass"> Mot de passe: <input type="password" id="pass" name="pw" placeholder="Mot de passe" onblur="validatePw()" /><br /> </label> <br>
                        <span class="erreurspan" id="errorpw"></span>
                        <label for="rpass"> confirmer votre mot de passe:<input type="password" id="rpass" name="pwc" placeholder="Confirmer Mot de passe" oninput="validatePwc()" /><br /> </label> <br>
                        <input type="submit" name="valider" value="S'authentifier" />
                    </fieldset>
                </form>
            </div>
        </div>

 <?php
include_once("footer.html");
 ?>
        
    </div>
</body>

</html>