<?php

if (!empty($_POST['btningresar'])){
    if (empty($_POST['usuario']) and empty($_POST['password'])) {
        echo '<div class="alert alert-danger"> los campos estan vacios </div>';
    } else {
        $usuario=$_POST["usuario"];
        $clave=$_POST["password"];
        $sql=$conexion->query("select * from usuario where nombre ='$usuario' and contraseña='$clave'");
        if ($datos=$sql->fetch_object()){
            header("location:DashboardUser.html");
        } else{
            echo "<div class='alert alert-danger'> acceso denegado </div>";
        }
    }
}

?>