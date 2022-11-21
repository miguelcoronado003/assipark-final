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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/Vehiculo.css">
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
                <br>
                <div class="card">
                  <h3 class="card-header text-center">Registro de visitantes</h3>
                  <div class="card-body">
                  <form class="text-center text-fluid" method="post">
                          <?php 
                          include("../php/controler-visitante.php")
                          ?>
                          <label for="tipodocu" class="text-center">Tipo de documento</label>
                          <select name="tipodoc">
                            <option value="Cedula">Cedula</option>
                            <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                          </select>
                              <div class="row">
                                  <div class="col mb-4">
                                      <input type="text" class="form-control" placeholder="Nombres *"  required name="nombre">
                                  </div>
                                  <div class="col mb-4">
                                      <input type="text" class="form-control" placeholder="Apellidos *"  required name="apellido">
                                  </div>
                              </div>
                              <br>
                              <div class="row">
                                  <div class="col mb-4">
                                      <input type="text" class="form-control" placeholder="Numero de documento *"  required name="documento">
                                  </div>
                                  <div class="col mb-4">
                                      <input type="text" class="form-control" placeholder="Numero de telefono *"  required name="celular">
                                  </div>
                              </div>
                              <br>
                              <input type="submit" value="Registrar" name="btnvisitante" class="btn btn-warning">
                              <input type="submit" value="Actualizar" name="btnupdate" class="btn btn-warning">
                      </div>
                  </div>
              </form>                 
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