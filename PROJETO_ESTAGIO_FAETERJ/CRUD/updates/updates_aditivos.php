<?php
include_once "../../conexao/db_connect.php";

$matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("SELECT * FROM ta WHERE matricula = :matricula");
$stmt->bindParam(':matricula', $matricula);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$dados) {
    echo "Registro não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Editar TA</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container {
      max-width: 700px;
      margin: auto;
      background: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    label {
      font-weight: 500;
      color: #495057;
    }
    .btn-primary:hover {
      background-color: #23272b;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="form-container border border-primary">
    <h4 class="text-primary mb-4">Editar TA</h4>
    <form action="updates_aditivos_process.php" method="post">
      <input type="hidden" name="matricula" value="<?= htmlspecialchars($dados['matricula']) ?>">

      <div class="mb-3">
        <label>Matrícula</label>
        <input type="number" class="form-control" name="matricula" value="<?= htmlspecialchars($dados['matricula']) ?>">
      </div>

      <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>">
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($dados['email']) ?>">
      </div>

      <div class="mb-3">
        <label>Nº do TCE</label>
        <input type="text" class="form-control" name="numero_tce" value="<?= htmlspecialchars($dados['numero_tce']) ?>">
      </div>

      <div class="mb-3">
        <label>Empresa</label>
        <input type="text" class="form-control" name="empresa" value="<?= htmlspecialchars($dados['empresa']) ?>">
      </div>

      <div class="mb-3">
        <label>Início do Estágio</label>
        <input type="date" class="form-control" name="inicio_estagio" value="<?= htmlspecialchars($dados['inicio_estagio']) ?>">
      </div>

      <div class="mb-3">
        <label>Término do Estágio</label>
        <input type="date" class="form-control" name="termino_estagio" value="<?= htmlspecialchars($dados['termino_estagio']) ?>">
      </div>
        
      <div class="mb-3">
        <label>Novo Término do Estágio</label>
        <input type="date" class="form-control" name="novo_termino_estagio" value="<?= htmlspecialchars($dados['novo_termino_estagio']) ?>">
      </div>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
