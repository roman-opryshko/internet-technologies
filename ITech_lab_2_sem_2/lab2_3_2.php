<?php
    include('connect.php');

    $depname = $_REQUEST['depname'];
    $cursor = $collection->find(['department'=>$depname], ['projection' => ['department' => 0, '_id' => 0]]);

    foreach ($cursor as $document) {
        //print_r($document);
        $Shift = $document['shift'];
        $Date = $document['date'];

        if(is_string($document['nurses'])) {
            $Nurses = $document['nurses'];
        } 
        else {
            $Nurses = $document['nurses'][0];
            for($i=1; $i<count($document['nurses']); $i++) {
                $Nurses.=','.$document['nurses'][$i];
            }
        }

        if(is_numeric($document['wards'])) {
            $Wards = $document['wards'];
        } 
        else {
            $Wards = $document['wards'][0];
            for($i=1; $i<count($document['wards']); $i++) {
                $Wards.=','.$document['wards'][$i];
            }
        }

        print "<tr> <td>$Shift</td> <td>$Date</td> <td>$Nurses</td> <td>$Wards</td> </tr>";
    }
?>