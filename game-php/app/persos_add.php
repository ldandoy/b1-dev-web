<?php require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {
            $bdd = connect();

            $sql = "INSERT INTO persos (`name`, `for`, `dex`, `int`, `char`, `vit`, `pdv`, `user_id`)  
            VALUES (:name, :for, :dex, :int, :char, :vit, :pdv, :user_id);";
            
            $sth = $bdd->prepare($sql);
        
            $sth->execute([
                'name'      => $_POST['name'],
                'for'       => 10,
                'dex'       => 10,
                'int'       => 10,
                'char'      => 10,
                'vit'       => 10,
                'pdv'       => 20,
                'user_id'   => $_SESSION['user']['id']
            ]);

            header('Location: persos.php');
        }
    }
?>

<?php require_once('_header.php'); ?>
    <div class="container">
        <h1>Créer un personnage</h1>
        <form action="" method="post">
            <div>
                <label for="name">Nom</label>
                <input 
                    type="text"
                    id="name"
                    name="name"
                    placeholer="Entrez un nom"
                    required
                />
            </div>
            <div class="mt-4">
                <input type="submit" class="btn btn-green" name="send" value="Créer" />
                <a class="btn btn-grey" href="persos.php">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>

