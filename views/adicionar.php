<?php
// Inclui o arquivo de conexão com o banco de dados
require_once __DIR__ . '/../includes/db.php';

// Verifica se o formulário foi enviado via POST (o que acontece quando o usuário clica em "Salvar")
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recebe os dados do formulário e remove espaços extras do começo e do fim dos campos
    $titulo = trim($_POST['titulo']);
    $autor = trim($_POST['autor']);
    $genero = trim($_POST['genero']);
    $ano = (int) $_POST['ano'];  // Converte o ano para um número inteiro

    // Prepara a instrução SQL para inserir o novo livro no banco de dados
    // A capa será automaticamente definida com o valor padrão no banco de dados
    $sql = "INSERT INTO livros (titulo, autor, genero, ano) VALUES (?, ?, ?, ?)";

    // Prepara a consulta com os dados do formulário
    $stmt = $conn->prepare($sql);

    // Vincula as variáveis aos parâmetros da consulta
    $stmt->bind_param("sssi", $titulo, $autor, $genero, $ano);

    // Executa a consulta para inserir os dados no banco de dados
    $stmt->execute();

    // Após a inserção, redireciona o usuário de volta para a página principal
    header("Location: ../index.php");
    exit;  // Encerra o script após o redirecionamento
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <div class="container">
        <!-- Link para voltar à página inicial -->
        <a href="../index.php" class="btn-voltar">⬅ Voltar</a>

        <h1>📚 Adicionar Livro</h1>

        <!-- Formulário para adicionar um novo livro -->
        <form method="POST" class="adicionar-form">
            <!-- Campo para o título do livro -->
            <label for="titulo">Título</label>
            <input type="text" name="titulo" id="titulo" required>

            <!-- Campo para o nome do autor -->
            <label for="autor">Autor</label>
            <input type="text" name="autor" id="autor" required>

            <!-- Campo para o gênero do livro -->
            <label for="genero">Gênero</label>
            <input type="text" name="genero" id="genero" required>

            <!-- Campo para o ano de publicação -->
            <label for="ano">Ano</label>
            <input type="number" name="ano" id="ano" required>

            <!-- Botão para enviar os dados e salvar o livro -->
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>

</html>