<script type="text/javascript">
    $(document).ready(function () {
        getIdioma(function () {
            listarGaleria(this.responseText, 1, 27);
        });

        $(".opcao-idioma").click(function () {
            listarGaleria($(this).attr("value"), 1, 27);
        });
    });

</script>
<div id="conteudo">
    <a class="admin" href="index.php?view=fotos&galeria=inserir">Inserir Nova galeria</a>
    <div id="galeria-lista">
    </div>
</div>
