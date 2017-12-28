<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorCargo
 */
class RhColaboradorCargo
{
    /**
     * @var integer
     */
    private $idColaboradorCargo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataPrevista;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $cancelado;

    /**
     * @var boolean
     */
    private $processado;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhCargo
     */
    private $idCargo;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;


    /**
     * Get idColaboradorCargo
     *
     * @return integer 
     */
    public function getIdColaboradorCargo()
    {
        return $this->idColaboradorCargo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhColaboradorCargo
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get descricao
     *
     * @return string 
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return RhColaboradorCargo
     */
    public function setDataInicio($dataInicio)
    {
        $this->dataInicio = $dataInicio;

        return $this;
    }

    /**
     * Get dataInicio
     *
     * @return \DateTime 
     */
    public function getDataInicio()
    {
        return $this->dataInicio;
    }

    /**
     * Set dataPrevista
     *
     * @param \DateTime $dataPrevista
     * @return RhColaboradorCargo
     */
    public function setDataPrevista($dataPrevista)
    {
        $this->dataPrevista = $dataPrevista;

        return $this;
    }

    /**
     * Get dataPrevista
     *
     * @return \DateTime 
     */
    public function getDataPrevista()
    {
        return $this->dataPrevista;
    }

    /**
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhColaboradorCargo
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
     * @return RhColaboradorCargo
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorCargo
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
     * @return RhColaboradorCargo
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
     * Set cancelado
     *
     * @param boolean $cancelado
     * @return RhColaboradorCargo
     */
    public function setCancelado($cancelado)
    {
        $this->cancelado = $cancelado;

        return $this;
    }

    /**
     * Get cancelado
     *
     * @return boolean 
     */
    public function getCancelado()
    {
        return $this->cancelado;
    }

    /**
     * Set processado
     *
     * @param boolean $processado
     * @return RhColaboradorCargo
     */
    public function setProcessado($processado)
    {
        $this->processado = $processado;

        return $this;
    }

    /**
     * Get processado
     *
     * @return boolean 
     */
    public function getProcessado()
    {
        return $this->processado;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhColaboradorCargo
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
     * @return RhColaboradorCargo
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

    /**
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhColaboradorCargo
     */
    public function setIdColaborador(\Servicos\RhBundle\Entity\RhColaborador $idColaborador = null)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return \Servicos\RhBundle\Entity\RhColaborador 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }
}
