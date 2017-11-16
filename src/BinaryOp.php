<?php
namespace CaT\CLICalc;

class BinaryOp implements Expression {

	private $op;

	private $left;

	private $right;

	public function __construct(string $op, Expression $left, Expression $right) {
		$this->op = $op;
		$this->left = $left;
		$this->right = $right;
	}
	public function evaluate() {
		Switch($this->op)
		{
			case "+": return $this->left->evaluate() + $this->right->evaluate(); break;
			case "-": return $this->left->evaluate() - $this->right->evaluate(); break;
			case "*": return $this->left->evaluate() * $this->right->evaluate(); break;
			case "/": return $this->left->evaluate() / $this->right->evaluate(); break;
			default: echo "Kein gültiger Operator";
		}
	}
}