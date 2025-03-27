<?php
// Incluindo o arquivo "header.php"
include('header.php');

// Criando a variável para manipular o arquivo XML
if (file_exists('zodiac_signs.xml')) {
    $signos = simplexml_load_file('zodiac_signs.xml');
} else {
    echo "<div class='alert alert-danger text-center mt-4'>Erro: O arquivo zodiac_signs.xml não foi encontrado!</div>";
    exit; // Encerra a execução caso o arquivo XML não seja encontrado
}

// Recebendo o valor da data de nascimento enviado pelo formulário
$data_nascimento = $_POST['data_nascimento'] ?? null;

if ($data_nascimento) {
    // Função para ajustar a data de início e fim com o ano do usuário
    function ajustar_data($data, $ano_usuario) {
        $partes = explode('-', $data); // Divide o formato "MM-DD"
        return DateTime::createFromFormat('Y-m-d', "$ano_usuario-$partes[0]-$partes[1]");
    }

    // Transformando a data de nascimento em um objeto DateTime
    $data_user = DateTime::createFromFormat('Y-m-d', $data_nascimento);

    // Variável para armazenar o signo encontrado
    $signo_encontrado = null;
    $descricao = null;

    // Iterando pelos signos no XML
    foreach ($signos->signo as $signo) {
        $data_inicio = ajustar_data((string)$signo->dataInicio, $data_user->format('Y'));
        $data_fim = ajustar_data((string)$signo->dataFim, $data_user->format('Y'));

        // Ajustando para lidar com ranges que cruzam o ano (exemplo: Capricórnio)
        if ($data_fim < $data_inicio && $data_user >= $data_inicio) {
            $data_fim->modify('+1 year');
        }

        if ($data_user >= $data_inicio && $data_user <= $data_fim) {
            $signo_encontrado = (string)$signo->signoNome; // Converte para string
            $descricao = (string)$signo->descricao; // Pegando a descrição do signo
            break;
        }
    }

    // Exibindo o resultado
    if ($signo_encontrado) {
        echo "<div class='text-center mt-4'>";
        echo "<h1>Seu signo é: $signo_encontrado</h1>";
        echo "<p class='mt-3'>$descricao</p>"; // Exibindo a descrição do signo
        // Exibindo a imagem do signo correspondente
        echo "<img src='imagem/$signo_encontrado.jpg' alt='$signo_encontrado' class='img-fluid mt-3 mb-3'>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-4' role='alert'>";
        echo "<h1>Não foi possível determinar seu signo.</h1>";
        echo "</div>";
    }
} else {
    echo "<div class='alert alert-danger text-center mt-4'>";
    echo "<h1>Por favor, forneça uma data de nascimento válida.</h1>";
    echo "</div>";
}
?>

<!-- Botão para voltar à página inicial -->
<div class="text-center mt-4">
    <a href="index.php" class="btn btn-secondary">Voltar à Página Inicial</a>
</div>
