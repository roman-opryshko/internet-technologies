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
        const xhr = new XMLHttpRequest();
        const json = new XMLHttpRequest();

        function getFirst() {
            let nursename = document.getElementById("nursename").value;
            ajax.open("GET", "lab2_3_1.php?nursename=" + nursename);
            ajax.onreadystatechange = update1;
            ajax.send(); 
        }

        function getSecond() {
            let wardname = document.getElementById("wardname").value;
            xhr.open("GET", "lab2_3_2.php?wardname=" + wardname);
            xhr.onreadystatechange = update2;
            xhr.send();
        }

        function getThird() {
            let shiftname = document.getElementById("shiftname").value;
            json.open("GET", "lab2_3_3.php?shiftname=" + shiftname);
            json.onreadystatechange = update3;
            json.send();
        }

        function update1() {
            if (ajax.readyState === 4) {
                if (ajax.status === 200) {
                    document.getElementById("resultFirst").innerHTML = ajax.responseText;
                }
            }   
        }

        function update2() {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    //console.dir(xhr.responseXML);
                    let res = document.getElementById("resultSecond");
                    let result = "";
                    let rows = xhr.responseXML.firstChild.children;
                        for (var i = 0; i < rows.length; i++){
                            result += "<tr>";
                            result += "<td>" + rows[i].children[0].firstChild.nodeValue + "</td>";
                            result += "<td>" + rows[i].children[1].textContent + "</td>";
                            result += "<td>" + rows[i].children[2].textContent + "</td>";
                            result += "<td>" + rows[i].children[3].textContent + "</td>";
                            result += "<td>" + rows[i].children[4].textContent + "</td>"; 
                            result += "</tr>";
                        }
                    res.innerHTML = result;
                }
            }
        }

        function update3() {
            if (json.readyState === 4) {
                if (json.status === 200) {
                //alert(json.responseText);
                var res = JSON.parse(json.responseText);
                let result3 = "";
                console.dir(res);
                        for (var j = 0; j < res.length; j++){
                            result3 += "<tr>";
                            result3 += "<td>" + res[j].Nurse + "</td>" + "<td>" + res[j].Ward + "</td>";
                            result3 += "</tr>";
                        }
                    document.getElementById("resultThird").innerHTML = result3;
                }
            }
        }
    
    </script>
</head>

<body>

<h5>Расписание дежурств выбранной медсестры</h5>
<!-- <form action="lab2_3_1.php" method="POST"> -->
    <select name="nursename" id="nursename">
        <?php
            try 
            {
                $sql = 'SELECT name FROM nurse';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value = '$name'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with first task" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
    </select>
    <!-- <br/><input value="Get" type="submit"/> -->
    <br/><input value="Get" type="button" onclick="getFirst()">
 <!-- </form> --> 

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
<!-- <form action="lab2_3_2.php" method="POST"> -->
    <select name="wardname" id="wardname">
        <?php
            try 
            {
                $sql = 'SELECT name FROM ward';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value = '$name'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with second task" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
        </select>
        <!-- <br/><input value="Get" type="submit"/> -->
        <br/><input value="Get" type="button" onclick="getSecond()">
<!-- </form> -->

<table border="1">
    <thead>
        <tr>
            <th>Медсестра</th>
            <th>Отделение</th>
            <th>Дата</th>
            <th>Департамент</th>
            <th>Смена</th>
        </tr>
    </thead>
    <tbody id="resultSecond">
    </tbody>
</table>

<h5>Расписание дежурств по выбранной смене</h5>
<!-- <form action="lab2_3_3.php" method="POST"> -->
    <select name="shiftname" id="shiftname">
        <?php
            try 
            {
                $sql = 'SELECT DISTINCT shift FROM nurse';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value = '$name'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with third task" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
        </select>
        <!-- <br/><input value="Get" type="submit"/> -->
        <br/><input value="Get" type="button" onclick="getThird()">
<!-- </form> --> 

<table border = "1">
    <thead>
        <tr>
            <th>Медсестра</th>
            <th>Палата</th>
        </tr>
    </thead>
    <tbody id="resultThird">
    </tbody>
</table>

<h5>Добаление медсестры</h5>
<form action="addNurse.php" method="POST">
    <input type="number" name="id_nurse" placeholder="ID медсестры">
    <input type="text" name="newNurseName" placeholder="Имя медсестры">
    <input type="date" name="date">
    <input type="number" name="department" placeholder="Номер департамента">
    <select name="shiftname">
        <?php
            try 
            {
                $sql = 'SELECT DISTINCT shift FROM nurse';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[0];
                    print "<option value = '$name'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with adding nurse" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
        </select>
        <br/><input value="Get" type="submit"/>
</form>

<h5>Добаление палаты</h5>
<form action="addWard.php" method="POST">
    <input type="number" name="id_ward" placeholder="ID палаты">
    <input type="text" name="newWardname" placeholder="Название палаты(номер)">
    <br/><input value="Get" type="submit"/>       
</form>

<h5>Назначение выбранной медсестры в указанную палату</h5>
<form action="nurse_ward.php" method="POST">
    <select name="nursename">
        <?php
            try 
            {
                $sql = 'SELECT id_nurse, nurse.name FROM nurse';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[1];
                    $nurse = $row[0];
                    print "<option value = '$nurse'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with nurse_ward" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
    </select>
    <select name="wardname">
        <?php
            try 
            {
                $sql = 'SELECT id_ward, ward.name FROM ward';
                foreach ($dbh->query($sql) as $row)
                {
                    $name = $row[1];
                    $ward = $row[0];
                    print "<option value = '$ward'>$name</option>";
                }
            }
            catch (PDOExeption $e)
            {
                print "Error!: something wrong with ..." . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
    </select>
        <br/><input value="Get" type="submit"/>
</form>
</body>
</html>