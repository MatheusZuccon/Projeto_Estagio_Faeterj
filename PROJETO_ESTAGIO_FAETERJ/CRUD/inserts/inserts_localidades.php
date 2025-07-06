<?php
include_once "../../conexao/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $bairro       = filter_input(INPUT_POST, 'bairro_desc', FILTER_SANITIZE_STRING);

    $municipio    = filter_input(INPUT_POST, 'municipio_desc', FILTER_SANITIZE_STRING);
   
    $uf           = filter_input(INPUT_POST, 'Serv_DescUF', FILTER_SANITIZE_STRING);

    try {
        $conn->beginTransaction();

        $stmt1 = $conn->prepare("INSERT INTO faeterj_apoio_bairro (bairro_desc) VALUES (:bairro_desc)");
        $stmt1->bindParam(':bairro_desc', $bairro);
        $stmt1->execute();

        $stmt2 = $conn->prepare("INSERT INTO faeterj_apoio_municipio (municipio_desc) VALUES (:municipio_desc)");
        $stmt2->bindParam(':municipio_desc', $municipio);
        $stmt2->execute();
        
        $stmt3 = $conn->prepare("INSERT INTO faeterj_apoio_uf (Serv_DescUF) VALUES (:Serv_DescUF)");
        $stmt3->bindParam(':Serv_DescUF', $uf);
        $stmt3->execute();
        
        $conn->commit();

         header("Location: ../../form_localidades.php");
    } catch (PDOException $e) {
        $conn->rollBack(); 
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
