<?php

$h = "localhost";
$bd = "usuariosdb";
$usuario = "root";
$clave =  "";

$conexion =  mysqli_connect($h,$usuario,$clave,$bd);
/*
$conex= new mysqli("localhost","root","","formulario","3306");
$conex -> set_charset("utf8");
*/
if ($conexion->connect_errno) {
    echo "No conectado";
} 
?>