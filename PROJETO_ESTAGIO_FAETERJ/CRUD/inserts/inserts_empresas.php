<?php
    session_start(); 
    include_once "../../conexao/db_connect.php";

    // Criação das variáveis
    $empresa                  = filter_input(INPUT_POST, 'empresa', FILTER_SANITIZE_STRING);
    $nome_fantasia            = filter_input(INPUT_POST, 'nome_fantasia', FILTER_SANITIZE_STRING);
    $area_profissional        = filter_input(INPUT_POST, 'area_profissional', FILTER_SANITIZE_STRING);
    $situacao                 = filter_input(INPUT_POST, 'situacao', FILTER_SANITIZE_STRING);
    $vencimento               = filter_input(INPUT_POST, 'vencimento', FILTER_SANITIZE_NUMBER_INT);
    $telefone_fixo            = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
    $cidade                   = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    
     $conn -> beginTransaction();
        $insert = "INSERT INTO faeterj_apoio_empresa (
            empresa,
            nome_fantasia,
            area_profissional,
            situacao,
            vencimento,
            telefone_fixo,
            cidade
            
        ) VALUES (
            :empresa,
            :nome_fantasia,
            :area_profissional,
            :situacao,
            :vencimento,
            :telefone_fixo,
            :cidade
          
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt->bindParam(':empresa',$empresa);
        $stmt->bindParam(':nome_fantasia', $nome_fantasia);
        $stmt->bindParam(':area_profissional', $area_profissional);
        $stmt->bindParam(':situacao', $situacao);
        $stmt->bindParam(':vencimento', $vencimento);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':cidade', $cidade);

        $stmt->execute();
        $conn->commit();
        
        header("Location: ../../form_empresas.php");

?>
