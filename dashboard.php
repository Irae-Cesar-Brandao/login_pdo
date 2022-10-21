<!--Criando o arquivo de conxao.php inerindo o PHP nessa área do index-->
<?php
session_start();
// limpar o buffer de saída do redirecionamento
ob_start();
// Inserindo a conexão.php
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">

    <!-- Criando o ícone da página que figura na parte do denereçamento-->
    <link rel="shortcut icon" href="images/favicon.ico" image="image/x-ico">
    <title>Formulario Login-PDO</title>
</head>
<body>
    <h1>BEM  VINDO!</h1>


</body>
</html>