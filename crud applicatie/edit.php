<?php

require 'db.php';
$id = $_GET['id'];

$sql = 'SELECT * FROM mensen WHERE id=:id';
$statement = $connection->prepare($sql);
$statement-> execute([':id' => $id]);
$person = $statement->fetch(PDO::FETCH_OBJ);

if (isset ($_POST['naam']) && isset($_POST['email']) && isset($_POST['Gebruikersnaam']) && isset($_POST['Wachtwoord']) && isset($_POST['leeftijd']) ){


    $name = $_POST['naam'];
    $email = $_POST['email'];
    $gebruikersnaam = $_POST['Gebruikersnaam'];
    $wachtwoord = $_POST['Wachtwoord'];
    $leeftijd = $_POST['leeftijd'];

    //SQL query
    $sql = 'UPDATE mensen SET naam=:naam, email=:email, Gebruikersnaam=:Gebruikersnaam, Wachtwoord=:Wachtwoord, leeftijd=:leeftijd WHERE id=:id';
    $statement = $connection->prepare($sql);

    if ($statement->execute([':naam' => $name, ':email' => $email, ':Gebruikersnaam' => $gebruikersnaam, ':Wachtwoord' => $wachtwoord, ':leeftijd' => $leeftijd, ':id' => $id])) {

        header("location: index.php");
    }
}

?>

<?php require 'header.php'; ?>

<?php
session_start();

    if(isset($_SESSION['Gebruikersnaam'])) {

    } else {
    header('location: login.php');
    }
    ?>

    <!-- html code voor het bewerk formulier -->

    <div class="container">

        <div class="card mt-5">

            <div class="card-header">

                <h2>Bewerk persoon</h2>

            </div>

            <div class="card-body">

                <?php if(!empty($message)): ?>

                    <div class="alert alert-success">
                        <?= $message; ?>
                    </div>

                <?php endif; ?>

                <form method="post">

                    <div class="form-group">

                        <label for="naam">Naam</label>
                        <input value="<?= $person->naam; ?>" type="text" name="naam" id="naam" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="email">Email</label>
                        <input type="email" value="<?= $person->email; ?>" name="email" id="email" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="Gebruikersnaam">Gebruikersnaam</label>
                        <input type="text" value="<?= $person->Gebruikersnaam; ?>" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="Wachtwoord">Wachtwoord</label>
                        <input type="password" value="<?= $person->Wachtwoord; ?>" name="Wachtwoord" id="Wachtwoord" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="leeftijd">Leeftijd</label>
                        <input type="text" value="<?= $person->leeftijd; ?>" name="leeftijd" id="leeftijd" class="form-control">

                    </div>

                    <div class="form-group">

                        <button style="background-color:#129221!important" type="submit" class="btn btn-info">Bewerk persoon</button>

                    </div>

                </form>

            </div>

        </div>

    </div>

<?php require 'footer.php'; ?>