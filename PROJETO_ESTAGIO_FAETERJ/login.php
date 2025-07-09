<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema de Estágio</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f8f9fa;
    }

    .login-container {
      display: flex;
      height: 100vh;
    }

    .login-left {
      background-color: #005999;
      color: white;
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
    }

    .login-left h1 {
      font-weight: bold;
    }

    .login-left p {
      margin-top: 10px;
      font-size: 1.1rem;
    }

    .login-right {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 40px;
      background-color: white;
    }

    .form-control, .form-select {
      border-radius: 10px;
    }

    .btn-primary {
      background-color: #005999;
      border: none;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #004c87;
    }

    .btn-outline-primary {
      border-color: #005999;
      color: #005999;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
      background-color: #005999;
      color: white;
    }

    .card {
      animation: fadeInUp 0.6s ease;
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
  </style>
</head>
<body>

<div class="login-container">
  <!-- Lado esquerdo -->
  <div class="login-left text-center">
    <img src="imagens/dragao_faeterj_att.png" alt="Logo" width="100" class="mb-4">
    <h1>Olá, bem-vindo!</h1>
    <p>Acesse o sistema de estágios da FAETERJ-Petrópolis</p>
  </div>

  <!-- Lado direito -->
  <div class="login-right d-flex align-items-center justify-content-center">
    <div class="card shadow border-0 p-5" style="width: 100%; max-width: 500px;">
      <h4 class="text-center mb-4">Entrar no Sistema</h4>

      <form action="valida_login.php" method="post">
        <div class="row g-3">

          <div class="col-md-6">
            <label for="id_funcional/matricula" class="form-label">ID Funcional ou Matrícula</label>
            <input type="text" class="form-control" id="id_funcional/matricula" name="id_funcional/matricula" required>
          </div>

          <div class="col-md-6">
            <label for="acesso" class="form-label">Tipo de Acesso</label>
            <select class="form-select" id="acesso" name="acesso" required>
              <option value="">Selecione</option>
              <option value="aluno">Aluno</option>
              <option value="admin">Administrador</option>
            </select>
          </div>

          <div class="col-12">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>

          <div class="col-12">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
          </div>

          <div class="col-12 mt-4 d-grid gap-2">
            <button type="submit" class="btn btn-primary w-100">Login</button>
          </div>

          <div class="col-12 mt-2 text-center">
            <a href="recuperar_senha.php" class="btn btn-outline-primary w-100">Esqueci minha senha</a>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>
