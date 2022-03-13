<?php
setcookie("name","ahmed",time()+60*60,'cookie.php');
//setcookie("key",>"value">expirtimeas>set );
?>
<html>

<head>cook</head>
<body>

<?php

if(isset($_COOKIE["name"])){

    echo "welcome " .$_COOKIE['name'];
}else{
    echo 'not found';
}
?>
</body>
    </html>