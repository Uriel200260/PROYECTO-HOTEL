<html lang = "es">
    <head>
    <title>Estadisticas</title>
    <center>
        <img src="./img/logo.jpeg" style="height: 152; width: 180px; ">
        <h1 style="color:brown">HABITACIONES OCUPADAS</h1>
    </center>
    
<style>
    h1{
        background-color: aliceblue;
    }

    table {
            width: 90%;
            border-collapse: collapse;
            -webkit-box-shadow: 7px 7px 23px -4px rgba(0,0,0,0.75);
            -moz-box-shadow:  7px 7px 23px -4px rgba(0,0,0,0.75);
            box-shadow:  7px 7px 23px -4px rgba(0,0,0,0.75);
            position: relative;
            top: 50px;
            left: 40px;
        }

        table, td, th{
            border: 1px solid black;
            padding: 5px;
        }

        th, td{
            text-align: center;
        }

        

        tr:nth-child(even){
            background-color: #E8ECED;
        }

        #volver{
            position: relative;
            top: 48%;
            left: 1%;
        }

</style>
    </head>

    <?php

require "conexion2.php";

$resultadoBD = mysqli_query($conexion, "SELECT * FROM estadisticas");
$materia = "";

$materia .=  "<table>";
$materia .= "<tr>";
$materia .= "<th>Habitacion</th>";
$materia .= "<th>Tipo de Habitacion</th>";
$materia .= "<th>Cliente</th>";
$materia .= "<th>Entrada</th>";
$materia .= "<th>Salida</th>";
$materia .= "</tr>";

while ($fila = mysqli_fetch_assoc($resultadoBD)) {
    
    $materia .= "<tr>";
    $materia .= "<td>".$fila['habitacion']."</td>";
    $materia .= "<td>".$fila['tipo_habitacion']."</td>";
    $materia.= "<td>".$fila['cliente']."</td>";
    $materia.= "<td>".$fila['entrada']."</td>";
    $materia.= "<td>".$fila['salida']."</td>";
    $materia .= "</tr>";
}
$materia .=  "</table>";
echo $materia;
mysqli_close($conexion);
?>
<a href="estadisticas.html" id="volver">Volver</a>
</html>

