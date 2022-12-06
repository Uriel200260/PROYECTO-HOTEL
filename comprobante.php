<?php
    
    require "conexion2.php";

    $tipo_habitacion = $_POST ["habitaciones"]; 
    $cadena = implode($tipo_habitacion);
    $cliente=  $_POST ["nombre"]; 
    $entrada = $_POST ["entrada"]; 
    $salida =  $_POST ["salida"];
   
    $conexion = mysqli_query($conexion,"INSERT INTO estadisticas(habitacion,tipo_habitacion,cliente,entrada,salida) VALUES ('','$cadena','$cliente','$entrada','$salida')");
    ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante</title>

    <style>
        .head {

            border: 2px solid black;
            padding-bottom: 4%;
            height: 10%;
            width: 30%;
            text-align: center;
            position: absolute;
            left: 30%;
            top: 10%;
        }
         .head h1{
        font-family:'Times New Roman', Times, serif;
        float: left;
        }
        .datos {
            position: absolute;
            left: 20%;
        }

        #imagen {
            position: absolute;
            left: 1%;
            top: 4%;
            border-radius: 4%;
        }

        .comprobante {
            position: absolute;
            width: 50%;
            height: 100%;
            left: 25%;
            border-radius: 4%;
            background: url('img/comp.jpeg') no-repeat center center/cover;
            min-height: 13%;
        }

        #atras, #imprimir{
            position: absolute;
            top: 95%;
        
        }

        #atras{

        left:28%;  
    }
    #imprimir{
            
            right: 28%;
        }

        .titulos{
            text-align:center;
        }
    
    </style>
</head>

<body style="background-color: rgba(0, 0, 0);">
    
    <div id="HTMLtoPDF" class="comprobante">
        <br>
        <img id="imagen" src="./img/logo.jpeg" style="height: 152; width: 180px; ">      
            <div class="head">
                <br>
                <p> HOTEL IMPERIO REAL</p>
            </div>
            <div class="datos">
            <br> <br> <br><br><br> <br> <br><br><br><br>
                <center>
                    <h2 class="titulos"> COMPROBANTE DE RESERVACION </h2>
                   <p>
                   <b>Huesped: </b><?php echo $_POST ["nombre"];
                   ?>
                   
                   </p>
                    <center>
                        <div>
                        <h2 class="titulos"> DESCRIPCION </h2>
                        </div>
                        
                        <p>
                        <b>Habitacion: </b> 
                        
                        <?php 
                        
                        if (isset($_POST['habitaciones'])) {
                            $habitacion = $_POST['habitaciones'];
                            foreach ($habitacion as $habitaciones) {
                                echo $habitaciones;
                            }
                        }
                        ?>
                        </p>
        
                        <p>
                        <b>Personas: </b>
                        <?php

                        $ni = 0;
                        $ad = 0;
                            if (isset($_POST['adultos'])) {
                                $adulto = $_POST['adultos'];
                                foreach ($adulto as $adultos ){
                                    $ad = $adultos;
                                }
                            }
                            
                            if (isset($_POST['niños'])) {
                                $niño = $_POST['niños'];
                                foreach ($niño as $niños ){
                                    $ni = $niños;
                                }
                            }

                            $total  = $ad + $ni;
                            echo $total;
                        ?>
                        </p>
                        
                        <p>
                        <b>Entrada: </b><?php echo $_POST ["entrada"];?>
                        </p>
                       
                        <p>
                        <b>Salida: </b><?php echo $_POST ["salida"];?>
                        </p>
                        
                        <p>
                        <b>Importe Total: </b>
                        <?php 
                        
                        if (isset($_POST['habitaciones'])) {
                            $habitacion = $_POST['habitaciones'];
                                if ($habitaciones == "Habitación sencilla") {
                                    echo "$350.00";
                                } else if ($habitaciones == "Habitación doble") {
                                    echo "$500.00";
                                } else if ($habitaciones == "Habitación deluxe")  {
                                    echo "$650.00";
                                } else if ($habitaciones == "Suite") {
                                    echo "$800.00";
                                }
                            
                        }
                        ?> 
                        </p>

                        <p>
                        <b> <label for=""> DISFRUTE DE SU ESTADIA</label></b> 
                        </p>
                        
                        
                        

                    </center>
            </div> 
    </div>

            <a href="reservacion.html" id="atras">Atras</a>
            <a href="#" id="imprimir" onclick="HTMLtoPDF()">Imprimir</a>
            
            <script src="js/jspdf.js"></script>
            <script src="js/jquery-2.1.3.js"></script>
            <script src="js/pdfFromHTML.js"></script>

</body>

</html>