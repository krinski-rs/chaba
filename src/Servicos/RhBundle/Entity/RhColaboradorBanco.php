<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhColaboradorBanco
 */
class RhColaboradorBanco
{
    /**
     * @var integer
     */
    private $idColaboradorBanco;

    /**
     * @var integer
     */
    private $idColaborador;

    /**
     * @var integer
     */
    private $idBancoDefinicao;

    /**
     * @var integer
     */
    private $idBancoOperacao;

    /**
     * @var string
     */
    private $agencia;

    /**
     * @var string
     */
    private $conta;

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
    private $registrante;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var integer
     */
    private $portabilidade;


    /**
     * Get idColaboradorBanco
     *
     * @return integer 
     */
    public function getIdColaboradorBanco()
    {
        return $this->idColaboradorBanco;
    }

    /**
     * Set idColaborador
     *
     * @param integer $idColaborador
     * @return RhColaboradorBanco
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
     * Set idBancoDefinicao
     *
     * @param integer $idBancoDefinicao
     * @return RhColaboradorBanco
     */
    public function setIdBancoDefinicao($idBancoDefinicao)
    {
        $this->idBancoDefinicao = $idBancoDefinicao;

        return $this;
    }

    /**
     * Get idBancoDefinicao
     *
     * @return integer 
     */
    public function getIdBancoDefinicao()
    {
        return $this->idBancoDefinicao;
    }

    /**
     * Set idBancoOperacao
     *
     * @param integer $idBancoOperacao
     * @return RhColaboradorBanco
     */
    public function setIdBancoOperacao($idBancoOperacao)
    {
        $this->idBancoOperacao = $idBancoOperacao;

        return $this;
    }

    /**
     * Get idBancoOperacao
     *
     * @return integer 
     */
    public function getIdBancoOperacao()
    {
        return $this->idBancoOperacao;
    }

    /**
     * Set agencia
     *
     * @param string $agencia
     * @return RhColaboradorBanco
     */
    public function setAgencia($agencia)
    {
        $this->agencia = $agencia;

        return $this;
    }

    /**
     * Get agencia
     *
     * @return string 
     */
    public function getAgencia()
    {
        return $this->agencia;
    }

    /**
     * Set conta
     *
     * @param string $conta
     * @return RhColaboradorBanco
     */
    public function setConta($conta)
    {
        $this->conta = $conta;

        return $this;
    }

    /**
     * Get conta
     *
     * @return string 
     */
    public function getConta()
    {
        return $this->conta;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhColaboradorBanco
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
     * @return RhColaboradorBanco
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhColaboradorBanco
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
     * @return RhColaboradorBanco
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
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhColaboradorBanco
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
     * Set portabilidade
     *
     * @param integer $portabilidade
     * @return RhColaboradorBanco
     */
    public function setPortabilidade($portabilidade)
    {
        $this->portabilidade = $portabilidade;

        return $this;
    }

    /**
     * Get portabilidade
     *
     * @return integer 
     */
    public function getPortabilidade()
    {
        return $this->portabilidade;
    }
}
