<?php
    session_start(); 
    include_once "../../conexao/db_connect.php";

    // Criação das variáveis
    $nome                 = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $matricula            = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $telefone_fixo        = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
    $email                = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $empresa              = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $tipo_estagio         = filter_input(INPUT_POST, 'tipo_estagio', FILTER_SANITIZE_STRING);
    $data_inicio          = filter_input(INPUT_POST, 'data_inicio', FILTER_SANITIZE_NUMBER_INT);
    $data_final           = filter_input(INPUT_POST, 'data_final', FILTER_SANITIZE_NUMBER_INT);
    $data_entrega         = filter_input(INPUT_POST, 'data_entrega', FILTER_SANITIZE_NUMBER_INT);
    $horas_relatadas      = filter_input(INPUT_POST, 'horas_relatadas', FILTER_SANITIZE_NUMBER_INT);
    $n_relatorio          = filter_input(INPUT_POST, 'n_relatorio', FILTER_SANITIZE_STRING);
    $parecer_tecnico      = filter_input(INPUT_POST, 'parecer_tecnico', FILTER_SANITIZE_STRING);
    $relatorio            = filter_input(INPUT_POST, 'relatorio', FILTER_SANITIZE_STRING);

    /* Testes da entrada dos dados
    //echo "Nome: " . $nome . "<br>";
    //echo "Matrícula: " . $matricula . "<br>";
    //echo "Telefone Fixo: " . $telefone_fixo . "<br>";
    //echo "Email: " . $email . "<br>";
    //echo "Empresa: " . $empresa . "<br>";
    //echo "Tipo de Estágio: " . $tipo_estagio . "<br>";
    //echo "Data de Início: " . $data_inicio . "<br>";
    //echo "Data Final: " . $data_final . "<br>";
    //echo "Data de Entrega: " . $data_entrega . "<br>";
    //echo "Horas Relatadas: " . $horas_relatadas . "<br>";
    //echo "Número do Relatório: " . $n_relatorio . "<br>";
    //echo "Parecer Técnico: " . $parecer_tecnico . "<br>";
    //echo "Relatório: " . $relatorio . "<br>";
    */

    $conn -> beginTransaction();
        $insert = "INSERT INTO relatorio_est (
            matricula,
            nome,
            email,
            telefone_fixo,
            empresa,
            tipo_estagio,
            data_inicio,
            data_final,
            data_entrega,
            horas_relatadas,
            n_relatorio,
            parecer_tecnico,
            relatorio
            
        ) VALUES (
            :matricula,
            :nome,
            :email,
            :telefone_fixo,
            :empresa,
            :tipo_estagio,
            :data_inicio,
            :data_final,
            :data_entrega,
            :horas_relatadas,
            :n_relatorio,
            :parecer_tecnico,
            :relatorio
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt -> bindParam(':matricula',$matricula);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':empresa', $empresa);
        $stmt->bindParam(':tipo_estagio', $tipo_estagio);
        $stmt->bindParam(':data_inicio', $data_inicio);
        $stmt->bindParam(':data_final', $data_final);
        $stmt->bindParam(':data_entrega', $data_entrega);
        $stmt->bindParam(':horas_relatadas', $horas_relatadas);
        $stmt->bindParam(':n_relatorio', $n_relatorio);
        $stmt->bindParam(':parecer_tecnico', $parecer_tecnico);
        $stmt->bindParam(':relatorio', $relatorio);


        $stmt->execute();
        $conn->commit();
        
        header("Location: ../../form_relatorio.php");

?>



    

