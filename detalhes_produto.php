<?php 
    include_once "class/produto.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $produto = new Produto();
        $prod = $produto->buscarPorId($id);
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="La Brasa do Mar - Os melhores cortes e sabores direto da brasa para sua mesa.">
        <!-- Bootstrap Icons -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        />

        <!-- Bootstrap 5.3 local  - totalmente moderno e atualizado! -->
        <link rel="stylesheet" href="css/bootstrap.min.css" />

        <!-- CSS local (Nosso) -->
        <link rel="stylesheet" href="css/style.css" />

        <!-- Bootstrap JS com parametro defer, que permite a execução js após o carregamento DOM -->
        <script src="js/bootstrap.min.js" defer></script>
        <script src="js/bootstrap.bundle.min.js" defer></script>

        <title>La Brasa do Mar</title>
    </head>
    <body class="fundo-fixo">
        <header>
           <!-- área de menu  -->
        <?php include 'menu_publico.php';?> 
        </header>
        <main class="container">
            <h2 class="alert alert-danger">
                <a href="index.php" class="text-decoration-none">
                    <button class="btn btn-danger">
                        <span class="bi bi-chevron-left"></span>
                    </button>
                    Detalhes do Produto - 
                    <strong> <?$prod['descricao']?> </strong> 
                    
                </a>
            </h2>
           <div class="col-sm-6 col-md-4 mb-4">
            <div class="card">
                <img 
                    src="images/<?=$prod['imagem']?>" 
                    alt="<?=$prod['descricao']?>" 
                    class="card-img-top"
                    >
                    <div class="card-body bg-churras-praia">
                        <h3 class="card-title">
                            <strong><i><?=$prod['descricao']?></i></strong>
                        </h3>
                        <p class="text-warning"><strong><?=$prod['rotulo']?></strong></p>
                        <p class="card-text text-start">
                            <?=mb_strimwidth($prod['resumo'], 0,42,'...')?>
                        </p>
                        <button class="btn btn-default disabled" role="button" style="cursor: default;" >
                             <?="R$ ".number_format($prod['valor'],2,',','.')?>
                        </button>
                        <a href="detalhes_produto.php?id=<?=$prod['id']?>" class="btn btn-churras float-end">
                            <span class="d-none d-sm-inline">Saiba Mais</span>
                            <i class="bi bi-eye-fill"></i>
                        </a> 
                    </div>
            </div>
        </div>    
        </main>
        
        
    </body>
</html>