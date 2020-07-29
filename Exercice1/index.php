<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$client = $bdd->query('SELECT * FROM clients');

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
    <title>Exercice 1</title>
</head>
<body>
    <p>Exécuter le script colyseum.sql fourni avant de commencer. Tous les résultats devront être affichés dans une page index.php.</p>
    <p>Afficher tous les clients.</p>
    <table>
        <thead>
            <tr>
                <td>id</td>
                <td>lastName</td>
                <td>firstName</td>
                <td>birthDate</td>
                <td>card</td>
                <td>cardNumber</td>
            </tr>
        </thead>
        <tbody>
        <?php 
            while ($donnees = $client->fetch()) { 
        ?>
            <tr>
                <td><?= $donnees['id'] ?></td>
                <td><?= $donnees['lastName'] ?></td>
                <td><?= $donnees['firstName'] ?></td>
                <td><?= $donnees['birthDate'] ?></td>
                <td><?= $donnees['card'] ?></td>
                <td><?= $donnees['cardNumber'] ?></td>
            </tr>
        <?php
        // var_dump($donnees); 
            } $client->closeCursor(); 
        ?>
        </tbody>
    </table>
</body>
</html>