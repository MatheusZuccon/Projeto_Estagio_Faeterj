<?php
include_once "../../conexao/db_connect.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("SELECT * FROM faeterj_apoio_genero WHERE id = :id");
$stmt->bindParam(':id', $id);
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
  <title>Editar Gênero</title>
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
    <h4 class="text-primary mb-4">Editar Gênero</h4>
    <form action="updates_generos_process.php" method="post">
      <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">
      <div class="mb-3">
        <label>Gênero</label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($dados['genero_tipo']) ?>">
      </div>
      <div class="mb-3">
        <label>Gênero Descrição</label>
        <input type="text" class="form-control" name="cidade" value="<?= htmlspecialchars($dados['genero_obs']) ?>">
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
