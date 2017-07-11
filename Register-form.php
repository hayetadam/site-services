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
        <title>Inscription</title>
        <style type="text/css"> 
        </style>

    </head>
    <body>



        <h1>INSCRIPTION</h1>
        <form action="Register.php" method="POST" class="form-horizontal">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Pseudo</label>
                <div class="col-sm-10">
                    <input type="text" name ="pseudo" class="form-control" id="inputEmail3" placeholder="Pseudo"/>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="mdp" class="form-control" id="inputPassword3" placeholder="Password"/>
                </div>
            </div>
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar"/>
            <label for="genre">Genre</label>
            <div><input type="radio" name="genre" value="feminin"/>Féminin
                <input type="radio" name="genre" value="masculin"/>Masculin</div>
            
            <div class="form-group">
                <label for="inputAge3"class="col-sm-2 control-label">Age</label>
                 <div class="col-sm-10">
                <input type="number" name="age" class="form-control" id="inputage3" placeholder="Age" />
            </div>
            </div>
            
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-default" value="Valider" />
                </div>
            </div>


        </form>

    </body>
</html>
