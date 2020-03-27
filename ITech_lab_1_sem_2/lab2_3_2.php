<?php
    include('connect.php');

    $wardname = $_POST['wardname'];
    
    $sth = $dbh->prepare("SELECT NURSE.name, WARD.name, date, department, shift FROM NURSE, NURSE_WARD, WARD WHERE WARD.name = :wardname AND fid_ward = id_ward AND fid_nurse = id_nurse");
    $sth->bindValue(':wardname', $wardname, PDO::PARAM_STR);
    $sth->execute();
    
    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

    echo "<table border='1'>";
    echo "<tr><th>Медсестра</th><th>Палата</th><th>Дата</th><th>Департамент</th><th>Смена</th></tr>";
    
    for ($i = 0; $i < $lenght; $i++) {
       echo "<tr><td>";
       print_r ($result[$i][0]);
       echo "</td><td>";
       print_r ($result[$i][1]);
       echo "</td><td>";
       print_r ($result[$i][2]);
       echo "</td><td>";
       print_r ($result[$i][3]);
       echo "</td><td>";
       print_r ($result[$i][4]);
       echo "</td><tr>";
    }
    
    echo "</table>";

?>