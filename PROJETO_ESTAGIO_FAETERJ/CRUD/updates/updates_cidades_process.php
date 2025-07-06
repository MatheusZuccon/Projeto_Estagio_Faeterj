<?php
include_once "../../conexao/db_connect.php";

$id                         = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$municipio_desc             = filter_input(INPUT_POST, 'municipio_desc', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_municipio
        SET municipio_desc = :municipio_desc
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':municipio_desc', $municipio_desc);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_cidades.php");
} else {
    echo "Erro ao atualizar.";
}
?>
