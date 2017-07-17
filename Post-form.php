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
        <title>Connexion</title>
        <style type="text/css"> 
            body{
                background: #FFE0B2;
            }
            .form-horizontal{
              width: 800px;
                background-color: #FF9800;
                margin-left: 300px;
                margin-top: 40px;
            }
            .form-group{
                width: 500px;
            } 
            
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a  class="btn btn-primary btn-lg"  href="Register-form.php">S'inscrire</a>
                </div>
        </nav>
        <?php
        session_start();
        if (isset($_SESSION['nom'])) {
            ?>


            <form class="form-horizontal" action="create-posts.php" method="POST"> 
                 <div class="form-group">
                <label for="inputtitle3" class="col-sm-2 control-label"  >Titre</label>
                 <div class="col-sm-10">
                <input class="form-control" id="inputtitle3" placeholder="Title" type="text" name="titre"/>
                 </div>
                 </div>
                <div class="form-group">
                <label for="inputdescription3" class="col-sm-2 control-label"  >Description</label>
                 <div class="col-sm-10">
                
                <textarea cols="30" rows="10" name="description"></textarea>
                </div>
                </div>
                <div class="form-group">
                <label for="inputprice3" class="col-sm-2 control-label"  >Prix</label>
                <div class="col-sm-10">
                <input class="form-control" id="inputprice3" placeholder="Price"   type="number" name="prix"/> €
                </div>
                </div>
                 <div class="form-group">
                <label for="inputphoto3"  class="col-sm-2 control-label" >Photo</label>
                 <div class="col-sm-10">
                <input  class="form-control" id="inputphoto3" placeholder="Photo"   type="file"name="photo"/>
                 </div>
            </div>
                <input class="btn btn-primary btn"  type="submit" value="Envoyer" name="newpost"/>
            </form>

            <?php
        } else {
            echo 'connectez-vous !';
            ?>
            <form class="form-horizontal" method="POST" action="Login.php">
                <div class="form-group">
                    <label for="inputpseudo3" class="col-sm-2 control-label">Pseudo</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputpseudo3" placeholder="Pseudo"type="text" name="pseudo"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputpassword3"class="col-sm-2 control-label" >Mot de passe</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="inputpassword3" placeholder="Password" type="password" name="mdp"/>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input class="btn btn-primary btn"type="submit" name="login"/>
                            </div>

                            </form>
                            <?php
                        }
                        ?>
                        </body>
                        </html>
