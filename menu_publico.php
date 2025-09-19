<?php 
    include_once "class/db.php";
    $pdo = getConnection();
    $tipo_lista = $pdo->query("select * from tipos");
    $tipos = $tipo_lista->fetchAll();
?>
 
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">
        <img
            src="images/LogoLaBrasaDoMar.png"
            alt="logotipo La Brasa do Mar"
            width="140px"
        />
        </a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menupublico"
            aria-controls="menupublico"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menupublico">
        <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">
            <a href="index.php" class="nav-link active" aria-current="page">
                <i class="bi bi-house-door-fill"></i> 
            </a> 
            </li>
            <li class="nav-item">
                <a href="index.php#destaques" class="nav-link">DESTAQUES</a>
            </li>
            <li class="nav-item">
                <a href="produtos_geral.php" class="nav-link">PRODUTOS</a>
            </li>
            <li class="nav-item dropdown">
            <a href="#"
                class="nav-link dropdown-toggle"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
                >
                TIPOS
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <?php foreach ($tipos as $tipo): ?> 
                <li><a href="produtos_por_tipo.php?tipo_id=<?=$tipo['id']?>" class="dropdown-item"><?=$tipo['rotulo']?></a></li>
                <?php endforeach; ?>
            </ul>
            </li>
            <li class="nav-item">
                <a href="contato.html" class="nav-link">CONTATO</a>
            </li>
            
            <li class="nav-item">
                <form class="d-flex" role="search" method="get" action="produtos_busca.php">
                <input type="search" name="buscar" class="form-control me-2" placeholder="Buscar Produto" aria-label="Search" required/>
                <button class="btn btn-outline-danger">
                <i class="bi bi-search"></i>
                </button>
            </form>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link d-flex">
                    <i class="bi bi-person-fill"></i> ADMIN/CLIENTE
                </a>
            </li>
            
        </ul>
        </div> 
    </div>
</nav>