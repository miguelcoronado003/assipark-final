<?php 
include("../php/conection.php");
$query_bloque = "select bloque from bloque";
$result_bloque = mysqli_query($conexion, $query_bloque);

$query_numero = "select numeroapartamento from numero_apartamento";
$result_numero = mysqli_query($conexion, $query_numero);

if (!empty($_POST['btnresidente'])){       
        $tipo_documento=$_POST["tipo_documento"];
        $numero_doc=$_POST["doc"];
        $sexo=$_POST["sexo"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $telefono=$_POST["telefono"];
        $celular=$_POST["celular"];
        $correo=$_POST["correo"];
        $bloque_apto =$_POST["bloque_apto"];
        $numero_apto =$_POST["numero_apto"];
        $query1 ="select doc from residente where doc = '$numero_doc'";
        $result_res= mysqli_query($conexion, $query1);
        if ($datos=empty($result_res->fetch_object())){
            $sql1=$conexion->query("insert into residente (IdTipoIdentificacion, Nombre, Apellido, Sexo, Telefono, Celular1, Email, IdApartamento, doc, estadoresidente) values ((select idtipoidentificacion from tipo_identificacion where identificacion = '$tipo_documento'), '$nombre', '$apellido', '$sexo', '$telefono', '$celular', '$correo', (select  idapartamento from apartamento where idbloque = (select idbloque from  bloque where bloque = '$bloque_apto') and idnumeroapartamento = (select idnumeroapartamento from numero_apartamento where numeroapartamento ='$numero_apto')), '$numero_doc', 'Activo')");
            echo "<div class='alert alert-success'> Visitante registrado </div>";}
        else{
            echo "<div class='alert alert-danger'> Residente registrado anteriormente </div>";
        }
}

if (!empty($_POST['btnupdate'])){  
    $tipo_documento=$_POST["tipo_documento"];
    $sexo=$_POST["sexo"];
    $nombre=$_POST["nombre"];
    $apellido=$_POST["apellido"];
    $telefono=$_POST["telefono"];
    $celular=$_POST["celular"];
    $correo=$_POST["correo"];
    $bloque_apto =$_POST["bloque_apto"];
    $numero_apto =$_POST["numero_apto"];
    $doc = $_POST["apellido-1"];
    $query2 ="select doc from residente where doc = '$doc'";
    $result_res_up= mysqli_query($conexion, $query2);
    if ($datos=$result_res_up->fetch_object()){
    $sql1=$conexion->query("update residente r inner join tipo_identificacion t on t.idtipoidentificacion = r.idtipoidentificacion inner join apartamento a on r.idapartamento = a.idapartamento 
    set r.idtipoidentificacion = (select idtipoidentificacion from tipo_identificacion where identificacion = '$tipo_documento'),
    nombre = '$nombre',
    apellido = '$apellido',
    sexo = '$sexo',
    telefono = '$telefono',
    celular1 = '$celular',
    r.idapartamento = (select  idapartamento from apartamento where idbloque = (select idbloque from  bloque where bloque = '$bloque_apto') and idnumeroapartamento = (select idnumeroapartamento from numero_apartamento where numeroapartamento ='$numero_apto')),
    email = '$correo'
    where r.doc = $doc");
    echo "<div class='alert alert-success'> Visitante registrado </div>";
    }
    else{
        echo "<div class='alert alert-danger'> Residente inexistente </div>";
    }
}
?>