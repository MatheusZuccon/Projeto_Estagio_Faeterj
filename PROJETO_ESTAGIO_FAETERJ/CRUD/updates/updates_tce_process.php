<?php
include_once "../../conexao/db_connect.php";

$nome               = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$matricula          = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
$email              = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$telefone_celular   = filter_input(INPUT_POST, 'telefone_celular', FILTER_SANITIZE_STRING);
$numero_tce         = filter_input(INPUT_POST, 'numero_tce', FILTER_SANITIZE_STRING);
$empresa            = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
$inicio_estagio     = filter_input(INPUT_POST, 'inicio_estagio', FILTER_SANITIZE_STRING);
$termino_estagio    = filter_input(INPUT_POST, 'termino_estagio', FILTER_SANITIZE_STRING);

$sql = "UPDATE tce 
        SET nome = :nome, 
            email = :email, 
            telefone_celular = :telefone_celular,
            numero_tce = :numero_tce,
            empresa = :empresa,
            inicio_estagio = :inicio_estagio,
            termino_estagio = :termino_estagio
        WHERE matricula = :matricula";

$update = $conn->prepare($sql);
$update->bindParam(':nome', $nome);
$update->bindParam(':email', $email);
$update->bindParam(':telefone_celular', $telefone_celular);
$update->bindParam(':numero_tce', $numero_tce);
$update->bindParam(':empresa', $empresa);
$update->bindParam(':inicio_estagio', $inicio_estagio);
$update->bindParam(':termino_estagio', $termino_estagio);
$update->bindParam(':matricula', $matricula);

if ($update->execute()) {
    header("Location: ../reads/read_tce.php");
} else {
    echo "Erro ao atualizar.";
}
?>
