<?php
include_once("connexion.php");
?>
<?php
$mess1 = "";
$titre = @$_POST["titre"];
$genre = @$_POST["genre"];
$nom = @$_POST["nom"];
$pays = @$_POST["pays"];
$region = @$_POST["region"];
$annee = @$_POST["annee"];
$nombre = @$_POST["nombre"];
$id = @$_POST["id"];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="styleae.css">
    <link rel="shortcut icon" href="images/book.png" type="Ecole" id="ensah" />
    <script type="text/javascript" src="script.js"></script>
    <style>
        body {
            color: white;
        }

        .oli a {
            background-color: white;
        }

        a:hover {
            background-color: white;
        }
    </style>
</head>

<body>
    <div id="Bloc_page">
        <?php
        include("header.html");
        ?>
        <div class="cn" align="center">
            <h1>Etudiant</h1><a style="text-decoration: none; color:red" href="deconnexion.php"> se deconnecter</a>
            <h2>Formulaire de recherche des livres</h2>
            <form action="" method="POST">
                <fieldset>
                    <legend><b>Livre</b></legend>
                    <table>
                        <tr>
                            <td><b>Titre livre</b></td>
                            <td><input type="text" name="titre" value=""></td>
                        </tr>
                        <tr>
                            <td><b>Genre livre</b></td>
                            <td><select name="genre" id="genre">
                                    <option value=""></option>
                                    <option value="ROMAN">ROMAN</option>
                                    <option value="NOUVELLE">NOUVELLE</option>
                                    <option value="PIECE">PIECE</option>
                                    <option value="POESIE">POESIE</option>
                                    <option value="SCIENCE">SCIENCE</option>
                                    <option value="HISTOIRE">HISTOIRE</option>
                                </select></td>
                        </tr>
                        <tr>
                            <td><b>Nom auteur</b></td>
                            <td><input type="text" name="nom" value=""></td>
                        </tr>
                        <tr>
                            <td><b>Pays auteur</b></td>
                            <td><input type="text" name="pays" value=""></td>
                        </tr>


                        <tr>
                            <td><b>Année sortie</b></td>
                            <td><input type="text" name="annee" value=""></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" name="brech" value="CHERCHER" class="bouton"></td>
                        </tr>


                    </table>
                </fieldset>
            </form>
            <?php
            if (isset($_POST['brech'])) {
                print "<br><h3>Résultat de la recherche</h3>";
                $rq1 = $pdo->prepare("select * from tb_livre order by id_livre desc ");
                $rq1->execute();
                //recherche par titre
                if (!empty($titre)) {

                    $rq1 = $pdo->prepare("select * from tb_livre where titre_livre like '%$titre%'");
                    $rq1->execute();
                }
                //recherche par genre
                if (!empty($genre)) {

                    $rq1 = $pdo->prepare("select * from tb_livre where genre_livre like '%$genre%'");
                    $rq1->execute();
                }
                //recherche par nom auteur
                if (!empty($nom)) {
                    $rq1 = $pdo->prepare("select * from tb_livre where nom_auteur like '%$nom%'");
                    $rq1->execute();
                }
                //recherche par pays auteur
                if (!empty($pays)) {
                    $rq1 = $pdo->prepare("select * from tb_livre where pays_auteur like '%$pays%'");
                    $rq1->execute();
                }


                //recherche par année de sortie
                if (!empty($annee)) {

                    $rq1 = $pdo->prepare("select * from tb_livre where annee_sortie  like '%$annee%'");
                    $rq1->execute();
                }

                //recherche par genre et région

                //recherche par genre et année de sortie
                if (!empty($genre) && !empty($annee)) {

                    $rq1 = $pdo->prepare("select * from tb_livre where genre_livre like '%$genre%' and annee_sortie  like '%$annee%'");
                    $rq1->execute();
                }
                //recherche par genre , région et année de sortie

                print '<table border="1" class="tab"><tr><th>Titre livre</th><th>Genre livre</th><th>Nom auteur</th><th>Pays auteur</th><th>Région auteur</th><th>Année de sortie</th><th>Nombre</th><th>Identifiant</th></tr>';

                while ($rst = $rq1->fetchAll()) {
                    print "<tr>";
                    foreach ($rst as $value) {
                        echo "<td>" . $value['titre_livre'] . "</td>";
                        echo "<td>" . $value['genre_livre'] . "</td>";
                        echo "<td>" . $value['nom_auteur'] . "</td>";
                        echo "<td>" . $value['pays_auteur'] . "</td>";
                        echo "<td>" . $value['region_auteur'] . "</td>";
                        echo "<td>" . $value['annee_sortie'] . "</td>";
                        echo "<td>" . $value['nombre'] . "</td>";
                        echo "<td>" . $value['id_livre'] . "</td>";
                        print "</tr>";
                    }
                }
                print '</table>';
            }
            ?>
            <?php

            //affichage des livres  de la bibliotheque
            print "<h3>Liste des livres de la bibliothèque</h3>";
            // $rq2 = mysqli_query($conn, "select * from tb_livre order by id_livre desc ");
            include_once("connexion.php");
            $rq2 = $pdo->prepare("select * from tb_livre order by id_livre desc ");
            $rq2->execute();

            print '<table border="1" class="tab"><tr><th>Titre livre</th><th>Genre livre</th><th>Nom auteur</th><th>Pays auteur</th><th>Région auteur</th><th>Année de sortie</th><th>Nombre</th><th>Identifiant</th></tr>';

            while ($rst2 = $rq2->fetchAll()) {
                print "<tr>";
                foreach ($rst2 as $value) {
                    echo "<td>" . $value['titre_livre'] . "</td>";
                    echo "<td>" . $value['genre_livre'] . "</td>";
                    echo "<td>" . $value['nom_auteur'] . "</td>";
                    echo "<td>" . $value['pays_auteur'] . "</td>";
                    echo "<td>" . $value['region_auteur'] . "</td>";
                    echo "<td>" . $value['annee_sortie'] . "</td>";
                    echo "<td>" . $value['nombre'] . "</td>";
                    echo "<td>" . $value['id_livre'] . "</td>";
                    print "</tr>";
                }
            }
            print '</table>';

            ?>


        </div>
        <?php
        include_once("footer.html");
        ?>
    </div>

</body>

</html>