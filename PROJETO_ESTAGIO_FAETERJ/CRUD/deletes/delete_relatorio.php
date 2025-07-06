<?php
include_once "../../conexao/db_connect.php";

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];

    try {
        $sql = "DELETE FROM relatorio_est WHERE matricula = :matricula";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();

       
         header("Location: ../reads/read_relatorio.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "Matrícula não fornecida.";
}
?>
