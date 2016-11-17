<script type="text/javascript">
    $(document).ready(function () {
        getIdioma(function () {
            listarGaleria(this.responseText,1,27);
        });

        $(".opcao-idioma").click(function () {
            listarGaleria($(this).attr("value"),1,27);
        });
    });

</script>
<div id="galeria-lista">
</div>
