<?php


class Anuncios
{


    public function getMeusAnuncios()
    {
        global $pdo;
        $array = array();

        $sql = $pdo->prepare("SELECT id, titulo, valor from anuncios where id_usuario = :id;");
        $sql->bindValue(":id", $_SESSION['cLogin']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $array;
        } else {
            return false;
        }
    }

    public function getAnuncio($id)
    {
        global $pdo;
        $array = array();

        $sql = $pdo->prepare("SELECT * from anuncios where id = :id;");
        $sql->bindValue(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch(PDO::FETCH_ASSOC);

            return $array;
        }
    }



    public function addAnuncio($categoria, $titulo, $valor, $descricao, $estado)
    {
        global $pdo;

        $sql = $pdo->prepare('INSERT into anuncios (id_usuario, id_categoria, titulo, descricao, valor, estado) values
        (:iduser,:idcat,:titulo,:descricao,:valor,:estado);');
        $sql->bindValue(":iduser", $_SESSION['cLogin']);
        $sql->bindValue(":idcat", $categoria);
        $sql->bindValue(":titulo", $titulo);
        $sql->bindValue(":valor", $valor);
        $sql->bindValue(":descricao", $descricao);
        $sql->bindValue(":estado", $estado);

        $sql->execute();
    }

    public function excluirAnuncio($id)
    {
        global $pdo;

        $sql = $pdo->prepare("DELETE from anuncios where id = :id");
        $sql->bindValue(":id",  $id);
        $sql->execute();
    }
}
