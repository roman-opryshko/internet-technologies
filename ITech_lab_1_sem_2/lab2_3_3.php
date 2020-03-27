<?php
    include('connect.php');

    $shift = $_POST['shiftname']; 

    $sth = $dbh->prepare("SELECT nurse.name, ward.name FROM nurse, nurse_ward, ward WHERE nurse.shift = :shift AND fid_ward = id_ward AND fid_nurse = id_nurse");
    $sth->bindValue(':shift', $shift, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

    echo "<table border='1'>";
    echo "<tr><th>Медсестра</th><th>Отделение</th></tr>";
    
    for ($i = 0; $i < $lenght; $i++) {
       echo "<tr><td>";
       print_r ($result[$i][0]);
       echo "</td><td>";
       print_r ($result[$i][1]);
       echo "</td></tr>";
    }
    
    echo "</table>";
?>