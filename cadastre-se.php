<?php require 'pages/header.php' ?>

<div class="container">
    <h1>Cadastre-se</h1>
    <?php
    require 'classes/usuarios.class.php';
    $user = new Usuarios();

    if (isset($_POST) && !empty($_POST)) {
        # algum envio ocorreu
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        if (!empty($nome) && !empty($email) && !empty($senha)) {

            if ($user->cadastrar($nome, $email, $senha, $telefone)) {
                # Exibindo mensagem de Sucesso de usuario cadastrado
    ?>
                <div class="alert alert-success">
                    <strong>Parabéns</strong> Cadastrado com sucesso.
                    <a href="login.php" class="alert-link">Faça o Login Agora</a>
                </div>
            <?php
            } else {
                # Exibindo mensagem caso o cadastrar return false
            ?>
                <div class="alert alert-warning">
                    <strong>Atenção</strong> Este email já foi utilizado.

                </div>
            <?php
            }
        } else {
            ?>
            <!-- Intervalo do PHP para execução de um Bootstrap de Aviso com Validação -->
            <div class="alert alert-warning">
                Preencha todos os campos
            </div>
    <?php
        }
    }
    ?>

    <form action="" method="POST">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control">
        </div>
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control">
        </div>

        <input type="submit" value="Cadastrar" class="btn btn-default">
    </form>

</div>




<?php require 'pages/footer.php' ?>