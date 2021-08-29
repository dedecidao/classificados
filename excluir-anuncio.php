<?php
require "config.php";
require "classes/anuncios.class.php";

if (empty($_SESSION['cLogin'])) {
    header("Location: login.php");
    exit;
}


$a = new Anuncios();

if (isset($_GET['id']) && !empty('id')) {
    $a->excluirAnuncio($_GET['id']);
}

header("Location: meus-anuncios.php");
