<?php 
  include_once __DIR__ . '/../../conexao/db_connect.php';

    //Convenio
    function selecionaConvenio($convenio,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_convenio
                                        ORDER BY tipo");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['tipo']}</option>";    
            }
        }
        echo "<option value='novo'>Cadastrar novo convênio</option>";
    }

    //Seguradora
    function selecionaSeguradora($seguradora,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_seguradora
                                        ORDER BY nome");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['nome']}</option>";    
            }
        }
        echo "<option value='novo'>Cadastrar nova seguradora</option>";
    }

    //Tipo Seguro

    //Unidade
    function selecionaUnidade($unidade,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_unidades
                                        ORDER BY nome");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['nome']}</option>";    
            }
        }
        echo "<option value='novo'>Cadastrar nova unidade</option>";
    }

    //Curso
    function selecionaCurso($curso,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_curso
                                        ORDER BY curso");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['curso']}</option>";    
            }
            echo "<option value='novo'>Cadastrar novo curso</option>";
        }
    }

    //Empresa
    function selecionaEmpresa($empresa,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_empresa
                                        ORDER BY empresa");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['empresa']}</option>";    
            }
            echo "<option value='novo'>Cadastrar nova empresa</option>";
        }
    }

    //Genero
    function selecionaGenero($genero,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_genero
                                        ORDER BY genero_tipo");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['genero_tipo']}</option>";    
            }
            echo "<option value='novo'>Cadastrar novo gênero</option>";
        }
    }


    //Bairro
    function selecionaBairro($bairro,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_bairro
                                        ORDER BY bairro_desc");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['bairro_desc']}</option>";    
            }
            echo "<option value='novo'>Cadastrar novo bairro</option>";
        }
    }


    //Cidade
    function selecionaCidade($cidade,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_municipio
                                        ORDER BY municipio_desc");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['municipio_desc']}</option>";    
            }
            echo "<option value='novo'>Cadastrar nova cidade</option>";
        }
    }


    //UF  
    function selecionaUF($uf,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_uf
                                        ORDER BY Serv_DescUF");
        $query -> execute();
        
        if($query -> rowCount() > 0)
        {
            while($result_query = $query -> fetch(PDO::FETCH_ASSOC))
            {
                echo "<option value={$result_query['id']}>{$result_query['Serv_DescUF']}</option>";    
            }
            echo "<option value='novo'>Cadastrar novo uf</option>";
        }
    }

?>