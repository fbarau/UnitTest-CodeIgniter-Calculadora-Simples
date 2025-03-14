<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<title>Calculadora CI3</title>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
	<h2>Calculadora Simples</h2>
	<input type="number" id="num1" placeholder="Número 1">
	<input type="number" id="num2" placeholder="Número 2">

	<select id="operation">
		<option value="add">+</option>
		<option value="subtract">-</option>
		<option value="multiply">*</option>
		<option value="divide">/</option>
	</select>

	<button id="calculate">Calcular</button>

	<h3>Resultado: <span id="result"></span></h3>

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
						$('#result').text(JSON.parse(response).result);
					}
				});
			});
		});
	</script>
</body>

</html>