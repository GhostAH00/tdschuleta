<?php 
require_once "../class/usuario.php";
if($_POST){
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $user = new Usuario();
  $usuarioLogado = $user->efetuarLogin($login,$senha);

  if(count( $usuarioLogado ) > 0){
    if(!isset($_SESSION[''])){
      session_name('labrasa');
      session_start();
    }
    $_SESSION['login_usuario'] = $usuarioLogado['login'];
    $_SESSION['nivel_usuario'] = $usuarioLogado['nivel'];
    $_SESSION['nome_da_sessao'] = session_name();

    if($usuarioLogado['nivel']=="adm"){
      echo"<script>window.open('index.php','_self')</script>";
    }
}
exit;

}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="La Brasa do Mar - Os melhores cortes e sabores direto da brasa para sua mesa."
    />
    <meta http-equiv="refresh" content="30;url=../index.php" />
    
    <title>Login - La Brasa do Mar</title>
    <!-- Bootstrap Icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    />

    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="../css/style.css" />

    <script src="../js/bootstrap.min.js" defer></script>
    <script src="../js/bootstrap.bundle.min.js" defer></script>
  </head>
  
  <body>
    <main class="container my-5">
      <section>
        <article>
          <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
              <h1 class="text-danger text-center mb-4">Faça seu login</h1>
              
              <div class="card shadow-lg">
                <div class="card-body">
                  <p class="text-warning text-center mb-4" role="alert">
                    <i class="bi bi-people-fill display-1"></i>
                  </p>
                  
                  <form
                    action="login.php"
                    name="form_login"
                    id="form_login"
                    method="POST"
                  >
                    <div class="mb-3">
                      <label for="login" class="form-label">Login:</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-person-fill text-warning"></i>
                        </span>
                        <input
                          type="text"
                          name="login"
                          id="login"
                          class="form-control"
                          placeholder="Digite seu login"
                          autofocus
                          required
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="mb-3">
                      <label for="senha" class="form-label">Senha:</label>
                      <div class="input-group">
                        <span class="input-group-text">
                          <i class="bi bi-lock-fill text-warning"></i>
                        </span>
                        <input
                          type="password"
                          name="senha"
                          id="senha"
                          class="form-control"
                          placeholder="Digite sua senha"
                          required
                          autocomplete="off"
                        />
                      </div>
                    </div>

                    <div class="d-grid">
                      <button type="submit" class="btn btn-danger">Entrar</button>
                    </div>
                  </form>
                  
                  <p class="text-center mt-3">
                    <small>
                      Caso não faça uma escolha em 30 segundos, você será
                      redirecionado automaticamente para a página inicial.
                    </small>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </article>
      </section>
    </main>
  </body>
</html>