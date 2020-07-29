<?php

try  {
$bdd = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', '');
}
catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$showType = $bdd->query('SELECT `showtypes`.`type` FROM `showtypes`');

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
    <title>Exercice 2</title>
</head>
<body>
    <p>Afficher tous les types de spectacles possibles.</p>
    <table>
        <thead>
            <tr>
                <td>Type de spectacles</td>
            </tr>
        </thead>
        <tbody>
        <?php 
            while ($type = $showType->fetch()) { 
        ?>
            <tr>
                <td><?= $type['type'] ?></td>
            </tr>
        <?php
            } $showType->closeCursor(); 
        ?>
        </tbody>
    </table>
</body>
</html>