<?php
    include('connect.php');

    $nurse = $_POST['nursename']; 

    $sth = $dbh->prepare("SELECT ward.name FROM nurse, nurse_ward, ward WHERE nurse.name = :nurse AND fid_ward = id_ward AND fid_nurse = id_nurse");
    $sth->bindValue(':nurse', $nurse, PDO::PARAM_STR);
    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_NUM);
    
    $lenght = count($result);

    echo "<table border='1'>";
    echo "<tr><th>Палата</th></tr>";
    
    for ($i = 0; $i < $lenght; $i++) {
       echo "<tr><td>";
       print_r ($result[$i][0]);
       echo "</td></tr>";
    }
    
    echo "</table>";
?>