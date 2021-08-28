<?php require 'pages/header.php' ?>

<div class="container">
    <h1>Meus Anuncios</h1>

    <a href="add-anuncio.php" class="btn btn-primary btn-lg"> + Anúncio</a>
    </hr>

    <table class="table table-striped">
        <thead>
            <tr>

                <th>Titulo</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <!-- End Cabeçalho da Tabela -->
        <?php
        require 'classes/anuncios.class.php';
        $a = new Anuncios();
        $anuncios = $a->getMeusAnuncios();
        if (!$anuncios) {
        } else {
            foreach ($anuncios as $anuncio) :
        ?>
                <tr>
                    <td> <?php echo $anuncio['titulo']; ?></td>
                    <td> <?php echo number_format($anuncio['valor'], 2); ?> </td>
                    <td> botoes</td>
                </tr>
        <?php endforeach;
        } ?>
    </table>



</div>




<?php require 'pages/footer.php' ?>