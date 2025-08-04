<?php
include_once "../../conexao/db_connect.php";

if (isset($_GET['aluno_matricula'])) {
    $aluno_matricula = $_GET['aluno_matricula'];

    try {
        $sql = "DELETE FROM ta WHERE aluno_matricula = :aluno_matricula";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':aluno_matricula', $aluno_matricula);
        $stmt->execute();

       
         header("Location: ../reads/read_aditivos.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "Matrícula não fornecida.";
}
?>
