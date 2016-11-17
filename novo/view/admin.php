<div id="pagina-titulo" class="quem-somos">
    <h2 data-idioma="por">Área Administrativa</h2>
    <h2 data-idioma="eng">Management Area</h2>
    <h2 data-idioma="ita">Area Amministrativa</h2>
</div>
<div id="conteudo">
        <?php
        if(isset($_SESSION['idUsuario'])){
            include 'view/admin/userpanel.php';
        } else {
            include 'view/admin/login.php';
        }
        ?>
</div>