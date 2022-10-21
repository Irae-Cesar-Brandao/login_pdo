<?php
$host = "dbservices"; //utilizando xampp é "localhost"
$user = "root";
$pass = "root";
$dbname = "formulario_login_pdo";
//$port = 3306; so no xampp no localhost

try{
//conexão com a porta
   // $conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
//conexão sem a porta
       $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    echo "conexão com banco de dados realizada com sucesso!";
}catch(PDOException $err){
   // echo "Erro: Conexão com banco de dados não realizada com sucesso!. Erro gerado" . $err->getMessage();
}

