<?php

define('HOST', '127.0.0.1');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'login');

//conexao com banco de dados:
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die("Falha na conexão, não foi possível conectar");

