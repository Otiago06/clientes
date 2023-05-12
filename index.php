<?php
include 'conexao.php';

// Selecionar todos os registros da tabela
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
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
    <?php echo date("d/m/Y H:i:s"); ?>
    <?php
      if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
      }
    ?>
    <h2>Lista de <?php echo $modulo; ?></h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Gênero</th>
            <th>Data de Nascimento</th>
            <th>CPF</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Observações</th>
            <th>Referência</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Exibir os registros na tabela
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["nome"] . '</td>';
                if($row["genero"] == '1'){
                    echo '<td>Masculino</td>';
                } else {
                    if($row["genero"] == '2'){
                        echo '<td>Feminino</td>';
                    } else {
                        echo '<td>Não informado</td>';
                    }
                }                
                echo '<td>' . date("d/m/Y", strtotime($row["data_nasc"])) . '</td>';
                echo '<td>' . $row["cpf"] . '</td>';
                echo '<td>' . $row["telefone"] . '</td>';
                echo '<td>' . $row["celular"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["observacoes"] . '</td>';
                echo '<td>' . $row["referencia"] . '</td>';
                echo "<td>" . date("d/m/Y H:i:s", strtotime($row["data_cadastro"])). "</td>";
                echo "<td>
                        <a href='editar.php?id=" . $row["id"] . "'>Editar</a> |
                        <a href='excluir.php?id=" . $row["id"] . "'>Excluir</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>Nenhum registro encontrado.</td></tr>";
        }
        ?>
    </table>
    <br>
    <a href="adicionar.php">Adicionar Novo</a>
</body>
</html>
