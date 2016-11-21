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
<a class="admin btn-upload" href="index.php?view=fotos&galeria=inserir"><img src=img/upload-icon.png>Inserir Nova galeria</a>
<div id="conteudo">
    <div id="galeria-lista">
    </div>
</div>
