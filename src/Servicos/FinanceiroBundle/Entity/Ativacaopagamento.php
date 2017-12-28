<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ativacaopagamento
 */
class Ativacaopagamento
{
    /**
     * @var integer
     */
    private $ativpagCodigoid;

    /**
     * @var boolean
     */
    private $ativpagCobrado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get ativpagCodigoid
     *
     * @return integer 
     */
    public function getAtivpagCodigoid()
    {
        return $this->ativpagCodigoid;
    }

    /**
     * Set ativpagCobrado
     *
     * @param boolean $ativpagCobrado
     * @return Ativacaopagamento
     */
    public function setAtivpagCobrado($ativpagCobrado)
    {
        $this->ativpagCobrado = $ativpagCobrado;

        return $this;
    }

    /**
     * Get ativpagCobrado
     *
     * @return boolean 
     */
    public function getAtivpagCobrado()
    {
        return $this->ativpagCobrado;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Ativacaopagamento
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
