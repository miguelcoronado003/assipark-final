<?php
include("../php/conection.php");
include("session.php");
if (!empty($_POST['btningresar'])){
    if (!empty($_POST['usuario']) and !empty($_POST['password'])) {
        $usuario=$_POST["usuario"];
        $clave=$_POST["password"];
        $query="select u.nombre, u.username, u.contraseña, t.tipousuario, t.idtipousuario, u.estadousuario from usuario u, tipo_usuario t where t.IdTipoUsuario = u.IdTipoUsuario and u.username ='$usuario' and u.contraseña='$clave'";
        $result_login = mysqli_query($conexion, $query);
        if ($datos=$result_login->fetch_object()){
            if($datos->estadousuario == 'Activo'){
                $_SESSION['nombre'] = $datos->username;
                $_SESSION['tipousuario']= $datos->tipousuario;
                $_SESSION['idtipousuario']= $datos->idtipousuario;
                if($datos->idtipousuario == 1){
                    header("Location:../Dashboard-Secretaria/dashboardadmin1.php");
                }
                elseif($datos->idtipousuario == 3){
                    header("Location:../Dashboard-Vigilante_mod/DashboardUser.php");
                }
                elseif($datos->idtipousuario == 2){
                    header("Location:../Dashboard-Administrador/dashboardadmin1.php");
                }
            } 
            else{
                echo "<div class='alert alert-danger'> acceso usuario inactivo </div>";
            }
        }
        else {
            echo "<div class='alert alert-danger'> acceso denegado </div>";
        }
    }    
}
?>