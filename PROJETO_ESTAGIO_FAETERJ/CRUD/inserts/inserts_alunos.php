<?php 
    session_start(); 
    include_once "../../conexao/db_connect.php";

    //Criação das variáveis
    $nome                = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $matricula           = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
    $nome_social         = filter_input(INPUT_POST, 'nome_social', FILTER_SANITIZE_STRING);
    $nascimento          = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_NUMBER_INT);
    $sexo                = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
    $genero              = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
    $cpf                 = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
    $rg                  = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
    $orgao_emissor       = filter_input(INPUT_POST, 'orgao_emissor', FILTER_SANITIZE_STRING);
    $data_emissao_rg     = filter_input(INPUT_POST, 'data_emissao_rg', FILTER_SANITIZE_NUMBER_INT);
    $endereco            = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $bairro              = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade              = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $uf                  = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
    $telefone_celular    = filter_input(INPUT_POST, 'telefone_celular', FILTER_SANITIZE_STRING);
    $telefone_fixo       = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
    $email               = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $unidade_ensino      = filter_input(INPUT_POST, 'unidade_ensino', FILTER_SANITIZE_STRING);
    $curso               = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
    $previsao_conclusao  = filter_input(INPUT_POST, 'previsao_conclusao', FILTER_SANITIZE_NUMBER_INT);
    $carta_apresentacao  = filter_input(INPUT_POST, 'carta_apresentacao', FILTER_SANITIZE_STRING);
    $tipo_estagio        = filter_input(INPUT_POST, 'tipo_estagio', FILTER_SANITIZE_STRING);
    $local_estagio       = filter_input(INPUT_POST, 'local_estagio', FILTER_SANITIZE_STRING);
    $seguro              = filter_input(INPUT_POST, 'seguro', FILTER_SANITIZE_STRING);
    $tipo_convenio       = filter_input(INPUT_POST, 'tipo_convenio', FILTER_SANITIZE_STRING);
    $inicio_estagio      = filter_input(INPUT_POST, 'inicio_estagio', FILTER_SANITIZE_NUMBER_INT);
    $termino_estagio     = filter_input(INPUT_POST, 'termino_estagio', FILTER_SANITIZE_NUMBER_INT);
    $status_estagio      = filter_input(INPUT_POST, 'status_estagio', FILTER_SANITIZE_STRING);
    $remunerado          = filter_input(INPUT_POST, 'remunerado', FILTER_SANITIZE_STRING);
    $obrigatorio         = filter_input(INPUT_POST, 'obrigatorio', FILTER_SANITIZE_STRING);
    $seguradora          = filter_input(INPUT_POST, 'seguradora', FILTER_SANITIZE_STRING);
    $modalidade          = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_STRING);
    $programa            = filter_input(INPUT_POST, 'programa', FILTER_SANITIZE_STRING);


    /*Testes da entrada dos dados
    echo "nome: " . $nome . "<br>";
    echo "matricula: " . $matricula . "<br>";
    echo "nome_social: " . $nome_social . "<br>";
    echo "nascimento: " . $nascimento . "<br>";
    echo "sexo: " . $sexo . "<br>";
    echo "genero: " . $genero . "<br>";
    echo "cpf: " . $cpf . "<br>";
    echo "rg: " . $rg . "<br>";
    echo "orgao_emissor: " . $orgao_emissor . "<br>";
    echo "data_emissao_rg: " . $data_emissao_rg . "<br>";
    echo "endereco: " . $endereco . "<br>";
    echo "bairro: " . $bairro . "<br>";
    echo "cidade: " . $cidade . "<br>";
    echo "telefone_celular: " . $telefone_celular . "<br>";
    echo "telefone_fixo: " . $telefone_fixo . "<br>";
    echo "email: " . $email . "<br>";
    echo "unidade_ensino: " . $unidade_ensino . "<br>";
    echo "curso: " . $curso . "<br>";
    echo "previsao_conclusao: " . $previsao_conclusao . "<br>";
    echo "carta_apresentacao: " . $carta_apresentacao . "<br>";
    echo "tipo_estagio: " . $tipo_estagio . "<br>";
    echo "local_estagio: " . $local_estagio . "<br>";
    echo "seguro: " . $seguro . "<br>";
    echo "tipo_convenio: " . $tipo_convenio . "<br>";
    echo "inicio_estagio: " . $inicio_estagio . "<br>";
    echo "termino_estagio: " . $termino_estagio . "<br>";
    echo "status_estagio: " . $status_estagio . "<br>";
    echo "remunerado: " . $remunerado . "<br>";
    echo "obrigatorio: " . $obrigatorio . "<br>";
    echo "seguradora: " . $seguradora . "<br>";
    echo "modalidade: " . $modalidade . "<br>";
    echo "programa: " . $programa . "<br>";
    */

     $conn -> beginTransaction();
        $insert = "INSERT INTO alunos (
            nome,                
            matricula,          
            nome_social,        
            nascimento,          
            sexo,              
            genero,              
            cpf,                
            rg,                  
            orgao_emissor,      
            data_emissao_rg,     
            endereco,            
            bairro,            
            cidade,  
            uf,
            telefone_celular,    
            telefone_fixo,      
            email,               
            unidade_ensino,      
            curso,               
            previsao_conclusao, 
            carta_apresentacao,  
            tipo_estagio,        
            local_estagio,       
            seguro,             
            tipo_convenio,       
            inicio_estagio,     
            termino_estagio,     
            status_estagio,    
            remunerado,          
            obrigatorio,         
            seguradora,          
            modalidade,         
            programa            
        ) VALUES (
            :nome,
            :matricula,
            :nome_social,        
            :nascimento,          
            :sexo,              
            :genero,              
            :cpf,                
            :rg,                  
            :orgao_emissor,      
            :data_emissao_rg,     
            :endereco,            
            :bairro,            
            :cidade,     
            :uf,
            :telefone_celular,    
            :telefone_fixo,      
            :email,               
            :unidade_ensino,      
            :curso,               
            :previsao_conclusao, 
            :carta_apresentacao,  
            :tipo_estagio,        
            :local_estagio,       
            :seguro,             
            :tipo_convenio,       
            :inicio_estagio,     
            :termino_estagio,     
            :status_estagio,    
            :remunerado,          
            :obrigatorio,         
            :seguradora,          
            :modalidade,         
            :programa 
        )";
        $stmt = $conn -> prepare ($insert);
        $stmt -> bindParam(':matricula',$matricula);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':nome_social', $nome_social);
        $stmt->bindParam(':nascimento', $nascimento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':genero', $genero);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':orgao_emissor', $orgao_emissor);
        $stmt->bindParam(':data_emissao_rg', $data_emissao_rg);
        $stmt->bindParam(':endereco', $endereco);
        $stmt->bindParam(':bairro', $bairro);
        $stmt->bindParam(':cidade', $cidade);
        $stmt->bindParam(':uf', $uf);
        $stmt->bindParam(':telefone_celular', $telefone_celular);
        $stmt->bindParam(':telefone_fixo', $telefone_fixo);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':unidade_ensino', $unidade_ensino);
        $stmt->bindParam(':curso', $curso);
        $stmt->bindParam(':previsao_conclusao', $previsao_conclusao);
        $stmt->bindParam(':carta_apresentacao', $carta_apresentacao);
        $stmt->bindParam(':tipo_estagio', $tipo_estagio);
        $stmt->bindParam(':local_estagio', $local_estagio);
        $stmt->bindParam(':seguro', $seguro);
        $stmt->bindParam(':tipo_convenio', $tipo_convenio);
        $stmt->bindParam(':inicio_estagio', $inicio_estagio);
        $stmt->bindParam(':termino_estagio', $termino_estagio);
        $stmt->bindParam(':status_estagio', $status_estagio);
        $stmt->bindParam(':remunerado', $remunerado);
        $stmt->bindParam(':obrigatorio', $obrigatorio);
        $stmt->bindParam(':seguradora', $seguradora);
        $stmt->bindParam(':modalidade', $modalidade);
        $stmt->bindParam(':programa', $programa);
        
        
        $stmt->execute();
        $conn->commit();

        header("Location: ../../form_alunos.php");
?>
