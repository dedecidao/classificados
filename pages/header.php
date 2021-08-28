<?php require 'config.php' ?>


<!-- Primeira coisa a ser inicida!-->

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <script src="assets/js/jquery-3.6.0.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/script.js.js" type="text/javascript"></script>
    <title>Classificados</title>
</head>

<body>
    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="./" class="navbar-brand">Classificados</a>
                <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) : ?>
                    <li class="navbar-brand">Seja bem vindo, <?php echo ($_SESSION['nome']) ?></li>
                <?php endif ?>
            </div>
            <ul class="nav navbar-nav navbar-right">

                <?php if (isset($_SESSION['cLogin']) && !empty($_SESSION['cLogin'])) : ?>




                    <li class="navbar-brand"><a href="meus-anuncios.php">Meus Anúncios</a> </li>
                    <li class="navbar-brand"><a href="sair.php">Sair</a> </li>

                <?php else : ?>
                    <li class="navbar-brand"><a href="cadastre-se.php">Cadastre-se</a> </li>
                    <li class="navbar-brand"><a href="login.php ">Login</a> </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>