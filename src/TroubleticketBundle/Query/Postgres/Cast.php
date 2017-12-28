<?php

namespace TroubleticketBundle\Query\Postgres;

use Doctrine\ORM\Query\AST\Functions\FunctionNode;
use Doctrine\ORM\Query\Lexer;
use Doctrine\ORM\Query\AST\Node;
use Doctrine\ORM\Query\SqlWalker;

class Cast extends FunctionNode
{

    const PARAMETER_KEY = 'expression';
    const TYPE_KEY = 'type';
    protected $supportedTypes = array(
        'char',
        'string',
        'text',
        'date',
        'datetime',
        'time',
        'int',
        'integer',
        'decimal',
        'json',
        'bool',
        'boolean'
    );
    /**
     * {@inheritdoc}
     */
    public function parse(\Doctrine\ORM\Query\Parser $parser)
    {
        $parser->match(Lexer::T_IDENTIFIER);
        $parser->match(Lexer::T_OPEN_PARENTHESIS);
        $this->parameters[self::PARAMETER_KEY] = $parser->ArithmeticExpression();
        $parser->match(Lexer::T_AS);
        $parser->match(Lexer::T_IDENTIFIER);
        $lexer = $parser->getLexer();
        $type = $lexer->token['value'];
        if ($lexer->isNextToken(Lexer::T_OPEN_PARENTHESIS)) {
            $parser->match(Lexer::T_OPEN_PARENTHESIS);
            /** @var Literal $parameter */
            $parameter = $parser->Literal();
            $parameters = array(
                $parameter->value
            );
            if ($lexer->isNextToken(Lexer::T_COMMA)) {
                while ($lexer->isNextToken(Lexer::T_COMMA)) {
                    $parser->match(Lexer::T_COMMA);
                    $parameter = $parser->Literal();
                    $parameters[] = $parameter->value;
                }
            }
            $parser->match(Lexer::T_CLOSE_PARENTHESIS);
            $type .= '(' . implode(', ', $parameters) . ')';
        }
        if (!$this->checkType($type)) {
            $parser->syntaxError(
                sprintf(
                    'Type unsupported. Supported types are: "%s"',
                    implode(', ', $this->supportedTypes)
                ),
                $lexer->token
            );
        }
        $this->parameters[self::TYPE_KEY] = $type;
        $parser->match(Lexer::T_CLOSE_PARENTHESIS);
    }
    /**
     * Check that given type is supported.
     *
     * @param string $type
     * @return bool
     */
    protected function checkType($type)
    {
        $type = strtolower(trim($type));
        foreach ($this->supportedTypes as $supportedType) {
            if (strpos($type, $supportedType) === 0) {
                return true;
            }
        }
        return false;
    }

    public function getSql(\Doctrine\ORM\Query\SqlWalker $sqlWalker)
    {

        /** @var Node $value */
        $value = $this->parameters[self::PARAMETER_KEY];
        $type = $this->parameters[self::TYPE_KEY];
        $type = strtolower($type);
        if ($type === 'datetime') {
		throw new \Exception('Not implemented');
        }
        if ($type === 'json' && !$sqlWalker->getConnection()->getDatabasePlatform()->hasNativeJsonType()) {
            $type = 'text';
        }
        if ($type === 'bool') {
            $type = 'boolean';
        }
        /**
         * The notations varchar(n) and char(n) are aliases for character varying(n) and character(n), respectively.
         * character without length specifier is equivalent to character(1). If character varying is used
         * without length specifier, the type accepts strings of any size. The latter is a PostgreSQL extension.
         * http://www.postgresql.org/docs/9.2/static/datatype-character.html
         */
        if ($type === 'string') {
            $type = 'varchar';
        }
        return 'CAST(' . $this->getExpressionValue($value, $sqlWalker) . ' AS ' . $type . ')';
    }
    protected function getExpressionValue($expression, SqlWalker $sqlWalker)
    {
        if ($expression instanceof Node) {
            $expression = $expression->dispatch($sqlWalker);
        }
        return $expression;
    }
}
