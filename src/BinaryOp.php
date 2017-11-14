<?php

namespace CaT\CLICalc;

/**
 * A binary operation on two other expression is an expression as well.
 */
class BinaryOp implements Expression {
	/**
	 * @param	string		$op
	 * @param	Expression	$left
	 * @param	Expression	$right
	 */
	public function __construct($op, Expression $left, Expression $right) {
		// TODO: fill me
	}

	/**
	 * @inheritdoc
	 */
	public function evaluate() {
		// TODO: fill me
	}
}
