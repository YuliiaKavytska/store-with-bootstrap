<?php
$server = "localhost";
$user = "root";
$password = "";
$dbname = "store";

// $server = "localhost";
// $user = "loriony";
// $password = "Loriony24";
// $dbname = "loriony";

$connect = mysqli_connect($server, $user, $password, $dbname); //Подключаемся к серверу
mysqli_set_charset($connect, "utf8"); //Изменение кодировки для русских слов

?>