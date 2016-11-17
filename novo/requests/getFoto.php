<?php

@include_once '../controller/fotoController.php';

$lista =  fotoController::listarFotos($_GET['galeria']);

$json['foto'] = array();

foreach($lista as $row){
    array_push($json['foto'],array(
        "id_foto" => $row['id_foto'],
        "caminho_foto" => $row['caminho_foto']
    ));
}

echo json_encode($json);