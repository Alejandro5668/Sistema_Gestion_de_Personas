<?php

if (!empty($_GET["id"])){

    $id=$_GET["id"];
    $sql=$conexion->query(" delete from persona where id_persona=$id ");
    if ($sql==1){
        echo '<div class="alert alert-success"> Persona eliminada correctamente</div>';
    } else{

        echo '<div class="alert alert-danger">La persona no pudo ser eliminada correctamente</div>';
    }
}

?>