<?php
session_start();
include_once "conexao/db_connect.php"; 
include_once 'functions/exibicao/exibicao.php';
include_once 'functions/selecao/selecao.php';

try {
    $stmt = $conn->prepare("SELECT matricula, nome FROM alunos ORDER BY nome ASC");
    $stmt->execute();
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar alunos: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Relatórios de Estágio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet"> <!-- ÍCONES -->
  <style>
  body {
    background-color: #f8f9fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  }

  .btn-primary {
    background-color: #005999;
    border-color: #005999;
    border-radius: 10px;
    font-weight: 500;
    padding: 10px;
  }

  .btn-primary:hover {
    background-color: #004c87;
    border-color: #004c87;
  }

  .bg-primary {
    background-color: #005999 !important;
  }

  .navbar-dark .navbar-nav .nav-link.active,
  .navbar-dark .navbar-brand {
    color: #fff;
  }

  .border-azul {
  border: 2px solid #005999 !important;
  border-radius: 15px;
  }
  .container-buttons {
    background-color: #ffffff;
    border: 2px solid #005999;
    border-radius: 15px;
    padding: 40px;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
  }

  .nav-link.active {
    font-weight: 600;
  }
  </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <!-- Marca -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="imagens/dragao_faeterj_att.png" alt="Logo" width="30" height="30" class="me-2">
        Sistema de Estágios
      </a>

      <!-- Itens do menu -->
      <ul class="navbar-nav mb-2 mb-lg-0">

        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link active" href="home.php">
            <i class="bi bi-house-door-fill me-1"></i>Home
          </a>
        </li>

        <!-- Estagiários -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownEstagiarios"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-lines-fill me-1"></i>Estagiários
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEstagiarios">
            <li><a class="dropdown-item" href="form_alunos.php"><i class="bi bi-person-plus-fill me-2"></i>Formulário de Estagiários</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_alunos.php"><i class="bi bi-people-fill me-2"></i>Estagiários Cadastrados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="form_generos.php"><i class="bi bi-gender-ambiguous me-2"></i>Formulário de Gêneros</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_generos.php"><i class="bi bi-card-list me-2"></i>Gêneros Cadastrados</a></li>
          </ul>
        </li>

        <!-- Documentos -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownDocumentos"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-file-earmark-text me-1"></i>Documentos
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownDocumentos">
            <li><a class="dropdown-item" href="form_aditivos.php"><i class="bi bi-card-list me-2"></i>Formulário de Termos Aditivos</a></li>
            <li><a class="dropdown-item" href="form_tce.php"><i class="bi bi-card-list me-2"></i>Formulário de TCEs</a></li>
            <li><a class="dropdown-item" href="form_relatorio.php"><i class="bi bi-card-list me-2"></i>Formulário de Relatórios de Estágio</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_aditivos.php"><i class="bi bi-card-list me-2"></i>Termos Aditivos</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_tce.php"><i class="bi bi-card-list me-2"></i>TCEs</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_relatorio.php"><i class="bi bi-card-list me-2"></i>Relatórios de Estágio</a></li>
          </ul>
        </li>

        <!-- Unidades -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownUnidades"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-geo-alt-fill me-1"></i>Unidades
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUnidades">
            <li><a class="dropdown-item" href="form_unidades.php"><i class="bi bi-geo-alt-fill me-2"></i>Formulário de Unidades e Curso</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_unidades.php"><i class="bi bi-geo-alt-fill me-2"></i>Unidades Cadastradas</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_cursos.php"><i class="bi bi-mortarboard me-2"></i>Cursos Cadastrados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="form_localidades.php"><i class="bi bi-geo me-2"></i>Formulário de Bairro, Cidade e UF</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_bairros.php"><i class="bi bi-geo me-2"></i>Bairros Cadastrados</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_cidades.php"><i class="bi bi-geo me-2"></i>Cidades Cadastradas</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_uf.php"><i class="bi bi-geo me-2"></i>UF Cadastrados</a></li>
          </ul>
        </li>

        <!-- Empresas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownEmpresas"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-building me-1"></i>Empresas
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmpresas">
            <li><a class="dropdown-item" href="form_empresas.php"><i class="bi bi-building me-2"></i>Formulário de Empresas</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_empresas.php"><i class="bi bi-building me-2"></i>Empresas Cadastradas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="form_seguradora.php"><i class="bi bi-shield-check me-2"></i>Formulário de Seguradoras</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_seguradora.php"><i class="bi bi-shield-check me-2"></i>Seguradoras Cadastradas</a></li>
            <li><a class="dropdown-item" href="CRUD/reads/read_convenio.php"><i class="bi bi-briefcase-fill me-2"></i>Tipos de Convênios Cadastrados</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Espaço para a navbar -->
<div style="margin-top: 90px;"></div>

<div class="container mt-5 mb-5">
  <!-- Cabeçalho Azul -->
  <div class="bg-primary text-white rounded px-3 py-2 mb-4">
    <h4 class="mb-0">Relatórios de Estágio</h4>
  </div>

  <!-- Início do Formulário -->
  <form action="CRUD/inserts/inserts_relatorio.php" class="border border-azul rounded p-4 bg-white shadow-sm" enctype="multipart/form-data" method="post">
   <div class="table-responsive">    
    <table class="table table-bordered align-middle table-striped">
      <tbody>
        <tr>
          <td><label for="foto" class="form-label">Foto 3x4</label></td>
          <td colspan="3"><input type="file" id="foto" name="foto" class="form-control"></td>
        </tr>
        <tr>
          <td><label class="form-label" for="nome">Nome</label></td>
          <td colspan="3"><input type="text" class="form-control" id="nome" name="nome"></td>
        <tr>
        <tr>
          <td><label for="aluno_matricula" class="form-label">Matrícula do Aluno</label></td>
          <td colspan="3">
              <input type="text" class="form-control" id="aluno_matricula" name="aluno_matricula" placeholder="Digite a matrícula do aluno">
          </td>
        </tr>
        <tr>
          <td><label for="telefone_fixo" class="form-label">Telefone Fixo</label></td>
          <td><input type="tel" id="telefone_fixo" name="telefone_fixo" class="form-control"></td>
          <td><label for="email" class="form-label">Email</label></td>
          <td><input type="email" id="email" name="email" class="form-control"></td>
        </tr>
        <tr>
          <td><label class="form-label" for="empresa">Empresa</label></td>
          <td>
            <select class="form-control form-control-sm" id="empresa" name="empresa" style="width: 100%;">
            <option value="">Selecione a Empresa</option>
            <?php 
                selecionaEmpresa($empresa, $conn); 
            ?>
            </select>
          </td>
          <td><label for="modalidade" class="form-label">Tipo de Estágio</label></td>
          <td><input type="text" id="modalidade" name="modalidade" class="form-control"></td>
        </tr>
        <tr>
          <td><label for="data_inicio" class="form-label">Período relatado (data início)</label></td>
          <td><input type="date" id="data_inicio" name="data_inicio" class="form-control"></td>
          <td><label for="data_final" class="form-label">Período relatado (data final)</label></td>
          <td><input type="date" id="data_final" name="data_final" class="form-control"></td>
        </tr>
        <tr>
          <td><label for="data_entrega" class="form-label">Data da Entrega</label></td>
          <td><input type="date" id="data_entrega" name="data_entrega" class="form-control"></td>
          <td><label for="horas_relatadas" class="form-label">Horas Relatadas</label></td>
          <td><input type="number" id="horas_relatadas" name="horas_relatadas" class="form-control"></td>
        </tr>
        <tr>
          <td><label for="n_relatorio" class="form-label">Nº Relatório</label></td>
          <td><input type="text" id="n_relatorio" name="n_relatorio" class="form-control"></td>
          <td><label for="parecer_tecnico" class="form-label">Parecer Técnico</label></td>
          <td><input type="text" id="parecer_tecnico" name="parecer_tecnico" class="form-control"></td>
        </tr>
        <tr>
          <td><label for="relatorio" class="form-label">Relatório</label></td>
          <td colspan="3"><textarea id="relatorio" name="relatorio" rows="4" class="form-control"></textarea></td>
        </tr>
        <tr>
          <td colspan="4" class="text-start">
            <button type="submit" class="btn btn-primary">Enviar</button>
          </td>
        </tr>
      </tbody>
    </table>
   </div>         
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.getElementById('aluno_matricula').addEventListener('blur', function () {
  const matricula = this.value.trim();
  console.log('Matrícula digitada:', matricula);

  if (matricula.length > 0) {
    fetch('functions/selecao/busca_aluno.php?matricula=' + encodeURIComponent(matricula))
      .then(response => {
        if (!response.ok) throw new Error('Erro na resposta da rede');
        return response.json();
      })
      .then(data => {
        console.log('Dados recebidos:', data);

        // Preencher apenas os campos retornados
        document.getElementById('nome').value = data.nome || '';
        document.getElementById('telefone_fixo').value = data.telefone_fixo || '';
        document.getElementById('email').value = data.email || '';
        document.getElementById('modalidade').value = data.modalidade || '';

        // Campo 'empresa' NÃO deve ser preenchido automaticamente
      })
      .catch(error => {
        console.error('Erro no fetch:', error);
      });
  } else {
    // Limpar campos caso matrícula seja apagada
    document.getElementById('nome').value = '';
    document.getElementById('telefone_fixo').value = '';
    document.getElementById('email').value = '';
    document.getElementById('modalidade').value = '';
  }
});
</script>
</body>
</html>
