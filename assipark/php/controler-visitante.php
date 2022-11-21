<?php


include("../php/conection.php");
if (!empty($_POST['btnvisitante'])){
    if (!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['celular']) and !empty($_POST['documento']) and !empty($_POST['tipodoc'])) {
        $tipo=$_POST["tipodoc"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $celular=$_POST["celular"];
        $documento=$_POST["documento"];
        $query_visi= "select numeroDocumento from visitante where numeroDocumento = '$documento'";
        $result_visi = mysqli_query($conexion, $query_visi);
        if($datos=$result_visi->fetch_object()){
            echo "<div class='alert alert-danger'> Visitante ya registrado anteriormente </div>";
        }
        else{
        $sql=$conexion->query("insert into visitante (nombre, apellido, celular1, numeroDocumento, IdTipoIdentificacion, estadovisitante) values ('$nombre' , '$apellido', '$celular', '$documento', (select IdTipoIdentificacion from tipo_identificacion where Identificacion = '$tipo'), 'Activo')");
        echo "<div class='alert alert-success'> Visitante registrado </div>";
        }
    }
}

if (!empty($_POST['btnupdate'])){
    if (!empty($_POST['nombre']) and !empty($_POST['apellido']) and !empty($_POST['celular']) and !empty($_POST['documento']) and !empty($_POST['tipodoc'])) {
        $tipo=$_POST["tipodoc"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $celular=$_POST["celular"];
        $documento=$_POST["documento"];
        $query_visi= "select numeroDocumento from visitante where numeroDocumento = '$documento'";
        if($datos=$result_visi->fetch_object()){
        $sql=$conexion->query("update visitante v inner join tipo_identificacion t on v.IdTipoIdentificacion = t.IdTipoIdentificacion set nombre = '$nombre', apellido = '$apellido', celular1 = '$celular', numeroDocumento = '$documento', v.IdTipoIdentificacion = (select IdTipoIdentificacion from tipo_identificacion where Identificacion = '$tipo') where numeroDocumento='$documento'");
        echo "<div class='alert alert-Success'> Visitante actualizado </div>";
        }
        else{
            echo "<div class='alert alert-danger'> Visitante Inexistente </div>";
        }
    }
}



?>