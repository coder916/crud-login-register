<?php

require 'db.php';

$message = '';

if (isset ($_POST['naam']) && isset($_POST['email']) && isset($_POST['Gebruikersnaam']) && isset($_POST['Wachtwoord']) && isset($_POST['leeftijd']) ){


    $name = $_POST['naam'];
    $email = $_POST['email'];
    $gebruikersnaam = $_POST['Gebruikersnaam'];
    $wachtwoord = $_POST['Wachtwoord'];
    $leeftijd = $_POST['leeftijd'];
    $sql = 'INSERT INTO mensen(naam, email, Gebruikersnaam, Wachtwoord, leeftijd) VALUES(:naam, :email, :gebruikersnaam, :wachtwoord, :leeftijd)';
    $statement = $connection->prepare($sql);



    if ($statement->execute([':naam' => $name, ':email' => $email, ':gebruikersnaam' => $gebruikersnaam, ':wachtwoord' => $wachtwoord, ':leeftijd' => $leeftijd])) {

        header("location: index.php");
        $message = 'data inserted successfully';
    }
}

?>

<?php require 'header.php'; ?>

<div class="container">

    <div class="card mt-5">

        <div class="card-header">

            <h2>Maak een persoon</h2>

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
                      <input type="text" name="naam" id="naam" class="form-control">

                  </div>

                  <div class="form-group">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                  </div>

                    <div class="form-group">

                        <label for="Gebruikersnaam">Gebruikersnaam</label>
                        <input type="text" name="Gebruikersnaam" id="Gebruikersnaam" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="Wachtwoord">Wachtwoord</label>
                        <input type="password" name="Wachtwoord" id="Wachtwoord" class="form-control">

                    </div>

                    <div class="form-group">

                        <label for="leeftijd">Leeftijd</label>
                        <input type="number" name="leeftijd" id="leeftijd" class="form-control">

                    </div>

                  <div class="form-group">

                      <button style="background-color: #129221!important" type="submit" class="btn btn-info">Maak persoon aan</button>

                  </div>

            </form>

        </div>

    </div>

</div>

<?php require 'footer.php'; ?>
