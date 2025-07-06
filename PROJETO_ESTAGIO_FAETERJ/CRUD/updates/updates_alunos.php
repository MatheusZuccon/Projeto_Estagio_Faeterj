<?php
include_once "../../conexao/db_connect.php";
include_once '../../functions/selecao/selecao.php'; 

$matricula = filter_input(INPUT_GET, 'matricula', FILTER_SANITIZE_NUMBER_INT);

$stmt = $conn->prepare("SELECT * FROM alunos WHERE matricula = :matricula");
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
  <title>Editar Aluno</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .form-container {
      max-width: 900px;
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
    <h4 class="text-primary mb-4">Editar Estagiário</h4>
    <form action="updates_alunos_process.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="matricula" value="<?= htmlspecialchars($dados['matricula']) ?>">

      <div class="mb-3">
        <label>Foto 3x4</label>
        <input type="file" class="form-control" name="foto">
      </div>

      <div class="mb-3">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="<?= htmlspecialchars($dados['nome']) ?>">
      </div>

      <div class="mb-3">
        <label>Nome Social</label>
        <input type="text" class="form-control" name="nome_social" value="<?= htmlspecialchars($dados['nome_social']) ?>">
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Nascimento</label>
          <input type="date" class="form-control" name="nascimento" value="<?= htmlspecialchars($dados['nascimento']) ?>">
        </div>
        <div class="col">
          <label>Sexo</label>
          <select class="form-control" name="sexo">
            <option <?= $dados['sexo'] == 'Masculino' ? 'selected' : '' ?>>Masculino</option>
            <option <?= $dados['sexo'] == 'Feminino' ? 'selected' : '' ?>>Feminino</option>
            <option <?= $dados['sexo'] == 'Outro' ? 'selected' : '' ?>>Outro</option>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Gênero</label>
          <select class="form-control" name="genero">
          <option value="">Selecione o Gênero</option>
          <?php 
                selecionaGenero($dados['genero'], $conn); 
          ?>
          </select>
        </div>
        <div class="col">
          <label>CPF</label>
          <input type="text" class="form-control" name="cpf" value="<?= htmlspecialchars($dados['cpf']) ?>">
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>RG</label>
          <input type="text" class="form-control" name="rg" value="<?= htmlspecialchars($dados['rg']) ?>">
        </div>
        <div class="col">
          <label>Órgão Emissor</label>
          <input type="text" class="form-control" name="orgao_emissor" value="<?= htmlspecialchars($dados['orgao_emissor']) ?>">
        </div>
        <div class="col">
          <label>Data de Emissão do RG</label>
          <input type="date" class="form-control" name="data_emissao_rg" value="<?= htmlspecialchars($dados['data_emissao_rg']) ?>">
        </div>
      </div>

      <div class="mb-3">
        <label>Endereço</label>
        <input type="text" class="form-control" name="endereco" value="<?= htmlspecialchars($dados['endereco']) ?>">
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Bairro</label>
          <select class="form-control" name="bairro">
          <option value="">Selecione o Bairro</option>
          <?php 
                selecionaBairro($dados['bairro'], $conn); 
          ?>
          </select>
        </div>
        <div class="col">
          <label>Cidade</label>
          <select class="form-control" name="cidade">
          <option value="">Selecione a Cidade</option>
          <?php 
                selecionaCidade($dados['cidade'], $conn); 
          ?>
          </select>
        </div>
        <div class="col">
          <label>UF</label>
          <select class="form-control" name="uf">
          <option value="">Selecione o UF</option>
          <?php 
                selecionaUF($dados['uf'], $conn); 
          ?>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Telefone Celular</label>
          <input type="tel" class="form-control" name="telefone_celular" value="<?= htmlspecialchars($dados['telefone_celular']) ?>">
        </div>
        <div class="col">
          <label>Telefone Fixo</label>
          <input type="tel" class="form-control" name="telefone_fixo" value="<?= htmlspecialchars($dados['telefone_fixo']) ?>">
        </div>
      </div>

      <div class="mb-3">
        <label>Email</label>
        <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($dados['email']) ?>">
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Unidade de Ensino</label>
          <select class="form-control" name="unidade_ensino">
          <option value="">Selecione a UE</option>
          <?php 
                selecionaUnidade($dados['unidade_ensino'], $conn); 
          ?>
          </select>
        </div>
        <div class="col">
          <label>Curso</label>
          <select class="form-control" name="curso">
          <option value="">Selecione o Curso</option>
          <?php 
                selecionaCurso($dados['curso'], $conn); 
          ?>
          </select>
        </div>
      </div>

      <div class="row mb-3">
        <div class="col">
          <label>Previsão de Conclusão</label>
          <input type="date" class="form-control" name="previsao_conclusao" value="<?= htmlspecialchars($dados['previsao_conclusao']) ?>">
        </div>
        <div class="col">
          <label>Carta de Apresentação Nº</label>
          <input type="text" class="form-control" name="carta_apresentacao" value="<?= htmlspecialchars($dados['carta_apresentacao']) ?>">
        </div>
      </div>

        <tr>
          <td><label class="form-label" for="tipo_estagio">Externo/Interno</label></td>
          <td>
            <select class="form-control" id="tipo_estagio" name="tipo_estagio">
              <option <?= $dados['tipo_estagio'] == 'Selecione' ? 'selected' : '' ?>>Selecione</option>
              <option <?= $dados['tipo_estagio'] == 'Externo' ? 'selected' : '' ?>>Externo</option>
              <option <?= $dados['tipo_estagio'] == 'Interno' ? 'selected' : '' ?>>Interno</option>
            </select>
          </td>
          <td><label class="form-label" for="local_estagio">Local de Estágio</label></td>
          <select class="form-control" name="local_estagio">
          <option value="">Selecione a Empresa</option>
          <?php 
                selecionaEmpresa($dados['local_estagio'], $conn); 
          ?>
          </select>
        </tr>

        <tr>
          <td><label class="form-label" for="seguro">Seguro</label></td>
          <td>
            <select class="form-control" id="seguro" name="seguro">
              <option <?= $dados['seguro'] == 'Selecione' ? 'selected' : '' ?>>Selecione</option>
              <option <?= $dados['seguro'] == 'FAETEC' ? 'selected' : '' ?>>FAETEC</option>
              <option <?= $dados['seguro'] == 'Empresa' ? 'selected' : '' ?>>Empresa</option>
            </select>
          </td>
          <td><label class="form-label" for="tipo_convenio">Tipo de Convênio</label></td>
          <select class="form-control" name="tipo_convenio">
          <option value="">Selecione o Convênio</option>
          <?php 
                selecionaConvenio($dados['tipo_convenio'], $conn); 
          ?>
          </select>
        </tr>

        <tr>
          <td><label class="form-label" for="inicio_estagio">Início do Estágio</label></td>
          <td><input type="date" class="form-control" id="inicio_estagio" name="inicio_estagio" value="<?= $dados['inicio_estagio'] ?>"></td>
          <td><label class="form-label" for="termino_estagio">Término do Estágio</label></td>
          <td><input type="date" class="form-control" id="termino_estagio" name="termino_estagio" value="<?= $dados['termino_estagio'] ?>"></td>
        </tr>

        <tr>
          <td><label class="form-label" for="status_estagio">Status do Estágio</label></td>
          <td><input type="text" class="form-control" id="status_estagio" name="status_estagio" value="<?= $dados['status_estagio'] ?>"></td>
          <td><label class="form-label" for="remunerado">Remunerado</label></td>
          <td><input type="text" class="form-control" id="remunerado" name="remunerado" value="<?= $dados['remunerado'] ?>"></td>
        </tr>

        <tr>
          <td><label class="form-label" for="obrigatorio">Obrigatório</label></td>
          <td>
            <select class="form-control" id="obrigatorio" name="obrigatorio">
              <option <?= $dados['obrigatorio'] == 'Selecione' ? 'selected' : '' ?>>Selecione</option>
              <option <?= $dados['obrigatorio'] == 'Sim' ? 'selected' : '' ?>>Sim</option>
              <option <?= $dados['obrigatorio'] == 'Não' ? 'selected' : '' ?>>Não</option>
            </select>
          </td>
          <div class="col">
          <label>Seguradora</label>
          <select class="form-control" name="seguradora">
          <option value="">Selecione a Seguradora</option>
          <?php 
                selecionaSeguradora($dados['seguradora'], $conn); 
          ?>
          </select>
        </div>
        </tr>

        <tr>
          <td><label class="form-label" for="modalidade">Modalidade</label></td>
          <td>
            <select class="form-control" id="modalidade" name="modalidade">
              <option <?= $dados['modalidade'] == 'Selecione' ? 'selected' : '' ?>>Selecione</option>
              <option <?= $dados['modalidade'] == 'Presencial' ? 'selected' : '' ?>>Presencial</option>
              <option <?= $dados['modalidade'] == 'Remoto' ? 'selected' : '' ?>>Remoto</option>
              <option <?= $dados['modalidade'] == 'Híbrido' ? 'selected' : '' ?>>Híbrido</option>
            </select>
          </td>
          <td><label class="form-label" for="programa">Programa</label></td>
          <td><input type="text" class="form-control" id="programa" name="programa" value="<?= $dados['programa'] ?>"></td>
        </tr>

        <tr>

      <div class="text-end">
        <button type="submit" class="btn btn-primary">Salvar</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
