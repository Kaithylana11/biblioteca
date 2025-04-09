<?php
// Inclui o arquivo de conexão com o banco de dados
require_once __DIR__ . '/../includes/db.php';

// Valida o ID recebido pela URL, garantindo que é um número inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// Se o ID não for válido, redireciona para a página inicial
if (!$id) {
    header("Location: index.php");
    exit;
}

// Prepara a consulta SQL para excluir o livro com o ID fornecido
$stmt = $conn->prepare("DELETE FROM livros WHERE id = ?");
$stmt->bind_param("i", $id);  // Vincula o ID à consulta
$stmt->execute();  // Executa a consulta para excluir o livro

// Após a exclusão, redireciona o usuário para a página principal
header("Location: ../index.php");
exit;  // Encerra o script após o redirecionamento
