
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">  	
        <meta name="viewport" content="width=device-width, user-scalable=yes" /><!--user-scalable=yes” sert à indiquer que l’utilisateur peut zoomer sur le contenu-->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <!--coller le lien bootstrap-->
        <script src="https://use.fontawesome.com/0df17449bf.js"></script>

        <title>Nos services</title>

        <style type="text/css">
            body{
                background-color: #FFE0B2;
                padding-top: 70px;
            }
            .inscription-form{
                margin-top: 40px;
                background: #FF9800;
                margin-left: 300px;
                width: 500px;
            }

            h1{
                text-align: center;
            }
            .form-inline{
                text-align: center;
            }
            .recherche{
                background: #FF9800;
            }
            /*images de la page d'accueil*/
            .row
            {
                display: inline-block;
                margin-left: 5px;  
                width: auto;
            }
            .form-control{
                width: 500px;
            }
            .contact
            {
                display: flex;
                justify-content: space-between;
            }


        </style>
    </head>
    <body class="container">
        <!--Pour afficher le carrousel de Bootstrap utiliser les classes .carousel et .slide ainsi que l’attribut « data-ride » auquel nous donnerons la valeur « carousel »-->

        <?php
        session_start();
        if (!isset($_SESSION['nom'])) {
            ?>
            <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-right">
                        <a  type="button" class="btn btn-primary" href="Register-form.php">S'inscrire</a>
                        <a  type="button" class="btn btn-primary"href="Post-form.php">Poster une annonce</a>

                    </div>
                </div>
            </nav>


            <div class="inscription-form">
                <form method="POST" action="Login.php">
                    <div class="form-group">
                        <label for="exampleInputName2">Pseudo</label>
                        <input type="text" name="pseudo" class="form-control" id="exampleInputName2" placeholder="Pseudo" />
                    </div>
                    <div class="form-group">
                        <label for=for="exampleInputEmail2">Mot de passe</label>
                        <input type="password" name="mdp" class="form-control" id="exampleInputEmail2" placeholder="Password"/>
                    </div>
                    <input type="submit" class="btn btn-default"/>
                </form>
            </div>
            <?php
        } else {
            echo 'Bonjour ' . $_SESSION['nom'];
            echo '<form action="Logout.php" method="POST"><button>Se déconnecter</button></form>';
            echo '<a href="espaceperso.php">Espace personnel</a><br/>';
            echo '<a href="Post-form.php">Poster une annonce</a>';
        }
        ?>

        <h1>Besoin d'un Service ?</h1>


        <form class="form-inline">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <select class="form-control placeholder">

                <option value="0" selected="">catégories</option>
                <option value="1">  informatique</option>
                <option value="2">éducation</option>
                <option value="3">immobilier</option>
                <option value="4">finance</option>
            </select>
            <div class="form-group">
                <input type="text" placeholder="mot-clé"  class="form-control"  />
                <input type="text" placeholder="Localisation"  class="form-control"/>
                <input type="submit"  class="btn btn-default" value="Rechercher"/>
            </div>
        </form>


        <?php
        include_once './Post.php';
        include_once './DataBase.php';
        include_once 'User.php';

        $dossier = 'posts/';
        $files = scandir($dossier);
        foreach ($files as $content) {
            if (!is_dir($content)) {
                echo '<section><h3>' . basename($content, ".txt") . '</h3>';
                echo '<div class="text">';
                $contenu = unserialize(file_get_contents($dossier . $content));
                $instance = new DataBase();
                echo $instance->afficherPost($contenu);
                echo '</div>';
            }
        }
        ?>

        <!--Pour afficher le carrousel de Bootstrap utiliser les classes .carousel et .slide ainsi que l’attribut « data-ride » auquel nous donnerons la valeur « carousel »-->
        <div id="my_carousel" class="carousel slide" data-ride="carousel">
            <!-- Bulles Les marqueurs ronds seront mis en forme par la classe .carousel-indicators-->
            <ol class="carousel-indicators">
                <li data-target="#my_carousel" data-slide-to="0" class="active"></li>
                <li data-target="#my_carousel" data-slide-to="1"></li>
                <li data-target="#my_carousel" data-slide-to="2"></li>
            </ol>
            <!-- Slides -->
            <div class="carousel-inner" role="listbox"><!--Les images,le contenu HTML (texte, titre, boutons…) sont désignés par la classe .carousel-inner-->
                <!-- Page 1 -->
                <div class="item active">  
                    <div class="carousel-page">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGRJm1oaTR9028m4b4HwLy3t64dkRtvluVO_1tpiLXIA_wsRp8" class="img-responsive" style="margin:0px auto;" />
                    </div> 
                    <div class="carousel-caption">Nos services</div>
                </div>   
                <!-- Page 2 -->
                <div class="item"> 
                    <div class="carousel-page"><img src="data:image/jpeg;base64,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" class="img-responsive img-rounded" 
                                                    style="margin:0px auto;"  /></div> 
                    <div class="carousel-caption">Garde d'Enfant</div>
                </div>  
                <!-- Page 3 -->
                <div class="item">  
                    <div class="carousel-page">
                        <img src="data:image/jpeg;base64,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" class="img-responsive img-rounded" 
                             style="margin:0px auto;max-height:100%;"  />
                    </div>  
                    <div class="carousel-caption">Déménagement</div>
                </div>     
            </div>
            <!-- Contrôles Les flèches de défilement s’affichent grâce à la classe .carousel-control-->
            <a class="left carousel-control" href="#my_carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="right carousel-control" href="#my_carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
        <script type="text/javascript">
            $(document).ready(function () {
                $('#myCarousel').carousel({
                    interval: 2000,
                    cycle: true
                });
            });
        </script>
        <footer>
            <nav class="navbar navbar-default navbar-fixed-bottom">
                <div class="container">
                    <div class="contact">
                        <div class="btn btn-primary btn-lg active"><p> Rejoignez-nous sur Facebook<br/><i class="fa fa-facebook" aria-hidden="true"></i>
                            </p></div>
                        <div class="btn btn-primary btn-lg active"><p> Suivez-nous sur Tewitter<br/><i class="fa fa-twitter" aria-hidden="true"></i>
                            </p></div>
                        <div class="btn btn-primary btn-lg active"><p> Retrouvez-nous sur Google+<br/><i class="fa fa-google-plus " aria-hidden="true"></i>

                            </p></div>
                    </div>
                </div>
            </nav>
        </footer> 


    </body>

</html>
