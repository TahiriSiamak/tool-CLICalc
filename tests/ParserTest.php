<?php

class ParserTest extends PHPUnit_Framework_TestCase {

	public function test_Addition ()
	{
		$parser = new Parser();
		$expression = $parser->parse("1+2");
		$_expression = new BinaryOp
					( "+",
					 new Number(1),
					 new Number(2)
					);
		$this->assertEquals($expression,$_expression);
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
		$this->assertEquals($expression,$_expression);
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
		$this->assertEquals($expression,$_expression);
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
		$this->assertEquals($expression,$_expression);
	}
	public function test_Complex()
	{
		$parser = new Parser();
		$expression = $parser->parse("2*3+4");
		$_expression = new BinaryOp
					( "*",
					new Number(2),
					new BinaryOp("+", new Number(3), new Number(4)));
		$this->assertEquals($expression,$_expression);
	}

}