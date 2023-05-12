<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $id = $_POST["id"];
    $nome = trim(ucfirst($_POST["nome"]));
    $genero = trim($_POST["genero"]);
    $data_nasc = trim($_POST["data_nasc"]);
    $cpf = trim($_POST["cpf"]);
    $telefone = trim($_POST["telefone"]);
    $celular = trim($_POST["celular"]);
    $email = trim(strtolower($_POST["email"]));
    $observacoes = trim($_POST["observacoes"]);
    $referencia = trim(ucfirst($_POST["referencia"]));

    // Atualizar os dados na tabela usuarios
    $sql = "UPDATE clientes SET nome='$nome', genero='$genero', data_nasc='$data_nasc', cpf='$cpf', telefone='$telefone', celular='$celular', email='$email', observacoes='$observacoes', referencia='$referencia' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        // Redirecionar para a página inicial após a atualização
        header("Location: index.php");
        exit;
    } else {
        echo "Erro ao atualizar registro: " . $conn->error;
    }
} else {
    // Obter o ID do usuário a ser editado
    $id = $_GET["id"];

    // Selecionar o registro do usuário com base no ID
    $sql = "SELECT * FROM clientes WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Exibir o formulário de edição com os dados do usuário
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $genero = $row["genero"];
        $data_nasc = $row["data_nasc"];
        $cpf = $row["cpf"];
        $telefone = $row["telefone"];
        $celular = $row["celular"];
        $email = $row["email"];
        $observacoes = $row["observacoes"];
        $referencia = $row["referencia"];
        $data_cadastro = $row["data_cadastro"];
    } else {
        // Se o ID não existir, redirecionar para a página inicial
        header("Location: index.php");
        exit;
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
    <h2>Editar <?php echo $modulo; ?></h2>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>

        <label for="genero">Gênero:</label>
        <select id="genero" name="genero" required>
            <option value="1" <?php echo $genero === '1' ? 'selected' :  ''; ?>>Masculino</option>
            <option value="2" <?php echo $genero === '2' ? 'selected' :  ''; ?>>Feminino</option>
            <option value="0" <?php echo $genero === '0' ? 'selected' :  ''; ?>>Não Informado</option>            
        </select><br><br>
        <?php echo $genero; ?>
        <label for="data_nasc">Data de Nascimento:</label>
        <input type="date" id="data_nasc" name="data_nasc" value="<?php echo $data_nasc; ?>" required><br><br>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo $cpf; ?>" required><br><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" value="<?php echo $telefone; ?>"><br><br>

        <label for="celular">Celular:</label>
        <input type="tel" id="celular" name="celular" value="<?php echo $celular; ?>" required><br><br>

        <label>Email:</label>
        <input type="text" name="email" value="<?php echo $email; ?>"><br><br>

        <label for="observacoes">Observações:</label><br>
        <textarea id="observacoes" name="observacoes" rows="4" cols="50"><?php echo $observacoes; ?></textarea><br><br>

        <label for="referencia">Referência:</label>
        <input type="text" id="referencia" name="referencia" value="<?php echo $referencia; ?>"><br><br>
        <input type="submit" value="Atualizar">
        &nbsp;
        <a href="index.php">Cancelar</a><br><br>
        <em>Cadastrado em: <?php echo date("d/m/Y H:i:s", strtotime($data_cadastro)); ?></em>
    </form>
</body>
</html>