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
        page-break-before: auto;
        page-break-after: auto;
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
<table class="mb-3" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 15%;"><strong>Aluno(a):</strong></td>
        <td style="border: 1px solid #000; width: 35%;"></td>
        <td style="border: 1px solid #000; width: 15%;"><strong>Assinatura:</strong></td>
        <td style="border: 1px solid #000; width: 35%;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Matrícula:</strong></td>
        <td style="border: 1px solid #000;"></td>
        <td style="border: 1px solid #000;"><strong>E-mail:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Telefone:</strong></td>
        <td style="border: 1px solid #000;"></td>
        <td style="border: 1px solid #000;"><strong>Nome da Empresa:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Nome completo e cargo do responsável pelo estagiário na Empresa:</strong></td>
        <td style="border: 1px solid #000;" colspan="3"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Chancela da empresa:</strong></td>
        <td style="border: 1px solid #000;" colspan="3"></td>
    </tr>
</table>

<!-- Período relatado -->
<table class="mb-3" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 20%;"><strong>Período Relatado:</strong></td>
        <td style="border: 1px solid #000; width: 30%;">__/__/____ a __/__/____</td>
        <td style="border: 1px solid #000; width: 20%;"><strong>Horas relatadas:</strong></td>
        <td style="border: 1px solid #000; width: 30%;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Data:</strong></td>
        <td style="border: 1px solid #000;" colspan="3">__/__/____</td>
    </tr>
</table>

<!-- Período do contrato -->
<table class="mb-4" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 25%;"><strong>Termo de Compromisso:</strong></td>
        <td style="border: 1px solid #000; width: 25%;">__/__/____ a __/__/____</td>
        <td style="border: 1px solid #000; width: 25%;"><strong>Termo Aditivo:</strong></td>
        <td style="border: 1px solid #000; width: 25%;">__/__/____ a __/__/____</td>
    </tr>
</table>

<div style="margin-top: 50px;"></div>
    
<!-- Reservado para a instituição -->
<h3 class="mt-4">Reservado para a Instituição de Ensino</h3>
<p class="fw-bold mb-1">Examinadores (Instituição)</p>

<table class="mb-3" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 30%;"><strong>Nome completo Professor:</strong></td>
        <td style="border: 1px solid #000; width: 70%;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Identidade Funcional:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Assinatura:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
</table>

<!-- Coordenação de estágios -->
<h3>Coordenação de Estágios</h3>
<table class="mb-3" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 30%;"><strong>Nome completo:</strong></td>
        <td style="border: 1px solid #000; width: 70%;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Identidade Funcional:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Assinatura:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
</table>

<p class="fw-bold mb-1">Parecer técnico (Instituição):</p>
<!-- Opções de avaliação -->
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

<div style="margin-top: 35px; text-align: center; page-break-inside: avoid; page-break-before: avoid; page-break-after: avoid;">
    <span style="display: inline-block; border-top: 1px solid #000; padding-top: 3px; width: 280px;">
        Assinatura do professor avaliador
    </span>
</div>

<div style="margin-top: 250px;"></div>

<table class="mt-4" style="width: 100%; border-collapse: collapse;">
    <tr>
        <td style="border: 1px solid #000; width: 15%;"><strong>Aluno(a):</strong></td>
        <td style="border: 1px solid #000; width: 35%;"></td>
        <td style="border: 1px solid #000; width: 15%;"><strong>E-mail:</strong></td>
        <td style="border: 1px solid #000; width: 35%;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>Matrícula:</strong></td>
        <td style="border: 1px solid #000;"></td>
        <td style="border: 1px solid #000;"><strong>Nome da Empresa / endereço completo:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
    <tr>
        <td style="border: 1px solid #000;"><strong>E-mail:</strong></td>
        <td style="border: 1px solid #000;"></td>
        <td style="border: 1px solid #000;"><strong>Telefone:</strong></td>
        <td style="border: 1px solid #000;"></td>
    </tr>
</table>

<!-- Relato de atividades -->
<h3 class="fw-bold mt-4">Relatório de Atividades de Estágio Curricular Supervisionado Obrigatório</h3>

<div style="margin-top: 500px;"></div>
    
<div class="assinatura">
    <span>Assinatura do aluno</span>
</div>
<div class="assinatura">
    <span>Assinatura do representante da empresa / Instituição e carimbo</span>
</div>  
 
</body>
</html>
