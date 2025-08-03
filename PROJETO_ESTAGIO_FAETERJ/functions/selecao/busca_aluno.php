<?php
include_once "../../conexao/db_connect.php";
include_once '../exibicao/exibicao.php';

if (isset($_GET['matricula'])) {
    $matricula = $_GET['matricula'];
    
    try {
        $stmt = $conn->prepare("
            SELECT 
                a.nome, a.telefone_celular, a.telefone_fixo, a.email, a.inicio_estagio, a.termino_estagio, a.local_estagio, a.modalidade
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
                'telefone_celular' => $aluno['telefone_celular'],
                'email' => $aluno['email'],
                'inicio_estagio'  => $aluno['inicio_estagio'],
                'termino_estagio'  => $aluno['termino_estagio'],
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