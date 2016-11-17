<?php
if(!isset($_SESSION['idUsuario'])){
    echo "<script>window.location = 'index.php'</script>";
}