<?php

include_once '../model/Usuario.php';
include_once 'model/Usuario.php';

class usuarioController {

    private $usuario;

    function __construct() {
        $this->usuario = new Usuario();
    }

    function getUsuario() {
        return $this->usuario;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function realizarLogin($login, $senha) {
        $resultado = $this->usuario->realizarLogin($login, $senha);

        if ($resultado != NULL) {
            foreach ($resultado as $row) {
                $this->usuario->setIdUsuario($row['id_usuario']);
                $this->usuario->setNomeUsuario($row['nome_usuario']);
                $this->usuario->setSobrenomeUsuario($row['sobrenome_usuario']);
            }
            return true;
        } else {
            return false;
        }
    }

}
