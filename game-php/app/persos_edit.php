<?php

    require_once("functions.php");

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

    if (isset($_POST["send"])) {
        if ($_POST['name'] != "") {

            $sql = "UPDATE persos SET `name` = :name WHERE id = :id AND user_id = :user_id;";
            
            $sth = $bdd->prepare($sql);
        
            $sth->execute([
                'name'      => $_POST['name'],
                'id'        => $_GET['id'],
                'user_id'   => $_SESSION['user']['id']
            ]);

            header('Location: persos.php');
        }
    }


    $sql="SELECT * FROM persos WHERE id = :id AND user_id=:user_id;";

    $sth = $bdd->prepare($sql);
        
    $sth->execute([
        'id'          => $_GET['id'],
        'user_id'     => $_SESSION['user']['id']
    ]);

    $perso = $sth->fetch();
?>

<?php require_once('_header.php'); ?>
<div class="container">
    <h1>Modifier un personnage</h1>
    <form action="" method="post">
        <div>
            <label for="name">Nom</label>
            <input 
                type="text"
                id="name"
                name="name"
                placeholer="Entrez un nom"
                value="<?php echo $perso['name']; ?>"
                required
            />
        </div>
        <div class="mt-4">
            <input 
                type="submit" 
                class="btn btn-green" 
                name="send" 
                value="Modifier" 
            />
            <a class="btn btn-grey" href="persos.php">Retour</a>
        </div>
    </form>
</div>
</body>
</html>