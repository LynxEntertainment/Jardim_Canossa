<?php



require_once '../controller/usuarioController.php';


$uc = new UsuarioController();


    if ($uc->realizarLogin($_POST['login-usuario'], $_POST['senha-usuario'])) {
        session_start();
        $_SESSION['idUsuario'] = $uc->getUsuario()->getIdUsuario();
        $_SESSION['nomeUsuario'] = $uc->getUsuario()->getNomeUsuario();
        $_SESSION['sobrenomeUsuario'] = $uc->getUsuario()->getSobrenomeUsuario();
        echo "<script>window.location = '../index.php'</script>";
    } else {
        echo "<script>window.alert('Login ou senha incorretos.');</script>";
        echo "<script>window.location = '../index.php?pagina=login'</script>";
    }