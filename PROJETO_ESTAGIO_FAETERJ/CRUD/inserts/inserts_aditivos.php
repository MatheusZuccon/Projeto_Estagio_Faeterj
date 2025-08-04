<?php   
    session_start();
    include_once "../../conexao/db_connect.php";

    //Criação das variáveis
    $aluno_matricula            = filter_input(INPUT_POST, 'aluno_matricula', FILTER_SANITIZE_NUMBER_INT);
    $novo_termino_estagio       = filter_input(INPUT_POST, 'novo_termino_estagio', FILTER_SANITIZE_NUMBER_INT);

    /*
    Testes da entrada dos dados
    echo "nome: " . $nome . "<br>";
    echo "matricula: " . $matricula . "<br>";
    echo "email: " . $email . "<br>";
    echo "numero_tce: " . $numero_tce . "<br>";
    echo "empresa " . $empresa . "<br>";
    echo "inicio_estagio: " . $inicio_estagio . "<br>";
    echo "termino_estagio: " . $termino_estagio . "<br>"; 
    echo "novo_termino_estagio: " . $novo_termino_estagio . "<br>"; 
    */

    $conn -> beginTransaction();
        $insert = "INSERT INTO ta (
            aluno_matricula,
            novo_termino_estagio
        ) VALUES (
            :aluno_matricula,
            :novo_termino_estagio
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt -> bindParam(':aluno_matricula',$aluno_matricula);
        $stmt->bindParam(':novo_termino_estagio', $novo_termino_estagio);

        $stmt->execute();
        $conn->commit();
    
        header("Location: ../../form_aditivos.php");
    
?>




