<?php

use CaT\CLICalc\Expression;
use CaT\CLICalc\Number;
use CaT\CLICalc\BinaryOp;

// This is a test for all kinds of expressions.
class ExpressionTest extends PHPUnit_Framework_TestCase {
	public function test_number_1() {
		$number = new Number(1);
		$this->assertEquals(1, $number->evaluate());
	} 

	public function test_number_10() {
		// TODO: fill me
		$this->assertFalse(true);
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
		// TODO: fill me
		$this->assertFalse(true);
	}

	public function test_division() {
		// TODO: fill me
		$this->assertFalse(true);
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
		// TODO: fill me
		$this->assertFalse(true);
	}

	public function test_complex_4() {
		// TODO: fill me
		$this->assertFalse(true);
	}
}
