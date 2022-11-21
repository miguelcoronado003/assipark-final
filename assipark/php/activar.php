<?php 
include("../php/conection.php");
if(isset($_GET['idusuario'])){
    $id1 = $_GET['idusuario'];
    $query1 = "update usuario set estadousuario = 'Activo' where idusuario ='$id1'";
    $result_update = mysqli_query($conexion, $query1);
    if(!$result_update){
        die("Query failed");
    }
    header("location:../Dashboard-Administrador/Desactivar.php");

}

if(isset($_GET['idvisitante'])){
    $id2 = $_GET['idvisitante'];
    $query2 = "update visitante set estadovisitante = 'Activo' where idvisitante ='$id2'";
    $result_update1 = mysqli_query($conexion, $query2);
    if(!$result_update1){
        die("Query failed");
    }
    header("location:../Dashboard-Administrador/Desactivar.php");

}

if(isset($_GET['idresidente'])){
    $id3 = $_GET['idresidente'];
    $query3 = "update residente set estadoresidente = 'Activo' where idresidente ='$id3'";
    $result_update2 = mysqli_query($conexion, $query3);
    if(!$result_update2){
        die("Query failed");
    }
    header("location:../Dashboard-Administrador/Desactivar.php");

}

?>
