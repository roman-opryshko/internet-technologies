<?php
    include('connect.php');

    $wardname = $_POST['newWardname'];
    $id_ward = $_POST['id_ward'];
    $sth = $dbh->prepare("INSERT INTO ward SET id_ward = :id_ward, ward.name = :wardname");
    $sth->bindValue(':id_ward', $id_ward, PDO::PARAM_INT);
    $sth->bindValue(':wardname', $wardname, PDO::PARAM_STR); 
    $sth->execute();

?>