<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calculator_model'); // Carrega o model
	}

	public function index()
	{
		// Carrega a view da calculadora
		$this->load->view('calculator_view');
	}

	public function calculate()
	{
		$num1 = $this->input->post('num1');
		$num2 = $this->input->post('num2');
		$operation = $this->input->post('operation');

		// Verifica se os valores são numéricos
		if (!is_numeric($num1) || !is_numeric($num2)) {
			echo json_encode(['error' => 'Os valores devem ser números.']);
			return;
		}

		$num1 = (float) $num1;
		$num2 = (float) $num2;

		$result = $this->Calculator_model->calculate($num1, $num2, $operation);

		if ($result === null) {
			echo json_encode(['error' => 'Operação inválida ou divisão por zero.']);
		} else {
			echo json_encode(['result' => $result]);
		}
	}
}
