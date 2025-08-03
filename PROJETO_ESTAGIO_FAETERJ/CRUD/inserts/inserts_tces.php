<?php 
    session_start(); 
    include_once "../../conexao/db_connect.php";

    //Criação das variáveis
    $aluno_matricula     = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
    $numero_tce           = filter_input(INPUT_POST, 'numero_tce', FILTER_SANITIZE_STRING);

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
            aluno_matricula,
            numero_tce
        ) VALUES (
            :aluno_matricula,
            :numero_tce
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt -> bindParam(':aluno_matricula',$aluno_matricula);
        $stmt->bindParam(':numero_tce', $numero_tce);
       
        $stmt->execute();
        $conn->commit();

        header("Location: ../../form_tce.php");
        exit;
    
?>

  
