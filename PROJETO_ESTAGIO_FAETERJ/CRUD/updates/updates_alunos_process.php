<?php
include_once "../../conexao/db_connect.php";


$nome                = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$matricula           = filter_input(INPUT_POST, 'matricula', FILTER_SANITIZE_NUMBER_INT);
$nome_social         = filter_input(INPUT_POST, 'nome_social', FILTER_SANITIZE_STRING);
$nascimento          = filter_input(INPUT_POST, 'nascimento', FILTER_SANITIZE_STRING);
$sexo                = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$genero              = filter_input(INPUT_POST, 'genero', FILTER_SANITIZE_STRING);
$cpf                 = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rg                  = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$orgao_emissor       = filter_input(INPUT_POST, 'orgao_emissor', FILTER_SANITIZE_STRING);
$data_emissao_rg     = filter_input(INPUT_POST, 'data_emissao_rg', FILTER_SANITIZE_STRING);
$endereco            = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
$bairro              = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade              = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$uf                  = filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
$telefone_celular    = filter_input(INPUT_POST, 'telefone_celular', FILTER_SANITIZE_STRING);
$telefone_fixo       = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_STRING);
$email               = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$unidade_ensino      = filter_input(INPUT_POST, 'unidade_ensino', FILTER_SANITIZE_STRING);
$curso               = filter_input(INPUT_POST, 'curso', FILTER_SANITIZE_STRING);
$previsao_conclusao  = filter_input(INPUT_POST, 'previsao_conclusao', FILTER_SANITIZE_STRING);
$carta_apresentacao  = filter_input(INPUT_POST, 'carta_apresentacao', FILTER_SANITIZE_STRING);
$tipo_estagio        = filter_input(INPUT_POST, 'tipo_estagio', FILTER_SANITIZE_STRING);
$local_estagio       = filter_input(INPUT_POST, 'local_estagio', FILTER_SANITIZE_STRING);
$seguro              = filter_input(INPUT_POST, 'seguro', FILTER_SANITIZE_STRING);
$tipo_convenio       = filter_input(INPUT_POST, 'tipo_convenio', FILTER_SANITIZE_STRING);
$inicio_estagio      = filter_input(INPUT_POST, 'inicio_estagio', FILTER_SANITIZE_STRING);
$termino_estagio     = filter_input(INPUT_POST, 'termino_estagio', FILTER_SANITIZE_STRING);
$status_estagio      = filter_input(INPUT_POST, 'status_estagio', FILTER_SANITIZE_STRING);
$remunerado          = filter_input(INPUT_POST, 'remunerado', FILTER_SANITIZE_STRING);
$obrigatorio         = filter_input(INPUT_POST, 'obrigatorio', FILTER_SANITIZE_STRING);
$seguradora          = filter_input(INPUT_POST, 'seguradora', FILTER_SANITIZE_STRING);
$modalidade          = filter_input(INPUT_POST, 'modalidade', FILTER_SANITIZE_STRING);
$programa            = filter_input(INPUT_POST, 'programa', FILTER_SANITIZE_STRING);

// Atualiza todos os dados do aluno
$sql = "UPDATE alunos SET
            nome = :nome,
            nome_social = :nome_social,
            nascimento = :nascimento,
            sexo = :sexo,
            genero = :genero,
            cpf = :cpf,
            rg = :rg,
            orgao_emissor = :orgao_emissor,
            data_emissao_rg = :data_emissao_rg,
            endereco = :endereco,
            bairro = :bairro,
            cidade = :cidade,
            uf = :uf,
            telefone_celular = :telefone_celular,
            telefone_fixo = :telefone_fixo,
            email = :email,
            unidade_ensino = :unidade_ensino,
            curso = :curso,
            previsao_conclusao = :previsao_conclusao,
            carta_apresentacao = :carta_apresentacao,
            tipo_estagio = :tipo_estagio,
            local_estagio = :local_estagio,
            seguro = :seguro,
            tipo_convenio = :tipo_convenio,
            inicio_estagio = :inicio_estagio,
            termino_estagio = :termino_estagio,
            status_estagio = :status_estagio,
            remunerado = :remunerado,
            obrigatorio = :obrigatorio,
            seguradora = :seguradora,
            modalidade = :modalidade,
            programa = :programa
        WHERE matricula = :matricula";

$update = $conn->prepare($sql);

$update->bindParam(':nome', $nome);
$update->bindParam(':nome_social', $nome_social);
$update->bindParam(':nascimento', $nascimento);
$update->bindParam(':sexo', $sexo);
$update->bindParam(':genero', $genero);
$update->bindParam(':cpf', $cpf);
$update->bindParam(':rg', $rg);
$update->bindParam(':orgao_emissor', $orgao_emissor);
$update->bindParam(':data_emissao_rg', $data_emissao_rg);
$update->bindParam(':endereco', $endereco);
$update->bindParam(':bairro', $bairro);
$update->bindParam(':cidade', $cidade);
$update->bindParam(':uf', $uf);
$update->bindParam(':telefone_celular', $telefone_celular);
$update->bindParam(':telefone_fixo', $telefone_fixo);
$update->bindParam(':email', $email);
$update->bindParam(':unidade_ensino', $unidade_ensino);
$update->bindParam(':curso', $curso);
$update->bindParam(':previsao_conclusao', $previsao_conclusao);
$update->bindParam(':carta_apresentacao', $carta_apresentacao);
$update->bindParam(':tipo_estagio', $tipo_estagio);
$update->bindParam(':local_estagio', $local_estagio);
$update->bindParam(':seguro', $seguro);
$update->bindParam(':tipo_convenio', $tipo_convenio);
$update->bindParam(':inicio_estagio', $inicio_estagio);
$update->bindParam(':termino_estagio', $termino_estagio);
$update->bindParam(':status_estagio', $status_estagio);
$update->bindParam(':remunerado', $remunerado);
$update->bindParam(':obrigatorio', $obrigatorio);
$update->bindParam(':seguradora', $seguradora);
$update->bindParam(':modalidade', $modalidade);
$update->bindParam(':programa', $programa);
$update->bindParam(':matricula', $matricula);

// Executa e redireciona
if ($update->execute()) {
    header("Location: ../reads/read_alunos.php");
    exit();
} else {
    echo "Erro ao atualizar os dados.";
}
?>
