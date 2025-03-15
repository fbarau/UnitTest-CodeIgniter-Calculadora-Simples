<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Calculator_model extends CI_Model
{
	public function calculate($num1, $num2, $operation)
	{
		// Certifica que os números sejam float
		$num1 = (float) $num1;
		$num2 = (float) $num2;

		switch ($operation) {
			case 'add':
				return $num1 + $num2;
			case 'subtract':
				return $num1 - $num2;
			case 'multiply':
				return $num1 * $num2;
			case 'divide':
				return $num2 != 0 ? $num1 / $num2 : null; // Retorna null para erro de divisão por zero
			default:
				return null; // Retorna null para operação inválida
		}
	}
}
