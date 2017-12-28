<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ipciepe
 */
class Ipciepe
{
    /**
     * @var integer
     */
    private $ipciepeCodigoid;

    /**
     * @var \DateTime
     */
    private $ipciepeDatainc;

    /**
     * @var string
     */
    private $ipciepePercentual;

    /**
     * @var string
     */
    private $ipciepeAcumuladonoano;

    /**
     * @var string
     */
    private $ipciepeAcumulado12meses;

    /**
     * @var \DateTime
     */
    private $ipciepePrazo;


    /**
     * Get ipciepeCodigoid
     *
     * @return integer 
     */
    public function getIpciepeCodigoid()
    {
        return $this->ipciepeCodigoid;
    }

    /**
     * Set ipciepeDatainc
     *
     * @param \DateTime $ipciepeDatainc
     * @return Ipciepe
     */
    public function setIpciepeDatainc($ipciepeDatainc)
    {
        $this->ipciepeDatainc = $ipciepeDatainc;

        return $this;
    }

    /**
     * Get ipciepeDatainc
     *
     * @return \DateTime 
     */
    public function getIpciepeDatainc()
    {
        return $this->ipciepeDatainc;
    }

    /**
     * Set ipciepePercentual
     *
     * @param string $ipciepePercentual
     * @return Ipciepe
     */
    public function setIpciepePercentual($ipciepePercentual)
    {
        $this->ipciepePercentual = $ipciepePercentual;

        return $this;
    }

    /**
     * Get ipciepePercentual
     *
     * @return string 
     */
    public function getIpciepePercentual()
    {
        return $this->ipciepePercentual;
    }

    /**
     * Set ipciepeAcumuladonoano
     *
     * @param string $ipciepeAcumuladonoano
     * @return Ipciepe
     */
    public function setIpciepeAcumuladonoano($ipciepeAcumuladonoano)
    {
        $this->ipciepeAcumuladonoano = $ipciepeAcumuladonoano;

        return $this;
    }

    /**
     * Get ipciepeAcumuladonoano
     *
     * @return string 
     */
    public function getIpciepeAcumuladonoano()
    {
        return $this->ipciepeAcumuladonoano;
    }

    /**
     * Set ipciepeAcumulado12meses
     *
     * @param string $ipciepeAcumulado12meses
     * @return Ipciepe
     */
    public function setIpciepeAcumulado12meses($ipciepeAcumulado12meses)
    {
        $this->ipciepeAcumulado12meses = $ipciepeAcumulado12meses;

        return $this;
    }

    /**
     * Get ipciepeAcumulado12meses
     *
     * @return string 
     */
    public function getIpciepeAcumulado12meses()
    {
        return $this->ipciepeAcumulado12meses;
    }

    /**
     * Set ipciepePrazo
     *
     * @param \DateTime $ipciepePrazo
     * @return Ipciepe
     */
    public function setIpciepePrazo($ipciepePrazo)
    {
        $this->ipciepePrazo = $ipciepePrazo;

        return $this;
    }

    /**
     * Get ipciepePrazo
     *
     * @return \DateTime 
     */
    public function getIpciepePrazo()
    {
        return $this->ipciepePrazo;
    }
}
