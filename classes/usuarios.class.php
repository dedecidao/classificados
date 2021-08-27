<?php
class Usuarios
{

    public function cadastrar($nome, $email, $senha, $telefone)
    {

        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
        $sql->bindValue(":email", $email);
        $sql->execute();

        if ($sql->rowCount() == 0) { // Verify Email and Register User
            $sql = $pdo->prepare("INSERT INTO usuarios SET 
            nome = :nome, 
            email = :email,
            senha = :senha,
            telefone = :telefone");

            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", md5($senha));
            $sql->bindValue(":telefone", $telefone);

            $sql->execute();
            return true;
        } else {
            return false;
        }
    } //register a user

    public function login($email, $senha)
    {
        global $pdo;

        $sql = $pdo->prepare("SELECT id,nome from usuarios where
            email = :email AND
            senha = :senha
            ");
        $sql->bindValue(":email", $email);
        $sql->bindValue(":senha", md5($senha));

        $sql->execute();

        if ($sql->rowCount()) {
            $login = $sql->fetch(PDO::FETCH_ASSOC);
            $_SESSION['nome'] = $login['nome'];
            $_SESSION['cLogin'] = $login['id'];
            return true;
        } else {
            return false;
        }
    } //login a user


}
