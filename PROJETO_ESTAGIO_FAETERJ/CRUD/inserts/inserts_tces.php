<?php 
    session_start(); 
    include_once "../../conexao/db_connect.php";

    //Criação das variáveis
    $nome                 = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $matricula            = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $email                = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $telefone_celular    = filter_input(INPUT_POST, 'telefone_celular', FILTER_SANITIZE_STRING);
    $numero_tce           = filter_input(INPUT_POST, 'numero_tce', FILTER_SANITIZE_STRING);
    $empresa              = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $inicio_estagio       = filter_input(INPUT_POST, 'inicio_estagio', FILTER_SANITIZE_NUMBER_INT);
    $termino_estagio      = filter_input(INPUT_POST, 'termino_estagio', FILTER_SANITIZE_NUMBER_INT);
   

    /*Testes da entrada dos dados
    //echo "nome: " . $nome . "<br>";
    //echo "matricula: " . $matricula . "<br>";
    //echo "email: " . $email . "<br>";
    //echo "telefone_celular " . $telefone_celular . "<br>";
    //echo "numero_tce: " . $numero_tce . "<br>";
    //echo "empresa: " . $empresa . "<br>";
    //echo "inicio_estagio: " . $inicio_estagio . "<br>";
    //echo "termino_estagio: " . $termino_estagio . "<br>"; 
    */

    $conn -> beginTransaction();
        $insert = "INSERT INTO tce (
            matricula,
            nome,
            email,
            telefone_celular,
            numero_tce,
            empresa,
            inicio_estagio,
            termino_estagio
        ) VALUES (
            :matricula,
            :nome,
            :email,
            :telefone_celular,
            :numero_tce,
            :empresa,
            :inicio_estagio,
            :termino_estagio
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt -> bindParam(':matricula',$matricula);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone_celular', $telefone_celular);
        $stmt->bindParam(':numero_tce', $numero_tce);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':inicio_estagio', $inicio_estagio);
        $stmt->bindParam(':termino_estagio', $termino_estagio);


        $stmt->execute();
        $conn->commit();

        header("Location: ../../form_tce.php");
        exit;
    
?>

  
