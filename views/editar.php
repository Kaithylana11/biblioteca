<?php
// Inclui o arquivo de conexão com o banco de dados
require_once __DIR__ . '/../includes/db.php';

// Valida o ID recebido por GET para garantir que é um número inteiro
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    // Se o ID não for válido, redireciona para a página inicial
    header("Location: index.php");
    exit;
}

// Prepara a consulta SQL para buscar o livro no banco de dados com o ID fornecido
$stmt = $conn->prepare("SELECT * FROM livros WHERE id = ?");
$stmt->bind_param("i", $id);  // Vincula o ID à consulta
$stmt->execute();  // Executa a consulta
$resultado = $stmt->get_result();  // Obtém o resultado da consulta
$livro = $resultado->fetch_assoc();  // Obtém o livro como um array associativo

// Verifica se o livro foi encontrado no banco de dados
if (!$livro) {
    echo "Livro não encontrado.";  // Exibe mensagem de erro se o livro não for encontrado
    exit;  // Encerra o script
}

// Se o formulário for enviado via POST, processa os dados
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura os dados do formulário, se enviados
    $titulo = $_POST['titulo'] ?? '';
    $autor = $_POST['autor'] ?? '';
    $genero = $_POST['genero'] ?? '';
    $ano = $_POST['ano'] ?? '';

    // Prepara a consulta SQL para atualizar os dados do livro no banco de dados
    $update = $conn->prepare("UPDATE livros SET titulo = ?, autor = ?, genero = ?, ano = ? WHERE id = ?");
    $update->bind_param("sssii", $titulo, $autor, $genero, $ano, $id);  // Vincula os parâmetros à consulta
    $update->execute();  // Executa a consulta de atualização

    // Redireciona para a página principal após a atualização
    header("Location: ../index.php");
    exit;  // Encerra o script
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Livro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <!-- Link para voltar à página principal -->
        <a href="../index.php" class="btn-voltar">⬅ Voltar</a>

        <h1>✏️ Editar Livro</h1>

        <!-- Formulário para editar os dados do livro -->
        <form method="POST" class="adicionar-form">
            <!-- Campo para o título do livro -->
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" value="<?= htmlspecialchars($livro['titulo']) ?>" required>

            <!-- Campo para o nome do autor -->
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" value="<?= htmlspecialchars($livro['autor']) ?>" required>

            <!-- Campo para o gênero do livro -->
            <label for="genero">Gênero</label>
            <input type="text" name="genero" id="genero" value="<?= htmlspecialchars($livro['genero']) ?>">

            <!-- Campo para o ano de publicação -->
            <label for="ano">Ano</label>
            <input type="number" name="ano" id="ano" value="<?= htmlspecialchars($livro['ano']) ?>">

            <!-- Botão para enviar os dados e atualizar o livro -->
            <button type="submit">Atualizar</button>
        </form>
    </div>
</body>

</html>