<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Testes da Calculadora</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

	<div class="container mt-5">
		<h2 class="text-center mb-4">Resultados dos Testes da Calculadora</h2>
		<table class="table table-bordered table-striped">
			<thead class="table-dark">
				<tr>
					<th>Descrição</th>
					<th>Esperado</th>
					<th>Obtido</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($results as $result): ?>
					<tr>
						<td><?= $result['description'] ?></td>
						<td><?= $result['expected'] ?></td>
						<td><?= $result['actual'] ?></td>
						<td>
							<span class="badge bg-<?= $result['status'] == 'Passou' ? 'success' : 'danger' ?>">
								<?= $result['status'] ?>
							</span>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		<div class="text-center mt-4">
			<a href="<?= base_url() ?>" class="btn btn-danger">Voltar para Calculadora</a>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>