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
		echo "<h2>Testes Unitários da Calculadora</h2>";

		echo $this->unit->run($this->Calculator_model->calculate(2, 3, 'add'), 5, 'Teste Soma');
		echo $this->unit->run($this->Calculator_model->calculate(5, 2, 'subtract'), 3, 'Teste Subtração');
		echo $this->unit->run($this->Calculator_model->calculate(3, 4, 'multiply'), 12, 'Teste Multiplicação');
		echo $this->unit->run($this->Calculator_model->calculate(10, 2, 'divide'), 5, 'Teste Divisão');
		echo $this->unit->run($this->Calculator_model->calculate(10, 0, 'divide'), "Erro: Divisão por zero!", 'Teste Divisão por Zero');
		echo $this->unit->run($this->Calculator_model->calculate('a', 2, 'add'), "Erro: Entrada inválida!", 'Teste Entrada Inválida');
	}
}
