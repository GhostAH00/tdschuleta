<?php 

session_name('labrasa');
session_start();
?>

<h1> Area Exclusiva do Cliente </h1>
<h2> Área e exclusiva de <?=$_SESSION['login_usuario']?></h2>

<a href="../admin/logout.php" class="btn"></a>