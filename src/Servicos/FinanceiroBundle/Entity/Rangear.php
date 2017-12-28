<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rangear
 */
class Rangear
{
    /**
     * @var integer
     */
    private $rangarCodigoid;

    /**
     * @var \DateTime
     */
    private $rangarDatainc;

    /**
     * @var string
     */
    private $rangarInicio;

    /**
     * @var string
     */
    private $rangarFim;

    /**
     * @var boolean
     */
    private $rangarAtivo;

    /**
     * @var string
     */
    private $rangearSerie;


    /**
     * Get rangarCodigoid
     *
     * @return integer 
     */
    public function getRangarCodigoid()
    {
        return $this->rangarCodigoid;
    }

    /**
     * Set rangarDatainc
     *
     * @param \DateTime $rangarDatainc
     * @return Rangear
     */
    public function setRangarDatainc($rangarDatainc)
    {
        $this->rangarDatainc = $rangarDatainc;

        return $this;
    }

    /**
     * Get rangarDatainc
     *
     * @return \DateTime 
     */
    public function getRangarDatainc()
    {
        return $this->rangarDatainc;
    }

    /**
     * Set rangarInicio
     *
     * @param string $rangarInicio
     * @return Rangear
     */
    public function setRangarInicio($rangarInicio)
    {
        $this->rangarInicio = $rangarInicio;

        return $this;
    }

    /**
     * Get rangarInicio
     *
     * @return string 
     */
    public function getRangarInicio()
    {
        return $this->rangarInicio;
    }

    /**
     * Set rangarFim
     *
     * @param string $rangarFim
     * @return Rangear
     */
    public function setRangarFim($rangarFim)
    {
        $this->rangarFim = $rangarFim;

        return $this;
    }

    /**
     * Get rangarFim
     *
     * @return string 
     */
    public function getRangarFim()
    {
        return $this->rangarFim;
    }

    /**
     * Set rangarAtivo
     *
     * @param boolean $rangarAtivo
     * @return Rangear
     */
    public function setRangarAtivo($rangarAtivo)
    {
        $this->rangarAtivo = $rangarAtivo;

        return $this;
    }

    /**
     * Get rangarAtivo
     *
     * @return boolean 
     */
    public function getRangarAtivo()
    {
        return $this->rangarAtivo;
    }

    /**
     * Set rangearSerie
     *
     * @param string $rangearSerie
     * @return Rangear
     */
    public function setRangearSerie($rangearSerie)
    {
        $this->rangearSerie = $rangearSerie;

        return $this;
    }

    /**
     * Get rangearSerie
     *
     * @return string 
     */
    public function getRangearSerie()
    {
        return $this->rangearSerie;
    }
}
