<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popautonomia
 */
class Popautonomia
{
    /**
     * @var integer
     */
    private $idAutonomia;

    /**
     * @var integer
     */
    private $idPop;

    /**
     * @var \DateTime
     */
    private $dataCalculo;

    /**
     * @var integer
     */
    private $capacidade;

    /**
     * @var float
     */
    private $autonomia;

    /**
     * @var integer
     */
    private $ativo;


    /**
     * Get idAutonomia
     *
     * @return integer 
     */
    public function getIdAutonomia()
    {
        return $this->idAutonomia;
    }

    /**
     * Set idPop
     *
     * @param integer $idPop
     * @return Popautonomia
     */
    public function setIdPop($idPop)
    {
        $this->idPop = $idPop;

        return $this;
    }

    /**
     * Get idPop
     *
     * @return integer 
     */
    public function getIdPop()
    {
        return $this->idPop;
    }

    /**
     * Set dataCalculo
     *
     * @param \DateTime $dataCalculo
     * @return Popautonomia
     */
    public function setDataCalculo($dataCalculo)
    {
        $this->dataCalculo = $dataCalculo;

        return $this;
    }

    /**
     * Get dataCalculo
     *
     * @return \DateTime 
     */
    public function getDataCalculo()
    {
        return $this->dataCalculo;
    }

    /**
     * Set capacidade
     *
     * @param integer $capacidade
     * @return Popautonomia
     */
    public function setCapacidade($capacidade)
    {
        $this->capacidade = $capacidade;

        return $this;
    }

    /**
     * Get capacidade
     *
     * @return integer 
     */
    public function getCapacidade()
    {
        return $this->capacidade;
    }

    /**
     * Set autonomia
     *
     * @param float $autonomia
     * @return Popautonomia
     */
    public function setAutonomia($autonomia)
    {
        $this->autonomia = $autonomia;

        return $this;
    }

    /**
     * Get autonomia
     *
     * @return float 
     */
    public function getAutonomia()
    {
        return $this->autonomia;
    }

    /**
     * Set ativo
     *
     * @param integer $ativo
     * @return Popautonomia
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return integer 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
