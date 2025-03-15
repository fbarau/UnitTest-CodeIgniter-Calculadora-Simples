<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculator_test extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('unit_test');
		$this->load->model('Calculator_model');
	}

	public function index()
	{
		/* echo "<h2>Testes Unitários da Calculadora</h2>";

		echo $this->unit->run($this->Calculator_model->calculate(2, 3, 'add'), 5, 'Teste Soma');
		echo $this->unit->run($this->Calculator_model->calculate(5, 2, 'subtract'), 3, 'Teste Subtração');
		echo $this->unit->run($this->Calculator_model->calculate(3, 4, 'multiply'), 12, 'Teste Multiplicação');
		echo $this->unit->run($this->Calculator_model->calculate(10, 2, 'divide'), 5, 'Teste Divisão');
		echo $this->unit->run($this->Calculator_model->calculate(10, 0, 'divide'), "Erro: Divisão por zero!", 'Teste Divisão por Zero');
		echo $this->unit->run($this->Calculator_model->calculate('a', 2, 'add'), "Erro: Entrada inválida!", 'Teste Entrada Inválida'); */
		// Casos de teste
		$test_cases = [
			['description' => 'Soma de 2 + 3', 'expected' => 5, 'actual' => $this->Calculator_model->calculate(2, 3, 'add')],
			['description' => 'Subtração de 5 - 2', 'expected' => 3, 'actual' => $this->Calculator_model->calculate(5, 2, 'subtract')],
			['description' => 'Multiplicação de 4 * 3', 'expected' => 12, 'actual' => $this->Calculator_model->calculate(4, 3, 'multiply')],
			['description' => 'Divisão de 10 / 2', 'expected' => 5, 'actual' => $this->Calculator_model->calculate(10, 2, 'divide')],
			['description' => 'Divisão por zero', 'expected' => 'Erro', 'actual' => $this->Calculator_model->calculate(10, 0, 'divide')],
		];

		$results = [];

		foreach ($test_cases as $case) {
			$passed = $case['actual'] == $case['expected'];
			$results[] = [
				'description' => $case['description'],
				'expected' => $case['expected'],
				'actual' => $case['actual'],
				'status' => $passed ? 'Passou' : 'Falhou'
			];
		}

		// Carregar a view de testes
		$this->load->view('calculator_test_view', ['results' => $results]);
	}
}
