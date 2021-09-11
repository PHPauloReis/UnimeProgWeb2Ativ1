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
    $grade1 = doubleval($_POST['grade1']);
    $grade2 = doubleval($_POST['grade2']);
    $grade3 = doubleval($_POST['grade3']);

    if ($grade1 <= 10 && $grade1 >= 0 && $grade2 <= 10 && $grade2 >= 0 && $grade3 <= 10 && $grade3 >= 0) {
        $average = ($grade1 + $grade2 + $grade3) / 3;
        $average = number_format($average, 2, ',', '.');

        if ($average <= 10 && $average >= 7) {
            $status = "Aprovado!";
            $statusColor = "success";
        } else if ($average >= 4) {
            $status = "Em recuperação!";
            $statusColor = "warning";
        } else {
            $status = "Reprovado!";
            $statusColor = "danger";
        }
    } else {
        $error = true;
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
    <title>Calculadora de Médias</title>

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
                        Calculadora de Médias
                    </div>
                    <div class="card-body">

                        <form method="post" action="">
                            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                                <?php if ($error): ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                Ocorreu um erro ao processar a média!<br>
                                                Verifique se todos os dados foram informados corretamente!
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-<?php echo $statusColor; ?>">
                                                Média: <?php echo $average; ?><br>
                                                <strong>Aluno <?php echo $status; ?>!</strong>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="grade1" class="form-label">Nota 1</label>
                                        <input type="number" class="form-control" id="grade1" name="grade1" min="0" max="10" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="grade2" class="form-label">Nota 2</label>
                                        <input type="number" class="form-control" id="grade2" name="grade2" min="0" max="10" step="0.01" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="grade3" class="form-label">Nota 3</label>
                                        <input type="number" class="form-control" id="grade3" name="grade3" min="0" max="10" step="0.01" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Calcular</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>