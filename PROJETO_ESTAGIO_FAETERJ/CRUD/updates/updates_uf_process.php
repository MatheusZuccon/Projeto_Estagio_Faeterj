<?php
include_once "../../conexao/db_connect.php";

$id                         = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$Serv_DescUF                = filter_input(INPUT_POST, 'Serv_DescUF', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_uf
        SET Serv_DescUF = :Serv_DescUF
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':Serv_DescUF', $Serv_DescUF);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_uf.php");
} else {
    echo "Erro ao atualizar.";
}
?>
