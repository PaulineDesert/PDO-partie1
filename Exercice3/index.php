<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$firstClients = $bdd->query('SELECT * FROM `clients` LIMIT 20');

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
    <title>Exercice 3</title>
</head>
<body>
    <p>Afficher les 20 premiers clients.</p>
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
            while ($clients = $firstClients->fetch()) { 
        ?>
            <tr>
                <td><?= $clients['id'] ?></td>
                <td><?= $clients['lastName'] ?></td>
                <td><?= $clients['firstName'] ?></td>
                <td><?= $clients['birthDate'] ?></td>
                <td><?= $clients['card'] ?></td>
                <td><?= $clients['cardNumber'] ?></td>
            </tr>
        <?php
            } $firstClients->closeCursor(); 
        ?>
        </tbody>
    </table>
</body>
</html>