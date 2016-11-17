<script>

    $(document).ready(function () {
        getIdioma(function () {
            exibirGaleria(<?php echo $_GET['id']; ?>, this.responseText);
        });

        $(".opcao-idioma").click(function () {
            exibirGaleria(<?php echo $_GET['id']; ?>, $(this).attr("value"));
            location.reload();
        });
    });

    function anterior() {
        $("#galeria-exibir-foto").cycle("prev");
        return false;
    }
    function proximo() {
        $("#galeria-exibir-foto").cycle("next");
        return false;
    }
</script>
<a class="lnk-voltar" href="index.php?view=fotos">Voltar</a>
<div id="galeria-exibir">
    <div id="galeria-exibir-titulo"></div>
    <div id="galeria-exibir-data"></div>
    <div id="galeria-exibir-controles">
        <a href="javascript:void(0)" id="btn-galeria-anterior" onclick="anterior()"><img src="img/galeria-anterior.png"/></a>
        <a href="javascript:void(0)" id="btn-galeria-proximo" onclick="proximo()"><img src="img/galeria-proximo.png"/></a>
    </div>
    <div id="galeria-exibir-foto">
    </div>
    <div id="galeria-exibir-descricao"></div>
</div>