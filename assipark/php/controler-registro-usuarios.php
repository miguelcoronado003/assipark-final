<?php
include("conection.php");
if (!empty($_POST['btnusuario'])){
        $tipo_usuario=$_POST["tipo_usuario"];
        $numero_doc=$_POST["numero_doc"];
        $tipo_documento=$_POST["tipo_documento"];
        $sexo=$_POST["sexo"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $celular=$_POST["celular"];
        $correo=$_POST["correo"];
        $contraseña1=$_POST["contraseña2"];
        $username= $_POST["username"];
        $query_doc_val = "select numeroIdentificacion from usuario where numeroIdentificacion='$numero_doc'";
        $resut_val_doc = mysqli_query($conexion, $query_doc_val);
        $query_doc_val1 = "select username from usuario where username='$username'";
        $resut_val_doc1 = mysqli_query($conexion, $query_doc_val1);
        if($datos=empty($resut_val_doc->fetch_object())){
            if($datos1=empty($resut_val_doc1->fetch_object())){
        $sql=$conexion->query("insert into usuario ( IdTipoUsuario, IdTipoIdentificacion, Nombre, Apellido, Sexo, Direccion, Telefono, celular1, email, contraseña, numeroIdentificacion, username, estadousuario) values ((select idtipousuario from tipo_usuario where tipousuario = '$tipo_usuario'), (select idtipoidentificacion from tipo_identificacion where identificacion= '$tipo_documento'), '$nombre', '$apellido', '$sexo', '$direccion', '$telefono', '$celular', '$correo', '$contraseña1', '$numero_doc','$username', 'Activo')");
        echo "<div class='alert alert-success'> Usuario registrado </div>";
        }
        else{
        echo "<div class='alert alert-danger'> Username usado ingrese otro </div>";
        }
    }
    else{
        echo "<div class='alert alert-danger'> Usuario ya registrado </div>";
    }
}
include("conection.php");
if (!empty($_POST['btnupdate'])){
        $tipo_usuario=$_POST["tipo_usuario"];
        $numero_doc=$_POST["numero_doc"];
        $tipo_documento=$_POST["tipo_documento"];
        $sexo=$_POST["sexo"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $direccion=$_POST["direccion"];
        $telefono=$_POST["telefono"];
        $celular=$_POST["celular"];
        $correo=$_POST["correo"];
        $contraseña1=$_POST["contraseña2"];
        $query_doc_val = "select numeroIdentificacion from usuario where numeroIdentificacion='$numero_doc'";
        $resut_val_doc = mysqli_query($conexion, $query_doc_val);
        $query_doc_val1 = "select username from usuario where username='$username'";
        $resut_val_doc1 = mysqli_query($conexion, $query_doc_val1);
        if($datos=$resut_val_doc->fetch_object()){
            if($datos1=empty($resut_val_doc1->fetch_object())){
        $sql=$conexion->query("update usuario u inner join tipo_usuario t on u.idtipousuario = t.idtipousuario inner join tipo_identificacion i on i.idtipoidentificacion = u.idtipoidentificacion set u.idtipousuario = (select idtipousuario from tipo_usuario where tipousuario = '$tipo_usuario'), u.idtipoidentificacion = (select idtipoidentificacion from tipo_identificacion where identificacion= '$tipo_documento'), nombre = '$nombre',apellido = '$apellido',sexo = '$sexo',direccion = '$direccion',telefono = '$telefono', celular1 = '$celular',email = '$correo', contraseña = '$contraseña1', numeroidentificacion ='$numero_doc' where u.numeroIdentificacion='$numero_doc'");
        echo "<div class='alert alert-success'> Usuario actualizado </div>";
        }
        else{
            echo "<div class='alert alert-success'> Username usado ingrese otro </div>";
        }
    }
    else {
        echo "<div class='alert alert-success'> El usuario no existe </div>";
    }
} 
?>
