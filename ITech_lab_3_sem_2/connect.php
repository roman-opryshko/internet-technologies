<?php 
    error_reporting(E_ALL);

    $db_driver = "mysql";
    $host = "localhost";
    $database = "iteh2lb1var4";
    $dsn = "$db_driver:host=$host;dbname=$database";
    $username = "root";
    $password = "";
    try 
    {
        $dbh = new PDO ($dsn, $username, $password);
    }
    catch (PDOException $e)
    {
        print "Error!: something wrong with connection" . $e->getMessage . "<br/>";
        die();
    }
?>