<?php

namespace CaT\CLICalc;

/**
 * A number is an expression.
 */
class Number implements Expression {
	/**
	 * @var int
	 */
	private $number;

	/**
	 * @param	int	the number
	 */
	public function __construct($number) {
		// TODO: fill me
		if(!is_numeric($number)) {
			throw new \InvalidArgumentException($number." is not nummeric");
		}
		$this->number = $number;
	}

	/**
	 * @inheritdoc
	 */
	public function evaluate() {
		// TODO: fill me
		return $this->number;
	}

}