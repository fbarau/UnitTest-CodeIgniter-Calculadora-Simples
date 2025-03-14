<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculator extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Calculator_model');
	}

	public function index()
	{
		$this->load->view('calculator_view');
	}

	public function calculate()
	{
		$num1 = $this->input->post('num1');
		$num2 = $this->input->post('num2');
		$operation = $this->input->post('operation');

		// Verifica se os valores são numéricos
		if (!is_numeric($num1) || !is_numeric($num2)) {
			echo json_encode(['error' => 'Favor, inserir valores válidos.']);
			return;
		}
		// Verifica se a operação selecionada é diferente de vazio
		if ($operation == '') {
			echo json_encode(['error' => 'Escolha uma operação matemática']);
			return;
		}
		//Convertendo os valores para float, para garantir operações matemáticas seguras
		$num1 = (float) $num1;
		$num2 = (float) $num2;

		$result = $this->Calculator_model->calculate($num1, $num2, $operation);

		echo json_encode(['result' => $result]);
	}
}
