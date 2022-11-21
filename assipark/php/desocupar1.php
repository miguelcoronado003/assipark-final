<?php 
include("../php/conection.php");
if(isset($_GET['IdVehiculo'])){
    $id = $_GET['IdVehiculo'];
    $query1 = "update parqueadero p inner join detalle_asignaciones d on p.IdParqueadero = d.IdParqueadero inner join vehiculo h on h.IdVehiculo = d.IdVehiculo set p.ocupado = 'No' where h.IdVehiculo='$id'";
    $result_update = mysqli_query($conexion, $query1);

    $query2 = "delete from detalle_asignaciones where idvehiculo = '$id'";
    $result_delete = mysqli_query($conexion, $query2);
    if(!$result_update and !$result_delete){
        die("Query failed");
    }
    header("location:../Dashboard-Vigilante_mod/parquedero.php");

}

?>