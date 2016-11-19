<?php
if (!isset($_SESSION['idUsuario'])) {
    echo "<script>window.location = 'index.php'</script>";
}
?>
<script type="text/javascript" src="js/uploadArquivos.js"></script>
<div id="upload-fotos">
    <h1>Enviar Fotos</h1>
    <input type="file" name="arquivos[]" id="filer_input" multiple="multiple">
    <a href="javascript:void(0)" onclick="inserirGaleria(tmp_pasta)">Criar Galeria</a>
</div>