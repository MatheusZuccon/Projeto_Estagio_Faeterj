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
  </style>
</head>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow">
  <div class="container">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="imagens/dragao_faeterj_att.png" alt="Logo" width="30" height="30" class="me-2">
        Sistema de Estágios
      </a>
      
      <ul class="navbar-nav mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="home.php"><i class="bi bi-house-door-fill me-1"></i>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="estagiarios.php"><i class="bi bi-person-lines-fill me-1"></i>Estagiários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="documentacao.php"><i class="bi bi-file-earmark-text me-1"></i>Documentos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="form_empresas.php"><i class="bi bi-building me-1"></i>Empresas</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    
<!-- Espaço para a navbar -->
<div style="margin-top: 90px;"></div>
    
<!-- Container de botões -->
<div class="container d-flex justify-content-center align-items-center">
  <div class="container-buttons text-center" style="max-width: 800px;">
    <h5 class="mb-4">O que você deseja acessar?</h5>
    <div class="row g-3 justify-content-center">
      <div class="col-md-6 mb-3">
        <a href="form_empresas.php" class="btn btn-primary w-100">
          <i class="bi bi-person-plus-fill me-1"></i> Formulário de Empresas
        </a>
      </div>
      <div class="col-md-6 mb-3">
        <a href="" class="btn btn-primary w-100">
          <i class="bi bi-people-fill me-1"></i> Empresas Cadastradas
        </a>
      </div>  
    </div>
  </div>
</div>
