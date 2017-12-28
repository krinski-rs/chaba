<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Semana
 */
class Semana
{
    /**
     * @var integer
     */
    private $semaCodigoid;

    /**
     * @var \DateTime
     */
    private $semaDatainicio;

    /**
     * @var \DateTime
     */
    private $semaDatafim;

    /**
     * @var boolean
     */
    private $semaAtivo;


    /**
     * Get semaCodigoid
     *
     * @return integer 
     */
    public function getSemaCodigoid()
    {
        return $this->semaCodigoid;
    }

    /**
     * Set semaDatainicio
     *
     * @param \DateTime $semaDatainicio
     * @return Semana
     */
    public function setSemaDatainicio($semaDatainicio)
    {
        $this->semaDatainicio = $semaDatainicio;

        return $this;
    }

    /**
     * Get semaDatainicio
     *
     * @return \DateTime 
     */
    public function getSemaDatainicio()
    {
        return $this->semaDatainicio;
    }

    /**
     * Set semaDatafim
     *
     * @param \DateTime $semaDatafim
     * @return Semana
     */
    public function setSemaDatafim($semaDatafim)
    {
        $this->semaDatafim = $semaDatafim;

        return $this;
    }

    /**
     * Get semaDatafim
     *
     * @return \DateTime 
     */
    public function getSemaDatafim()
    {
        return $this->semaDatafim;
    }

    /**
     * Set semaAtivo
     *
     * @param boolean $semaAtivo
     * @return Semana
     */
    public function setSemaAtivo($semaAtivo)
    {
        $this->semaAtivo = $semaAtivo;

        return $this;
    }

    /**
     * Get semaAtivo
     *
     * @return boolean 
     */
    public function getSemaAtivo()
    {
        return $this->semaAtivo;
    }
}
