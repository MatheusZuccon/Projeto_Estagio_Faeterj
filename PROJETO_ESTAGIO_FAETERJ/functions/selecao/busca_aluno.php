<?php
include_once "../../conexao/db_connect.php";
include_once '../exibicao/exibicao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    
    try {
        $stmt = $conn->prepare("
            SELECT 
                a.nome, a.telefone_fixo, a.email, a.local_estagio, a.modalidade
            FROM alunos a
            WHERE a.matricula = :matricula
            LIMIT 1
        ");
        $stmt->bindParam(':matricula', $matricula);
        $stmt->execute();
        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($aluno) {
            $empresa = exibeEmpresa($aluno['local_estagio'], $conn);
            echo json_encode([
                'nome' => $aluno['nome'],
                'telefone_fixo' => $aluno['telefone_fixo'],
                'email' => $aluno['email'],
                'local_estagio' => $empresa,
                'modalidade' => $aluno['modalidade']
            ]);
        } else {
            echo json_encode([]);
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erro ao buscar aluno: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['error' => 'Matrícula não informada']);
}
?>