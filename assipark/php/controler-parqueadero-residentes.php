<?php
include("../php/conection.php");

$query2 = "select descripcion from parqueadero where ocupado = 'No'";
$result_option = mysqli_query($conexion, $query2);


if (!empty($_POST['btnparqueadero'])){
        if (!empty($_POST['parqueadero-vis']) and   !empty($_POST['docvis']) and !empty($_POST    ['placa'])) {
            $parqueadero=$_POST["parqueadero-vis"];
            $docvis=$_POST["docvis"];
            $placa=$_POST["placa"];

            $query3 = "select IdResidente, estadoresidente from residente where numeroIdentificacion ='$docvis'";
            $result_vis = mysqli_query($conexion, $query3);

            $query4 = "select idvehiculo from vehiculo where idvehiculo ='$placa'";
            $result_placa = mysqli_query($conexion, $query4);
            if ($datos1=$result_vis->fetch_object()){
                if($datos1->estadoresidente == 'Activo'){
                    if ($datos2=$result_placa->fetch_object()){
                        $sql=$conexion->query("insert into detalle_asignaciones (IdParqueadero, IdResidente,   IdVehiculo) values ((select   IdParqueadero from  parqueadero where descripcion ='$parqueadero'),(select Idresidente from residente where numeroIdentificacion ='$docvis') , (select idvehiculo from vehiculo where idvehiculo = '$placa'))");
                        $sql1=$conexion->query("update  parqueadero set ocupado = 'Si'   where descripcion='$parqueadero'");
                        echo "<div class='alert alert-success'>    Parqueadero asignado </div>";
                    }
                else {echo "<div class='alert alert-danger'> No existe el vehiculo </div>";}  
            } 
            else {echo "<div class='alert alert-danger'> Residente Inactivo </div>";}
        }
        else {echo "<div class='alert alert-danger'> No existe Residente </div>";}  
    }
}