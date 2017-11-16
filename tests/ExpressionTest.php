<?php

use CaT\CLICalc\Expression;
use CaT\CLICalc\Number;
use CaT\CLICalc\BinaryOp;

class ExpressionTest extends PHPUnit_Framework_TestCase {
	public function test_number_1() {
		$number = new Number(1);
		$this->assertEquals(1, $number->evaluate());
	} 
	public function test_number_10() {
		$number = new Number(10);
		$this->assertEquals(10, $number->evaluate());
	}
	public function test_plus() {
		$node = new BinaryOp
					( "+"
					, new Number(7)
					, new Number(8)
					);
		$this->assertEquals(15, $node->evaluate());
	}
	public function test_multiplication() {
		$node = new BinaryOp
					( "*"
					, new Number(3)
					, new Number(4)
					);
		$this->assertEquals(12, $node->evaluate());
	}
	public function test_subtraction() {
		$node = new BinaryOp("-", new Number(6), new Number(2));
		$this->assertEquals(4, $node->evaluate());
	}
	public function test_division() {
		$node = new BinaryOp("/", new Number(6), new Number(2));
		$this->assertEquals(3, $node->evaluate());
	}
	public function test_complex_1() {
		$node = new BinaryOp
					( "*"
					, new Number(2)
					, new BinaryOp
						( "+"
						, new Number(3)
						, new Number(4)
						)
					);
		$this->assertEquals(14, $node->evaluate());
	}
	public function test_complex_2() {
		$node = new BinaryOp
					( "*"
					, new BinaryOp
						( "+"
						, new Number(1)
						, new Number(2)
						)
					, new BinaryOp
						( "+"
						, new Number(3)
						, new Number(4)
						)
					);
		$this->assertEquals(21, $node->evaluate());
	}
	public function test_complex_3() {
		$node = new BinaryOp
					( "*"
					, new Number(2)
					, new BinaryOp
						( "-"
						, new Number(3)
						, new Number(4)
						)
					);
		$this->assertEquals(-2, $node->evaluate());
	}
	public function test_complex_4() {
		$node = new BinaryOp
					( "*"
					, new BinaryOp
						( "-"
						, new Number(1)
						, new Number(2)
						)
					, new BinaryOp
						( "-"
						, new Number(3)
						, new Number(4)
						)
					);
		$this->assertEquals(1, $node->evaluate());
	}
	public function test_invalid_number_construction()
	{
		try {

			$NUM = new Number('a');
			$this->assertFalse('has not thrown');
		} catch( \InvalidArgumentException $e) {
			$this->assertTrue(true);

		}
	}
	public function test_devide()
	{
		$bin = new BinaryOp('/',new Number(1),new Number(2));
		var_dump($bin->evaluate());
	}
}
