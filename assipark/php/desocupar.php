<?php 
include("../php/conection.php");
if(isset($_GET['IdVehiculo'])){
    $id = $_GET['IdVehiculo'];
    $query1 = "update parqueadero_visitas p inner join visita v on p.IdParqueaderoVisitas = v.IdParqueaderoVisitas inner join vehiculo h on h.IdVehiculo = v.IdVehiculo set p.ocupado = 'No' where h.IdVehiculo='$id'";
    $result_update = mysqli_query($conexion, $query1);

    $query2 = "delete from visita where idvehiculo = '$id'";
    $result_delete = mysqli_query($conexion, $query2);
    if(!$result_update and !$result_delete){
        die("Query failed");
    }
    header("location:../Dashboard-Vigilante_mod/DashboardUser.php");

}

?>