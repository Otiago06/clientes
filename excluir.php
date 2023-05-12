<?php
include 'conexao.php';

// Obter o ID do usuário a ser excluído
$id = $_GET["id"] ?? 0;

// Excluir o registro do usuário com base no ID
$sql = "DELETE FROM clientes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = "<p><strong>Registro excluído com sucesso!</strong></p>";
    // Redirecionar para a página inicial após a exclusão
    header("Location: index.php");
    exit;
} else {
    $_SESSION['msg'] = "<p><strong>Não foi possível excluir o registro!</strong></p>" . $conn->error;
    header("Location: editar.php?id=".$id);
    exit;
    // echo "Erro ao excluir usuário: " . $conn->error;
}
?>