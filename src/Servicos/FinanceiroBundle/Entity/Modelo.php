<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modelo
 */
class Modelo
{
    /**
     * @var integer
     */
    private $modeCodigoid;

    /**
     * @var string
     */
    private $modeNome;

    /**
     * @var boolean
     */
    private $modeAtivo;

    /**
     * @var \DateTime
     */
    private $modeDatainc;

    /**
     * @var \DateTime
     */
    private $modeDatafim;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;


    /**
     * Get modeCodigoid
     *
     * @return integer 
     */
    public function getModeCodigoid()
    {
        return $this->modeCodigoid;
    }

    /**
     * Set modeNome
     *
     * @param string $modeNome
     * @return Modelo
     */
    public function setModeNome($modeNome)
    {
        $this->modeNome = $modeNome;

        return $this;
    }

    /**
     * Get modeNome
     *
     * @return string 
     */
    public function getModeNome()
    {
        return $this->modeNome;
    }

    /**
     * Set modeAtivo
     *
     * @param boolean $modeAtivo
     * @return Modelo
     */
    public function setModeAtivo($modeAtivo)
    {
        $this->modeAtivo = $modeAtivo;

        return $this;
    }

    /**
     * Get modeAtivo
     *
     * @return boolean 
     */
    public function getModeAtivo()
    {
        return $this->modeAtivo;
    }

    /**
     * Set modeDatainc
     *
     * @param \DateTime $modeDatainc
     * @return Modelo
     */
    public function setModeDatainc($modeDatainc)
    {
        $this->modeDatainc = $modeDatainc;

        return $this;
    }

    /**
     * Get modeDatainc
     *
     * @return \DateTime 
     */
    public function getModeDatainc()
    {
        return $this->modeDatainc;
    }

    /**
     * Set modeDatafim
     *
     * @param \DateTime $modeDatafim
     * @return Modelo
     */
    public function setModeDatafim($modeDatafim)
    {
        $this->modeDatafim = $modeDatafim;

        return $this;
    }

    /**
     * Get modeDatafim
     *
     * @return \DateTime 
     */
    public function getModeDatafim()
    {
        return $this->modeDatafim;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Modelo
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
