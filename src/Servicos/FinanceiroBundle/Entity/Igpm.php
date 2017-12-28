<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Igpm
 */
class Igpm
{
    /**
     * @var integer
     */
    private $igpmCodigoid;

    /**
     * @var \DateTime
     */
    private $igpmDatainc;

    /**
     * @var string
     */
    private $igpmPercentual;

    /**
     * @var string
     */
    private $igpmAcumuladonoano;

    /**
     * @var string
     */
    private $igpmAcumulado12meses;

    /**
     * @var \DateTime
     */
    private $igpmPrazo;


    /**
     * Get igpmCodigoid
     *
     * @return integer 
     */
    public function getIgpmCodigoid()
    {
        return $this->igpmCodigoid;
    }

    /**
     * Set igpmDatainc
     *
     * @param \DateTime $igpmDatainc
     * @return Igpm
     */
    public function setIgpmDatainc($igpmDatainc)
    {
        $this->igpmDatainc = $igpmDatainc;

        return $this;
    }

    /**
     * Get igpmDatainc
     *
     * @return \DateTime 
     */
    public function getIgpmDatainc()
    {
        return $this->igpmDatainc;
    }

    /**
     * Set igpmPercentual
     *
     * @param string $igpmPercentual
     * @return Igpm
     */
    public function setIgpmPercentual($igpmPercentual)
    {
        $this->igpmPercentual = $igpmPercentual;

        return $this;
    }

    /**
     * Get igpmPercentual
     *
     * @return string 
     */
    public function getIgpmPercentual()
    {
        return $this->igpmPercentual;
    }

    /**
     * Set igpmAcumuladonoano
     *
     * @param string $igpmAcumuladonoano
     * @return Igpm
     */
    public function setIgpmAcumuladonoano($igpmAcumuladonoano)
    {
        $this->igpmAcumuladonoano = $igpmAcumuladonoano;

        return $this;
    }

    /**
     * Get igpmAcumuladonoano
     *
     * @return string 
     */
    public function getIgpmAcumuladonoano()
    {
        return $this->igpmAcumuladonoano;
    }

    /**
     * Set igpmAcumulado12meses
     *
     * @param string $igpmAcumulado12meses
     * @return Igpm
     */
    public function setIgpmAcumulado12meses($igpmAcumulado12meses)
    {
        $this->igpmAcumulado12meses = $igpmAcumulado12meses;

        return $this;
    }

    /**
     * Get igpmAcumulado12meses
     *
     * @return string 
     */
    public function getIgpmAcumulado12meses()
    {
        return $this->igpmAcumulado12meses;
    }

    /**
     * Set igpmPrazo
     *
     * @param \DateTime $igpmPrazo
     * @return Igpm
     */
    public function setIgpmPrazo($igpmPrazo)
    {
        $this->igpmPrazo = $igpmPrazo;

        return $this;
    }

    /**
     * Get igpmPrazo
     *
     * @return \DateTime 
     */
    public function getIgpmPrazo()
    {
        return $this->igpmPrazo;
    }
}
