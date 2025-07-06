<?php
include_once "../../conexao/db_connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $sql = "DELETE FROM faeterj_apoio_bairro WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

       
         header("Location: ../reads/read_bairros.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "Não localizado";
}
?>
