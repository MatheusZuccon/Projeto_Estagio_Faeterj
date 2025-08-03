<?php
include_once "../../conexao/db_connect.php";

$aluno_matricula = filter_input(INPUT_GET, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);

if ($aluno_matricula) {
    try {
        $sql = "DELETE FROM tce WHERE aluno_matricula = :aluno_matricula";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':aluno_matricula', $aluno_matricula, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: ../reads/read_tce.php");
        exit;

    } catch (PDOException $e) {
        echo "Erro ao excluir registro: " . $e->getMessage();
    }
} else {
    echo "Matrícula inválida ou não fornecida.";
}
?>
