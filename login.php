<?php
session_start();
@$login = $_POST["login"];
@$pass = md5($_POST["pass"]);
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider) && isset($pass) && isset($login)) {
    include("connexion.php");
    $sel = $pdo->prepare("select * from tabadmin where login=? and pass=? limit 1");
    $sel->execute(array($login, $pass));
    $tab = $sel->fetchAll();
    if (count($tab) > 0) {
        $_SESSION["login"] = $tab[0]["login"];
        $_SESSION["autoriser"] = "oui";
    } else {
        $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s)', $login);
    }
    $sel1 = $pdo->prepare("select * from tabetudiant where login=? and pass=? limit 1");
    $sel1->execute(array($login, $pass));
    $tab1 = $sel1->fetchAll();
    if (count($tab1) > 0) {

        $_SESSION["login"] = $tab1[0]["login"];
        $_SESSION["autoriser"] = "oui";
    } else {
        $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s)', $login);
    }
}
?>
<?php if (!isset($_SESSION['autoriser'])) : ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <script type="text/javascript" src="script.js"></script>
        <link rel="stylesheet" href="styleinscription.css">
        <link rel="shortcut icon" href="images/book.png" type="Ecole" id="ensah" />
        <script type="text/javascript" src="script.js"></script>
        <style>
            .erreur {
                background-color: red;
                color: white;
            }
        </style>
    </head>


    <body class="bodyy" onLoad="document.fo.login.focus()">
        <div id="Bloc_page">
            <?php
            include("header.html");
            ?>

            <?php if (isset($errorMessage)) : ?>
                <div class="erreur"><?php echo $errorMessage ?></div>
            <?php endif; ?>
            <div class="form-info-genral">
                <div class="erreur"><?php echo $erreur ?></div>
                <form name="fo" method="post" action="">
                    <fieldset>
                        <legend>Login</legend>
                        <label for="login"> LOGIN:<input type="email" name="login" placeholder="login" onblur="validateLogin()" id="login" /><br /> </label>
                        <span class="erreurspan" id="errorlogin"></span>
                        <label for="pass"> Mot de passe:<input type="password" onblur="validatePw()" name="pass" id="pass" placeholder="mot de passe" /><br /> </label> <br>
                        <span class="erreurspan" id="errorpw"></span>
                        <input type="submit" name="valider" value="S'authentifier" />

                    </fieldset>
                </form>

            </div>
            <?php
            include_once("footer.html");
            ?>
        </div>
    </body>

    </html>

<?php else :
    include_once("connexion.php");
    $rqt1 = $pdo->prepare("select * from tabadmin where login=? limit 1");
    $rqt1->execute([$_SESSION["login"]]);
    $rqt2 = $pdo->prepare("select * from tabetudiant where login=? limit 1");
    $rqt2->execute([$_SESSION["login"]]);
    $arr1 = $rqt1->fetchAll();
    $arr2 = $rqt2->fetchAll();

    if ($_SESSION["login"] == $arr1[0][3])
        header("Location:pageadmin.php");
    elseif ($_SESSION["login"] == $arr2[0][3])
        header("Location:pageetudiant.php");
    else echo "impossible";
endif;
?>