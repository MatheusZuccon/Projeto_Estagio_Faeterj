<?php
require '../../vendor/autoload.php';

use Dompdf\Dompdf;

include_once "../../conexao/db_connect.php";
include_once '../../functions/exibicao/exibicao.php';

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
            alunos.telefone_celular AS aluno_telefone,
            alunos.local_estagio AS empresa,
            alunos.inicio_estagio AS inicio_estagio,
            alunos.termino_estagio AS termino_estagio,
            relatorio_est.data_inicio AS data_inicio,
            relatorio_est.data_final AS data_final,
            relatorio_est.horas_relatadas AS horas_relatadas,
            relatorio_est.relatorio AS relatorio,
            relatorio_est.data_insercao AS data_insercao

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
$empresa              = $dados['empresa' ];
$horas_relatadas      = $dados['horas_relatadas'];
$relatorio            = $dados['relatorio'];
$data_insercao        = $dados['data_insercao'];
$data_inicio          = $dados['data_inicio'];
$data_final           = $dados['data_final'];
$inicio_estagio       = $dados['inicio_estagio'];
$termino_estagio      = $dados['termino_estagio'];



// Caminho da logo
$logo = __DIR__ . '/../../imagens/logo_rj.jpg';
$logo = str_replace('\\','/',$logo); // corrige barras

// Captura HTML
ob_start();
include __DIR__ . "/modelo_relatorio.php";
$html = ob_get_clean();

// Gera PDF
$dompdf = new Dompdf();
$dompdf->set_option('isRemoteEnabled', true);
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

// Envia para download
$dompdf->stream("relatorio_estagio_" . $aluno_matricula . ".pdf", ["Attachment" => true]);
exit;