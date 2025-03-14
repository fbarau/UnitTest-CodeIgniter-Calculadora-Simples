<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calculadora CI3</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
    body {
        background-color: #f8f9fa;
    }

    .calculator-container {
        max-width: 400px;
        margin: 50px auto;
    }
    </style>
</head>

<body>

    <div class="container">
        <div class="calculator-container">
            <div class="card shadow">
                <div class="card-header bg-secondary text-white text-center">
                    <h2>Calculadora Simples</h2>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <input type="number" id="num1" class="form-control" placeholder="Número 1">
                    </div>
                    <div class="mb-3">
                        <input type="number" id="num2" class="form-control" placeholder="Número 2">
                    </div>
                    <div class="mb-3">
                        <select id="operation" class="form-select" aria-label="Default select example">
                            <option value="">Selecione uma operação</option>
                            <option value="add">+</option>
                            <option value="subtract">-</option>
                            <option value="multiply">*</option>
                            <option value="divide">/</option>
                        </select>
                    </div>
                    <div class="d-grid">
                        <button id="calculate" class="btn btn-secondary">Calcular</button>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <h3><label class="row-sm-2 row-form-label">Resultado:</label><span id="result"
                            class="fw-bold text-success"></span></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#calculate').click(function() {
            $.ajax({
                url: 'calculator/calculate',
                type: 'POST',
                data: {
                    num1: $('#num1').val(),
                    num2: $('#num2').val(),
                    operation: $('#operation').val()
                },
                success: function(response) {
                    let data = JSON.parse(response);
                    if (data.error) {
                        $('#result').html(`<span class="text-danger">${data.error}</span>`);
                    } else {
                        $('#result').text(data.result);
                    }
                },
                error: function() {
                    $('#result').html('<span class="text-danger">Erro ao calcular.</span>');
                }
            });
        });
    });
    </script>

</body>

</html>