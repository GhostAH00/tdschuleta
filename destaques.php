<?php 
include_once "class/produto.php";
$produto = new Produto();
$produtos = $produto->listar(1); // 1 - retorna apenas os produtos em destaque
$linhas = count($produtos);
?>

<section>
    <h2 class="alert alert-produtos">Destaques</h2>

    <?php if($linhas == 0){ ?>
        <p class="alert alert-danger">Não há produtos em destaque.</p>
    <?php }?>

    <?php if($linhas > 0){?>
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
                        <h3 class="card-title">
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
        </div> <?php }?>
</section>