<?php
if (isset($_COOKIE["user_login"])){ 
        $user = htmlspecialchars($_COOKIE["user_login"]);
        echo "Здравствуйте: <b>$user</b>";
}
?>