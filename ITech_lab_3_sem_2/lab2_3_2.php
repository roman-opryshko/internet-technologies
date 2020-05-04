<?php
    header('Content-Type: text/xml');
    header("Cache-Control: no-cache, must-revalidate");

    include('connect.php');

    $wardname = $_REQUEST['wardname'];
    
    $sth = $dbh->prepare("SELECT NURSE.name, WARD.name, date, department, shift FROM NURSE, NURSE_WARD, WARD WHERE WARD.name = :wardname AND fid_ward = id_ward AND fid_nurse = id_nurse");
    $sth->bindValue(':wardname', $wardname, PDO::PARAM_STR);
    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);

    echo '<?xml version="1.0" encoding="utf-8" ?>';
    echo "<root>";

    foreach ($result as $row) {
        $NurseName = $row[0];
        $WardName = $row[1];
        $Date = $row[2];
        $Department = $row[3];
        $Shift = $row[4];
        print "<row><NurseName>$NurseName</NurseName> <WardName>$WardName</WardName> <Date>$Date</Date> <Department>$Department</Department> <Shift>$Shift</Shift></row>";
    }
    echo "</root>";
?>