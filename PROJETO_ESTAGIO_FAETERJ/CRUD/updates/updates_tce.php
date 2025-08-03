<?php
include_once "../../conexao/db_connect.php";
include_once '../../functions/selecao/selecao.php'; 
include_once "../../functions/exibicao/exibicao.php";

// Recuperar a matrícula do aluno vinda da URL
$aluno_matricula = filter_input(INPUT_GET, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);

$sql = "
SELECT 
    tce.aluno_matricula,
    tce.numero_tce,
    alunos.nome, 
    alunos.email,
    alunos.telefone_celular,
    alunos.local_estagio,
    alunos.inicio_estagio,
    alunos.termino_estagio
FROM 
    tce
JOIN 
    alunos ON alunos.matricula = tce.aluno_matricula
WHERE 
    tce.aluno_matricula = :aluno_matricula
";


$stmt = $conn->prepare($sql);
$stmt->bindParam(':aluno_matricula', $aluno_matricula, PDO::PARAM_INT);
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
  <title>Editar TCE</title>
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
    <h4 class="text-primary mb-4">Editar TCE</h4>
    <form action="updates_tce_process.php" method="post">
      <input type="hidden" name="aluno_matricula" value="<?= htmlspecialchars($dados['aluno_matricula']) ?>">

      <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>" readonly>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($dados['email']) ?>" readonly>
      </div>

      <div class="mb-3">
        <label>Telefone Celular</label>
        <input type="tel" class="form-control" name="telefone_celular" value="<?= htmlspecialchars($dados['telefone_celular']) ?>" readonly>
      </div>

      <div class="mb-3">
        <label>Nº do TCE</label>
        <input type="text" class="form-control" name="numero_tce" value="<?= htmlspecialchars($dados['numero_tce']) ?>">
      </div>

      <div class="mb-3">
        <label>Empresa</label>
        <input type="text" class="form-control" name="empresa" value="<?= htmlspecialchars(exibeEmpresa($dados['local_estagio'], $conn)) ?>" readonly>
      </div>

      <div class="mb-3">
        <label>Início do Estágio</label>
        <input type="date" class="form-control" name="inicio_estagio" value="<?= htmlspecialchars($dados['inicio_estagio']) ?>" readonly>
      </div>

      <div class="mb-3">
        <label>Término do Estágio</label>
        <input type="date" class="form-control" name="termino_estagio" value="<?= htmlspecialchars($dados['termino_estagio']) ?>" readonly>
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
