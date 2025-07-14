<?php
session_start();
require_once "conexao/db_connect.php";

$identificador = filter_input(INPUT_POST, 'identificador', FILTER_SANITIZE_STRING);
$email         = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$senha         = filter_input(INPUT_POST, 'senha', FILTER_DEFAULT);
$tipo_acesso   = filter_input(INPUT_POST, 'tipo_acesso', FILTER_SANITIZE_STRING);


try {
    $stmt = $conn->prepare("SELECT * FROM usuarios 
                            WHERE identificador = :identificador 
                              AND email = :email 
                              AND tipo_acesso = :tipo_acesso 
                            LIMIT 1");
    $stmt->bindParam(":identificador", $identificador);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":tipo_acesso", $tipo_acesso);
    $stmt->execute();

    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($usuario && $senha === $usuario['senha']) {
        session_regenerate_id(true);
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_email'] = $usuario['email'];
        $_SESSION['usuario_identificador'] = $usuario['identificador'];
        $_SESSION['tipo_acesso'] = $usuario['tipo_acesso'];

        header("Location: home.php");
        exit;
    } else {
        $_SESSION['erro_login'] = "Credenciais inválidas.";
        header("Location: login.php");
        exit;
    }

} catch (PDOException $e) {
    echo "Erro ao verificar login: " . $e->getMessage();
}
