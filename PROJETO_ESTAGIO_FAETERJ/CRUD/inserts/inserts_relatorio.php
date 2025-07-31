<?php
session_start();
include_once "../../conexao/db_connect.php";

// Dados vindos do formulário
$aluno_matricula     = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
$empresa             = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
$data_inicio         = filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_NUMBER_INT);
$data_final          = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_NUMBER_INT);
$data_entrega        = filter_input(INPUT_POST, 'data_entrega', FILTER_SANITIZE_NUMBER_INT);
$horas_relatadas     = filter_input(INPUT_POST, 'horas_relatadas', FILTER_SANITIZE_NUMBER_INT);
$n_relatorio         = filter_input(INPUT_POST, 'n_relatorio', FILTER_SANITIZE_STRING);
$parecer_tecnico     = filter_input(INPUT_POST, 'parecer_tecnico', FILTER_SANITIZE_STRING);
$relatorio           = filter_input(INPUT_POST, 'relatorio', FILTER_SANITIZE_STRING);

try {
    $conn->beginTransaction();

    $insert = "INSERT INTO relatorio_est (
        aluno_matricula,
        empresa,
        data_inicio,
        data_final,
        data_entrega,
        horas_relatadas,
        n_relatorio,
        parecer_tecnico,
        relatorio
    ) VALUES (
        :aluno_matricula,
        :empresa,
        :data_inicio,
        :data_final,
        :data_entrega,
        :horas_relatadas,
        :n_relatorio,
        :parecer_tecnico,
        :relatorio
    )";

    $stmt = $conn->prepare($insert);
    $stmt->bindParam(':aluno_matricula', $aluno_matricula);
    $stmt->bindParam(':empresa', $empresa);
    $stmt->bindParam(':data_inicio', $data_inicio);
    $stmt->bindParam(':data_final', $data_final);
    $stmt->bindParam(':data_entrega', $data_entrega);
    $stmt->bindParam(':horas_relatadas', $horas_relatadas);
    $stmt->bindParam(':n_relatorio', $n_relatorio);
    $stmt->bindParam(':parecer_tecnico', $parecer_tecnico);
    $stmt->bindParam(':relatorio', $relatorio);

    $stmt->execute();
    $conn->commit();

    header("Location: ../../form_relatorio.php");
    exit;
} catch (PDOException $e) {
    $conn->rollBack();
    $_SESSION['msg'] = "Erro ao salvar relatório: " . $e->getMessage();
    header("Location: ../../form_relatorio.php");
    exit;
}
