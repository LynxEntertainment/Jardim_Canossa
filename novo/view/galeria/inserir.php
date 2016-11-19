<?php
if (!isset($_SESSION['idUsuario'])) {
    echo "<script>window.location = 'index.php'</script>";
}
?>
<script type="text/javascript" src="js/uploadArquivos.js"></script>
<div id="upload-fotos">
    <h1>Enviar Fotos</h1>
    <input type="file" name="arquivos[]" id="filer_input" multiple="multiple">
</div>
<div id="conteudo-coluna-2">
    <form id="form-inserir-galeria" method="post">
        <input type="hidden" id="definido" name="definido" value="false">
        <input id="id-galeria" name="id-galeria" type="hidden">
        <input type="hidden" id="idioma-galeria" name="idioma-galeria" value="<?php echo $_SESSION['idioma'] ?>"><br>
        <label for="titulo-galeria">Título</label>
        <input id="titulo-galeria" name="titulo-galeria" type="text"/><br>
        <label for="descricao-galeria">Descrição</label>
        <textarea id="descricao-galeria" name="descricao-galeria" type="textarea"/></textarea><br>
        <a href="javascript:void(0)" class="lnk-acao" onclick="inserirGaleria(tmp_pasta)">Criar Galeria</a>
    </form>
</div>