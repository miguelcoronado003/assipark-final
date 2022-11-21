<?php 
include("../php/conection.php");
include("../php/session.php");
if(!empty($_SESSION['idtipousuario'])){
    if($_SESSION['idtipousuario'] == 1){
    header("Location:../Dashboard-Secretaria/dashboardadmin1.php");
    }
    elseif($_SESSION['idtipousuario'] == 3){
    header("Location:../Dashboard-Vigilante_mod/DashboardUser.php");   
    }
}
else{
    header("Location:../HomePage.html"); 
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/dashboardUser.css">
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra">
                <img src="images/LOGO_ASSIPARK_BLANCO.png" alt="LogoAssipark" id="logo">
            </div>
            <div class="col-4 text-right barra">
                <ul class="navbar-nav mr-auto">
                <li>
                        <a href="#" class="text-decoration-none px-3 position-flex text-light" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php 
                            if(isset($_SESSION['nombre'])){
                            echo $_SESSION['nombre'];}
                            else{
                                echo "usuario no registrado";
                            } ?> <i class="fa-regular fa-pen-to-square"></i>
                        </a>
                        <a href="#" class="text-decoration-none px-3 position-flex text-light" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php 
                            if(isset($_SESSION['tipousuario'])){
                            echo $_SESSION['tipousuario'];}
                            else{
                                echo "usuario no registrado";
                            } ?>
                        </a>
                        <a href="#" class="text-decoration-none px-3 position-flex text-light perfil dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle user"></i>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbar-dropdown">
                            <a class="dropdown-item menuperfil cerrar" href="../php/controler-signout.php"><i class="fas fa-sign-out-alt m-1"></i>Cerrar sesión
                            </a>
                            <a class="dropdown-item menuperfil principal" href="#"><i class="fas fa-sign-out-alt m-1"></i>Página principal
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="barra-lateral col-7 col-sm-auto">
                <br>
                <div class="container-fluid d-flex d-sm-block justify-content-center">
                    <div class="container-clock flex-wrap rounded">
                        <center><h1 id="time" class="text-white">00:00:00</h1></center>
                        <center><p id="date" class="text-white">date</p></center>
                    </div>
                </div>
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <a href="dashboardadmin1.php"><i class="fas fa-home"></i><span>Parqueaderos Residentes</span></a>
                    <a href="DashboardAdmin.php"><i class="fas fa-door-open"></i><span>Parqueaderos Visitantes</span></a>
                    <a href="Desactivar.php"><i class="fas fa-door-closed"></i><span>Desactivar</span></a>
                    <a href="Vehiculo.php"><i class="fas fa-car"></i><span>Vehiculo</span></a>
                    <a href="Parqueaderos-visitantes.php"><i class="fas fa-parking"></i><span>Parqueaderos</span></a>
                    <a href="Residentes.php"><i class="fas fa-user"></i><span>Residentes</span></a>
                    <a href="Usuarios.php"><i class="fas fa-wrench"></i><span>Usuarios</span></a>
                    <a href="Visitantes1.php"><i class="fas fa-user"></i><span>Visitantes</span></a>
                    <a href="Apartamentos.php"><i class="fas fa-wrench"></i><span>Apartamentos</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="container-fluid">
                    <div class="row">
                        <main class="main col">
                            <form method="post">
                            <div class="card">
                                <h3 class="card-header text-center">Registro de Usuario</h3>
                                <div class="card-body text-center">
                                <?php 
                                include("../php/controler-registro-usuarios.php")
                                ?>
                                    <div class="row">
                                        
                                        <div class="col mb-4 text-justify">
                                        <label for="selector"> <strong>Tipo Usuario *</strong></label>
                                        <select class="form-control" name="tipo_usuario">
                                            <option>Administrador</option>
                                            <option>Secretaria</option>
                                            <option>Vigilante</option>
                                        </select>
                                        </div>
                                        <div class="col text-justify">
                                            <label for="last" style="width: 100px;"><strong>Numero Doc </strong></label>
                                            <input type="number" class="form-control" placeholder="Ingrese el numero de documento" name="numero_doc"  required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-4 text-justify">
                                        <label for="selector"> <strong>Tipo documento *</strong></label>
                                        <select id="selector" class="form-control" name="tipo_documento">
                                            <option>Cedula</option>
                                            <option>Tarjeta de Identidad</option>
                                            <option>Cedula de Extranjeria</option>
                                        </select>
                                        </div>
                                        <div class="col text-justify">
                                        <label for="selector"> <strong>Sexo *</strong></label>
                                        <select id="selector" class="form-control" name="sexo">
                                            <option>Masculino</option>
                                            <option>Femenino</option>
                                            <option>Intersexual</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-4 text-justify">
                                            <label for="first"><strong>Nombre *</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingrese el nombre" name="nombre" required>
                                        </div>
                                        <div class="col text-justify">
                                            <label for="last" style="width: 100px;"><strong>Apellidos *</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingrese el apellido" name="apellido" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col mb-4 text-justify">
                                            <label for="first"><strong>Dirección</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingresar dirección" name="direccion" required>
                                        </div>
                                        <div class="col text-justify">
                                            <label for="last" style="width: 100px;"><strong>Telefono</strong></label>
                                            <input type="number" class="form-control" placeholder="Ingresar teléfono" name="telefono" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col mb-4 text-justify">
                                            <label for="first"><strong>Celular *</strong></label>
                                            <input type="number" class="form-control" placeholder="Ingresar número" name="celular" required>
                                        </div>
                                        <div class="col text-justify">
                                            <label for="last" style="width: 300px;"><strong>Correo electrónico *</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingresar correo" name="correo" required>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col mb-4 text-justify">
                                            <label for="password"><strong>Username *</strong></label>
                                            <input type="text" class="form-control" placeholder="Ingresar username" name="username"  required>
                                        </div>
                                        <div class="col text-justify">
                                            <label for="password"><strong>Contraseña *</strong></label>
                                            <input type="password" class="form-control" placeholder="Ingresar contraseña" name="contraseña2" required>
                                        </div>
                                    </div>
                                            
                                    
                                    <br><br>
                                    <input type="submit" value="Registrar" name="btnusuario" class="btn btn-warning">
                                    <input type="submit" value="Actualizar" name="btnupdate" class="btn btn-warning">
                                </div>
                            </div>
                            </form>
                        </main>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>



</body>

    
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/646c794df3.js"></script>
<script src="../Dashboard-Vigilante_mod/JavaScript/clock.js"></script>
<script src="https://kit.fontawesome.com/63d5d3c81a.js" crossorigin="anonymous"></script>


</html>