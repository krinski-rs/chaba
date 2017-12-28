<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Popconcessionaria
 */
class Popconcessionaria
{
    /**
     * @var integer
     */
    private $idConcessionaria;

    /**
     * @var integer
     */
    private $fase;

    /**
     * @var integer
     */
    private $tensao;

    /**
     * @var string
     */
    private $medidor;

    /**
     * @var string
     */
    private $ligacao;

    /**
     * @var string
     */
    private $titular;

    /**
     * @var string
     */
    private $pagaConta;

    /**
     * @var \DateTime
     */
    private $dataInicio;

    /**
     * @var \DateTime
     */
    private $dataFim;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var string
     */
    private $usuarioAprovador;

    /**
     * @var string
     */
    private $observacaoAprovador;

    /**
     * @var \DateTime
     */
    private $dataAprovador;

    /**
     * @var \Servicos\LumaBundle\Entity\Popnomeconcessionaria
     */
    private $idNomeConcessionaria;

    /**
     * @var \Servicos\LumaBundle\Entity\Pop
     */
    private $idPop;


    /**
     * Get idConcessionaria
     *
     * @return integer 
     */
    public function getIdConcessionaria()
    {
        return $this->idConcessionaria;
    }

    /**
     * Set fase
     *
     * @param integer $fase
     * @return Popconcessionaria
     */
    public function setFase($fase)
    {
        $this->fase = $fase;

        return $this;
    }

    /**
     * Get fase
     *
     * @return integer 
     */
    public function getFase()
    {
        return $this->fase;
    }

    /**
     * Set tensao
     *
     * @param integer $tensao
     * @return Popconcessionaria
     */
    public function setTensao($tensao)
    {
        $this->tensao = $tensao;

        return $this;
    }

    /**
     * Get tensao
     *
     * @return integer 
     */
    public function getTensao()
    {
        return $this->tensao;
    }

    /**
     * Set medidor
     *
     * @param string $medidor
     * @return Popconcessionaria
     */
    public function setMedidor($medidor)
    {
        $this->medidor = $medidor;

        return $this;
    }

    /**
     * Get medidor
     *
     * @return string 
     */
    public function getMedidor()
    {
        return $this->medidor;
    }

    /**
     * Set ligacao
     *
     * @param string $ligacao
     * @return Popconcessionaria
     */
    public function setLigacao($ligacao)
    {
        $this->ligacao = $ligacao;

        return $this;
    }

    /**
     * Get ligacao
     *
     * @return string 
     */
    public function getLigacao()
    {
        return $this->ligacao;
    }

    /**
     * Set titular
     *
     * @param string $titular
     * @return Popconcessionaria
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;

        return $this;
    }

    /**
     * Get titular
     *
     * @return string 
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set pagaConta
     *
     * @param string $pagaConta
     * @return Popconcessionaria
     */
    public function setPagaConta($pagaConta)
    {
        $this->pagaConta = $pagaConta;

        return $this;
    }

    /**
     * Get pagaConta
     *
     * @return string 
     */
    public function getPagaConta()
    {
        return $this->pagaConta;
    }

    /**
     * Set dataInicio
     *
     * @param \DateTime $dataInicio
     * @return Popconcessionaria
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
     * Set dataFim
     *
     * @param \DateTime $dataFim
     * @return Popconcessionaria
     */
    public function setDataFim($dataFim)
    {
        $this->dataFim = $dataFim;

        return $this;
    }

    /**
     * Get dataFim
     *
     * @return \DateTime 
     */
    public function getDataFim()
    {
        return $this->dataFim;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Popconcessionaria
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set usuarioAprovador
     *
     * @param string $usuarioAprovador
     * @return Popconcessionaria
     */
    public function setUsuarioAprovador($usuarioAprovador)
    {
        $this->usuarioAprovador = $usuarioAprovador;

        return $this;
    }

    /**
     * Get usuarioAprovador
     *
     * @return string 
     */
    public function getUsuarioAprovador()
    {
        return $this->usuarioAprovador;
    }

    /**
     * Set observacaoAprovador
     *
     * @param string $observacaoAprovador
     * @return Popconcessionaria
     */
    public function setObservacaoAprovador($observacaoAprovador)
    {
        $this->observacaoAprovador = $observacaoAprovador;

        return $this;
    }

    /**
     * Get observacaoAprovador
     *
     * @return string 
     */
    public function getObservacaoAprovador()
    {
        return $this->observacaoAprovador;
    }

    /**
     * Set dataAprovador
     *
     * @param \DateTime $dataAprovador
     * @return Popconcessionaria
     */
    public function setDataAprovador($dataAprovador)
    {
        $this->dataAprovador = $dataAprovador;

        return $this;
    }

    /**
     * Get dataAprovador
     *
     * @return \DateTime 
     */
    public function getDataAprovador()
    {
        return $this->dataAprovador;
    }

    /**
     * Set idNomeConcessionaria
     *
     * @param \Servicos\LumaBundle\Entity\Popnomeconcessionaria $idNomeConcessionaria
     * @return Popconcessionaria
     */
    public function setIdNomeConcessionaria(\Servicos\LumaBundle\Entity\Popnomeconcessionaria $idNomeConcessionaria = null)
    {
        $this->idNomeConcessionaria = $idNomeConcessionaria;

        return $this;
    }

    /**
     * Get idNomeConcessionaria
     *
     * @return \Servicos\LumaBundle\Entity\Popnomeconcessionaria 
     */
    public function getIdNomeConcessionaria()
    {
        return $this->idNomeConcessionaria;
    }

    /**
     * Set idPop
     *
     * @param \Servicos\LumaBundle\Entity\Pop $idPop
     * @return Popconcessionaria
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
