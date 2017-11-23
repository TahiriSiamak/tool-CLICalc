<?php

use CaT\CLICalc\Parser;
use CaT\CLICalc\BinaryOp;
use CaT\CLICalc\Number;

class ParserTest extends PHPUnit_Framework_TestCase {
	public function test_Addition()
	{
		$parser = new Parser();
		$expression = $parser->parse("1+2");
		$_expression = new BinaryOp
					( "+",
					 new Number(1),
					 new Number(2)
					);
		$this->assertEquals($_expression,$expression);
	}
	public function test_Multiplication()
	{
		$parser = new Parser();
		$expression = $parser->parse("3*2");
		$_expression = new BinaryOp
					( "*",
					new Number(3),
					new Number(2)
					);
		$this->assertEquals($_expression,$expression);
	}
	public function test_Subtraktion()
	{
		$parser = new Parser();
		$expression = $parser->parse("8-3");
		$_expression = new BinaryOp
					( "-",
					new Number(8),
					new Number(3)
					);
		$this->assertEquals($_expression,$expression);
	}
	public function test_Division()
	{
		$parser = new Parser();
		$expression = $parser->parse("18/2");
		$_expression = new BinaryOp
					( "/",
					new Number(18),
					new Number(2)
					);
		$this->assertEquals($_expression,$expression);
	}
	public function test_Complex()
	{
		$parser = new Parser();
		$expression = $parser->parse("2*3+4");
		$_expression = new BinaryOp("+", 
					   new BinaryOp("*", new Number(2), new Number(3)),
					   new Number(4));

		$this->assertEquals($_expression,$expression);
	}
	public function test_SingleExpression()
	{
		$parser = new Parser();
		$expression = $parser->parse("3");
		$new_number = new Number(3);
		$this->assertEquals($new_number,$expression);
	}
	public function test_Brackets()
	{
		$parser = new Parser();
		$expression = $parser->parse("2*(3+4)");
		$_expression = new BinaryOp
					( "*",
					new Number(2),
					new BinaryOp("+", new Number(3), new Number(4)));
		$this->assertEquals($_expression,$expression);
	}
	public function test_EdgeCase1()
	{
		$parser = new Parser();
		$expression = $parser->parse("3-4+3");
		$_expression = new BinaryOp("+",
					   new BinaryOp("-", new Number(3), new Number(4)),
					   new Number(3));
		$this->assertEquals($_expression, $expression);
	}
	public function test_EdgeCase2()
	{
		$parser = new Parser();
		$expression = $parser->parse("3-4-5");
		$_expression = new BinaryOp("-",
					   new BinaryOp("-", new Number(3), new Number(4)),
					   new Number(5));
		$this->assertEquals($_expression,$expression);
	}
	public function test_Spaces()
	{
		$parser = new Parser();
		$expression = $parser->parse("3 + 4");
		$_expression = new BinaryOp
					( "+",
					new Number(3),
					new Number(4));
		$this->assertEquals($_expression,$expression);
	}
	public function test_Whitespaces()
	{
		$parser = new Parser();
		$expression = $parser->parse("3 +	4");
		$_expression = new BinaryOp
					( "+",
					new Number(3),
					new Number(4));
		$this->assertEquals($_expression,$expression);
	}
	public function test_tokenize1()
	{
		$parser = new Parser();
		$tokens = $parser->tokenize("2+3");
		$_tokens = array("2", "+", "3");
		
		$this->assertEquals($_tokens, $tokens);
	}
	public function test_tokenize2()
	{
		$parser = new Parser();
		$tokens = $parser->tokenize("22+3");
		$_tokens = array("22", "+", "3");
		
		$this->assertEquals($_tokens, $tokens);
	}
	public function test_tokenizeWhitespace()
	{
		$parser = new Parser();
		$tokens = $parser->tokenize("2 + 3");
		$_tokens = array("2", "+", "3");
		
		$this->assertEquals($_tokens, $tokens);
	}
	public function test_tokenizeFalse()
	{
		$parser = new Parser();
		
		try {
			$parser->tokenize("2x3");
			$raised = false;
		}
		catch (\InvalidArgumentException $e) {
			$raised = true;
		}

		$this->assertTrue($raised, "Expected method to raise an InvalidArgumentException.");
	}
	public function test_tokenizeMultiplication()
	{
		$parser = new Parser();
		$tokens = $parser->tokenize("22*3");
		$_tokens = array("22", "*", "3");
		
		$this->assertEquals($_tokens, $tokens);
	}
	
	public function test_tokenizeBrackets()
	{
		$parser = new Parser();
		$tokens = $parser->tokenize("(3*22)+3");
		$_tokens = array( "(", "3", "*","22", ")", "+", "3");
		
		$this->assertEquals($_tokens, $tokens);
	}

	public function test_findChar_succeed1()
	{
		$parser = new Parser();
		$string = "abc213def";
		$chars = ["1", "2", "3"];
		$pos = $parser->findChar($string, $chars);
		$expected = 3;
		$this->assertEquals($expected, $pos);
	}

	public function test_findChar_succeed2()
	{
		$parser = new Parser();
		$string = "abc13def";
		$chars = ["3"];
		$pos = $parser->findChar($string, $chars);
		$expected = 4;
		$this->assertEquals($expected, $pos);
	}

	public function test_findChar_fail1()
	{
		$parser = new Parser();
		$string = "abc13def";
		$chars = ["4"];
		$pos = $parser->findChar($string, $chars);
		$expected = strlen($string);
		$this->assertEquals($expected, $pos);
	}

	public function test_splitAt_succeed1()
	{
		$parser = new Parser();
		$string = "abc213def";
		$chars = ["1", "2", "3"];
		$result = $parser->splitAt($string, $chars);
		$this->assertCount(2, $result);
		list($head, $tail) = $result;
		$this->assertEquals("abc", $head);
		$this->assertEquals("213def", $tail);
	}

	public function test_splitAt_succeed2()
	{
		$parser = new Parser();
		$string = "abc13def";
		$chars = ["3"];
		$result = $parser->splitAt($string, $chars);
		$this->assertCount(2, $result);
		list($head, $tail) = $result;
		$this->assertEquals("abc1", $head);
		$this->assertEquals("3def", $tail);
	}

	public function test_splitAt_fail1()
	{
		$parser = new Parser();
		$string = "abc13def";
		$chars = ["4"];
		$result = $parser->splitAt($string, $chars);
		$this->assertCount(1, $result);
		list($rest) = $result;
		$this->assertEquals("abc13def", $rest);
	}
}
