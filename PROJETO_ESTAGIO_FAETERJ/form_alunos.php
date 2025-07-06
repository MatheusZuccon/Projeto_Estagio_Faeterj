<?php 
    session_start(); 
    include_once 'conexao/db_connect.php';
    include_once 'functions/exibicao/exibicao.php';
    include_once 'functions/selecao/selecao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Estágiarios</title>
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
    border: 1px solid #005999;
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
    <h4 class="mb-0">Estagiários</h4>
  </div>

  <!-- Início do Formulário -->
  <form action="CRUD/inserts/inserts_alunos.php" 
      class="border-azul p-4 bg-white shadow-sm" 
      enctype="multipart/form-data" method="post">
   <div class="table-responsive">
    <table class="table table-bordered align-middle table-striped">
      <tr>
        <td><label class="form-label" for="foto">Foto 3x4</label></td>
        <td colspan="3"><input type="file" class="form-control" id="foto" name="foto"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="nome">Nome</label></td>
        <td colspan="3"><input type="text" class="form-control" id="nome" name="nome"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="matricula">Matrícula</label></td>
        <td colspan="3"><input type="text" class="form-control" id="matricula" name="matricula"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="nome_social">Nome Social</label></td>
        <td colspan="3"><input type="text" class="form-control" id="nome_social" name="nome_social"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="nascimento">Nascimento</label></td>
        <td><input type="date" class="form-control" id="nascimento" name="nascimento"></input></td>
        <td><label class="form-label" for="sexo">Sexo</label></td>
        <td>
          <select class="form-control" id="sexo" name="sexo">
            <option>Selecione</option>
            <option>Masculino</option>
            <option>Feminino</option>
            <option>Outro</option>
          </select>
        </td>
      </tr>
      <tr>
        <td><label class="form-label" for="genero">Gênero</label></td>
        <td><select class="form-control form-control-sm" id="genero" name="genero" width="100%">
                <option value="">Selecione o Gênero</option>
                <option> <?php 
                             selecionaGenero($genero,$conn);
                         ?>         
            </select>
        </td>
        <td><label class="form-label" for="cpf">CPF</label></td>
        <td><input type="text" class="form-control" id="cpf" name="cpf"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="rg">RG</label></td>
        <td><input type="text" class="form-control" id="rg" name="rg"></input></td>
        <td><label class="form-label" for="orgao_emissor">Órgão Emissor</label></td>
        <td><input type="text" class="form-control" id="orgao_emissor" name="orgao_emissor"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="data_emissao_rg">Data Emissão RG</label></td>
        <td><input type="date" class="form-control" id="data_emissao_rg" name="data_emissao_rg"></input></td>
        <td><label class="form-label" for="endereco">Endereço</label></td>
        <td colspan="3"><input type="text" class="form-control" id="endereco" name="endereco"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="bairro">Bairro</label></td>
        <td><select class="form-control form-control-sm" id="bairro" name="bairro" width="100%">
                <option value="">Selecione o Bairro</option>
                <option> <?php 
                             selecionaBairro($bairro,$conn);
                         ?>         
            </select>
        </td>
        <td><label class="form-label" for="cidade">Cidade</label></td>
        <td><select class="form-control form-control-sm" id="cidade" name="cidade" width="100%">
                <option value="">Selecione a Cidade</option>
                <option> <?php 
                             selecionaCidade($cidade,$conn);
                         ?>         
            </select>
        </td>
      </tr>
      <tr>
        <td><label class="form-label" for="UF">UF</label></td>
        <td><select class="form-control form-control-sm" id="uf" name="uf" width="100%">
                <option value="">Selecione o UF</option>
                <option> <?php 
                             selecionaUF($uf,$conn);
                         ?>         
            </select>
        </td> 
        <td><label class="form-label" for="telefone_celular">Telefone Celular</label></td>
        <td><input type="tel" class="form-control" id="telefone_celular" name="telefone_celular"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="telefone_fixo">Telefone Fixo</label></td>
        <td><input type="tel" class="form-control" id="telefone_fixo" name="telefone_fixo"></input></td>
        <td><label class="form-label" for="email">Email</label></td>
        <td><input type="email" class="form-control" id="email" name="email"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="unidade_ensino">Unidade de Ensino</label></td>
        <td><select class="form-control form-control-sm" id="unidade_ensino" name="unidade_ensino" width="100%">
                <option value="">Selecione a UE</option>
                <option> <?php 
                             selecionaUnidade($unidade,$conn);
                         ?>         
            </select></td>
        <td><label class="form-label" for="curso">Curso</label></td>
        <td><select class="form-control form-control-sm" id="curso" name="curso" width="100%">
                <option value="">Selecione o Curso</option>
                <option> <?php 
                             selecionaCurso($curso,$conn);
                         ?>         
            </select></td>
      </tr>
      <tr>
        <td><label class="form-label" for="previsao_conclusao">Previsão Conclusão</label></td>
        <td><input type="date" class="form-control" id="previsao_conclusao" name="previsao_conclusao"></input></td>
        <td><label class="form-label" for="carta_apresentacao">Carta de Apresentação Nº</label></td>
        <td><input type="text" class="form-control" id="carta_apresentacao" name="carta_apresentacao"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="tipo_estagio">Externo/Interno</label></td>
        <td>
          <select class="form-control" id="tipo_estagio" name="tipo_estagio">
            <option>Selecione</option>
            <option>Externo</option>
            <option>Interno</option>
          </select>
        </td>
        <td><label class="form-label" for="local_estagio">Local de Estágio</label></td>
        <td><select class="form-control form-control-sm" id="local_estagio" name="local_estagio" width="100%">
                <option value="">Selecione a Empresa</option>
                <option> <?php 
                             selecionaEmpresa($empresa,$conn);
                         ?>         
            </select></td>
      </tr>
      <tr>
        <td><label class="form-label" for="seguro">Seguro</label></td>
        <td>
          <select class="form-control" id="seguro" name="seguro">
            <option>Selecione</option>
            <option>FAETEC</option>
            <option>Empresa</option>
          </select>
        </td>
        <td><label class="form-label" for="tipo_convenio">Tipo de Convênio</label></td>
        <td><select class="form-control form-control-sm" id="tipo_convenio" name="tipo_convenio" width="100%">
                <option value="">Selecione o Convênio</option>
                <option> <?php 
                             selecionaConvenio($convenio,$conn);
                         ?>         
            </select>
      </tr>
      <tr>
        <td><label class="form-label" for="inicio_estagio">Início do Estágio</label></td>
        <td><input type="date" class="form-control" id="inicio_estagio" name="inicio_estagio"></input></td>
        <td><label class="form-label" for="termino_estagio">Término do Estágio</label></td>
        <td><input type="date" class="form-control" id="termino_estagio" name="termino_estagio"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="status_estagio">Status do Estágio</label></td>
        <td><input type="text" class="form-control" id="status_estagio" name="status_estagio"></input></td>
        <td><label class="form-label" for="remunerado">Remunerado</label></td>
        <td><input type="text" class="form-control" id="remunerado" name="remunerado"></input></td>
      </tr>
      <tr>
        <td><label class="form-label" for="obrigatorio">Obrigatório</label></td>
        <td>
          <select class="form-control" id="obrigatorio" name="obrigatorio">
            <option>Selecione</option>
            <option>Sim</option>
            <option>Não</option>
          </select>
        </td>
        <td><label class="form-label" for="seguradora">Seguradora</label></td>
        <td><select class="form-control form-control-sm" id="seguradora" name="seguradora" width="100%">
                <option value="">Selecione a Seguradora</option>
                <option> <?php 
                             selecionaSeguradora($seguradora,$conn);
                         ?>         
            </select>
      </tr>
      <tr>
        <td><label class="form-label" for="modalidade">Modalidade</label></td>
        <td>
          <select class="form-control" id="modalidade" name="modalidade">
            <option>Selecione</option>
            <option>Presencial</option>
            <option>Remoto</option>
            <option>Híbrido</option>
          </select>
        </td>
        <td><label class="form-label" for="programa">Programa</label></td>
        <td><input type="text" class="form-control" id="programa" name="programa"></input></td>
      </tr>
      <tr>
        <td colspan="4" class="text-start">
          <button type="submit" class="btn btn-primary" id="enviar" name="enviar">Enviar</button>
        </td>
      </tr>
    </table>
   </div>      
  </form>  
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById("tipo_convenio").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_seguradora.php";
  }
});
</script>

<script>
document.getElementById("seguradora").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_seguradora.php";
  }
});
</script>

<script>
document.getElementById("unidade_ensino").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_unidades.php";
  }
});
</script>

<script>
document.getElementById("curso").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_unidades.php";
  }
});
</script>

<script>
document.getElementById("local_estagio").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_empresas.php";
  }
});
</script>

<script>
document.getElementById("genero").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_generos.php";
  }
});
</script>

<script>
document.getElementById("bairro").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_localidades.php";
  }
});
</script>

<script>
document.getElementById("cidade").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_localidades.php";
  }
});
</script>

<script>
document.getElementById("uf").addEventListener("change", function () {
  if (this.value === "novo") {
    window.location.href = "form_localidades.php";
  }
});
</script>

</body>
</html>
