<?php
include_once "../../conexao/db_connect.php";

$id                       = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$tipo_convenio            = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_convenio
        SET tipo = :tipo
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':tipo', $tipo_convenio);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_convenio.php");
} else {
    echo "Erro ao atualizar.";
}
?>
