<?php
    include('connect.php');

    $id_nurse = $_POST['nursename'];
    $id_ward = $_POST['wardname'];

    $sth = $dbh->prepare("INSERT INTO nurse_ward SET fid_nurse = :nursename, fid_ward = :wardname");
    $sth->bindValue(':nursename', $id_nurse, PDO::PARAM_INT);
    $sth->bindValue(':wardname', $id_ward, PDO::PARAM_INT); 
    $sth->execute();

?>