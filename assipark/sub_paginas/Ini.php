<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="../CSS/Ini.css">
</head>

<body>
    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">

        </div>

        <form action="" class="formulario" method="post">
            <div class="texto-formulario">
                <h2>Inicia sesión</h2>
                <center><img src="../Imagenes/LOGO_FINAL_ASSIPARK.png" width="200px" alt="logoassipark"> </center>
                <?php
                include("../php/conection.php");
                include("../php/controlator.php");
                ?>
            </div>
            <div class="input">
                <label for="usuario">Usuario</label>
                <input placeholder="Ingresa tu nombre" type="text" id="usuario"  name="usuario">
                
            </div>
            <div class="input">
                <label for="contraseña">Contraseña</label>
                <input type="password" placeholder="Ingresa tu contraseña" type="password" id="contraseña" name="password">
            </div>
            <div class="password-olvidada">
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
            <div class="input">
                <input type="submit" value="Iniciar sesión" name="btningresar">
            </div>
            <div class="password-olvidada">
                <a href="../sub_paginas/Index ASSIPARK.html"> Ingresa en modo invitado </a>
            </div>
        </form>
    </div>

</body>

</html>