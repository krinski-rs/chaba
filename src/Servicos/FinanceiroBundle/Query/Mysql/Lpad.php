<?php

/**
 * DoctrineExtensions Mysql Function Pack
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to kontakt@beberlei.de so I can send you a copy immediately.
 */

namespace Servicos\FinanceiroBundle\Query\Mysql;

use Doctrine\ORM\Query\AST\Functions\FunctionNode,
    Doctrine\ORM\Query\Lexer;

/**
 * Usage: LPAD(expr1, expr2, expr3)
 * 
 * @author  Reinaldo Krinski
 * @version 2015.12.02
 */
class Lpad extends FunctionNode
{
    private $expr1;
    private $expr2;
    private $expr3;
    
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->expr1 = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->expr2 = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_COMMA);
        $this->expr3 = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {
        return 'LPAD('
            .$sqlWalker->walkArithmeticPrimary($this->expr1). ', '
            .$sqlWalker->walkArithmeticPrimary($this->expr2). ', '
            .$sqlWalker->walkArithmeticPrimary($this->expr3).')';
    }
}