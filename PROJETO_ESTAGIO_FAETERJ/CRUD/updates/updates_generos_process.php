<?php
include_once "../../conexao/db_connect.php";

$id                      = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$genero_tipo             = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$genero_obs              = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_genero
        SET genero_tipo = :genero_tipo, 
            genero_obs = :genero_obs
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':genero_tipo', $genero_tipo);
$update->bindParam(':genero_obs', $genero_obs);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_generos.php");
} else {
    echo "Erro ao atualizar.";
}
