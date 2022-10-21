<!--Criando o arquivo de conxao.php inerindo o PHP nessa área do index-->
<?php
session_start();
// limpar o buffer de saída do redirecionamento
ob_start();
// Inserindo a conexão.php
include_once 'conexao.php';
include_once 'dashboard.php';
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


    <h1>Login</h1>

    <!--criando o método de receber os dados diferente de vazio usa-se !empty-->
    <?php
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
  
     if(!empty($dados['SendLogin'])){
     // var_dump($dados);
    $query_usuario = "SELECT id, nome, usuario, senha_usuario 
        FROM usuarios 
        WHERE usuario =:usuario
        LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->bindParam(':usuario', $dados['usuario'], PDO::PARAM_STR);
    $result_usuario->execute();
        //Informar se não encontrar usuário adicionando a session no início da página
        if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
            $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
            //var_dump($row_usuario);
            if(password_verify($dados['senha_usuario'], $row_usuario['senha_usuario'])){
                $_SESSION['id'] =  $row_usuario['id'];
                $_SESSION['nome'] =  $row_usuario['nome'];
                header("Location: dashboard.php");
                // echo "Usuário logado";
            }else{
                $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: Senha inválida!";     
            }
        }else{
            //inserir  a session no início da página e definir 
            $_SESSION['msg'] = "<p style='color: #ff0000'> Erro: Usuário ou Senha inválidos!";
        }
        // retirado da linha 28 WHERE usuario =  '". $dados['usuario']."'
    }
    // se existir essa variavel global, quero imprimir, depois que imprimir, destrua e não imprimir novamente
    if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>

    <?php
    //Criptografar senha de usuário e imprimir o código hash
    //
    //echo password_hash(123456, PASSWORD_DEFAULT);  ?>

    <!-- criando o formulário de Login e o formulário de login completo
    Definindo o method="POST" não enviar o formulário  se colocar "GET" envia pra URL-->
    <form method="POST" action="">
        <!--Criando o Título-->

        <!-- criando o campo de texto com nome do usuário-->
        <label>Usuário</label>
        <input type="text" name="usuario" placeholder="Digite o usuário"><br><br>
        <!-- criando o passwordxto com a senha do usuário-->
        <label>Senha</label>
        <input type="password" name="senha_usuario" placeholder="Digite a senha"><br><br>
        <!-- criando o botão de Acesso ou envio--> 
        <input type="submit" value="Acessar" name="SendLogin">

    </form>   
</body>
<hr>
<h4> Elaborado por: Iraê César Brandão - LuckWay Informática
</html>