<?php

session_start();

include_once '../controller/galeriaController.php';
include_once '../controller/fotoController.php';

if (!isset($_SESSION['idUsuario'])) {
    echo "<script>"
    . "window.location = 'index.php'"
    . "</script>";
}

$pasta = "../uploads/temp/" .$_POST['pasta'] . "/";


if (file_exists($pasta)) {
    $g = new galeriaController();
    $id = $g->inserirGaleria();
    $novaPasta = "uploads/" . $id . "/";
    mkdir("../" . $novaPasta);
    if ($id) {
        $f = new fotoController();
        $arquivos = scandir($pasta);
        foreach ($arquivos as $arquivo) {
            if ($arquivo != "." && $arquivo != "..") {
                $f->inserirFoto($id, $novaPasta . $arquivo);
                rename($pasta . $arquivo, "../" . $novaPasta . $arquivo);
            }
        }
        rmdir($pasta);
        echo $id;
    } else {
        erro("Falha ao inserir galeria");
    }
} else {
    erro("Selecione arquivos primeiro");
}

function erro($msg) {
    header('HTTP/1.1 500');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('mensagem' => $msg, 'code' => 1337)));
}
