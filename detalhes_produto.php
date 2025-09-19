<?php 
    // Inclui a classe do produto
    include_once "class/produto.php";

    // Verifica se o parâmetro 'id' foi passado na URL
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $produto = new Produto();
        $prod = $produto->buscarPorId($id);

        // Se o produto não for encontrado, redireciona para a página inicial
        if (!$prod) {
            header("Location: index.php");
            exit(); // Garante que o script pare de executar
        }
    } else {
        // Se o 'id' não for passado, redireciona para a página inicial
        header("Location: index.php");
        exit(); // Garante que o script pare de executar
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="La Brasa do Mar - Os melhores cortes e sabores direto da brasa para sua mesa.">
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <link rel="stylesheet" href="css/style.css" />

        <script src="js/bootstrap.min.js" defer></script>
        <script src="js/bootstrap.bundle.min.js" defer></script>

        <title>Detalhes do Produto - La Brasa do Mar</title>
    </head>

    <body class="fundo-fixo">
        <header>
            <?php include 'menu_publico.php';?> 
        </header>

        <main class="container">
            <h2 class="alert alert-danger">
                <a href="index.php" class="text-decoration-none text-white">
                    <button class="btn btn-danger">
                        <span class="bi bi-chevron-left"></span>
                    </button>
                    Detalhes do Produto - 
                    <strong><?=$prod['descricao']?></strong> 
                </a>
            </h2>

            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-8">
                    <div class="card">
                        <img 
                            src="images/<?=$prod['imagem']?>" 
                            alt="<?=$prod['descricao']?>" 
                            class="card-img-top"
                        />
                        <div class="card-body bg-churras-praia">
                            <h3 class="card-title text-dark">
                                <strong><i><?=$prod['descricao']?></i></strong>
                            </h3>
                            <p class="text-warning">
                                <strong><?=$prod['rotulo']?></strong>
                            </p>
                            <p class="card-text text-start text-dark">
                                <?=$prod['resumo']?>
                            </p>
                            <p class="h4 text-end text-dark">
                                <strong><?="R$ ".number_format($prod['valor'],2,',','.')?></strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
        <footer class="container ps-4 bg-dark text-white p-4 rounded-top" id="CONTATO">
            <a name="contato"></a>
            <?php include "rodape.php"?>
        </footer>
    </body>
</html>