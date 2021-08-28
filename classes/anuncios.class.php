<?php

class Anuncios
{
    public function getMeusAnuncios()
    {
        global $pdo;
        $array = array();

        $sql = $pdo->prepare("SELECT titulo, valor from anuncios where id_usuario = :id;");
        $sql->bindValue(":id", $_SESSION['cLogin']);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);

            return $array;
        } else {
            return false;
        }
    }
}
