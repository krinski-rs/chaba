<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alcada
 */
class Alcada
{
    /**
     * @var integer
     */
    private $alcaCodigoid;

    /**
     * @var string
     */
    private $alcaPercentual;

    /**
     * @var \DateTime
     */
    private $alcaDatainc;


    /**
     * Get alcaCodigoid
     *
     * @return integer 
     */
    public function getAlcaCodigoid()
    {
        return $this->alcaCodigoid;
    }

    /**
     * Set alcaPercentual
     *
     * @param string $alcaPercentual
     * @return Alcada
     */
    public function setAlcaPercentual($alcaPercentual)
    {
        $this->alcaPercentual = $alcaPercentual;

        return $this;
    }

    /**
     * Get alcaPercentual
     *
     * @return string 
     */
    public function getAlcaPercentual()
    {
        return $this->alcaPercentual;
    }

    /**
     * Set alcaDatainc
     *
     * @param \DateTime $alcaDatainc
     * @return Alcada
     */
    public function setAlcaDatainc($alcaDatainc)
    {
        $this->alcaDatainc = $alcaDatainc;

        return $this;
    }

    /**
     * Get alcaDatainc
     *
     * @return \DateTime 
     */
    public function getAlcaDatainc()
    {
        return $this->alcaDatainc;
    }
}
