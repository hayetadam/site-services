<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>



        <h1>INSCRIPTION</h1>
        <form action="Register.php" method="POST">
            <label for="pseudo">Pseudo</label>
            <input type="text" name ="pseudo"/>
            <label for="mdp">Mot de passe</label>
            <input type="password" name="mdp"/>
            <label for="avatar">Avatar</label>
            <input type="file" name="avatar"/>
            <label for="genre">Genre</label>
            <div><input type="radio" name="genre" value="feminin"/>Féminin
                <input type="radio" name="genre" value="masculin"/>Masculin</div>
            <label for="age">Age</label>
            <input type="number" name="age"/>
            <input type="submit" value="Valider" />


        </form>

    </body>
</html>
