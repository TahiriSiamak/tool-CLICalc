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
	 * Removes Whitespaces outside and within the string $input
	 *
	 * @param string $input
	 * 
	 */
	public function removeWhitespaces(string $input)
	{
		$string = trim($string, " \t.");
		echo $string . "\n";
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
		$pos = strpos($input, $op);
		echo substr($input, 0, $pos) . "\n";
		echo substr($input, 2, --$pos) . "\n";
		echo substr($input, 3, strlen($input));





		for($i = 0; $i < strlen($input); $i++)
		{
			$arr1 = $input[$i];
		}
			echo $arr[$i] . "\n";
		}
		return $arr;
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
	}

	public function determineOp ($input)
	{
		$op = 
	}
}

