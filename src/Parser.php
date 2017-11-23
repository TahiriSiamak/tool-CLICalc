<?php

namespace CaT\CLICalc;

class Parser {
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
			if(is_numeric($input))
			{
				return $input;
			}
			if(is_string($input))
			{
				token($input);
			}

		}
	}
	
	/**
	 * Dismantles the string into its individual parts and return them as an array
	 *
	 * @param string $input 	the input string
	 * @throws \InvalidArgumentException	if there is an unknown character in $input
	 * @return string[] 		tokens from the string
	 */
	public function tokenize(string $input)
	{
	}

	/**
	 * Find the first location in the string where the character is one of the
	 * given characters. Will return strlen if none of the characters is in
	 * the string.
	 *
	 * @param	string		$input
	 * @param	string[]	$chars
	 * @return	int
	 */
	public function findChar(string $input, array $chars)
	{
		for($i = 0; $i < strlen($input); $i++)
		{
			for($j = 0; $j < count($chars); $j++)
			{
				if($input[$i] == $chars[$j])
				{
					return $i;
				}
			}
		}
		return strlen($input);
	}
}
