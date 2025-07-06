<?php
include_once "../../conexao/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_seguradora       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $tipo_convenio         = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
   
    try {
        $conn->beginTransaction();

        $stmt1 = $conn->prepare("INSERT INTO faeterj_apoio_seguradora (nome) VALUES (:nome)");
        $stmt1->bindParam(':nome', $nome_seguradora);
        $stmt1->execute();

       
        $stmt2 = $conn->prepare("INSERT INTO faeterj_apoio_convenio (tipo) VALUES (:tipo)");
        $stmt2->bindParam(':tipo', $tipo_convenio);
        $stmt2->execute();
        
        $conn->commit();

         header("Location: ../../form_seguradora.php");
    } catch (PDOException $e) {
        $conn->rollBack(); 
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
