<?php


session_start();

if(isset($_POST["idioma"])){
    $_SESSION["idioma"] = $_POST["idioma"];
}
