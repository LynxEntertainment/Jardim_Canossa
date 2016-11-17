<?php

@include_once '../controller/galeriaController.php';
@include_once '../controller/fotoController.php';

if (isset($_GET['id'])) {
    $gc = new galeriaController();
    $galerias = $gc->selecionarGaleria($_GET['id'], $_GET['idioma']);
} else {
    $galerias = galeriaController::listarGaleria($_GET['idioma'], $_GET['pagina'], $_GET['qtd']);
}

$json['galeria'] = array();

if (is_array($galerias) || is_object($galerias)) {
    foreach ($galerias as $galeria) {
        $objFotos = array();
        $fotos = fotoController::listarFotos($galeria['id_galeria']);

        foreach ($fotos as $foto) {
            array_push($objFotos, array(
                'id_foto' => $foto['id_foto'],
                'caminho_foto' => $foto['caminho_foto']
            ));
        }
        array_push($json['galeria'], array(
            'id_galeria' => $galeria['id_galeria'],
            'titulo_galeria' => $galeria['titulo_galeria'],
            'descricao_galeria' => $galeria['descricao_galeria'],
            'data_galeria' => date("d/m/Y",strtotime($galeria['data_galeria'])),
            'idioma_galeria' => $galeria['idioma_galeria'],
            'foto_galeria' => $objFotos
        ));
    }
}

echo json_encode($json);
