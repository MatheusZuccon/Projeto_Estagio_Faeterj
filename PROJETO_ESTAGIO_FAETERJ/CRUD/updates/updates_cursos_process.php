<?php
include_once "../../conexao/db_connect.php";

$id                    = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$curso                 = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$sigla_curso           = filter_input(INPUT_POST, 'sigla', FILTER_SANITIZE_STRING);
$curso_desc            = filter_input(INPUT_POST, 'curso_desc', FILTER_SANITIZE_STRING);

$sql = "UPDATE faeterj_apoio_curso
        SET curso      = :curso, 
            sigla      = :sigla,
            curso_desc = :curso_desc
        WHERE id = :id";

$update = $conn->prepare($sql);
$update->bindParam(':curso', $curso);
$update->bindParam(':sigla',$sigla_curso);
$update->bindParam(':curso_desc',$curso_desc);
$update->bindParam(':id', $id);

if ($update->execute()) {
     header("Location: ../reads/read_cursos.php");
} else {
    echo "Erro ao atualizar.";
}
?>
