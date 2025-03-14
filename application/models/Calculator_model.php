<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculator_model extends CI_Model
{

	public function calculate($num1, $num2, $operation)
	{
		if (!is_numeric($num1) || !is_numeric($num2)) {
			return "Erro: Entrada inválida!";
		}

		switch ($operation) {
			case 'add':
				return $num1 + $num2;
			case 'subtract':
				return $num1 - $num2;
			case 'multiply':
				return $num1 * $num2;
			case 'divide':
				return $num2 != 0 ? $num1 / $num2 : "Erro: Divisão por zero!";
			default:
				return "Erro: Operação inválida!";
		}
	}
}
