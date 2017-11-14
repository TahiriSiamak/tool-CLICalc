<?php

namespace CaT\CLICalc;

/**
 * An expression in the calculator that could be evaluated
 * to a number.
 */
interface Expression {
	/**
	 * Evaluate the expression.
	 *
	 * @return	int
	 */
	public function evaluate();
}
