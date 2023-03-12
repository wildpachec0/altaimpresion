<?php

$server="mysql:dbname=altaimpresion;host=127.0.0.1";
$user="root";
$password="";

try{
    $pdo= new PDO($server,$user,$password);

}catch(PDOException $e){
    echo "Error".$e->getMessage();
}

?>