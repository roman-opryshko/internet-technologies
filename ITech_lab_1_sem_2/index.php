<?php
    include('connect.php');
?>

<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Изучение расширения PDO</title>
</head>

<body>

<h5>Расписание дежурств выбранной медсестры</h5>
<form action="lab2_3_1.php" method="POST">
    <select name="nursename">
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
        <br/><input value="Get" type="submit"/>
</form>

<h5>Расписание дежурств по выбраному отделению</h5>
<form action="lab2_3_2.php" method="POST">
    <select name="wardname">
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
        <br/><input value="Get" type="submit"/>
</form>

<h5>Расписание дежурств по выбранной смене</h5>
<form action="lab2_3_3.php" method="POST">
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
                print "Error!: something wrong with third task" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
        </select>
        <br/><input value="Get" type="submit"/>
</form>

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
                print "Не Рома, хуита у тебя получилась, давай переделывай" . $e->GetMessage() . "<br/>";
                die(); 
            }
        ?>
    </select>
        <br/><input value="Get" type="submit"/>

</form>

</body>
</html>