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
				tokenize($input);
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
		$teilstring;
		$i;

		if(!is_numeric($input) && $input != "+" && $input != "-" && $input != "*" && $input != "/")
		{
			throw new Exception("Unknown character.");
		}

		for($i = 0; $i <= strlen($input); $i++)
		{
			$teilstring[$i] = substr($input, $i, 1);
		}
		//$input_array = str_split($teilstring ,1);

		$this->splitAt($input, $teilstring);

		//return $teilstring;
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

	/**
	 * Takes the string and chop it in two pieces before the first location one
	 * of the given characters is found. Will return the complete string as first
	 * element and an empty string as second element if  none of the characters
	 * is found.
	 *
	 * @param	string	$input
	 * @param	string  $chars
	 * @return	string[] with two elements
	 */
	public function splitAt(string $input, array $chars)
	{
		$pos = $this->findChar($input, $chars);

		if($pos == strlen($input))
		{
			return [$input, ""];
		}

		$tail = substr($input, $pos);
		$head = substr($input, 0, $pos);
		return [$head, $tail];
	}
}
