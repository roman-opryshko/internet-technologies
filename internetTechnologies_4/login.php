<?php
if(isset($_POST["login"]) && isset($_POST["password"]) && $_POST["login"] != "" && $_POST["password"] != ""){  
    $login=$_POST["login"];
    setcookie("user_login", $login);  
    $_COOKIE["user_login"] = $_POST["login"];   
} else {
    $new_url = 'login-page.html';
    header('Location: '.$new_url);
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>


<?php include "username.php";?>
<h3>Авторизация прошла успешно</h3>
<p>Для переходна на основную страницу перейдите по ссылке</p>
<a href="main-page.php">Ссыллочка</a>

</body>
</html>