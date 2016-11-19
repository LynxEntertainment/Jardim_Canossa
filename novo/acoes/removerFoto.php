<?php

if (isset($_POST['arquivo'])) {
    $arquivo = '../uploads/temp/' . $_POST['pasta'] . "/" . $_POST['arquivo'];

    unlink($arquivo);
}

?>
