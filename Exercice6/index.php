<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$shows = $bdd->query('SELECT `shows`.`title`, `shows`.`performer`, `shows`.`date`, `shows`.`startTime` FROM `shows` ORDER BY `shows`.`title`');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        td {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <title>Exercice 6</title>
</head>
<body>
    <p>Afficher le titre de tous les spectacles ainsi que l'artiste, la date et l'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</p>
        <p><b>Liste des spectacles :</b></p>
        <?php 
            while ($show = $shows->fetch()) { 
        ?>
            <li><?= $show['title'] ?> par <?= $show['performer'] ?>, le <?= $show['date'] ?> à <?= $show['startTime'] ?></li>
        <?php
            } $shows->closeCursor(); 
        ?>
</body>
</html>