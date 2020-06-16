<?php

require 'db.php';

$sql = 'SELECT * FROM mensen';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);


?>

<style>
    .tekst{
        text-align: center;
        font-size: 30px;
        color: white;
    }

</style>

<?php require 'header.php'; ?>

<?php
session_start();


if(isset($_SESSION['Gebruikersnaam'])) {
    echo  " <div class='tekst'> Welkom  <strong>".$_SESSION['Gebruikersnaam']."</strong><br/> </div>";
} else {
    header('location: login.php');
}

?>
   <!-- <a href="logout.php">Logout</a> -->

<div class="container">

    <div class="card mt-5">

        <div class="card-header">

            <h2>Alle mensen</h2>

        </div>

        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Naam</th>
                    <th>Email</th>
                    <th>Gebruikersnaam</th>
                    <th>Wachtwoord</th>
                    <th>Leeftijd</th>
                    <th>Actie</th>
                </tr>
                <?php foreach($people as $person): ?>
                <tr>
                    <td><?= $person->id; ?></td>
                    <td><?= $person->naam; ?></td>
                    <td><?= $person->email; ?></td>
                    <td><?= $person->Gebruikersnaam; ?></td>
                    <td><?= $person->Wachtwoord; ?> </td>
                    <td><?= $person->leeftijd; ?></td>
                    <td>
                        <a style="background-color: #129221!important" href="edit.php?id=<?= $person->id ?>" class="btn btn-info">Bewerk</a>
                        <a onclick="return confirm('Are you sure you want to delete this entry?')" href="delete.php?id=<?= $person->id ?>" class="btn btn-danger">Verwijder</a>

                    </td>
                </tr>
                <?php endforeach; ?>

            </table>

        </div>

    </div>

</div>


<?php require 'footer.php'; ?>