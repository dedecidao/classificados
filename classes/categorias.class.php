<?php
class Categorias
{
    public function getList()
    {
        $array = array();
        global $pdo;
        $sql = $pdo->query("SELECT * from categorias;");
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
        return $array;
    }
}
