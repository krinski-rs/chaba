<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhCargoOrdenado
 */
class RhCargoOrdenado
{
    /**
     * @var integer
     */
    private $idCargoOrdenado;

    /**
     * @var string
     */
    private $ordenadoCargo;

    /**
     * @var float
     */
    private $periculosidade;

    /**
     * @var float
     */
    private $insalubridade;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var string
     */
    private $motivoEdicao;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhCargo
     */
    private $idCargo;


    /**
     * Get idCargoOrdenado
     *
     * @return integer 
     */
    public function getIdCargoOrdenado()
    {
        return $this->idCargoOrdenado;
    }

    /**
     * Set ordenadoCargo
     *
     * @param string $ordenadoCargo
     * @return RhCargoOrdenado
     */
    public function setOrdenadoCargo($ordenadoCargo)
    {
        $this->ordenadoCargo = $ordenadoCargo;

        return $this;
    }

    /**
     * Get ordenadoCargo
     *
     * @return string 
     */
    public function getOrdenadoCargo()
    {
        return $this->ordenadoCargo;
    }

    /**
     * Set periculosidade
     *
     * @param float $periculosidade
     * @return RhCargoOrdenado
     */
    public function setPericulosidade($periculosidade)
    {
        $this->periculosidade = $periculosidade;

        return $this;
    }

    /**
     * Get periculosidade
     *
     * @return float 
     */
    public function getPericulosidade()
    {
        return $this->periculosidade;
    }

    /**
     * Set insalubridade
     *
     * @param float $insalubridade
     * @return RhCargoOrdenado
     */
    public function setInsalubridade($insalubridade)
    {
        $this->insalubridade = $insalubridade;

        return $this;
    }

    /**
     * Get insalubridade
     *
     * @return float 
     */
    public function getInsalubridade()
    {
        return $this->insalubridade;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhCargoOrdenado
     */
    public function setRegistrante($registrante)
    {
        $this->registrante = $registrante;

        return $this;
    }

    /**
     * Get registrante
     *
     * @return integer 
     */
    public function getRegistrante()
    {
        return $this->registrante;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhCargoOrdenado
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhCargoOrdenado
     */
    public function setDataEdicao($dataEdicao)
    {
        $this->dataEdicao = $dataEdicao;

        return $this;
    }

    /**
     * Get dataEdicao
     *
     * @return \DateTime 
     */
    public function getDataEdicao()
    {
        return $this->dataEdicao;
    }

    /**
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhCargoOrdenado
     */
    public function setRegistranteEdicao($registranteEdicao)
    {
        $this->registranteEdicao = $registranteEdicao;

        return $this;
    }

    /**
     * Get registranteEdicao
     *
     * @return integer 
     */
    public function getRegistranteEdicao()
    {
        return $this->registranteEdicao;
    }

    /**
     * Set motivoEdicao
     *
     * @param string $motivoEdicao
     * @return RhCargoOrdenado
     */
    public function setMotivoEdicao($motivoEdicao)
    {
        $this->motivoEdicao = $motivoEdicao;

        return $this;
    }

    /**
     * Get motivoEdicao
     *
     * @return string 
     */
    public function getMotivoEdicao()
    {
        return $this->motivoEdicao;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhCargoOrdenado
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return boolean 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }

    /**
     * Set idCargo
     *
     * @param \Servicos\RhBundle\Entity\RhCargo $idCargo
     * @return RhCargoOrdenado
     */
    public function setIdCargo(\Servicos\RhBundle\Entity\RhCargo $idCargo = null)
    {
        $this->idCargo = $idCargo;

        return $this;
    }

    /**
     * Get idCargo
     *
     * @return \Servicos\RhBundle\Entity\RhCargo 
     */
    public function getIdCargo()
    {
        return $this->idCargo;
    }
}
