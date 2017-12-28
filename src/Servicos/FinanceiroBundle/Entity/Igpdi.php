<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Igpdi
 */
class Igpdi
{
    /**
     * @var integer
     */
    private $igpdiCodigoid;

    /**
     * @var \DateTime
     */
    private $igpdiDatainc;

    /**
     * @var string
     */
    private $igpdiPercentual;

    /**
     * @var string
     */
    private $igpdiAcumuladonoano;

    /**
     * @var string
     */
    private $igpdiAcumulado12meses;

    /**
     * @var \DateTime
     */
    private $igpdiPrazo;


    /**
     * Get igpdiCodigoid
     *
     * @return integer 
     */
    public function getIgpdiCodigoid()
    {
        return $this->igpdiCodigoid;
    }

    /**
     * Set igpdiDatainc
     *
     * @param \DateTime $igpdiDatainc
     * @return Igpdi
     */
    public function setIgpdiDatainc($igpdiDatainc)
    {
        $this->igpdiDatainc = $igpdiDatainc;

        return $this;
    }

    /**
     * Get igpdiDatainc
     *
     * @return \DateTime 
     */
    public function getIgpdiDatainc()
    {
        return $this->igpdiDatainc;
    }

    /**
     * Set igpdiPercentual
     *
     * @param string $igpdiPercentual
     * @return Igpdi
     */
    public function setIgpdiPercentual($igpdiPercentual)
    {
        $this->igpdiPercentual = $igpdiPercentual;

        return $this;
    }

    /**
     * Get igpdiPercentual
     *
     * @return string 
     */
    public function getIgpdiPercentual()
    {
        return $this->igpdiPercentual;
    }

    /**
     * Set igpdiAcumuladonoano
     *
     * @param string $igpdiAcumuladonoano
     * @return Igpdi
     */
    public function setIgpdiAcumuladonoano($igpdiAcumuladonoano)
    {
        $this->igpdiAcumuladonoano = $igpdiAcumuladonoano;

        return $this;
    }

    /**
     * Get igpdiAcumuladonoano
     *
     * @return string 
     */
    public function getIgpdiAcumuladonoano()
    {
        return $this->igpdiAcumuladonoano;
    }

    /**
     * Set igpdiAcumulado12meses
     *
     * @param string $igpdiAcumulado12meses
     * @return Igpdi
     */
    public function setIgpdiAcumulado12meses($igpdiAcumulado12meses)
    {
        $this->igpdiAcumulado12meses = $igpdiAcumulado12meses;

        return $this;
    }

    /**
     * Get igpdiAcumulado12meses
     *
     * @return string 
     */
    public function getIgpdiAcumulado12meses()
    {
        return $this->igpdiAcumulado12meses;
    }

    /**
     * Set igpdiPrazo
     *
     * @param \DateTime $igpdiPrazo
     * @return Igpdi
     */
    public function setIgpdiPrazo($igpdiPrazo)
    {
        $this->igpdiPrazo = $igpdiPrazo;

        return $this;
    }

    /**
     * Get igpdiPrazo
     *
     * @return \DateTime 
     */
    public function getIgpdiPrazo()
    {
        return $this->igpdiPrazo;
    }
}
