<?php
include_once "../../conexao/db_connect.php";

$empresa = filter_input(INPUT_GET, 'empresa', FILTER_SANITIZE_STRING);

$stmt = $conn->prepare("SELECT * FROM faeterj_apoio_empresa WHERE empresa = :empresa");
$stmt->bindParam(':empresa', $empresa);
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
  <title>Editar Empresas</title>
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
    <h4 class="text-primary mb-4">Editar Empresas</h4>
    <form action="updates_empresas_process.php" method="post">
      <input type="hidden" name="empresa" value="<?= htmlspecialchars($dados['empresa']) ?>">
      <div class="mb-3">
        <label>Nome Fantasia</label>
        <input type="text" class="form-control" name="nome_fantasia" value="<?= htmlspecialchars($dados['nome_fantasia']) ?>">
      </div>

      <div class="mb-3">
        <label>Área Profissional</label>
        <input type="text" class="form-control" name="area_profissional" value="<?= htmlspecialchars($dados['area_profissional']) ?>">
      </div>

      <div class="mb-3">
        <label>Situação</label>
        <input type="text" class="form-control" name="situacao" value="<?= htmlspecialchars($dados['situacao']) ?>">
      </div>

      <div class="mb-3">
        <label>Vencimento</label>
        <input type="date" class="form-control" name="vencimento" value="<?= htmlspecialchars($dados['vencimento']) ?>">
      </div>

      <div class="mb-3">
        <label>Telefone Fixo</label>
        <input type="text" class="form-control" name="telefone_fixo" value="<?= htmlspecialchars($dados['telefone_fixo']) ?>">
      </div>
        
      <div class="mb-3">
        <label>Cidade</label>
        <input type="date" class="form-control" name="cidade" value="<?= htmlspecialchars($dados['cidade']) ?>">
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
