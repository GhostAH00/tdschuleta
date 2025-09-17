<?php 
include "class/produto.php"; 
$produto = new Produto();
$produtos = $produto->listar(1); // 1 - retorna apenas o produto em destaque / vazio - retorna todos
$linhas = count($produtos);

?>

<section class="mt-5">    
    <!-- Mostrar se a consulta retorna vazio -->
    <?php if ($linhas == 0) { ?>
        <h2 class="alert alert-danger"> Não há produtos em destaque </h2>
    <?php }?>
    <?php if ($linhas > 0) { ?>   
    <h2 class="alert alert-produtos">Destaques</h2>
    <div class="row">
        <?php  foreach ($produtos as $prod):?>
        <!-- Card produto -->
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
        <!-- final card produto -->
         <?php endforeach;?>
    </div> <!-- final do row -->
    <?php }?>
</section>