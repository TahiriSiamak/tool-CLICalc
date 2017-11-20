<?php

namespace CaT\CLICalc;

class Parser { 
	/**
	 * Turn the string into an expression.
	 *
	 * @param	string	$input
	 * @throws	\InvalidArgumentException	if $input is not a valid exception
	 * @return	Expression
	 */
	public function parse(string $input) {
		if($input=="")
		{
			throw new \InvalidArgumentException("Leere Eingabe");
		}
		//return Expression;
	}
}
