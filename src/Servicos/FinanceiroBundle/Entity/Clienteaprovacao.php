<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Clienteaprovacao
 */
class Clienteaprovacao
{
    /**
     * @var integer
     */
    private $clieaproCodigoid;

    /**
     * @var integer
     */
    private $clieCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var integer
     */
    private $clieaproDelin;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Aprovacao
     */
    private $aproCodigoid;


    /**
     * Get clieaproCodigoid
     *
     * @return integer 
     */
    public function getClieaproCodigoid()
    {
        return $this->clieaproCodigoid;
    }

    /**
     * Set clieCodigoid
     *
     * @param integer $clieCodigoid
     * @return Clienteaprovacao
     */
    public function setClieCodigoid($clieCodigoid)
    {
        $this->clieCodigoid = $clieCodigoid;

        return $this;
    }

    /**
     * Get clieCodigoid
     *
     * @return integer 
     */
    public function getClieCodigoid()
    {
        return $this->clieCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Clienteaprovacao
     */
    public function setUsuaCodigoid($usuaCodigoid)
    {
        $this->usuaCodigoid = $usuaCodigoid;

        return $this;
    }

    /**
     * Get usuaCodigoid
     *
     * @return integer 
     */
    public function getUsuaCodigoid()
    {
        return $this->usuaCodigoid;
    }

    /**
     * Set clieaproDelin
     *
     * @param integer $clieaproDelin
     * @return Clienteaprovacao
     */
    public function setClieaproDelin($clieaproDelin)
    {
        $this->clieaproDelin = $clieaproDelin;

        return $this;
    }

    /**
     * Get clieaproDelin
     *
     * @return integer 
     */
    public function getClieaproDelin()
    {
        return $this->clieaproDelin;
    }

    /**
     * Set aproCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Aprovacao $aproCodigoid
     * @return Clienteaprovacao
     */
    public function setAproCodigoid(\Servicos\FinanceiroBundle\Entity\Aprovacao $aproCodigoid = null)
    {
        $this->aproCodigoid = $aproCodigoid;

        return $this;
    }

    /**
     * Get aproCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Aprovacao 
     */
    public function getAproCodigoid()
    {
        return $this->aproCodigoid;
    }
}
