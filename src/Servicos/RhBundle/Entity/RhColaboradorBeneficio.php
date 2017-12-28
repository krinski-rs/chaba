<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorBeneficio
 */
class RhColaboradorBeneficio
{
    /**
     * @var integer
     */
    private $idColaboradorBeneficio;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var integer
     */
    private $idBeneficio;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $registranteAprovacao;

    /**
     * @var \DateTime
     */
    private $dataAprovacao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idColaboradorBeneficio
     *
     * @return integer 
     */
    public function getIdColaboradorBeneficio()
    {
        return $this->idColaboradorBeneficio;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhColaboradorBeneficio
     */
    public function setIdColaborador($idColaborador)
    {
        $this->idColaborador = $idColaborador;

        return $this;
    }

    /**
     * Get idColaborador
     *
     * @return integer 
     */
    public function getIdColaborador()
    {
        return $this->idColaborador;
    }

    /**
     * Set idBeneficio
     *
     * @param integer $idBeneficio
     * @return RhColaboradorBeneficio
     */
    public function setIdBeneficio($idBeneficio)
    {
        $this->idBeneficio = $idBeneficio;

        return $this;
    }

    /**
     * Get idBeneficio
     *
     * @return integer 
     */
    public function getIdBeneficio()
    {
        return $this->idBeneficio;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorBeneficio
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
     * Set registranteAprovacao
     *
     * @param integer $registranteAprovacao
     * @return RhColaboradorBeneficio
     */
    public function setRegistranteAprovacao($registranteAprovacao)
    {
        $this->registranteAprovacao = $registranteAprovacao;

        return $this;
    }

    /**
     * Get registranteAprovacao
     *
     * @return integer 
     */
    public function getRegistranteAprovacao()
    {
        return $this->registranteAprovacao;
    }

    /**
     * Set dataAprovacao
     *
     * @param \DateTime $dataAprovacao
     * @return RhColaboradorBeneficio
     */
    public function setDataAprovacao($dataAprovacao)
    {
        $this->dataAprovacao = $dataAprovacao;

        return $this;
    }

    /**
     * Get dataAprovacao
     *
     * @return \DateTime 
     */
    public function getDataAprovacao()
    {
        return $this->dataAprovacao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorBeneficio
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
     * @return RhColaboradorBeneficio
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
}
