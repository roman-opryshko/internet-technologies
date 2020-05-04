<?php
    include('connect.php');

    $nursename = $_REQUEST['nursename'];

    $sth = $dbh->prepare("SELECT ward.name, date, department, shift FROM nurse, nurse_ward, ward WHERE nurse.name = ? AND fid_ward = id_ward AND fid_nurse = id_nurse");
    $sth->bindValue(1, $nursename, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    foreach($result as $row){
        $WardName = $row[0];
        $Date = $row[1];
        $Department = $row[2];
        $Shift = $row[3];
        print ("<tr> <td>$WardName</td> <td>$Date</td> <td>$Department</td> <td>$Shift</td> </tr>");
    }
?>