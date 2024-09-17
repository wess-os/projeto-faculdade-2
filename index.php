<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Signo</title>
    <?php include('layouts/header.php'); ?>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container mt-5">
        <h1>Consulta de Signo</h1>
        <form id="signo-form" method="POST" action="show_zodiac_sign.php" class="mt-4">
            <div class="mb-3">
                <label for="data_nascimento" class="form-label">Data de Nascimento (dd/mm)</label>
                <input type="text" class="form-control" id="data_nascimento" name="data_nascimento" placeholder="dd/mm" required>
            </div>
            <button type="submit" class="btn btn-primary">Consultar Signo</button>
        </form>
    </div>
</div>
<script src="assets/js/script.js"></script>
</body>
</html>
