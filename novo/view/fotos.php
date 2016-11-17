<div id='pagina-titulo' class='pagina-fotos'>
    <h2 data-idioma="por">Fotos</h2>
    <h2 data-idioma="eng">Photos</h2>
    <h2 data-idioma="ita">Fotografie</h2>
</div>
<div id='conteudo'>
    <?php
    if(isset($_GET['galeria'])){
        include 'view/galeria/'.$_GET['galeria'].'.php';
    } else {
        include 'view/galeria/listar.php';
    }
    ?>
</div>