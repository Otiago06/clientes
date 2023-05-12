<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    // $id
    $nome = trim(ucfirst($_POST["nome"]));
    $genero = trim($_POST["genero"]);
    $data_nasc = trim($_POST["data_nasc"]);
    $cpf = trim($_POST["cpf"]);
    $telefone = trim($_POST["telefone"]);
    $celular = trim($_POST["celular"]);
    $email = trim(strtolower($_POST["email"]));
    $observacoes = trim($_POST["observacoes"]);
    $referencia = trim(ucfirst($_POST["referencia"]));
    // $data_cadastro

    // Inserir os dados na tabela usuarios
    $sql = "INSERT INTO clientes (nome, genero, data_nasc, cpf, telefone, celular, email, observacoes, referencia) VALUES ('$nome', '$genero', '$data_nasc', '$cpf', '$telefone', '$celular', '$email', '$observacoes', '$referencia')";
    
    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página inicial após a inserção
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao adicionar registro: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>
<body>
    <h2>Adicionar <?php echo $modulo; ?></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" required>
        <option value="1">Masculino</option>
        <option value="2">Feminino</option>
        <option value="0" selected>Não Informado</option>
        </select><br><br>

        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone"><br><br>

        <label for="celular">Celular:</label>
        <input type="tel" id="celular" name="celular" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="observacoes">Observações:</label><br>
        <textarea id="observacoes" name="observacoes" rows="4" cols="50"></textarea><br><br>

        <label for="referencia">Referência:</label>
        <input type="text" id="referencia" name="referencia"><br><br>

        <input type="submit" value="Adicionar">
        &nbsp;
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>