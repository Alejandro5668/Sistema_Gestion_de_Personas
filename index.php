<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud con PHP y MySQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a745da1a6d.js" crossorigin="anonymous"></script>
</head>
<body class="d-flex flex-column min-vh-100">
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que deseas eliminar?" );
            return respuesta;
        }
    </script>
    
<!--- Quise usar bootstrap ya que es un framework muy facil y sencillo de utilizar para la parte fronted de un proyecto, ademas que tengo mas experiencia en usarlo --->
<!-- Cree una interfaz sencilla pero facil de entender y consumir para el usuario, algo funcional y agradable de ver --->

<h1 class="text-center p-3 bg-primary text-white">Gestion de usuarios</h1>


<?php
include "modelo/conexion.php";
include "controlador/eliminar_persona.php";
?>
<!-- aqui incluimos el controlador eliminar persona porque este se ejecuta a partir de la vista de nuestro index -->

<!-- Diseñamos nuestra apartado de registros usando un formulario basico de bootstrap -->
<div class="container-fluid row">
    <form class="col-4 p-3" method="POST">
        <h3 class="text-center text-secondary">Registro de Personas</h3>
        <?php
            include "controlador/registro_persona.php"; // aqui incluimos el controlador registrar persona porque este se ejecuta en el mismo index osea en la vista principal
        ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre de la persona</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido de la persona</label>
            <input type="text" class="form-control" name="apellido">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI de la persona</label>
            <input type="text" class="form-control" name="dni">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de la persona</label>
            <input type="date" class="form-control" name="fecha">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo de la persona</label>
            <input type="text" class="form-control" name="correo">
        </div>
        <button type="submit" class="btn btn-primary" name="btnregistrar" value="ok">Registrar</button>
    </form>
    <div class="col-8 p-4">

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOMBRE</th>
            <th scope="col">APELLIDO</th>
            <th scope="col">DNI</th>
            <th scope="col">FECHA DE NACIMIENTO</th>
            <th scope="col">CORREO</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        
        <!-- Aqui incluimos la conexion a la base de datos lo cual no seria necesario inlcuirla en cada una de las clases si usaramos un autoload --->
        <!-- algo a considerar es que en caso de error include sigue ejecutando el programa pero nos avisa del error --> 
        <?php
        include "modelo/conexion.php";
        $sql=$conexion->query(" select * from persona ");
        while($datos=$sql->fetch_object()){ ?>
        <tr>
            <td><?= $datos->id_persona?></td>
            <td><?= $datos->nombre?></td>
            <td><?= $datos->apellido?></td>
            <td><?= $datos->dni?></td>
            <td><?= $datos->fecha_nac ?></td>
             <td><?= $datos->correo?></td>
            <td>
                <a href="modificar_persona.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-danger"><i class="fa-solid fa-pen-to-square"></i></a>
                <a onclick="return eliminar()" href="index.php?id=<?= $datos->id_persona ?>" class="btn btn-small btn-warning"><i class="fa-solid fa-trash"></i></a>
            </td>
        </tr>
        <?php }
        ?>
    </tbody>
</table>

    </div>
</div>

<!-- Con este bloque de codigo hacemos el footer (Es la seccion de color negro que se ve a lo ultimo de la inetrfaz) --->
<footer class="mt-auto bg-dark text-center text-white py-4 mt-5">
  <div class="container">
    <p class="mb-3">Proyecto desarrollado con:</p>
    <div class="d-flex justify-content-center gap-4">
      <!-- HTML -->
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg" 
           alt="HTML5" width="40" height="40">
      <!-- Bootstrap -->
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/bootstrap/bootstrap-original.svg" 
           alt="Bootstrap" width="40" height="40">
      <!-- PHP -->
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" 
           alt="PHP" width="40" height="40">
      <!-- MySQL -->
      <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" 
           alt="MySQL" width="40" height="40">
    </div>
    <p class="mt-3 mb-0">&copy; 2025 - Alejandro Campo</p>
  </div>
</footer>

<!-- Este script es donde instalamos las funcionalidades JS de bootsrapt --->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>