<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhContrato
 */
class RhContrato
{
    /**
     * @var integer
     */
    private $idContrato;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataPrevista;

    /**
     * @var integer
     */
    private $contratoPrincipal;

    /**
     * @var integer
     */
    private $dias;

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
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhColaborador
     */
    private $idColaborador;


    /**
     * Get idContrato
     *
     * @return integer 
     */
    public function getIdContrato()
    {
        return $this->idContrato;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return RhContrato
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
     * @return RhContrato
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
     * Set contratoPrincipal
     *
     * @param integer $contratoPrincipal
     * @return RhContrato
     */
    public function setContratoPrincipal($contratoPrincipal)
    {
        $this->contratoPrincipal = $contratoPrincipal;

        return $this;
    }

    /**
     * Get contratoPrincipal
     *
     * @return integer 
     */
    public function getContratoPrincipal()
    {
        return $this->contratoPrincipal;
    }

    /**
     * Set dias
     *
     * @param integer $dias
     * @return RhContrato
     */
    public function setDias($dias)
    {
        $this->dias = $dias;

        return $this;
    }

    /**
     * Get dias
     *
     * @return integer 
     */
    public function getDias()
    {
        return $this->dias;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhContrato
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
     * @return RhContrato
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhContrato
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
     * Set idColaborador
     *
     * @param \Servicos\RhBundle\Entity\RhColaborador $idColaborador
     * @return RhContrato
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
