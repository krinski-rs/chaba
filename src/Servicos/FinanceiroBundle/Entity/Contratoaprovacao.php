<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratoaprovacao
 */
class Contratoaprovacao
{
    /**
     * @var integer
     */
    private $contaproCodigoid;

    /**
     * @var integer
     */
    private $usuaCodigoid;

    /**
     * @var \DateTime
     */
    private $contaproDatainc;

    /**
     * @var \DateTime
     */
    private $contaproDataaprovado;

    /**
     * @var boolean
     */
    private $contaproAprovado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get contaproCodigoid
     *
     * @return integer 
     */
    public function getContaproCodigoid()
    {
        return $this->contaproCodigoid;
    }

    /**
     * Set usuaCodigoid
     *
     * @param integer $usuaCodigoid
     * @return Contratoaprovacao
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
     * Set contaproDatainc
     *
     * @param \DateTime $contaproDatainc
     * @return Contratoaprovacao
     */
    public function setContaproDatainc($contaproDatainc)
    {
        $this->contaproDatainc = $contaproDatainc;

        return $this;
    }

    /**
     * Get contaproDatainc
     *
     * @return \DateTime 
     */
    public function getContaproDatainc()
    {
        return $this->contaproDatainc;
    }

    /**
     * Set contaproDataaprovado
     *
     * @param \DateTime $contaproDataaprovado
     * @return Contratoaprovacao
     */
    public function setContaproDataaprovado($contaproDataaprovado)
    {
        $this->contaproDataaprovado = $contaproDataaprovado;

        return $this;
    }

    /**
     * Get contaproDataaprovado
     *
     * @return \DateTime 
     */
    public function getContaproDataaprovado()
    {
        return $this->contaproDataaprovado;
    }

    /**
     * Set contaproAprovado
     *
     * @param boolean $contaproAprovado
     * @return Contratoaprovacao
     */
    public function setContaproAprovado($contaproAprovado)
    {
        $this->contaproAprovado = $contaproAprovado;

        return $this;
    }

    /**
     * Get contaproAprovado
     *
     * @return boolean 
     */
    public function getContaproAprovado()
    {
        return $this->contaproAprovado;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratoaprovacao
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
