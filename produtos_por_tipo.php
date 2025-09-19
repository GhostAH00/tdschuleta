<?php 
// Initialize variables to avoid 'undefined' warnings
$produtos = [];
$linhas = 0;
$tipo_id = null;

if (isset($_GET['tipo_id'])) {
    $tipo_id = $_GET['tipo_id'];
    include_once "class/produto.php";
    $produto = new Produto();
    $produtos = $produto->buscarPorTipoId($tipo_id); 
    $linhas = count($produtos);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link rel="stylesheet" href="css/style.css" />
        <script src="js/bootstrap.min.js" defer></script>
        <script src="js/bootstrap.bundle.min.js" defer></script>
        <title>La Brasa do Mar</title>
    </head>
    <body class="fundo-fixo">
        <header>
            <?php include 'menu_publico.php'?>
        </header>
        <main class="container">
            <?php include "carousel.php"?>

<section>
    <?php if($linhas == 0){ ?>
        <h2 class="alert alert-marrom">Não há produtos em cadastrados</h2>
    <?php }?>
    <?php if($linhas > 0){?>
        <h2 class="alert alert-marrom">Produtos</h2>
        <div class="row">
            <?php foreach($produtos as $prod):?>
                <div class="col-sm-6 col-md-4 mb-4">
                    <div class="card">
                        <img
                            src="images/<?=$prod['imagem']?>"
                            alt="<?=$prod['descricao']?>"
                            class="card-img-top"
                        />
                        <div class="card-body bg-churras-praia">
                            <h3 class="card-title text-dark">
                                <strong><i><?=$prod['descricao']?></i> </strong>
                            </h3>
                            <p class="text-warning"><strong><?=$prod['rotulo']?></strong></p>
                            <p class="card-text text-start">
                                <?=mb_strimwidth($prod['resumo'],0,42,'...')?>
                            </p>
                            <button class="btn btn-default disabled" role="button" style="cursor: default;" >
                                <?="R$ ".number_format($prod['valor'],2,',','.')?>
                            </button>
                            <a href="detalhes_produto.php?id=<?=$prod['id']?>" class="btn btn-churras float-end">
                                <span class="d-none d-sm-inline">Saiba mais</span>
                                <i class="bi bi-eye-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    <?php }?>
</section>
        </main>
        <footer class="container ps-4 bg-dark text-white p-4 rounded-top" id="CONTATO">
            <a name="contato"></a>
            <?php include "rodape.php"?>
        </footer>
    </body>
</html>