<?php
// Definir as informações de local
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

session_start();

// Definir as informações de conexão com o banco de dados
$servername = "localhost"; // Endereço do servidor do MySQL (geralmente é localhost)
$username = "root"; // Nome de usuário do MySQL
$password = ""; // Senha do MySQL
$dbname = "cad_clientes"; // Nome do banco de dados

// Criar a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar se houve algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

$title = "Cadastro de Clientes";
$modulo = "Clientes";
?>
