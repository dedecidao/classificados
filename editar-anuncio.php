<?php require 'pages/header.php' ?>

<?php
if (empty($_SESSION['cLogin'])) {
?>
    <script type="text/javascript">
        window.location.href = "login.php";
    </script>
<?php
    exit;
}
require 'classes/anuncios.class.php';

$a = new Anuncios();

if (isset($_POST['titulo']) && !empty($_POST['titulo'])) {
    // Add parametrização de slashes contra sql injection antes de armazenar variaveis via POST
    $categoria = addslashes($_POST['categoria']);
    $titulo = addslashes($_POST['titulo']);
    $valor = addslashes($_POST['valor']);
    $descricao = addslashes($_POST['descricao']);
    $estado = addslashes($_POST['estado']);

    $a->addAnuncio($categoria, $titulo, $valor, $descricao, $estado);
?>
    <div class="alert alert-success">
        Produto Adicionado com Sucesso!
    </div>
<?php
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $info = $a->getAnuncio($_GET['id']);
    /**
     *  VARIAVEL INFO É UM ARRAY ASSOCIATIVO QUE TRAZ OS RESULTADOS DA TABELA DE ANUNCIOS
     */
} else {
?>
    <script type="text/javascript">
        window.location.href = "meus-anuncio.php";
    </script>
<?php
}

?>

<div class="container">

    <h1>Editar Anúncio</h1>


    <form action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="categoria">Categoria</label>
            <select name="categoria" id="categoria" class="form-control">
                <?php
                require "classes/categorias.class.php";
                $c = new Categorias();
                $cat = $c->getList();
                foreach ($cat as $cat) :
                ?>
                    <option value="<?php echo $cat['id'] ?>"> <?php echo $cat['nome'] ?> </option>
                <?php endforeach; ?>
            </select>
        </div>




        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $info['titulo'] ?>">
        </div>

        <div class="form-group">
            <label for="valor">Valor:</label>
            <input type="number" name="valor" id="valor" class="form-control" value="<?php echo $info['valor'] ?>">
        </div>


        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea name="descricao" id="descricao" cols="100" rows="10" style="display: block; "><?php echo $info['descricao'] ?></textarea>
        </div>

        <div class="form-group">
            <label for="estado">Estado de Conservação:</label>
            <select name="estado" id="estado">
                <option value="0">Ruim</option>
                <option value="1">Bom</option>
                <option value="2">Ótimo</option>
            </select>
        </div>


        <input type="submit" value="Atualizar" class="btn btn-default">
    </form>

</div>




<?php require 'pages/footer.php' ?>