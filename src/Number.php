<?php

namespace CaT\CLICalc;

class Number implements Expression {

	private $number;

	public function __construct($number) {
		if(!is_numeric($number)) {
			throw new \InvalidArgumentException($number." is not nummeric");
		}
		$this->number = $number;
	}
	public function evaluate() {
		return $this->number;
	}
}