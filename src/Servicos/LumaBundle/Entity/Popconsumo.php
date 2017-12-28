<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popconsumo
 */
class Popconsumo
{
    /**
     * @var integer
     */
    private $idConsumo;

    /**
     * @var string
     */
    private $consumoDc;

    /**
     * @var \DateTime
     */
    private $dataLeitura;

    /**
     * @var string
     */
    private $leitura1;

    /**
     * @var string
     */
    private $leitura2;

    /**
     * @var string
     */
    private $estimativaTempo;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;


    /**
     * Get idConsumo
     *
     * @return integer 
     */
    public function getIdConsumo()
    {
        return $this->idConsumo;
    }

    /**
     * Set consumoDc
     *
     * @param string $consumoDc
     * @return Popconsumo
     */
    public function setConsumoDc($consumoDc)
    {
        $this->consumoDc = $consumoDc;

        return $this;
    }

    /**
     * Get consumoDc
     *
     * @return string 
     */
    public function getConsumoDc()
    {
        return $this->consumoDc;
    }

    /**
     * Set dataLeitura
     *
     * @param \DateTime $dataLeitura
     * @return Popconsumo
     */
    public function setDataLeitura($dataLeitura)
    {
        $this->dataLeitura = $dataLeitura;

        return $this;
    }

    /**
     * Get dataLeitura
     *
     * @return \DateTime 
     */
    public function getDataLeitura()
    {
        return $this->dataLeitura;
    }

    /**
     * Set leitura1
     *
     * @param string $leitura1
     * @return Popconsumo
     */
    public function setLeitura1($leitura1)
    {
        $this->leitura1 = $leitura1;

        return $this;
    }

    /**
     * Get leitura1
     *
     * @return string 
     */
    public function getLeitura1()
    {
        return $this->leitura1;
    }

    /**
     * Set leitura2
     *
     * @param string $leitura2
     * @return Popconsumo
     */
    public function setLeitura2($leitura2)
    {
        $this->leitura2 = $leitura2;

        return $this;
    }

    /**
     * Get leitura2
     *
     * @return string 
     */
    public function getLeitura2()
    {
        return $this->leitura2;
    }

    /**
     * Set estimativaTempo
     *
     * @param string $estimativaTempo
     * @return Popconsumo
     */
    public function setEstimativaTempo($estimativaTempo)
    {
        $this->estimativaTempo = $estimativaTempo;

        return $this;
    }

    /**
     * Get estimativaTempo
     *
     * @return string 
     */
    public function getEstimativaTempo()
    {
        return $this->estimativaTempo;
    }

    /**
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return Popconsumo
     */
    public function setIdPop(\Servicos\LumaBundle\Entity\Pop $idPop = null)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return \Servicos\LumaBundle\Entity\Pop 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }
}
