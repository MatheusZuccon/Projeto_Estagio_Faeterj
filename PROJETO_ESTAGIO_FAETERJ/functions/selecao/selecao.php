<?php 
  include_once __DIR__ . '/../../conexao/db_connect.php';

    //Convenio
    function selecionaConvenio($convenioSelecionado, $conn)
    {
    $query = $conn->prepare("SELECT * FROM faeterj_apoio_convenio ORDER BY tipo");
    $query->execute();

    if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $convenioSelecionado) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['tipo']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo convenio</option>";
        }
    }

    //Seguradora
    function selecionaSeguradora($seguradoraSelecionada, $conn)
    {
    $query = $conn->prepare("SELECT * FROM faeterj_apoio_seguradora ORDER BY nome");
    $query->execute();

    if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $seguradoraSelecionada) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['nome']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar nova seguradora</option>";
        }
    }

    //Tipo Seguro

    //Unidade
    function selecionaUnidade($unidadeSelecionada,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_unidades
                                        ORDER BY nome");
        $query -> execute();
        
        if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $unidadeSelecionada) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['nome']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar nova unidade</option>";
        }
    }

    //Curso
    function selecionaCurso($cursoSelecionado,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_curso
                                        ORDER BY curso");
        $query -> execute();
        
        if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $cursoSelecionado) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['curso']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo curso</option>";
        }
    }

    //Empresa
    function selecionaEmpresa($empresaSelecionada,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_empresa
                                        ORDER BY empresa");
        $query -> execute();
        
        if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $empresaSelecionada) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['empresa']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar nova empresa</option>";
        }
    }

    //Genero
    function selecionaGenero($generoSelecionado, $conn)
    {
    $query = $conn->prepare("SELECT * FROM faeterj_apoio_genero ORDER BY genero_tipo");
    $query->execute();

    if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $generoSelecionado) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['genero_tipo']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo gênero</option>";
        }
    }



    //Bairro
    function selecionaBairro($bairroSelecionado,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_bairro
                                        ORDER BY bairro_desc");
        $query -> execute();
        
        if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $bairroSelecionado) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['bairro_desc']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo bairro</option>";
        }
    }


    //Cidade
    function selecionaCidade($cidadeSelecionada,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_municipio
                                        ORDER BY municipio_desc");
        $query -> execute();
        
        if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $cidadeSelecionada) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['municipio_desc']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo municipio</option>";
        }
    }


    //UF  
    function selecionaUF($ufSelecionado,$conn)
    {
        $query = $conn -> prepare ("SELECT *
                                        FROM faeterj_apoio_uf
                                        ORDER BY Serv_DescUF");
        $query -> execute();
        
         if ($query->rowCount() > 0) {
        while ($result_query = $query->fetch(PDO::FETCH_ASSOC)) {
            $selected = ($result_query['id'] == $ufSelecionado) ? 'selected' : '';
            echo "<option value=\"" . htmlspecialchars($result_query['id']) . "\" $selected>" . 
                 htmlspecialchars($result_query['Serv_DescUF']) . "</option>";
            }

        echo "<option value='novo'>Cadastrar novo uf</option>";
        }
    }

?>