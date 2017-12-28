<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ist
 */
class Ist
{
    /**
     * @var integer
     */
    private $istCodigoid;

    /**
     * @var \DateTime
     */
    private $istDatainc;

    /**
     * @var string
     */
    private $istPercentual;

    /**
     * @var string
     */
    private $istAcumuladonoano;

    /**
     * @var string
     */
    private $istAcumulado12meses;

    /**
     * @var \DateTime
     */
    private $istPrazo;


    /**
     * Get istCodigoid
     *
     * @return integer 
     */
    public function getIstCodigoid()
    {
        return $this->istCodigoid;
    }

    /**
     * Set istDatainc
     *
     * @param \DateTime $istDatainc
     * @return Ist
     */
    public function setIstDatainc($istDatainc)
    {
        $this->istDatainc = $istDatainc;

        return $this;
    }

    /**
     * Get istDatainc
     *
     * @return \DateTime 
     */
    public function getIstDatainc()
    {
        return $this->istDatainc;
    }

    /**
     * Set istPercentual
     *
     * @param string $istPercentual
     * @return Ist
     */
    public function setIstPercentual($istPercentual)
    {
        $this->istPercentual = $istPercentual;

        return $this;
    }

    /**
     * Get istPercentual
     *
     * @return string 
     */
    public function getIstPercentual()
    {
        return $this->istPercentual;
    }

    /**
     * Set istAcumuladonoano
     *
     * @param string $istAcumuladonoano
     * @return Ist
     */
    public function setIstAcumuladonoano($istAcumuladonoano)
    {
        $this->istAcumuladonoano = $istAcumuladonoano;

        return $this;
    }

    /**
     * Get istAcumuladonoano
     *
     * @return string 
     */
    public function getIstAcumuladonoano()
    {
        return $this->istAcumuladonoano;
    }

    /**
     * Set istAcumulado12meses
     *
     * @param string $istAcumulado12meses
     * @return Ist
     */
    public function setIstAcumulado12meses($istAcumulado12meses)
    {
        $this->istAcumulado12meses = $istAcumulado12meses;

        return $this;
    }

    /**
     * Get istAcumulado12meses
     *
     * @return string 
     */
    public function getIstAcumulado12meses()
    {
        return $this->istAcumulado12meses;
    }

    /**
     * Set istPrazo
     *
     * @param \DateTime $istPrazo
     * @return Ist
     */
    public function setIstPrazo($istPrazo)
    {
        $this->istPrazo = $istPrazo;

        return $this;
    }

    /**
     * Get istPrazo
     *
     * @return \DateTime 
     */
    public function getIstPrazo()
    {
        return $this->istPrazo;
    }
}
