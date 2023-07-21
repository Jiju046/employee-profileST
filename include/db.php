<?php
$serverName="localhost";
$username="root";
$password="root";
$database="Test";

$connection=new mysqli($serverName,$username,$password,$database);

if($connection -> connect_error){
    die("Connection Failed: ".$connection -> connect_error );
}


?>