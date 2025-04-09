<?php
// Conecta com o banco de dados
require_once __DIR__ . '/includes/db.php';

// Pega o valor da busca (se existir na URL)
$busca = isset($_GET['busca']) ? $_GET['busca'] : '';

// Se o campo de busca não estiver vazio, realiza a busca no banco de dados
if (!empty($busca)) {
    // Consulta SQL para buscar livros que correspondem ao termo de busca em título, autor ou gênero
    $sql = "SELECT * FROM livros 
            WHERE titulo LIKE ? 
               OR autor LIKE ? 
               OR genero LIKE ? 
            ORDER BY titulo ASC";
    $stmt = $conn->prepare($sql);
    $like = "%$busca%";  // Adiciona o símbolo % para busca parcial
    $stmt->bind_param("sss", $like, $like, $like);  // Vincula os parâmetros da consulta
} else {
    // Caso a busca esteja vazia, exibe todos os livros ordenados por título
    $sql = "SELECT * FROM livros ORDER BY titulo ASC";
    $stmt = $conn->prepare($sql);
}

// Executa a consulta
$stmt->execute();
// Obtém o resultado da consulta
$result = $stmt->get_result();
// Organiza os resultados como um array associativo
$livros = $result->fetch_all(MYSQLI_ASSOC);

// Caminho para a imagem padrão (caso não haja capa do livro)
$capa_padrao = "assets/img/default.jpg";
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Livros</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h1>📚 Cadastro de Livros</h1>

        <!-- Formulário de busca -->
        <form method="GET" action="" class="search-form">
            <input type="text" name="busca" placeholder="Buscar livros..." value="<?= htmlspecialchars($busca) ?>">
            <button type="submit">🔍 Buscar</button>
            <a class="button" href="index.php">Limpar</a> <!-- Link para limpar o campo de busca -->
        </form>

        <!-- Botão para adicionar um novo livro -->
        <a href="views/adicionar.php" class="btn-adicionar">+ Adicionar Livro</a>

        <?php if (count($livros) > 0): ?>
            <!-- Exibe a tabela de livros se houver resultados -->
            <table>
                <thead>
                    <tr>
                        <th>Capa</th>
                        <th>Título</th>
                        <th>Autor</th>
                        <th>Gênero</th>
                        <th>Ano</th>
                        <th class="acoes">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($livros as $livro): ?>
                        <?php
                        // Verifica se o livro tem uma capa personalizada
                        $temCapa = isset($livro['capa_url']) && trim($livro['capa_url']) !== '';
                        // Se não tiver, usa a capa padrão
                        $caminhoCapa = $temCapa ? $livro['capa_url'] : $capa_padrao;
                        ?>
                        <tr>
                            <td class="capa-cell">
                                <!-- Exibe a capa do livro, caso haja erro na imagem, usa a capa padrão -->
                                <img src="<?= htmlspecialchars($caminhoCapa) ?>"
                                    alt="Capa"
                                    class="livro-capa"
                                    onerror="this.onerror=null;this.src='<?= $capa_padrao ?>';">
                            </td>
                            <td><?= htmlspecialchars($livro['titulo']) ?></td>
                            <td><?= htmlspecialchars($livro['autor']) ?></td>
                            <td><?= htmlspecialchars($livro['genero']) ?></td>
                            <td><?= htmlspecialchars($livro['ano']) ?></td>
                            <td class="acoes">
                                <!-- Links para editar e excluir o livro -->
                                <a href="views/editar.php?id=<?= $livro['id'] ?>">✏️</a>
                                <a href="views/excluir.php?id=<?= $livro['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir este livro?')">🗑️</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Nenhum livro encontrado.</p> <!-- Exibe mensagem caso não haja livros encontrados -->
        <?php endif; ?>
    </div>
</body>

</html>