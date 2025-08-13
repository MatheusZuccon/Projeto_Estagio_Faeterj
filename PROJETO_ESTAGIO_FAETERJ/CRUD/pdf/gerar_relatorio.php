<?php
require '../../vendor/autoload.php';

use Dompdf\Dompdf;

// Conexão com o banco
include_once "../../conexao/db_connect.php";

// Pega matrícula via GET
$matricula = isset($_GET['aluno_matricula']) ? $_GET['aluno_matricula'] : '';

if (empty($matricula)) {
    die("Matrícula não informada.");
}

// Busca os dados no banco
$sql = "SELECT 
            alunos.nome AS aluno_nome,
            alunos.matricula,
            alunos.email AS aluno_email,
            alunos.telefone_celular AS aluno_telefone
        FROM relatorio_est
          JOIN alunos ON alunos.matricula = relatorio_est.aluno_matricula
        WHERE alunos.matricula = :matricula";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

// Se não encontrar
if (!$dados) {
    die("Registro não encontrado para a matrícula informada.");
}

// Passa os dados para variáveis
$aluno_nome           = $dados['aluno_nome'];
$aluno_matricula      = $dados['matricula'];
$aluno_email          = $dados['aluno_email'];
$aluno_telefone       = $dados['aluno_telefone'];

// Inclui o template HTML
include "modelo_relatorio.php"; // gera $html

// Gera o PDF
$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Baixa o PDF
$dompdf->stream("relatorio_estagio_" . $aluno_matricula . ".pdf", ["Attachment" => true]);
