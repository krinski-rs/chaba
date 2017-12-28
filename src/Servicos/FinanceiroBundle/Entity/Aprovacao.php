<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Aprovacao
 */
class Aprovacao
{
    /**
     * @var integer
     */
    private $aproCodigoid;

    /**
     * @var string
     */
    private $aproNome;

    /**
     * @var integer
     */
    private $aproTipo;


    /**
     * Get aproCodigoid
     *
     * @return integer 
     */
    public function getAproCodigoid()
    {
        return $this->aproCodigoid;
    }

    /**
     * Set aproNome
     *
     * @param string $aproNome
     * @return Aprovacao
     */
    public function setAproNome($aproNome)
    {
        $this->aproNome = $aproNome;

        return $this;
    }

    /**
     * Get aproNome
     *
     * @return string 
     */
    public function getAproNome()
    {
        return $this->aproNome;
    }

    /**
     * Set aproTipo
     *
     * @param integer $aproTipo
     * @return Aprovacao
     */
    public function setAproTipo($aproTipo)
    {
        $this->aproTipo = $aproTipo;

        return $this;
    }

    /**
     * Get aproTipo
     *
     * @return integer 
     */
    public function getAproTipo()
    {
        return $this->aproTipo;
    }
}
