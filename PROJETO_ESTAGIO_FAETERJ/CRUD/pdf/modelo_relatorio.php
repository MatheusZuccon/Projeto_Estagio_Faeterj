<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<style>
    @page {
        margin: 2.5cm 2cm 2.5cm 2cm; 
    }
    body {
        font-family: Arial, sans-serif;
        font-size: 11pt;
        line-height: 1.4;
    }
    h1, h2, h3 {
        text-align: center;
        text-transform: uppercase;
        margin: 0;
    }
    .titulo-menor {
        text-align: center;
        margin-bottom: 25px;
    }
    p {
        margin: 4px 0;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 10px;
        page-break-inside: avoid;
    }
    td {
        padding: 6px;
        vertical-align: top;
        border: 1px solid #000;
    }
    .sem-borda td {
        border: none;
    }
    .label {
        font-weight: bold;
        width: 28%;
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
    .opcao {
        margin-right: 15px;
    }
</style>
</head>
<body>

<!-- Cabeçalho institucional -->
<p style="text-align:center; font-weight:bold;">
    Governo do Estado do Rio de Janeiro<br>
    Secretaria de Estado de Ciência, Tecnologia e Inovação<br>
    Fundação de Apoio à Escola Técnica
</p>
<p style="text-align:center; font-weight:bold; font-size:12pt;">
    FAETERJ-PETROPOLIS
</p>

<h2>Relatório de Atividades de Estágio Curricular Supervisionado Obrigatório</h2>
<div class="titulo-menor">Lei 11788 de 25 de setembro de 2008</div>

<!-- Dados do aluno -->
<table>
    <tr>
        <td class="label">Aluno(a):</td>
        <td><?= htmlspecialchars($aluno_nome) ?></td>
        <td class="label">Assinatura:</td>
        <td></td>
    </tr>
    <tr>
        <td class="label">Matrícula:</td>
        <td><?= htmlspecialchars($aluno_matricula) ?></td>
        <td class="label">E-mail:</td>
        <td><?= htmlspecialchars($aluno_email) ?></td>
    </tr>
    <tr>
        <td class="label">Telefone:</td>
        <td><?= htmlspecialchars($aluno_telefone) ?></td>
        <td class="label">Nome da Empresa:</td>
    </tr>
    <tr>
        <td class="label">Nome completo e cargo do responsável:</td>
    </tr>
    <tr>
        <td class="label">Chancela da empresa:</td>
        <td colspan="3"></td>
    </tr>
</table>

<!-- Período relatado -->
<table>
    <tr>
        <td class="label">Período Relatado:</td>
        <td class="label">Horas relatadas:</td>
    </tr>
    <tr>
        <td class="label">Data:</td>
        <td></td>
        <td></td>
    </tr>
</table>

<!-- Período contrato -->
<table>
    <tr>
        <td class="label">TERMO DE COMPROMISSO:</td>
        <td class="label">TERMO ADITIVO:</td>
    </tr>
</table>

<!-- Reservado para instituição -->
<h3 style="margin-top:20px;">Reservado para a Instituição de Ensino</h3>
<p><strong>EXAMINADORES (Instituição)</strong></p>
<p>Parecer técnico (Instituição):<br>
</p>

<table>
    <tr>
        <td class="label">Nome completo Professor:</td>
    </tr>
    <tr>
        <td class="label">Identidade Funcional:</td>
    </tr>
    <tr>
        <td class="label">Assinatura:</td>
        <td></td>
    </tr>
</table>

<!-- Coordenação de Estágios -->
<h3>Coordenação de Estágios</h3>
<table>
    <tr>
        <td class="label">Nome completo:</td>
    </tr>
    <tr>
        <td class="label">Identidade Funcional:</td>
    </tr>
    <tr>
        <td class="label">Assinatura:</td>
        <td></td>
    </tr>
</table>

<!-- Opções de avaliação -->
<p style="margin-top:15px;">
(   ) O relatório não apresenta informações suficientes para avaliação.<br>
(   ) Atividades realizadas estão alinhadas com a matriz curricular do curso e de acordo com o previsto no plano de estágio curricular.<br>
(   ) Atividades realizadas de forma parcial, necessitando adequação e extensão de prazo.
</p>
<p>
Avaliação: (  ) Insuficiente &nbsp; (  ) Regular &nbsp; (  ) Bom &nbsp; (  ) Excelente
</p>

<!-- Avaliação final -->
<h3>Avaliação Final:</h3>
<p>Prática de estágio curricular supervisionado obrigatório:<br>
NÃO APTO (  )   &nbsp;&nbsp;&nbsp; APTO (   )
</p>

<div class="assinatura">
    <span>Assinatura do professor avaliador</span>
</div>

<!-- Relato de atividades -->
<h3 style="margin-top:25px;">Relato das Atividades</h3>


<div class="assinatura">
    <span>Assinatura do aluno</span>
</div>
<div class="assinatura">
    <span>Assinatura do representante da empresa / Instituição e carimbo</span>
</div>

</body>
</html>
<?php
$html = ob_get_clean();
