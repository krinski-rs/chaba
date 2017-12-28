<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Duracaocontrato
 */
class Duracaocontrato
{
    /**
     * @var integer
     */
    private $duracontCodigoid;

    /**
     * @var boolean
     */
    private $duracontMeses;

    /**
     * @var integer
     */
    private $duracontPeriodo;

    /**
     * @var \DateTime
     */
    private $duracontInicio;

    /**
     * @var \DateTime
     */
    private $duracontFim;

    /**
     * @var boolean
     */
    private $duracontRenovado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Duracaocontrato
     */
    private $duracontProximocodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get duracontCodigoid
     *
     * @return integer 
     */
    public function getDuracontCodigoid()
    {
        return $this->duracontCodigoid;
    }

    /**
     * Set duracontMeses
     *
     * @param boolean $duracontMeses
     * @return Duracaocontrato
     */
    public function setDuracontMeses($duracontMeses)
    {
        $this->duracontMeses = $duracontMeses;

        return $this;
    }

    /**
     * Get duracontMeses
     *
     * @return boolean 
     */
    public function getDuracontMeses()
    {
        return $this->duracontMeses;
    }

    /**
     * Set duracontPeriodo
     *
     * @param integer $duracontPeriodo
     * @return Duracaocontrato
     */
    public function setDuracontPeriodo($duracontPeriodo)
    {
        $this->duracontPeriodo = $duracontPeriodo;

        return $this;
    }

    /**
     * Get duracontPeriodo
     *
     * @return integer 
     */
    public function getDuracontPeriodo()
    {
        return $this->duracontPeriodo;
    }

    /**
     * Set duracontInicio
     *
     * @param \DateTime $duracontInicio
     * @return Duracaocontrato
     */
    public function setDuracontInicio($duracontInicio)
    {
        $this->duracontInicio = $duracontInicio;

        return $this;
    }

    /**
     * Get duracontInicio
     *
     * @return \DateTime 
     */
    public function getDuracontInicio()
    {
        return $this->duracontInicio;
    }

    /**
     * Set duracontFim
     *
     * @param \DateTime $duracontFim
     * @return Duracaocontrato
     */
    public function setDuracontFim($duracontFim)
    {
        $this->duracontFim = $duracontFim;

        return $this;
    }

    /**
     * Get duracontFim
     *
     * @return \DateTime 
     */
    public function getDuracontFim()
    {
        return $this->duracontFim;
    }

    /**
     * Set duracontRenovado
     *
     * @param boolean $duracontRenovado
     * @return Duracaocontrato
     */
    public function setDuracontRenovado($duracontRenovado)
    {
        $this->duracontRenovado = $duracontRenovado;

        return $this;
    }

    /**
     * Get duracontRenovado
     *
     * @return boolean 
     */
    public function getDuracontRenovado()
    {
        return $this->duracontRenovado;
    }

    /**
     * Set duracontProximocodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracontProximocodigoid
     * @return Duracaocontrato
     */
    public function setDuracontProximocodigoid(\Servicos\FinanceiroBundle\Entity\Duracaocontrato $duracontProximocodigoid = null)
    {
        $this->duracontProximocodigoid = $duracontProximocodigoid;

        return $this;
    }

    /**
     * Get duracontProximocodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Duracaocontrato 
     */
    public function getDuracontProximocodigoid()
    {
        return $this->duracontProximocodigoid;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Duracaocontrato
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
