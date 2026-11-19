<?php
    session_start();
    session_destroy();

    echo "Has cerrado sesión<br>";
    echo '<a href="index.html">Volver</a>';
?>