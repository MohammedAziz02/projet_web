<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <link rel="shortcut icon" href="images/book.png" type="Ecole" id="ensah" />
    <link rel="stylesheet" href="styleaccueil.css">

</head>

<body>
    <div id="Bloc_page">
        <?php
        include("header.html");
        ?>
        <div class="imagesbann">
            <p>
                <img width="100%" height="100%" style="border-radius: 10%; box-shadow: 20px 20px 100px;" src="images/librarypic.png">
            </p>
        </div>

        <section>
            <article>
                <h1>Présentation de la bibliotheque</h1>
                <p>
                    Issue de bibliothèques associatives, la Bibliothèque Multimédia Paul Eluard d’Achères (Yvelines) se municipalise en 1982 et s’installe dans ses murs actuels le 22 avril 1989 avec un personnel qualifié. Dès cette année, les usagers peuvent consulter le catalogue de la bibliothèque et accéder à leur compte personnel par le biais du minitel, puis sur internet en 2005. En 2006, un accès internet est proposé gratuitement. En 2008, la bibliothèque enrichit ses collections avec la constitution d’un fonds de DVD. En septembre 2009, elle élargit ses horaires d’ouverture le samedi de 10h à 18h. En 2016, le prêt de liseuses numériques est proposé aux Achérois. Cet espace de 1100 m², au cœur de la ville, abrite aujourd’hui près de 90 000 documents.
                    Les bibliothécaires sontà votre disposition pour vous renseigner et vous aider dans vos recherches documentaires.

                </p>
            </article>
            <aside>
                <h1>ACTUALITéS</h1>
                <div class="imgass"> <img src="images/book1.png" width="100px" height="100px" alt="photo ensah"></div>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam corrupti quae amet blanditiis deleniti rem quibusdam quasi, ea unde rerum placeat. Laudantium ullam doloremque at iste delectus eveniet, sunt esse.
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti a sequi suscipit impedit illo, obcaecati rerum dolorum tempore sint nostrum repellendus, nesciunt vero non deleniti. Praesentium eaque dicta ab aperiam!
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur aspernatur vero quas reiciendis officia tempore perspiciatis veniam obcaecati inventore ea eaque, provident distinctio qui fugit, sit omnis numquam necessitatibus dolore.
                </p>
                <div class="imgass">
                    <img src="images\facebook.png" alt="photo ensah">
                    <img src="images\twitter.png" alt="photo ensah">
                    <img src="images\vimeo.png" alt="photo ensah">
                    <img src="images\flickr.png" alt="photo ensah">
                    <img src="images\rss.png" alt="photo ensah">
                </div>

            </aside>
        </section>
        <?php
        include_once("footer.html");
        ?>
    </div>
</body>

</html>