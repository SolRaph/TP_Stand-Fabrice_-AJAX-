<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
include("cobdd.php");

$sql="SELECT `user`.`id-user`,nom, prenom,discipline,emplacement 
FROM user
INNER JOIN stand 
ON `user`.`id-user` = `stand`.`id-stand` where `nom`=:id"; 
$query= $db->prepare($sql);
$query->bindValue(':id', $_POST['Nom'], PDO::PARAM_STR);
$query->execute();
$stand =$query->fetch();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.1.min.js"></script>
    <script type="text/javascript" src="http://ajax.microsoft.com/ajax/jquery.ui/1.8.10/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <link rel="Stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="tp-stand.css">
    <title>Recherche de Stand</title>
</head>
<body>
    <div class="container">
        <h1>Recherchez le Stand qui vous Interesse</h1>
    
            <form method="POST">
                <div><label for="Nom">Nom de la personne tenant le stand : </label>
                    <input name="Nom" type="text" id="mot" onkeyup="ajaxing()" autocomplete="off" />
                    <button class="btn btn-primary" type="submit">Rechercher</button>
                </div>
                <div id="sugg">
                </div>
                    
            </form>
    <?php
    if (!empty($_POST['Nom'])) {
              echo('<div id=resultat><strong>Nom :</strong> '.$stand['nom']."<br>".'<strong>Prénom</strong> : '.$stand['prenom']."<br>".'<strong>Discipline :</strong> '.$stand['discipline']. "<br>".'<strong>Emplacement :</strong> '.$stand['emplacement'].'</div>');
    }
    ?>
    </div>
    <script src="tp-stand.js"></script>
</body>
</html>