<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../CSS/Ini.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<body>
       <!--Creación de la barra de navegación responsive-->
       <header class="header">
        <nav class="navbar  fixed-top">
          <div class="container-fluid">
            <a class="navbar-brand" href="../HomePage.html">
              <img src="../Imagenes/LOGO_ASSIPARK_BLANCO.png" alt=""  width="200px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
              <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Assipark</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="AcercaDe.html">Acerca de </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Módulos.html">Módulos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Funcionalidades.html">Funcionalidades</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ventajas.html">Ventajas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Ini.php"> Inicio de Sesion</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </header>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">

        </div>

        <form action="" class="formulario" method="post">
            <div class="texto-formulario">
                <h2>Inicia sesión</h2>
                <center><img src="../Imagenes/LOGO_FINAL_ASSIPARK.png" width="200px" alt="logoassipark"> </center>
                <?php
                include("../php/controler-login.php");
                ?>
              </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" id="usuario" name="usuario" required>
                
            </div>
            <div class="input">
                <label for="contraseña">Contraseña</label>
                <input type="password" placeholder="Ingresa tu contraseña" type="password" id="contraseña" name="password" required>
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input type="submit" value="Iniciar sesión" name="btningresar">
            </div>
        </form>
    </div>

</body>

</html>