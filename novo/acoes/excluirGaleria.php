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

$pasta = "../uploads/".$_POST['id_galeria'];

if($g->excluirGaleria($_POST['id_galeria'])){
    rrmdir($pasta);
} else {
    //erro("Falha ao excluir galeria");
}

function erro($msg) {
    header('HTTP/1.1 500');
    header('Content-Type: application/json; charset=UTF-8');
    die(json_encode(array('mensagem' => $msg, 'code' => 1337)));
}

function rrmdir($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir . "/" . $object) == "dir")
                    rrmdir($dir . "/" . $object);
                else
                    unlink($dir . "/" . $object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}
