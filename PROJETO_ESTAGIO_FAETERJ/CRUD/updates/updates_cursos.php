<?php
include_once "../../conexao/db_connect.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("SELECT * FROM faeterj_apoio_curso WHERE id = :id");
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
  <title>Editar Cursos</title>
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
    <h4 class="text-primary mb-4">Editar Curso</h4>
    <form action="updates_cursos_process.php" method="post">
      <input type="hidden" name="id" value="<?= htmlspecialchars($dados['id']) ?>">
      <div class="mb-3">
        <label>Nome do Curso</label>
        <input type="text" class="form-control" name="curso" value="<?= htmlspecialchars($dados['curso']) ?>">
      </div>
      <div class="mb-3">
        <label>Sigla</label>
        <input type="text" class="form-control" name="sigla" value="<?= htmlspecialchars($dados['sigla']) ?>">
      </div>
      <div class="mb-3">
        <label>Descrição do Curso</label>
        <textarea id="curso_desc" name="curso_desc" rows="4" class="form-control"><?= htmlspecialchars($dados['curso_desc']) ?></textarea>
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
