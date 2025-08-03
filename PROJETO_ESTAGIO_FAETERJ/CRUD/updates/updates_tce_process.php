<?php
include_once "../../conexao/db_connect.php";


$aluno_matricula            = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
$numero_tce                 = filter_input(INPUT_POST, 'numero_tce', FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE tce
        SET 
            numero_tce = :numero_tce
        WHERE aluno_matricula = :aluno_matricula";

$update = $conn->prepare($sql);
$update->bindParam(':numero_tce', $numero_tce);
$update->bindParam(':aluno_matricula', $aluno_matricula);

if ($update->execute()) {
     header("Location: ../reads/read_tce.php");
} else {
    echo "Erro ao atualizar.";
}
?>
