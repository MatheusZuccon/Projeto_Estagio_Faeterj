<?php
include_once '../../functions/exibicao/exibicao.php';
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
        margin: 0 0 10px 0;
    }
    .titulo-menor {
        text-align: center;
        margin-bottom: 25px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 12px;
    }
    table, td, th {
        border: 1px solid #000;
    }
    td, th {
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
    .text-center { text-align: center; }
    .fw-bold { font-weight: bold; }
</style>
</head>
<body>

<div class="text-center">
    <img src="<?= $base64 ?>" style="max-width:200px; height:auto;" alt="Logo RJ">
</div>

<!-- Cabeçalho institucional -->
<div class="text-center fw-bold">
    Governo do Estado do Rio de Janeiro<br>
    Secretaria de Estado de Ciência, Tecnologia e Inovação<br>
    Fundação de Apoio à Escola Técnica
</div>
<div class="text-center fw-bold" style="font-size: 12pt; margin-top:4px;">
    FAETERJ-PETRÓPOLIS
</div>

<h2 style="margin-top:15px;">Relatório de Atividades de Estágio Curricular Supervisionado Obrigatório</h2>
<div class="titulo-menor">Lei 11788 de 25 de setembro de 2008</div>

<!-- Dados do aluno -->
<table>
    <tr>
        <td><strong>Aluno(a):</strong></td>
        <td colspan="3"><?= htmlspecialchars($aluno_nome ?? '') ?></td>
    </tr>
    <tr>
        <td><strong>Assinatura:</strong></td>
        <td colspan="3"></td>
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
        <td><?= htmlspecialchars(exibeEmpresa($empresa,$conn) ?? '') ?></td>
    </tr>
    <tr>
        <td style="width: 60%;"><strong>Nome completo e cargo do responsável pelo estagiário na Empresa:</strong></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td><strong>Chancela da empresa:</strong></td>
        <td colspan="3"></td>
    </tr>
</table>

<!-- Período relatado -->
<table>
    <tr>
        <td style="width: 20%;"><strong>Período Relatado:</strong></td>
        <td style="width: 30%;">__/__/____ a __/__/____</td>
        <td style="width: 20%;"><strong>Horas relatadas:</strong></td>
        <td style="width: 30%;"><?= htmlspecialchars($horas_relatadas ?? '') ?></td>
    </tr>
    <tr>
        <td><strong>Data:</strong></td>
        <td colspan="3">__/__/____</td>
    </tr>
</table>

<!-- Período do contrato -->
<table>
    <tr>
        <td style="width: 25%;"><strong>Termo de Compromisso:</strong></td>
        <td style="width: 25%;">__/__/____ a __/__/____</td>
        <td style="width: 25%;"><strong>Termo Aditivo:</strong></td>
        <td style="width: 25%;">__/__/____ a __/__/____</td>
    </tr>
</table>

<!-- Quebra de página -->
<div style="page-break-before: always;"></div>

<!-- Reservado para a instituição -->
<h3>Reservado para a Instituição de Ensino</h3>
<p class="fw-bold">Examinadores (Instituição)</p>

<table>
    <tr>
        <td style="width: 30%;"><strong>Nome completo Professor:</strong></td>
        <td style="width: 70%;"></td>
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

<!-- Coordenação de estágios -->
<h3>Coordenação de Estágios</h3>
<table>
    <tr>
        <td style="width: 30%;"><strong>Nome completo:</strong></td>
        <td style="width: 70%;"></td>
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

<p class="fw-bold">Parecer técnico (Instituição):</p>
<p>
    ( ) O relatório não apresenta informações suficientes para avaliação.<br>
    ( ) Atividades realizadas estão alinhadas com a matriz curricular do curso e de acordo com o previsto no plano de estágio curricular.<br>
    ( ) Atividades realizadas de forma parcial, necessitando adequação e extensão de prazo.
</p>
<p>
    Avaliação: ( ) Insuficiente &nbsp; ( ) Regular &nbsp; ( ) Bom &nbsp; ( ) Excelente
</p>

<h3>Avaliação Final:</h3>
<p style="margin-bottom: 5px;">Prática de estágio curricular supervisionado obrigatório:<br>
NÃO APTO ( ) &nbsp;&nbsp;&nbsp; APTO ( )</p>

<div class="assinatura">
    <span>Assinatura do professor avaliador</span>
</div>

<!-- Quebra de página -->
<div style="page-break-before: always;"></div>

<table>
    <tr>
        <td style="width: 15%;"><strong>Aluno(a):</strong></td>
        <td colspan="3"><?= htmlspecialchars($aluno_nome ?? '') ?></td>
    </tr>
    <tr>
        <td><strong>Matrícula:</strong></td>
        <td style="width: 35%;"><?= htmlspecialchars($aluno_matricula ?? '') ?></td>
        <td style="width: 15%;"><strong>E-mail:</strong></td>
        <td style="width: 35%;"><?= htmlspecialchars($aluno_email ?? '') ?></td>
     </tr>
     <tr>
        <td><strong>Nome da Empresa:</strong></td>
        <td colspan="3"><?= htmlspecialchars(exibeEmpresa($empresa,$conn) ?? '') ?></td>
    </tr>
    <tr>
        <td><strong>Endereço completo:</strong></td>
        <td colspan="3"></td>
    </tr>
    <tr>
        <td><strong>E-mail:</strong></td>
        <td></td>
        <td><strong>Telefone:</strong></td>
        <td></td>
    </tr>
</table>

<h3 class="fw-bold text-center">
    RELATÓRIO DE ATIVIDADES DE ESTÁGIO CURRICULAR SUPERVISIONADO OBRIGATÓRIO
</h3>

<!-- Espaço para o relatório -->
<div style="
    margin-top: 20px;
    min-height: 400px;
    padding: 15px;
    line-height: 1.6;
    border: 1px solid #ccc;
">
    <?php 
    echo nl2br(htmlspecialchars($relatorio)); 
    ?>
</div>

<div class="assinatura">
    <span>Assinatura do aluno</span>
</div>
    
<div class="assinatura">
    <span>Assinatura do representante da empresa/ Instituição e carimbo:</span>
</div>

</body>
</html>
