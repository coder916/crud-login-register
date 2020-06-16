<?php
session_start();
if(!empty($_SESSION['Gebruikersnaam'])) {
    header('location:index.php');
}
require 'db.php';


if(isset($_POST['login'])) {

    $user = $_POST['Gebruikersnaam'];
    $pass = $_POST['Wachtwoord'];


    if(empty($user) || empty($pass)) {
        $message = 'All field are required';
    } else {
        $query = $connection->prepare("SELECT Gebruikersnaam, Wachtwoord FROM mensen WHERE 
Gebruikersnaam=? AND Wachtwoord=? ");
        $query->execute(array($user,$pass));
        $row = $query->fetch(PDO::FETCH_BOTH);

        if($query->rowCount() > 0) {
            $_SESSION['Gebruikersnaam'] = $user;
            header('location:index.php');
        } else {
            $message = "Username or Password is wrong";
        }
    }

}
?>

<!DOCTYPE html>
<html>
<head>
<body>
<style>
    .bericht{

        color: red;
        text-align: center;
        font-size: 26px;
    }

</style>

<?php
if(isset($message)) {
    echo  "<p class='bericht'> ".$message."</p>";
}
?>

<style>
    * {
        box-sizing: border-box;
        font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
        font-size: 16px;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    body {
        background-color: #435165;
    }
    .login {
        width: 400px;
        background-color: #ffffff;
        box-shadow: 0 0 9px 0 rgba(0, 0, 0, 0.3);
        margin: 100px auto;
    }
    .login h1 {
        text-align: center;
        color: #5b6574;
        font-size: 24px;
        padding: 20px 0 20px 0;
        border-bottom: 1px solid #dee0e4;
    }
    .login form {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        padding-top: 20px;
    }
    .login form label {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 50px;
        height: 50px;
        background-color: #129221;
        color: #ffffff;
    }
    .login form input[type="password"], .login form input[type="text"] {
        width: 310px;
        height: 50px;
        border: 1px solid #dee0e4;
        margin-bottom: 20px;
        padding: 0 15px;
    }
    .login form input[type="submit"] {
        width: 100%;
        padding: 15px;
        margin-top: 20px;
        background-color: #129221;
        border: 0;
        cursor: pointer;
        font-weight: bold;
        color: #ffffff;
        transition: background-color 0.2s;
    }
    .login form input[type="submit"]:hover {
        background-color: #2868c7;
        transition: background-color 0.2s;
    }

</style>

    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<div class="login">
    <h1>Login</h1>
    <form action="#" method="post">
        <label for="Gebruikersnaam">
            <i class="fas fa-user"></i>
        </label>
        <input type="text" name="Gebruikersnaam" placeholder="Gebruikersnaam" id="Gebruikersnaam" required>
        <label for="Wachtwoord">
            <i class="fas fa-lock"></i>
        </label>
        <input type="password" name="Wachtwoord" placeholder="Wachtwoord" id="Wachtwoord" required>
        <input type="submit" name="login" value="Login">
    </form>
</div>
</body>

</html>