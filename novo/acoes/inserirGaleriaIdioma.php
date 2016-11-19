                                                                                                                                                                                                                                                                                                                        <?php

session_start();

include_once '../controller/galeriaController.php';

$json;

if (!isset($_SESSION['idUsuario'])) {
    echo "<script>"
    . "window.location = 'index.php'"
    . "</script>";
}

$g = new galeriaController();
$g->getGaleria()->setIdGaleria($_POST['id_galeria']);

if($_POST['definido'] == "true"){
    if($g->editarGaleriaIdioma(
            $_POST['id_galeria'],
            $_POST['idioma_galeria'],
            $_POST['titulo_galeria'],
            $_POST['descricao_galeria'])){
        $json = true;
        erro("Erro ao editar idioma");
    }
} else {
    if($g->inserirGaleriaIdioma(
            $_POST['titulo_galeria'],
            $_POST['descricao_galeria'],
            $_POST['idioma_galeria'])){
        $json = true;
    } else {
       erro("Erro ao inserir idioma");
    }
}

json_encode($json);

function erro($msg) {
    header('HTTP/1.1 500');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('mensagem' => $msg, 'code' => 1337)));
}
