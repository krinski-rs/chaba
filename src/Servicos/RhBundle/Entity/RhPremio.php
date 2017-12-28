<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhPremio
 */
class RhPremio
{
    /**
     * @var integer
     */
    private $idPremio;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idPremio
     *
     * @return integer 
     */
    public function getIdPremio()
    {
        return $this->idPremio;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhPremio
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
     * Set valor
     *
     * @param string $valor
     * @return RhPremio
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set registrante
     *
     * @param integer $registrante
     * @return RhPremio
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhPremio
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhPremio
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
     * @return RhPremio
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhPremio
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
