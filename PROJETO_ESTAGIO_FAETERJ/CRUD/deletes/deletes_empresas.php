<?php
include_once "../../conexao/db_connect.php";

if (isset($_GET['empresa'])) {
    $empresa = $_GET['empresa'];

    try {
        $sql = "DELETE FROM faeterj_apoio_empresa WHERE empresa = :empresa";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->execute();

       
         header("Location: ../reads/read_empresas.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "Empresa não fornecida.";
}
?>
