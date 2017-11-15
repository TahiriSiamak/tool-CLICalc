<?php
namespace CaT\CLICalc;

/**
 * A binary operation on two other expression is an expression as well.
 */
class BinaryOp implements Expression {
	/**
	 * @var string
	 */
	private $op;

	/**
	 * @var Expression
	 */
	private $left;

	/**
	 * @var Expression
	 */
	private $right;

	/**
	 * @param	string		$op
	 * @param	Expression	$left
	 * @param	Expression	$right
	 */
	public function __construct(string $op, Expression $left, Expression $right) {
		// TODO: fill me
		$this->op = $op;
		$this->left = $left;
		$this->right = $right;
	}

	/**
	 * @inheritdoc
	 */
	public function evaluate() {
		// TODO: fill me
		if($this->op == '+')
		{
			return $this->left->evaluate() + $this->right->evaluate();
		}
		if($this->op == '-')
		{
			return $this->left->evaluate() - $this->right->evaluate();
		}
		if($this->op == '*')
		{
			return $this->left->evaluate() * $this->right->evaluate();
		}
		if($this->op == '/')
		{
			return $this->left->evaluate() / $this->right->evaluate();
		}
	}
}
