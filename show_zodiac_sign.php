<?php include('layouts/header.php'); ?>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container mt-5 text-center">
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $data_nascimento = $_POST['data_nascimento'];
        list($dia, $mes) = explode('/', $data_nascimento);
        $dataNascimento = DateTime::createFromFormat('d/m', "$dia/$mes");

        $signos = simplexml_load_file("signos.xml");

        $coresSignos = [
            'Aquário' => '#cdf3f1',
            'Peixes' => '#ebf2fe',
            'Áries' => '#feebeb',
            'Touro' => '#dafac7',
            'Gêmeos' => '#cdf3f1',
            'Câncer' => '#ebf2fe',
            'Leão' => '#feebeb',
            'Virgem' => '#dafac7',
            'Libra' => '#cdf3f1',
            'Escorpião' => '#ebf2fe',
            'Sagitário' => '#feebeb',
            'Capricórnio' => '#dafac7'
        ];

        $coresNomesSignos = [
            'Aquário' => '#1d7873',
            'Peixes' => '#0848be',
            'Áries' => '#cb1f03',
            'Touro' => '#307010',
            'Gêmeos' => '#1d7873',
            'Câncer' => '#0848be',
            'Leão' => '#cb1f03',
            'Virgem' => '#307010',
            'Libra' => '#1d7873',
            'Escorpião' => '#0848be',
            'Sagitário' => '#cb1f03',
            'Capricórnio' => '#307010'
        ];

        function converterData($data) {
            return DateTime::createFromFormat('d/m', $data);
        }

        $signoEncontrado = false;
        foreach ($signos->signo as $signo) {
            $dataInicio = converterData($signo->dataInicio);
            $dataFim = converterData($signo->dataFim);

            $dataInicio->setDate($dataNascimento->format('Y'), $dataInicio->format('m'), $dataInicio->format('d'));
            $dataFim->setDate($dataNascimento->format('Y'), $dataFim->format('m'), $dataFim->format('d'));

            if ($dataNascimento >= $dataInicio && $dataNascimento <= $dataFim) {
                $corFundo = $coresSignos[(string)$signo->signoNome];
                $corNome = $coresNomesSignos[(string)$signo->signoNome];
                echo "<div class='container mt-5 text-center' style='background-color: {$corFundo}; padding: 20px; border-radius: 8px;'>";
                echo "<img src='{$signo->imagem}' alt='{$signo->signoNome}' class='img-fluid'>";
                echo "<h1 class='signo-nome' style='color: {$corNome};'>{$signo->signoNome}</h1>";
                echo "<p>{$signo->descricao}</p>";
                echo "</div>";
                $signoEncontrado = true;
                break;
            }
        }

        if (!$signoEncontrado) {
            echo "<h1>Signo não encontrado</h1>";
        }
        ?>
        <a href="index.php" class="btn btn-secondary mt-3" style="background-color: #211f1f; color: white;">Voltar</a>
    </div>
</div>
</body>
</html>