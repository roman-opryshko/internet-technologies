<?php
    include('connect.php');

    $nursename = $_REQUEST['nursename'];
    $cursor = $collection->find(['nurses'=>$nursename], ['projection' => ['nurses' => 0, '_id' => 0]]);

    foreach ($cursor as $document) {
        //print_r($document);
        $Shift = $document['shift'];
        $Date = $document['date'];
        $Department = $document['department'];

        if(is_numeric($document['wards'])) {
            $Wards = $document['wards'];
        } 
        else {
            $Wards = $document['wards'][0];
            for($i=1; $i<count($document['wards']); $i++) {
                $Wards.=','.$document['wards'][$i];
            }
        }

        print "<tr> <td>$Shift</td> <td>$Date</td> <td>$Department</td> <td>$Wards</td> </tr>";
    }
    
?>