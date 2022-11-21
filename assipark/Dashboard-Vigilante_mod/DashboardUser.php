<?php 
include("../php/conection.php");
include("../php/session.php");
if(!empty($_SESSION['idtipousuario'])){
    if($_SESSION['idtipousuario'] == 1){
    header("Location:../Dashboard-Secretaria/dashboardadmin1.php");
    }
    elseif($_SESSION['idtipousuario'] == 2){
    header("Location:../Dashboard-Administrador/dashboardadmin1.php");   
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
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos/dashboardUser.css">

</head>

<body>

    <div class="container-fluid barranav">
        <div class="row justify-content-center align-content-center">
            <div class="col-8 barra position-relative">
                <img src="./images/LOGO_ASSIPARK_BLANCO.png" alt="LogoAssipark" id="logo">
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
                <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                    <br>
                    <div class="container-fluid d-flex d-sm-block justify-content-center">
                        <div class="container-clock flex-wrap rounded">
                            <center><h1 id="time">00:00:00</h1></center>
                            <center><p id="date">date</p></center>
                        </div>
                    </div>
                    <a href="DashboardUser.php"><i class="fas fa-home"></i><span>Inicio</span></a>
                    <a href="Ingresos.php"><i class="fas fa-door-open"></i><span>Vehiculo</span></a>
                    <a href="Parqueaderos.php"><i class="fas fa-parking"></i><span>Asignar parqueaderos</span></a>
                    <a href="Visitantes.php"><i class="fas fa-user"></i><span>Registro visitantes</span></a>
                </nav>
            </div>
            <main class="main col">
                <div class="margen">
                <div class="row">
                    <h3>Parqueaderos ocupados</h3>
                </div>
                    <br>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Parqueadero</th>
                        <th scope="col">Placa Vehiculo</th>
                        <th scope="col">Ocupacion</th>
                        <th scope="col">Desocupar</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query = "select v.nombre, v.apellido, p.descripcion, h.IdVehiculo, p.ocupado from visitante v, parqueadero_visitas p, vehiculo h, visita t where v.IdVisitante=t.IdVisitante and p.IdParqueaderoVisitas=t.IdParqueaderoVisitas and h.IdVehiculo=t.IdVehiculo and p.ocupado = 'Si'";
                    $result_park=mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_array($result_park)){
                    ?>
                        <tr>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['apellido'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['IdVehiculo'] ?></td>
                            <td><?php echo $row['ocupado'] ?></td>
                            <td> <a href="../php/desocupar.php?IdVehiculo=<?php echo $row['IdVehiculo'] ?>" class="btn btn-success"> Desocupar</a></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
                <div class="row">
                    <h3>Parqueaderos desocupados</h3>
                </div>
                    <br>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Parqueadero</th>
                        <th scope="col">Ocupacion</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $query1 = "select descripcion, ocupado from parqueadero_visitas where ocupado='No'";
                    $result_park1=mysqli_query($conexion, $query1);
                    while($row = mysqli_fetch_array($result_park1)){
                    ?>
                        <tr>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['ocupado'] ?></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                </div>
            </main>
        </div>
    </div>


</body>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/646c794df3.js"></script>
    <script src="JavaScript/clock.js"></script>
    <script src="https://kit.fontawesome.com/63d5d3c81a.js" crossorigin="anonymous"></script>

</html>