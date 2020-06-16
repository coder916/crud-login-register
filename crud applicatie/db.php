<?php

//$dsn = 'mysql:host=localhost;dbname=company';

$dsn = 'mysql:host=localhost;dbname=crudtest';

$username = 'root';

$password = '';

$options = [];

$connection = new PDO($dsn, $username, $password, $options);

try{

    $connection = new PDO($dsn, $username, $password, $options);

} catch (PDOException $e) {


}