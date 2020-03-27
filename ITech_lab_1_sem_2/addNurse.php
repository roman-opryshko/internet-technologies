<?php
    include('connect.php');

    if (isset($_POST['newNurseName']))
    {
    $nurse_id = $_POST['id_nurse'];
    $newNurse = $_POST['newNurseName'];
    $date = $_POST['date'];
    $department = $_POST['department'];
    $shift = $_POST['shiftname'];

    $sth = $dbh->prepare("INSERT INTO nurse SET id_nurse = :nurse_id, nurse.name = :newNurse, date = :date, department = :department, shift = :shift");
    $sth->bindValue(':nurse_id', $nurse_id, PDO::PARAM_INT); 
    $sth->bindValue(':newNurse', $newNurse, PDO::PARAM_STR);
    $sth->bindValue(':date', $date, PDO::PARAM_STR);
    $sth->bindValue(':department', $department, PDO::PARAM_INT);
    $sth->bindValue(':shift', $shift, PDO::PARAM_STR);

    $sth->execute();
    }
?>