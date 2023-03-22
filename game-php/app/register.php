<?php

    require_once('functions.php');

    if (isset($_POST["send"])) {
        connect ();

        dd($_POST);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require_once('nav.php'); ?>
    <form action="" method="post">
        <div>
            <label for="email">Email</label>
            <input 
                type="email" 
                placeholder="Entrez votre email" 
                name="email" 
                id="email" 
            />
        </div>
        <div>
            <label for="password">Mot de passe</label>
            <input 
                type="password" 
                placeholder="Entrez votre mot de passe" 
                name="password" 
                id="password" 
            />
        </div>
        <div>
            <input type="submit" name="send" value="Créer" />
        </div>
    </form>
</body>
</html>

