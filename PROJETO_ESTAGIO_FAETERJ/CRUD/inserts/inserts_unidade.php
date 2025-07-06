<?php
include_once "../../conexao/db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome_unidade   = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

    $curso          = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $sigla          = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);
    $curso_desc     = filter_input(INPUT_POST, 'curso_desc', FILTER_SANITIZE_STRING);

    try {
        $conn->beginTransaction();

        $stmt1 = $conn->prepare("INSERT INTO faeterj_apoio_unidades (nome) VALUES (:nome)");
        $stmt1->bindParam(':nome', $nome_unidade);
        $stmt1->execute();

        $stmt2 = $conn->prepare("INSERT INTO faeterj_apoio_curso (curso, sigla, curso_desc) VALUES (:curso, :sigla, :descricao)");
        $stmt2->bindParam(':curso', $curso);
        $stmt2->bindParam(':sigla', $sigla);
        $stmt2->bindParam(':descricao', $curso_desc);
        $stmt2->execute();
        
        $conn->commit();

         header("Location: ../../form_unidades.php");
    } catch (PDOException $e) {
        $conn->rollBack(); 
        echo "Erro ao inserir dados: " . $e->getMessage();
    }
}
?>
