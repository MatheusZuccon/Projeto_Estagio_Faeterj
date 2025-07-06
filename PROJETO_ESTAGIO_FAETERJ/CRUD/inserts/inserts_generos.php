<?php
include_once "../../conexao/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $genero_tipo   = filter_input(INPUT_POST, 'genero_tipo', FILTER_SANITIZE_STRING);
    $genero_obs    = filter_input(INPUT_POST, 'genero_obs', FILTER_SANITIZE_STRING);

    try {
        $conn->beginTransaction();

        $stmt1 = $conn->prepare("INSERT INTO faeterj_apoio_genero (genero_tipo, genero_obs) VALUES (:genero_tipo, :genero_obs)");
        $stmt1->bindParam(':genero_tipo', $genero_tipo);
        $stmt1->bindParam(':genero_obs', $genero_obs);
        $stmt1->execute();

        $conn->commit();

         header("Location: ../../form_generos.php");
    } catch (PDOException $e) {
        $conn->rollBack(); 
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
