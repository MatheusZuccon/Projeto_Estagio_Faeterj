<?php
include_once "../../conexao/db_connect.php";

    // Criação das variáveis
    $empresa                  = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $nome_fantasia            = filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING);
    $area_profissional        = filter_input(INPUT_POST, 'area_profissional', FILTER_SANITIZE_STRING);
    $situacao                 = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
    $vencimento               = filter_input(INPUT_POST, 'vencimento', FILTER_SANITIZE_NUMBER_INT);
    $telefone_fixo            = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
    $cidade                   = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_empresa
        SET empresa              = :empresa, 
            nome_fantasia        = :nome_fantasia, 
            area_profissional    = :area_profissional,
            situacao             = :situacao,
            vencimento           = :vencimento,
            telefone_fixo        = :telefone_fixo,
            cidade               = :cidade
        WHERE empresa = :empresa";

$update = $conn->prepare($sql);
$update->bindParam(':nome_fantasia', $nome_fantasia);
$update->bindParam(':area_profissional', $area_profissional);
$update->bindParam(':situacao', $situacao);
$update->bindParam(':vencimento', $vencimento);
$update->bindParam(':telefone_fixo', $telefone_fixo);
$update->bindParam(':cidade', $cidade);
$update->bindParam(':empresa', $empresa); 

if ($update->execute()) {
     header("Location: ../reads/read_empresas.php");
} else {
    echo "Erro ao atualizar.";
}
?>
