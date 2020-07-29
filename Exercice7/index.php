<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$clients = $bdd->query(
    'SELECT `clients`.`lastName`, `clients`.`firstName`, `clients`.`birthDate`, `clients`.`cardNumber`,
    CASE 
        WHEN `clients`.`card` = "1" AND `cardtypes`.`type` = "Fidélité" THEN "oui"
        ELSE "non"
    END AS `haveCard`
    FROM `clients`
    LEFT JOIN `cards`
    ON `clients`.`cardNumber` = `cards`.`cardNumber`
    LEFT JOIN `cardtypes`
    ON `cards`.`cardTypesId` = `cardtypes`.`id`'
    );

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
    <title>Exercice 7</title>
</head>
<body>
    <p>Afficher tous les clients comme ceci :</p>
    <p>Nom : Nom de famille du client</p>
    <p>Prénom : Prénom du client</p>
    <p>Date de naissance : Date de naissance du client</p>
    <p>Carte de fidélité : Oui (Si le client en possède une) ou Non (s'il n'en possède pas)</p>
    <p>Numéro de carte : Numéro de la carte fidélité du client s'il en possède une.</p>
        <?php 
            while ($client = $clients->fetch()) { 
        ?>
        <div>
            <p><b>Nom :</b> <?= $client['lastName'] ?></p>
            <p><b>Prénom :</b> <?= $client['firstName'] ?></p>
            <p><b>Date de naissance :</b> <?= $client['birthDate'] ?></p>
            <p><b>Carte de fidélité :</b> <?= $client['haveCard'] ?></p>
            <?php
                if ($client['haveCard'] == 'oui') {
            ?>
                <p><b>Numéro de carte :</b> <?= $client['cardNumber'] ?></p>
            <?php } ?>
        </div>
        <?php
            } $clients->closeCursor(); 
        ?>
</body>
</html>