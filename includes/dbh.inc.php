<?php

//建立連接的資料庫

$servername ="localhost";
$dbusername ="root";
$dbpassword ="";
$dbname ="loginsystem";

$con =mysqli_connect($servername,$dbusername,$dbpassword,$dbname);

if(!$con){
    die("Connection failed:".mysqli_connect_error());
}

?>