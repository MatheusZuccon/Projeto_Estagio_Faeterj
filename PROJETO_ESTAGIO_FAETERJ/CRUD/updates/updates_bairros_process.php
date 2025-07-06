<?php
include_once "../../conexao/db_connect.php";

$id                 = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$bairro_desc             = filter_input(INPUT_POST, 'bairro_desc', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_bairro
        SET bairro_desc = :bairro_desc
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':bairro_desc', $bairro_desc);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_bairros.php");
} else {
    echo "Erro ao atualizar.";
}
?>
