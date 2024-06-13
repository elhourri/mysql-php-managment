<!DOCTYPE html>
<html>
<head>
    <title>Actors Table</title>
    <style>
       table, td, th {
        border: 1px solid white;
        border-collapse: collapse ;
        background-color: #000;
        color:white;
        font-familly: "monospace", sans-serif;
       } 
    </style>
</head>
<body>
<?php

// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$connexion = new PDO("mysql:host=127.0.0.1;dbname=sakila", "root", "***hhhhalawa");

// error handling , bach ncheki wachc t connectit l database
if ($connexion === false) {
    die("Error: Could not connect to the database.");
}

$requete = $connexion->query('SELECT * FROM actor');
if ($requete === false) {
    die("Error: Could not execute query.");
}
$actors = $requete->fetchAll(PDO::FETCH_ASSOC);

?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">actor_id</th>
            <th scope="col">First_name</th>
            <th scope="col">Last_name</th>
            <th scope="col">Last_update</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($actors as $actor): ?>
            <tr>
                <td><?= $actor['actor_id'] ?></td>
                <td><?= $actor['first_name'] ?></td>
                <td><?= $actor['last_name'] ?></td>
                <td><?= $actor['last_update'] ?></td>
                <td>
                    <form method='post'>
                        <input type='submit' name='action' value='modifier'>
                        <input type='submit' name='action' value='supprimer'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
