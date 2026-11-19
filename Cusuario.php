<?php
    require 'configdb.php';

    if (isset($_POST["correo"]) && isset($_POST["pw"])) {
        $sql = 'SELECT * FROM usuarios WHERE correo="' . $_POST["correo"] . '" AND pw="' . $_POST["pw"] . '";';
        // echo $sql;
        $resultado = $conexion->query($sql);
        
        $existe = false;

        if ($resultado->num_rows > 0) $existe = true;

        if ($existe) {
            echo "Inicio de sesión correcto";
            session_start();
            $_SESSION["nombre"] = $resultado->fetch_assoc()["nombre"];

            echo '<br>';
            echo 'Hola ' . $_SESSION["nombre"];

            echo '<br/>';
            echo '<a href="cerrarSesion.php">Cerrar sesión</a>';
        }

        else {
            echo "Inicio de sesión incorrecto";
            echo '<br/>';
            echo '<a href=".">Volver</a>';
        }
    }

    else {
        echo "Inicio de sesión incorrecto";
        echo '<br/>';
        echo '<a href=".">Volver</a>';  
    }
?>