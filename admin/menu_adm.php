<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php">
      <img src="../images/LogoLaBrasaDoMar.png" alt="Logo" height="30">
    </a>
 
    <!-- Botão toggle para mobile -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#defaultNavbar" aria-controls="defaultNavbar" aria-expanded="false" aria-label="Alternar navegação">
      <span class="navbar-toggler-icon"></span>
    </button>
 
    <!-- Menu -->
    <div class="collapse navbar-collapse" id="defaultNavbar">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <span class="btn btn-danger disabled me-2" style="cursor: default;">
            Olá, <?=($_SESSION['login_usuario'])?>!
          </span>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="index.php">ADMIN</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="produtos_lista.php">PRODUTOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tipos_lista.php">TIPOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="usuarios_lista.php">USUÁRIOS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <i class="bi bi-house"></i>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main class="container my-4">
  <h1 class="mb-4">Área Administrativa</h1>
  <div class="row g-4"><!-- g-4 = espaçamento entre colunas -->
 
    <!-- ADM PRODUTOS -->
    <div class="col-sm-6 col-md-4">
      <div class="card border-danger h-100 text-center">
        <div class="card-body">
          <img src="../images/icone_produtos.png" alt="Produtos" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-danger">PRODUTOS</h5>
          <div class="d-grid gap-2">
            <a href="produtos_lista.php" class="btn btn-danger">LISTAR</a>
            <a href="produtos_insere.php" class="btn btn-danger">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM PRODUTOS -->
 
    <!-- ADM TIPOS -->
    <div class="col-sm-6 col-md-4">
      <div class="card border-warning h-100 text-center">
        <div class="card-body">
          <img src="../images/icone_tipos.png" alt="Tipos" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-warning">TIPOS</h5>
          <div class="d-grid gap-2">
            <a href="tipos_lista.php" class="btn btn-warning">LISTAR</a>
            <a href="tipos_insere.php" class="btn btn-warning">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM TIPOS -->
 
    <!-- ADM USUÁRIOS -->
    <div class="col-sm-6 col-md-4">
      <div class="card border-info h-100 text-center">
        <div class="card-body">
          <img src="../images/icone_user.png" alt="Usuários" class="mb-3" style="max-height:80px;">
          <h5 class="card-title text-info">USUÁRIOS</h5>
          <div class="d-grid gap-2">
            <a href="usuarios_lista.php" class="btn btn-info">LISTAR</a>
            <a href="usuarios_insere.php" class="btn btn-info">INSERIR</a>
          </div>
        </div>
      </div>
    </div>
    <!-- fecha ADM USUÁRIOS -->
 
  </div><!-- fecha row -->
</main>