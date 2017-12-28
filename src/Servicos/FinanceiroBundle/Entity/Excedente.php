<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Excedente
 */
class Excedente
{
    /**
     * @var integer
     */
    private $exceCodigoid;

    /**
     * @var string
     */
    private $exceValor;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get exceCodigoid
     *
     * @return integer 
     */
    public function getExceCodigoid()
    {
        return $this->exceCodigoid;
    }

    /**
     * Set exceValor
     *
     * @param string $exceValor
     * @return Excedente
     */
    public function setExceValor($exceValor)
    {
        $this->exceValor = $exceValor;

        return $this;
    }

    /**
     * Get exceValor
     *
     * @return string 
     */
    public function getExceValor()
    {
        return $this->exceValor;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Excedente
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }
}
