<?php
    $conn = new mysqli('localhost', 'root', '', 'mundoconquistador');
    if ($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>
