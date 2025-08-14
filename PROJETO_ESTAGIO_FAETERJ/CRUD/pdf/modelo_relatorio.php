<?php
$logoPath = __DIR__ . '/../../imagens/logo_rj.jpg';
$type = pathinfo($logoPath, PATHINFO_EXTENSION);
$data = file_get_contents($logoPath);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Relatório de Atividades de Estágio</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    @page {
        margin: 2.5cm 2cm 2.5cm 2cm;
    }
    body {
        font-family: Arial, sans-serif;
        font-size: 11pt;
        line-height: 1.4;
    }
    h2, h3 {
        text-align: center;
        text-transform: uppercase;
        margin: 0;
    }
    .titulo-menor {
        text-align: center;
        margin-bottom: 25px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
    }
    td, th {
        border: 1px solid #000;
        padding: 6px;
        vertical-align: top;
    }
    .assinatura {
        margin-top: 45px;
        text-align: center;
        page-break-inside: avoid;
    }
    .assinatura span {
        display: inline-block;
        border-top: 1px solid #000;
        padding-top: 3px;
        width: 280px;
    }
    .no-border td, .no-border th {
        border: none !important;
    }
</style>
</head>
<body>

<div class="container-fluid">
    
    
    <div class="text-center">
    <img src="<?= $base64 ?>" style="max-width:200px; height:auto;" alt="Logo RJ">
    </div>

    <!-- Cabeçalho institucional -->
    <div class="w-100 text-center fw-bold" style="text-align:center;">
    Governo do Estado do Rio de Janeiro<br>
    Secretaria de Estado de Ciência, Tecnologia e Inovação<br>
    Fundação de Apoio à Escola Técnica
    </div>
<div class="w-100 text-center fw-bold mt-1" style="font-size: 12pt; text-align:center;">
    FAETERJ-PETRÓPOLIS
</div>



    <h2 class="mt-3">Relatório de Atividades de Estágio Curricular Supervisionado Obrigatório</h2>
    <div class="titulo-menor">Lei 11788 de 25 de setembro de 2008</div>

    <!-- Dados do aluno -->
    <table class="mb-3">
        <tr>
            <td><strong>Aluno(a):</strong></td>
            <td><?= htmlspecialchars($aluno_nome ?? '') ?></td>
            <td><strong>Assinatura:</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Matrícula:</strong></td>
            <td><?= htmlspecialchars($aluno_matricula ?? '') ?></td>
            <td><strong>E-mail:</strong></td>
            <td><?= htmlspecialchars($aluno_email ?? '') ?></td>
        </tr>
        <tr>
            <td><strong>Telefone:</strong></td>
            <td><?= htmlspecialchars($aluno_telefone ?? '') ?></td>
            <td><strong>Nome da Empresa:</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Nome completo e cargo do responsável na empresa:</strong></td>
            <td colspan="3"></td>
        </tr>
        <tr>
            <td><strong>Chancela da empresa:</strong></td>
            <td colspan="3"></td>
        </tr>
    </table>

    <!-- Período relatado -->
    <table class="mb-3">
        <tr>
            <td><strong>Período Relatado:</strong></td>
            <td></td>
            <td><strong>Horas relatadas:</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Data:</strong></td>
            <td colspan="3"></td>
        </tr>
    </table>

    <!-- Período contrato -->
    <table class="mb-4">
        <tr>
            <td><strong>Termo de Compromisso:</strong></td>
            <td></td>
            <td><strong>Termo Aditivo:</strong></td>
            <td></td>
        </tr>
    </table>

    <!-- Reservado para instituição -->
    <h3 class="mt-4">Reservado para a Instituição de Ensino</h3>

    <p class="fw-bold mb-1">Examinadores (Instituição)</p>
    <p class="mb-1">Parecer técnico (Instituição):</p>

    <table class="mb-3">
        <tr>
            <td><strong>Nome completo Professor:</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Identidade Funcional:</strong></td>
            <td></td>
        </tr>
        <tr>
            <td><strong>Assinatura:</strong></td>
            <td></td>
        </tr>
    </table>

    <!-- Coordenação de Estágios -->
    <h3>Coordenação de Estágios</h3>
    <table class="mb-3">
        <tr>
            <td><strong>Nome completo:</strong></td>
            <td>Heliana Borges de Lucas de Vasconcellos</td>
        </tr>
        <tr>
            <td><strong>Identidade Funcional:</strong></td>
            <td>4127206-4</td>
        </tr>
        <tr>
            <td><strong>Assinatura:</strong></td>
            <td></td>
        </tr>
    </table>

    <!-- Opções de avaliação -->
    <p>
        ( ) O relatório não apresenta informações suficientes para avaliação.<br>
        ( ) Atividades realizadas estão alinhadas com a matriz curricular do curso e de acordo com o previsto no plano de estágio curricular.<br>
        ( ) Atividades realizadas de forma parcial, necessitando adequação e extensão de prazo.
    </p>
    <p>
        Avaliação: ( ) Insuficiente &nbsp; ( ) Regular &nbsp; ( ) Bom &nbsp; ( ) Excelente
    </p>

    <!-- Avaliação final -->
    <h3>Avaliação Final:</h3>
    <p>Prática de estágio curricular supervisionado obrigatório:<br>
    NÃO APTO ( ) &nbsp;&nbsp;&nbsp; APTO ( )</p>

    <div class="assinatura">
        <span>Assinatura do professor avaliador</span>
    </div>

    <!-- Relato de atividades -->
    <h3 class="mt-4">Relato das Atividades</h3>

    <div class="assinatura">
        <span>Assinatura do aluno</span>
    </div>
    <div class="assinatura">
        <span>Assinatura do representante da empresa / Instituição e carimbo</span>
    </div>

</div>

</body>
</html>
