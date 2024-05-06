<?php 
//session_start();

// É preciso validar de a sessão do usuário existe para poder entrar em painel.php, porque se não fizer isso é possível acessar painel.php mesmo sem autenticar login, e isso não está correto em termos de segurança

//Função que verifica se tem alguma sessão ativa, se tiver, acessa painel.php
//A constante PHP_SESSION_NONE representa o status "Nenhuma sessão ativa". Se isso for 'true' (a sessão não estiver ativa), vai iniciá-la, se já tiver, percorre o código normalmente.
if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!$_SESSION['usuario']) {
    header('Location: index.php');
    exit();
}