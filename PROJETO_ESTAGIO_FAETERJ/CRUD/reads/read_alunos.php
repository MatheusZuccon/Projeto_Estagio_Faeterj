<?php
session_start();
include_once "../../conexao/db_connect.php";
include_once "../../functions/exibicao/exibicao.php";


$resultados = [];

try {
    $sql = "SELECT * FROM alunos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erro ao buscar dados: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Estagiários Cadastrados</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknkHalU0q+VVFJX5IPiYOVL8S41aEfR2iF0hUH1oyqd+e9arjwQ9x9i01fg26"
        crossorigin="anonymous"></script>
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
  .table-azul {
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
      <a class="navbar-brand d-flex align-items-center" href="../../home.php">
        <img src="../../imagens/dragao_faeterj_att.png" alt="Logo" width="30" height="30" class="me-2">
        Sistema de Estágios
      </a>

      <!-- Itens do menu -->
      <ul class="navbar-nav mb-2 mb-lg-0">

        <!-- Home -->
        <li class="nav-item">
          <a class="nav-link active" href="../../home.php">
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
            <li><a class="dropdown-item" href="../../form_alunos.php"><i class="bi bi-person-plus-fill me-2"></i>Formulário de Estagiários</a></li>
            <li><a class="dropdown-item" href="read_alunos.php"><i class="bi bi-people-fill me-2"></i>Estagiários Cadastrados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../form_generos.php"><i class="bi bi-gender-ambiguous me-2"></i>Formulário de Gêneros</a></li>
            <li><a class="dropdown-item" href="read_generos.php"><i class="bi bi-card-list me-2"></i>Gêneros Cadastrados</a></li>
          </ul>
        </li>

        <!-- Documentos -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownDocumentos"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-file-earmark-text me-1"></i>Documentos
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownDocumentos">
            <li><a class="dropdown-item" href="../../form_aditivos.php"><i class="bi bi-card-list me-2"></i>Formulário de Termos Aditivos</a></li>
            <li><a class="dropdown-item" href="../../form_tce.php"><i class="bi bi-card-list me-2"></i>Formulário de TCEs</a></li>
            <li><a class="dropdown-item" href="../../form_relatorio.php"><i class="bi bi-card-list me-2"></i>Formulário de Relatórios de Estágio</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="read_aditivos.php"><i class="bi bi-card-list me-2"></i>Termos Aditivos</a></li>
            <li><a class="dropdown-item" href="read_tce.php"><i class="bi bi-card-list me-2"></i>TCEs</a></li>
            <li><a class="dropdown-item" href="read_relatorio.php"><i class="bi bi-card-list me-2"></i>Relatórios de Estágio</a></li>
          </ul>
        </li>

        <!-- Unidades -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownUnidades"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-geo-alt-fill me-1"></i>Unidades
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownUnidades">
            <li><a class="dropdown-item" href="../../form_unidades.php"><i class="bi bi-geo-alt-fill me-2"></i>Formulário de Unidades e Curso</a></li>
            <li><a class="dropdown-item" href="read_unidades.php"><i class="bi bi-geo-alt-fill me-2"></i>Unidades Cadastradas</a></li>
            <li><a class="dropdown-item" href="read_cursos.php"><i class="bi bi-mortarboard me-2"></i>Cursos Cadastrados</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../form_localidades.php"><i class="bi bi-geo me-2"></i>Formulário de Bairro, Cidade e UF</a></li>
            <li><a class="dropdown-item" href="read_bairros.php"><i class="bi bi-geo me-2"></i>Bairros Cadastrados</a></li>
            <li><a class="dropdown-item" href="read_cidades.php"><i class="bi bi-geo me-2"></i>Cidades Cadastradas</a></li>
            <li><a class="dropdown-item" href="read_uf.php"><i class="bi bi-geo me-2"></i>UF Cadastrados</a></li>
          </ul>
        </li>

        <!-- Empresas -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="dropdownEmpresas"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-building me-1"></i>Empresas
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownEmpresas">
            <li><a class="dropdown-item" href="../../form_empresas.php"><i class="bi bi-building me-2"></i>Formulário de Empresas</a></li>
            <li><a class="dropdown-item" href="read_empresas.php"><i class="bi bi-building me-2"></i>Empresas Cadastradas</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../form_seguradora.php"><i class="bi bi-shield-check me-2"></i>Formulário de Seguradoras</a></li>
            <li><a class="dropdown-item" href="read_seguradora.php"><i class="bi bi-shield-check me-2"></i>Seguradoras Cadastradas</a></li>
            <li><a class="dropdown-item" href="read_convenio.php"><i class="bi bi-briefcase-fill me-2"></i>Tipos de Convênios Cadastrados</a></li>
          </ul>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Espaço para a navbar -->
<div style="margin-top: 90px;"></div>

<div class="container mt-5 mb-5">
  <div class="bg-primary text-white rounded px-3 py-2 mb-4">
    <h4 class="mb-0">Lista de Estagiários Cadastrados</h4>
  </div>

  <?php if (!empty($resultados)): ?>
    <div class="table-responsive border border-azul rounded bg-white shadow-sm p-3">
      <table class="table table-bordered align-middle table-striped table-hover">
        <thead class="table-azul text-center">
          <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Nome Social</th>
            <th>Nascimento</th>
            <th>Sexo</th>
            <th>Gênero</th>
            <th>CPF</th>
            <th>RG</th>
            <th>Órgão Emissor</th>
            <th>Data Emissão RG</th>
            <th>Endereço</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Celular</th>
            <th>Fixo</th>
            <th>Email</th>
            <th>Unidade</th>
            <th>Curso</th>
            <th>Previsão Conclusão</th>
            <th>Carta Apresentação</th>
            <th>Estágio</th>
            <th>Local</th>
            <th>Seguro</th>
            <th>Convênio</th>
            <th>Início</th>
            <th>Término</th>
            <th>Status</th>
            <th>Remunerado</th>
            <th>Obrigatório</th>
            <th>Seguradora</th>
            <th>Modalidade</th>
            <th>Programa</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($resultados as $aluno): ?>
            <tr>
              <td class="text-center">
                <?php if (!empty($aluno['foto'])): ?>
                  <img src="../../uploads/<?= htmlspecialchars($aluno['foto']) ?>" class="foto-aluno">
                <?php else: ?>
                  <span class="text-muted">Sem foto</span>
                <?php endif; ?>
              </td>
              <td><?= htmlspecialchars($aluno['nome']) ?></td>
              <td><?= htmlspecialchars($aluno['matricula']) ?></td>
              <td><?= htmlspecialchars($aluno['nome_social']) ?></td>
              <td><?= htmlspecialchars($aluno['nascimento']) ?></td>
              <td><?= htmlspecialchars($aluno['sexo']) ?></td>
              <td><?= htmlspecialchars(exibeGenero($aluno['genero'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['cpf']) ?></td>
              <td><?= htmlspecialchars($aluno['rg']) ?></td>
              <td><?= htmlspecialchars($aluno['orgao_emissor']) ?></td>
              <td><?= htmlspecialchars($aluno['data_emissao_rg']) ?></td>
              <td><?= htmlspecialchars($aluno['endereco']) ?></td>
              <td><?= htmlspecialchars(exibeBairro($aluno['bairro'], $conn)) ?></td>
              <td><?= htmlspecialchars(exibeCidade($aluno['cidade'], $conn)) ?></td>
              <td><?= htmlspecialchars(exibeUF($aluno['uf'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['telefone_celular']) ?></td>
              <td><?= htmlspecialchars($aluno['telefone_fixo']) ?></td>
              <td><?= htmlspecialchars($aluno['email']) ?></td>
              <td><?= htmlspecialchars(exibeUnidade($aluno['unidade_ensino'], $conn)) ?></td>
              <td><?= htmlspecialchars(exibeCurso($aluno['curso'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['previsao_conclusao']) ?></td>
              <td><?= htmlspecialchars($aluno['carta_apresentacao']) ?></td>
              <td><?= htmlspecialchars($aluno['tipo_estagio']) ?></td>
              <td><?= htmlspecialchars(exibeEmpresa($aluno['local_estagio'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['seguro']) ?></td>
              <td><?= htmlspecialchars(exibeConvenio($aluno['tipo_convenio'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['inicio_estagio']) ?></td>
              <td><?= htmlspecialchars($aluno['termino_estagio']) ?></td>
              <td><?= htmlspecialchars($aluno['status_estagio']) ?></td>
              <td><?= htmlspecialchars($aluno['remunerado']) ?></td>
              <td><?= htmlspecialchars($aluno['obrigatorio']) ?></td>
              <td><?= htmlspecialchars(exibeSeguradora($aluno['seguradora'], $conn)) ?></td>
              <td><?= htmlspecialchars($aluno['modalidade']) ?></td>
              <td><?= htmlspecialchars($aluno['programa']) ?></td>
              <td class="text-center">
                  <div class="d-flex justify-content-center gap-2">
                        <a href="../updates/updates_alunos.php?matricula=<?= $aluno['matricula'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="../deletes/deletes_alunos.php?matricula=<?= $aluno['matricula'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este aluno?')">Excluir</a>
                  </div>
             </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  <?php else: ?>
    <div class="alert alert-info">Nenhum aluno cadastrado.</div>
  <?php endif; ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
