<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$clientsM = $bdd->query('SELECT `clients`.`lastName`, `clients`.`firstName` FROM `clients` WHERE `clients`.`lastName` LIKE "M%" ORDER BY `clients`.`lastName` ');

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        div {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <title>Exercice 5</title>
</head>
<body>
    <p>Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M".</p>
    <p>Les afficher comme ceci :</p>
    <p>Nom : Nom du client</p>
    <p>Prénom : Prénom du client</p>
    <p>Trier les noms par ordre alphabétique.</p>
        <?php 
            while ($clients = $clientsM->fetch()) { 
        ?>
        <div>
            <p><b>Nom :</b> <?= $clients['lastName'] ?></p>
            <p><b>Prénom :</b> <?= $clients['firstName'] ?></p>
        </div>
        <?php
            } $clientsM->closeCursor(); 
        ?>
</body>
</html>