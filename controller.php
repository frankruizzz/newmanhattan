<?php

function connection(){
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "newmanhattan";

    $con=mysqli_connect($host,$user,$password,$dbname);
    mysqli_select_db($con,$dbname);

    return $con;
}

?>