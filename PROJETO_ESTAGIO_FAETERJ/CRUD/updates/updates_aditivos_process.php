<?php
include_once "../../conexao/db_connect.php";

$aluno_matricula                      = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
$novo_termino_estagio                 = filter_input(INPUT_POST, 'novo_termino_estagio', FILTER_SANITIZE_NUMBER_INT);

$sql = "UPDATE ta
        SET novo_termino_estagio = :novo_termino_estagio
        WHERE aluno_matricula = :aluno_matricula";

$update = $conn->prepare($sql);
$update->bindParam(':novo_termino_estagio', $novo_termino_estagio);
$update->bindParam(':aluno_matricula', $aluno_matricula);

if ($update->execute()) {
     header("Location: ../reads/read_aditivos.php");
} else {
    echo "Erro ao atualizar.";
}
?>
