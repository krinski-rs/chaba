<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Servicos\LumaBundle\Query\Mysql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode,
	Doctrine\ORM\Query\Lexer;

/**
 * MYSQL function "valor_cotacao" 
 * 
 * @category DoctrineExtensions
 * @package  DoctrineExtensions\Query\Mysql
 * @author   Metod <metod@simpel.si>
 */
class ValorCotacao extends FunctionNode {

	private $expr1;

	/**
	 * @override
	 */
	public function parse(\Doctrine\ORM\Query\Parser $parser) {
		$parser->match(Lexer::T_IDENTIFIER);
		$parser->match(Lexer::T_OPEN_PARENTHESIS);
		$this->expr1 = $parser->ArithmeticExpression();
		$parser->match(Lexer::T_CLOSE_PARENTHESIS);
	}

	/**
	 * @override
	 */
	public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker) {
		return 'valor_cotacao(' . $sqlWalker->walkArithmeticPrimary($this->expr1) . ')';
	}

}
