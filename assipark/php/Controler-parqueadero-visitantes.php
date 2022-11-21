<?php
include("../php/conection.php");

$query2 = "select descripcion from parqueadero_visitas where ocupado = 'No'";
$result_option = mysqli_query($conexion, $query2);


if (!empty($_POST['btnvisitante'])){
        if (!empty($_POST['parqueadero-vis']) and   !empty($_POST['docvis']) and !empty($_POST    ['placa'])) {
            $parqueadero=$_POST["parqueadero-vis"];
            $docvis=$_POST["docvis"];
            $placa=$_POST["placa"];

            $query3 = "select IdVisitante, estadovisitante from visitante where numeroDocumento ='$docvis'";
            $result_vis = mysqli_query($conexion, $query3);

            $query4 = "select idvehiculo from vehiculo where idvehiculo ='$placa'";
            $result_placa = mysqli_query($conexion, $query4);
            if ($datos1=$result_vis->fetch_object()){
                if($datos1->estadovisitante == 'Activo'){
                    if ($datos2=$result_placa->fetch_object()){
                        $sql=$conexion->query("insert into visita   (IdParqueaderoVisitas, IdVisitante,   IdVehiculo) values ((select   IdParqueaderoVisitas from     parqueadero_visitas where descripcion =     '$parqueadero'),(select IdVisitante from    visitante where numeroDocumento =  '$docvis') , (select idvehiculo from vehiculo where idvehiculo = '$placa'))");
                        $sql1=$conexion->query("update  parqueadero_visitas set ocupado = 'Si'   where descripcion='$parqueadero'");
                        echo "<div class='alert alert-success'>    Parqueadero asignado </div>";
                        }
                    else {echo "<div class='alert alert-danger'> No existe el vehiculo </div>";}  
                }
            else {echo "<div class='alert alert-danger'> Visitante Inactivo </div>";}  
            }
        else {echo "<div class='alert alert-danger'> No existe el visitante </div>";}
        }
}





/*
$parqueadero=$_POST["parqueadero-vis"];
$docvis=$_POST["docvis"];
$placa=$_POST["placa"];

$query2 = "select descripcion from parqueadero_visitas where ocupa = 'No'";
$result_option = mysqli_query($conexion, $query2);

$query3 = "select IdVisitante from visitante where numeroDocumento ='$docvis'";
$result_vis = mysqli_query($conexion, $query3);

$query4 = "select idvehiculo from vehiculo where idvehiculo ='$placa'";
$result_placa = mysqli_query($conexion, $query4);*/

?>



