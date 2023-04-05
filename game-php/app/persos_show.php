<?php 
    require_once('functions.php');

    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    }

    if (!isset($_GET['id'])) {
        header('Location: persos.php?msg=id non passé !');
    }

    $bdd = connect();

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
    <h1>Détails du personnage</h1>

    <div>
        <b>Nom:</b> <?php echo $perso['name']; ?>
    </div>
    
    <div class="mt-2">
        <b>Force:</b> <?php echo $perso['for']; ?>
    </div>

    <div class="mt-2">
        <b>Dextérité:</b> <?php echo $perso['dex']; ?>
    </div>

    <div class="mt-2">
        <b>Intélligence:</b> <?php echo $perso['int']; ?>
    </div>

    <div class="mt-2">
        <b>Charisme:</b> <?php echo $perso['char']; ?>
    </div>

    <div class="mt-2">
        <b>Vitesse:</b> <?php echo $perso['vit']; ?>
    </div>

    <div class="mt-2">
        <b>Point de vie:</b> <?php echo $perso['pdv']; ?>
    </div>
    
    <div class="mt-4">
        <a href="persos.php" class="btn btn-grey">Retour</a>
    </div>
</div>
</body>
</html>