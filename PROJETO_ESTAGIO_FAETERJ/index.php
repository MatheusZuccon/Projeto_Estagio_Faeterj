<?php 
    session_start(); 
    include_once 'conexao/db_connect.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Home - Sistema de Estágio</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
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
       
  @keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.img-fade {
  animation: fadeInUp 1s ease-out both;
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
      <a class="navbar-brand d-flex align-items-center" href="home.php">
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


<!-- Saudação com destaque -->
<div class="container text-center mb-5">
  <div class="p-4 rounded-4 shadow-sm bg-white">
    <h2 class="fw-bold mb-3" style="color: #28A8EA;">Bem-vindo ao Sistema de Estágio da Faeterj-Petrópolis!</h2>
    <p class="lead text-secondary">Gerencie estagiários, empresas, documentos e muito mais com facilidade.</p>
  </div>
</div>
    
    
    
<!-- Container de botões -->
<div class="container text-center">
  <img src="imagens/dragao_faeterj_att.png" alt="Logo" class="img-fluid img-fade" width="30%">
</div>
    
<!-- texto estagio -->
<div class="text-start mt-5" style="max-width: 800px; margin-left:auto; margin-right:auto; line-height: 1.8;">
  <h1 class="text-center" style="color:#005999;">Estágio</h1>
  <h5 class="text-center text-secondary mb-4">Informações sobre estágios</h5>
  <h6 class="text-center text-secondary mb-4"<p><strong>Email:</strong> <a href="mailto:estagio@faeterj-petropolis.edu.br">estagio@faeterj-petropolis.edu.br</a></p>

  <h3 class="mt-4"><strong>ATENÇÃO:</strong></h3>

  <h4 class="mt-4"><strong>Estágio Supervisionado</strong></h4>

  <p>A realização de <strong>300 horas</strong> de estágio supervisionado (modalidade Empresa) ou de <strong>960 horas</strong> (na modalidade Mundo do Trabalho) é requisito obrigatório para a conclusão do curso. O estágio é realizado de acordo com regulamento próprio, aprovado pelo conselho acadêmico, em conformidade com o setor de estágios da FAETEC e previsto na legislação vigente.</p>

  <p>O estágio supervisionado inicia-se a partir do 2º período. No entanto, é possível iniciar no 1º período, mediante avaliação e aprovação de um professor designado pela coordenação de estágios.</p>

  <p>O estágio é supervisionado pelos professores designados para orientação e supervisão, os quais acompanharão o seu trabalho, desde a aprovação do projeto com as atividades a serem realizadas (equivalente ao Plano de Atividades acima mencionado), assinado pelo supervisor da instituição conveniada, quando as atividades não constarem na documentação do contrato.</p>

  <p>A FAETERJ-Petrópolis também oferece estágio curricular supervisionado em instituições conveniadas da região.</p>

  <p><strong>IMPORTANTE:</strong> Se já estiver trabalhando no mercado formal, em área de informática ou de tecnologia, poderá justificar as suas horas de estágio apresentando a Carteira de Trabalho e Previdência Social (CTPS) devidamente registrada, e uma Declaração de Atividades informando as atividades a serem realizadas na Empresa, emitida e assinada pela empresa em questão (equivalente ao Plano de Atividades acima mencionado). A contabilização das horas se dará a partir da aprovação da documentação pelo Setor de Estágios. Esta modalidade é chamada de Vivência no Mundo do Trabalho. O número de horas a comprovar nesta modalidade são 960 horas.</p>

  <p><strong>IMPORTANTE:</strong> o Setor de Estágio deve sempre ser consultado para a realização de estágio, qualquer que seja a modalidade.</p>

  <p><strong>Email:</strong> <a href="mailto:estagio@faeterj-petropolis.edu.br">estagio@faeterj-petropolis.edu.br</a></p>
</div>


<!-- Footer -->
<footer class="bg-primary text-white text-center py-3 mt-5">
  © Faeterj Petrópolis 2025. Todos os direitos reservados.
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
