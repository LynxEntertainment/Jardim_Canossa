<?php
if (!isset($_SESSION['idUsuario'])) {
    echo "<script>window.location = 'index.php'</script>";
}
?>

<script type="text/javascript">
    $(document).ready(function () {
        listarFoto($_GET['id']);
        criarFormGaleriaIdioma($_GET['id'], $("#idioma-galeria").val());
    });
</script>

<div id="conteudo-coluna-1">
    <div id="editar-galeria-fotos"></div>
</div>
<div id="conteudo-coluna-2">
    <form id="form-editar-galeria" method="post">
        <input type="hidden" id="definido" name="definido" value="false">
        <input id="id-galeria" name="id-galeria" type="hidden" value="<?php echo $_GET['id']; ?>">
        <label for="idioma-galeria">Idioma</label>
        <select id="idioma-galeria" name="idioma-galeria" onchange="criarFormGaleriaIdioma($_GET['id'], $(this).val())">
            <option value="por">Português Brasileiro</option>
            <option value="eng">Inglês</option>
            <option value="ita">Italiano</option>
        </select><br>
        <label for="titulo-galeria">Título</label>
        <input id="titulo-galeria" name="titulo-galeria" type="text"/><br>
        <label for="descricao-galeria">Descrição</label>
        <textarea id="descricao-galeria" name="descricao-galeria" type="textarea"/></textarea><br>
        <a class="lnk-acao" id="btn-atualizar-galeria" name="btn-atualizar-galeria" href="javascript:void(0)" onclick="inserirGaleriaIdioma($('#form-editar-galeria').serializeArray())"></a>
    </form>
</div>