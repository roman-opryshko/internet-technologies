<?php
if(isset($_GET["exit"])){
    setcookie ("user_login", "");
    $new_url = 'login-page.html';
    header('Location: '.$new_url);
    exit();
}
?>