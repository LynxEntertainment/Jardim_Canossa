<?php

session_start();

$idioma = $_SESSION['idioma'];
session_destroy();

session_start();
$_SESSION['idioma'] = $idioma;

echo "<script>window.location = '../index.php?view=admin'</script>";
