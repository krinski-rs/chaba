<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Turno
 */
class Turno
{
    /**
     * @var integer
     */
    private $turnCodigoid;

    /**
     * @var \DateTime
     */
    private $turnInicio;

    /**
     * @var \DateTime
     */
    private $turnIntervaloinicio;

    /**
     * @var \DateTime
     */
    private $turnIntervalofim;

    /**
     * @var \DateTime
     */
    private $turnFim;

    /**
     * @var boolean
     */
    private $turnPlantao;

    /**
     * @var boolean
     */
    private $turnAtivo;


    /**
     * Get turnCodigoid
     *
     * @return integer 
     */
    public function getTurnCodigoid()
    {
        return $this->turnCodigoid;
    }

    /**
     * Set turnInicio
     *
     * @param \DateTime $turnInicio
     * @return Turno
     */
    public function setTurnInicio($turnInicio)
    {
        $this->turnInicio = $turnInicio;

        return $this;
    }

    /**
     * Get turnInicio
     *
     * @return \DateTime 
     */
    public function getTurnInicio()
    {
        return $this->turnInicio;
    }

    /**
     * Set turnIntervaloinicio
     *
     * @param \DateTime $turnIntervaloinicio
     * @return Turno
     */
    public function setTurnIntervaloinicio($turnIntervaloinicio)
    {
        $this->turnIntervaloinicio = $turnIntervaloinicio;

        return $this;
    }

    /**
     * Get turnIntervaloinicio
     *
     * @return \DateTime 
     */
    public function getTurnIntervaloinicio()
    {
        return $this->turnIntervaloinicio;
    }

    /**
     * Set turnIntervalofim
     *
     * @param \DateTime $turnIntervalofim
     * @return Turno
     */
    public function setTurnIntervalofim($turnIntervalofim)
    {
        $this->turnIntervalofim = $turnIntervalofim;

        return $this;
    }

    /**
     * Get turnIntervalofim
     *
     * @return \DateTime 
     */
    public function getTurnIntervalofim()
    {
        return $this->turnIntervalofim;
    }

    /**
     * Set turnFim
     *
     * @param \DateTime $turnFim
     * @return Turno
     */
    public function setTurnFim($turnFim)
    {
        $this->turnFim = $turnFim;

        return $this;
    }

    /**
     * Get turnFim
     *
     * @return \DateTime 
     */
    public function getTurnFim()
    {
        return $this->turnFim;
    }

    /**
     * Set turnPlantao
     *
     * @param boolean $turnPlantao
     * @return Turno
     */
    public function setTurnPlantao($turnPlantao)
    {
        $this->turnPlantao = $turnPlantao;

        return $this;
    }

    /**
     * Get turnPlantao
     *
     * @return boolean 
     */
    public function getTurnPlantao()
    {
        return $this->turnPlantao;
    }

    /**
     * Set turnAtivo
     *
     * @param boolean $turnAtivo
     * @return Turno
     */
    public function setTurnAtivo($turnAtivo)
    {
        $this->turnAtivo = $turnAtivo;

        return $this;
    }

    /**
     * Get turnAtivo
     *
     * @return boolean 
     */
    public function getTurnAtivo()
    {
        return $this->turnAtivo;
    }
}
