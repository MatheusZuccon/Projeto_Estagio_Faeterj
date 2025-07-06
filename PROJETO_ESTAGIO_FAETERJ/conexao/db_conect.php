<?php 
    session_start(); 
    global $conn;
    header ("Content-type: text/html; charset=utf8");
    try
    {
        $conn = new PDO("mysql:dbname=faeterj_estagio;host=localhost","root","");
        $conn -> exec("SET CHARACTER SET utf8");
        setlocale(LC_ALL,"pt_BR","pt_BR.utf8","portuguese.utf8");
        $today = new DateTime();
        $today -> setTimezone(new DateTimeZone('America/Sao_Paulo'));
    }
    catch(PDOException $erro)
    {
        echo "Impossível conectar ao banco de dados!" .$erro->getMessage()." Code:".$erro->getCode();
        exit;
    }

?>