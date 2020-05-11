<?php
    include('connect.php');
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Кто прочитал у того Коронавирус</title>
    <script>
    
        const ajax = new XMLHttpRequest();

        function getFirst() {
            let nursename = document.getElementById("nursename").value;
            ajax.open("GET", "lab2_3_1.php?nursename=" + nursename);
            ajax.onreadystatechange = update1;
            ajax.send(); 
        }

        function getSecond() {
            let depname = document.getElementById("depname").value;
            if(localStorage[depname] !== undefined) {
                document.getElementById("resultSecond_old").innerHTML = ajax.responseText;
            }


            ajax.open("GET", "lab2_3_2.php?depname=" + depname);
            ajax.onreadystatechange = update2;
            ajax.send();
        }

        function getThird() {
            let shiftname = document.getElementById("shiftname").value;
            ajax.open("GET", "lab2_3_3.php?shiftname=" + shiftname);
            ajax.onreadystatechange = update3;
            ajax.send();
        }

        function update1() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    document.getElementById("resultFirst").innerHTML = ajax.responseText;
                }
            }   
        }

        function update2() {
            if (ajax.readyState == 4) {
                if (ajax.status == 200) {

                    let depname = document.getElementById("depname").value;
                    localStorage[depname] = ajax.responseText;

                   document.getElementById("resultSecond").innerHTML = ajax.responseText;
                }
            }
        }

        function update3() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    document.getElementById("resultThird").innerHTML = ajax.responseText;
                }
            }
        }
    
    </script>
</head>

<body>

<h5>Расписание дежурств выбранной медсестры</h5>
    <select name="nursename" id="nursename">
        <?php
           $cursor_1 = $collection->distinct('nurses');
           foreach ($cursor_1 as $row)
           {
               //print_r($row); echo "<br/>";
               $nursename = $row;
               print "<option value = '$nursename'>$nursename</option>";
           }
        ?>
    </select>
    <br/><input value="Get" type="button" onclick="getFirst()">

<table border = "1">
    <thead>
        <tr>
            <th>Палата</th>
            <th>Дата</th>
            <th>Департамент</th>
            <th>Смена</th>
        </tr>
    </thead>
    <tbody id="resultFirst">
    </tbody>
</table>

<h5>Расписание дежурств по выбраному отделению</h5>

    <select name="depname" id="depname">
        <?php
        //$cursor = $collection->find([], ['projection' => ['department' => 1]]);
        $cursor_2 = $collection->distinct('department');
        foreach ($cursor_2 as $row)
        {
            //print_r($row); echo "<br/>";
            //$depname = $row['department'];
            $depname = $row;
            print "<option value = '$depname'>$depname</option>";
        }
        ?>
        </select>
        <br/><input value="Get" type="button" onclick="getSecond()">

<table border="1">
    <thead>
        <tr>
            <th>Смена</th>
            <th>Дата</th>
            <th>Медсестра</th>
            <th>Палата</th>
        </tr>
    </thead>
    <tbody id="resultSecond">
    </tbody>
</table>
Старая таблица:
<table border="1">
    <thead>
        <tr>
            <th>Смена</th>
            <th>Дата</th>
            <th>Медсестра</th>
            <th>Палата</th>
        </tr>
    </thead>
    <tbody id="resultSecond_old">
    </tbody>
</table>



<h5>Расписание дежурств по выбранной смене</h5>
    <select name="shiftname" id="shiftname">
        <?php
            $cursor_3 = $collection->distinct('shift');
            foreach ($cursor_3 as $row)
            {
                $shiftname= $row;
                print "<option value = '$shiftname'>$shiftname</option>";
            }
        ?>
    </select>
        <br/><input value="Get" type="button" onclick="getThird()">

<table border = "1">
    <thead>
        <tr>
            <th>Департамент</th>
            <th>Дата</th>
            <th>Медсестра</th>
            <th>Палата</th>
        </tr>
    </thead>
    <tbody id="resultThird">
    </tbody>
</table>

</body>
</html>