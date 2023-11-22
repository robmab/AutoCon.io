<?php
@$conexion = new mysqli('localhost', 'root', '');
$conexion->set_charset("utf8");

if (!$conexion->connect_errno)
     $conexion->select_db("Proyecto_Final_ASIR") or die("Base de Datos no encontrada");

?>