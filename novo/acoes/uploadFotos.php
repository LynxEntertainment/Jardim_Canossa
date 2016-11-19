<?php

session_start();

if (!isset($_SESSION['idUsuario'])) {
    echo "<script>"
    . "window.alert('Acesso Negado!);"
    . "window.location = 'index.php'"
    . "</script>";
}
$temp = "../uploads/temp/";
@mkdir($temp);
$diretorio = $temp.$_POST['pasta'] . "/";
@mkdir($diretorio);
$qtd = count($_FILES['arquivos']['name']);

$tipo = pathinfo($_FILES['arquivos']['name'][0], PATHINFO_EXTENSION);
$nomeArquivo = "jc-" . md5(time().rand(0, 100000));

move_uploaded_file($_FILES["arquivos"]["tmp_name"][0], $diretorio.$nomeArquivo.".".$tipo);

echo $nomeArquivo.".".$tipo;

