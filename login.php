<?php
session_start();
include('conexao.php');

//Verificação simples para impedir que o formulário seja submetido sem dados

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
}
// Se o campo usuario que está sendo enviado pelo método post e o campo senha que também está sendo enviado pelo método post estiverem vazios redirecione 

// Essa validação protege contra sql injections contra o login
$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

//Criação da query no mySQL que vai verificar se o login está correto ou nao
$query = "SELECT usuario_id, usuario FROM usuario WHERE usuario = '{$usuario}' AND senha = MD5('{$senha}')";

$result = mysqli_query($conexao, $query); //solicitação sendo executada pelo banco de dados

$linha = mysqli_num_rows($result);

if($linha == 1) {
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
} else {
    $_SESSION['nao_autenticado'] = true;
    header('Location: index.php');
    exit();

    
}