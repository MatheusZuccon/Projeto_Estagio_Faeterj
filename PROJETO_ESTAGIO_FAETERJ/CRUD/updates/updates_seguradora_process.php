<?php
include_once "../../conexao/db_connect.php";

$id               = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome             = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_seguradora
        SET nome = :nome
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':nome', $nome);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_seguradora.php");
} else {
    echo "Erro ao atualizar.";
}
?>
