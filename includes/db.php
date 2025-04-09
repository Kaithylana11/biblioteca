<?php
// Dados de conexão com o banco de dados
$host = 'localhost';     // Endereço do servidor MySQL
$user = 'root';          // Nome de usuário do MySQL
$pass = '';              // Senha do MySQL
$dbname = 'livros_crud'; // Nome do banco de dados que será utilizado

// Cria uma nova conexão com o MySQL usando a extensão mysqli
$conn = new mysqli($host, $user, $pass, $dbname);

// Verifica se houve erro na conexão
if ($conn->connect_error) {
    // Encerra o script e exibe a mensagem de erro
    die("Conexão falhou: " . $conn->connect_error);
}
