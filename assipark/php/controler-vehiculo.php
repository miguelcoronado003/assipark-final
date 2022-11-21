<?php
include("../php/conection.php");
if (!empty($_POST['btnvehiculo'])){
    if (!empty($_POST['color']) and !empty($_POST['marca']) and !empty($_POST['referencia']) and !empty($_POST['propietario']) and !empty($_POST['propietario'])) {
        $color=$_POST["color"];
        $marca=$_POST["marca"];
        $referencia=$_POST["referencia"];
        $propietario=$_POST["propietario"];
        $placa=$_POST["placa"];
        $query1= "select idvehiculo from vehiculo where idvehiculo = '$placa'";
        $result_pla= mysqli_query($conexion, $query1);
        if ($datos=empty($result_pla->fetch_object())){
        $sql=$conexion->query("insert into vehiculo (IdVehiculo, IdColor, IdMarca, Referencia, propietario) values ('$placa', (select IdColor from color where color = '$color'), (select IdMarca from marca where marca = '$marca'), '$referencia', '$propietario')");
        echo "<div class='alert alert-success'> Vehiculo Registrado </div>";
        }
        else {echo "<div class='alert alert-danger'> Vehiculo registrado Anteriormente </div>";} 
        
    }
}


?>

