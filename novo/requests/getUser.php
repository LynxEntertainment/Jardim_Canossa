<?php
session_start();

if(isset($_SESSION['idUsuario'])){
    $json['usuario'] = array(
        "idUsuario" => $_SESSION['idUsuario'],
        "nomeUsuario" => $_SESSION['nomeUsuario'],
        "sobrenomeUsuario" => $_SESSION['sobrenomeUsuario']
    );
    
    echo json_encode($json);
}