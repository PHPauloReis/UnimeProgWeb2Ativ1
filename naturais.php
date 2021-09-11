<?php

/*
 * União Metropolitana de Educação e Cultura (UNIME)
 * Curso: Bacharelado em Sistemas de Informação
 * Disciplina: Programação Web II
 * Professor: Pablo Ricardo Roxo Silva
 * Aluno: Paulo Reis dos Santos
 */

$error = false;
$alertColor = 'success';
$divisible = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $number1 = intval($_POST['number1']);
    $number2 = intval($_POST['number2']);

    if ($number1 > 0 && $number2 > 0 && $number2 < $number1) {
        for ($i = 1; $i <= $number1; $i++) {
            if (is_int($i / $number2)) {
                $divisible[] = $i;
            }
        }
    } else {
        $error = true;
        $alertColor = 'danger';
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
    <title>Identificador de números naturais</title>

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
                    Identificador de números naturais
                </div>
                <div class="card-body">

                    <form method="post" action="">
                        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-<?php echo $alertColor; ?>">
                                        <?php if (!$error): ?>
                                            O números entre 1 e <?php echo $number1; ?> que são divisíveis por <?php echo $number2; ?> são:<br>
                                            <?php echo implode(", ", $divisible); ?>
                                        <?php else: ?>
                                            Os dados informados não parecem ser válidos!
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="number1" class="form-label">Número 1</label>
                                    <input type="number" class="form-control" id="number1" name="number1" min="1" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="number2" class="form-label">Número 2</label>
                                    <input type="number" class="form-control" id="number2" name="number2" min="1" required>
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