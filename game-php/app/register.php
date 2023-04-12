<?php

    require_once('functions.php');

    if (isset($_POST["send"])) {
        $bdd = connect();

        $sql = "INSERT INTO users (`email`, `password`) VALUES (:email, :password);";
        $sth = $bdd->prepare($sql);
        $sth->execute([
            'email'     => $_POST['email'],
            'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ]);

        header('Location: login.php');
    }
?>
<?php require_once('_header.php'); ?>
    <form action="" method="post">
        <h1>Création de votre compte</h1>
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

