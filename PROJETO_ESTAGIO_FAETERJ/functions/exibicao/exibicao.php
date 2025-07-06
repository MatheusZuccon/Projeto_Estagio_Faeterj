<?php   
    include_once __DIR__ . '/../../conexao/db_connect.php';
    
        //Convenio
        $convenio = isset($convenio['convenio']) ? $aluno['tipo_convenio'] : null;
        function exibeConvenio($convenio,$conn)
        {    
            $find_convenio = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_convenio
                                                            WHERE id=:convenio
                                            ");
            $find_convenio -> bindParam(':convenio', $convenio);
            $find_convenio -> execute();
                        
            if($find_convenio -> rowCount() > 0)
            {
                $find_convenio = $find_convenio -> fetch(PDO::FETCH_ASSOC);
                return $find_convenio['tipo'];
                        }
            else
                return "convenio não informado";
        }

        //Seguradora
        $seguradora = isset($seguradora['seguradora']) ? $aluno['seguradora'] : null;
        function exibeSeguradora($seguradora,$conn)
        {    
            $find_seguradora = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_seguradora
                                                            WHERE id=:seguradora
                                            ");
            $find_seguradora -> bindParam(':seguradora', $seguradora);
            $find_seguradora -> execute();
                        
            if($find_seguradora -> rowCount() > 0)
            {
                $find_seguradora = $find_seguradora -> fetch(PDO::FETCH_ASSOC);
                return $find_seguradora['nome'];
                        }
            else
                return "seguradora não informada";
        }

        //Tipo Seguro

        //Unidades
        $unidade = isset($unidade['unidade_ensino']) ? $aluno['unidade_ensino'] : null;
        function exibeUnidade($unidade,$conn)
        {    
            $find_unidade = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_unidades
                                                            WHERE id=:unidade
                                            ");
            $find_unidade -> bindParam(':unidade', $unidade);
            $find_unidade -> execute();
                        
            if($find_unidade -> rowCount() > 0)
            {
                $find_unidade = $find_unidade -> fetch(PDO::FETCH_ASSOC);
                return $find_unidade['nome'];
                        }
            else
                return "unidade não informada";
        }

        //Curso
        $curso = isset($curso['curso']) ? $aluno['curso'] : null;
        function exibeCurso($curso,$conn)
        {    
            $find_curso = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_curso
                                                            WHERE id=:curso
                                            ");
            $find_curso -> bindParam(':curso', $curso);
            $find_curso -> execute();
                        
            if($find_curso -> rowCount() > 0)
            {
                $find_curso = $find_curso -> fetch(PDO::FETCH_ASSOC);
                return $find_curso['curso'];
                        }
            else
                return "curso não informado";
        }

        //Empresa
        $empresa = isset($aluno['local_estagio']) ? $aluno['local_estagio'] : null;
        function exibeEmpresa($empresa,$conn)
        {    
            $find_empresa = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_empresa
                                                            WHERE id=:empresa
                                            ");
            $find_empresa -> bindParam(':empresa', $empresa);
            $find_empresa -> execute();
                        
            if($find_empresa -> rowCount() > 0)
            {
                $find_empresa = $find_empresa -> fetch(PDO::FETCH_ASSOC);
                return $find_empresa['empresa'];
                        }
            else
                return "empresa não informada";
        }

        //Genero 
        $genero = isset($aluno['genero']) ? $aluno['genero'] : null;
        function exibeGenero($genero,$conn)
        {    
            $find_genero = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_genero
                                                            WHERE id=:genero
                                            ");
            $find_genero -> bindParam(':genero', $genero);
            $find_genero -> execute();
                        
            if($find_genero -> rowCount() > 0)
            {
                $find_genero = $find_genero -> fetch(PDO::FETCH_ASSOC);
                return $find_genero['genero_tipo'];
                        }
            else
                return "gênero não selecionado";
        }



        //Bairro 
        $bairro = isset($aluno['bairro']) ? $aluno['bairro'] : null;
        function exibeBairro($bairro,$conn)
        {    
            $find_bairro = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_bairro
                                                            WHERE id=:bairro
                                            ");
            $find_bairro -> bindParam(':bairro', $bairro);
            $find_bairro -> execute();
                        
            if($find_bairro -> rowCount() > 0)
            {
                $find_bairro = $find_bairro -> fetch(PDO::FETCH_ASSOC);
                return $find_bairro['bairro_desc'];
                        }
            else
                return "bairro não selecionado";
        }
        

        //Cidade
        $cidade = isset($aluno['cidade']) ? $aluno['cidade'] : null;
        function exibeCidade($cidade,$conn)
        {    
            $find_cidade = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_municipio
                                                            WHERE id=:cidade
                                            ");
            $find_cidade -> bindParam(':cidade', $cidade);
            $find_cidade -> execute();
                        
            if($find_cidade -> rowCount() > 0)
            {
                $find_cidade = $find_cidade -> fetch(PDO::FETCH_ASSOC);
                return $find_cidade['municipio_desc'];
                        }
            else
                return "cidade não selecionado";
        
        }

        //UF
        $uf = isset($aluno['uf']) ? $aluno['uf'] : null;
        function exibeUF($uf,$conn)
        {    
            $find_uf = $conn -> prepare("   
                                                SELECT *
                                                FROM faeterj_apoio_uf
                                                            WHERE id=:uf
                                            ");
            $find_uf -> bindParam(':uf', $uf);
            $find_uf -> execute();
                        
            if($find_uf -> rowCount() > 0)
            {
                $find_uf = $find_uf -> fetch(PDO::FETCH_ASSOC);
                return $find_uf['Serv_DescUF'];
                        }
            else
                return "uf não selecionado";
        
        }  


?>