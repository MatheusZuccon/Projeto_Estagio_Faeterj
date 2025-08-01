<?php
include_once "../../conexao/db_connect.php";


$aluno_matricula            = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
$data_inicio          = filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_NUMBER_INT);
$data_final           = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_NUMBER_INT);
$data_entrega         = filter_input(INPUT_POST, 'data_entrega', FILTER_SANITIZE_NUMBER_INT);
$horas_relatadas      = filter_input(INPUT_POST, 'horas_relatadas', FILTER_SANITIZE_NUMBER_INT);
$n_relatorio          = filter_input(INPUT_POST, 'n_relatorio', FILTER_SANITIZE_STRING);
$parecer_tecnico      = filter_input(INPUT_POST, 'parecer_tecnico', FILTER_SANITIZE_STRING);
$relatorio            = filter_input(INPUT_POST, 'relatorio', FILTER_SANITIZE_STRING);

$sql = "UPDATE relatorio_est
        SET data_inicio = :data_inicio,
            data_final = :data_final,
            data_entrega = :data_entrega,
            horas_relatadas = :horas_relatadas,
            n_relatorio = :n_relatorio,
            parecer_tecnico = :parecer_tecnico,
            relatorio = :relatorio
        WHERE aluno_matricula = :aluno_matricula";

$update = $conn->prepare($sql);
$update->bindParam(':data_inicio', $data_inicio);
$update->bindParam(':data_final', $data_final);
$update->bindParam(':data_entrega', $data_entrega);
$update->bindParam(':horas_relatadas', $horas_relatadas);
$update->bindParam(':n_relatorio', $n_relatorio);
$update->bindParam(':parecer_tecnico', $parecer_tecnico);
$update->bindParam(':relatorio', $relatorio);
$update->bindParam(':aluno_matricula', $aluno_matricula);

if ($update->execute()) {
     header("Location: ../reads/read_relatorio.php");
} else {
    echo "Erro ao atualizar.";
}
?>
