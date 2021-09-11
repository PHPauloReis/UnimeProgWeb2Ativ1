<?php

/*
 * União Metropolitana de Educação e Cultura (UNIME)
 * Curso: Bacharelado em Sistemas de Informação
 * Disciplina: Programação Web II
 * Professor: Pablo Ricardo Roxo Silva
 * Aluno: Paulo Reis dos Santos
 */

$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = trim(strtolower($_POST['text']));
    $number = intval($_POST['number']);

    $months = [
        'janeiro', 'fevereiro', 'março', 'abril', 'maio', 'junho',
        'julho', 'agosto', 'setembro', 'outubro', 'novembro', 'dezembro'
    ];

    if (in_array($text, $months)) {
        if ($months[$number - 1] === $text) {
            $message = "O mês informado está correto!";
            $messageColor = 'success';
        } else {
            $message = "O mês informado não está correto!";
            $messageColor = 'warning';
        }
    } else {
        $message = "O texto informado parece não representar um mês do ano";
        $messageColor = 'danger';
    }
}

?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Verificador de Meses do ano</title>

    <style>
        .container {
            max-width: 500px;
        }
    </style>

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-light">
                        Verificador de Meses do ano
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-<?php echo $messageColor; ?>">
                                            <?php echo $message; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Texto</label>
                                        <input type="text" class="form-control" id="text" name="text" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="number" class="form-label">Número</label>
                                        <input type="number" class="form-control" id="number" name="number" min="1" max="12" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>