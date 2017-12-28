<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBeneficio
 */
class RhBeneficio
{
    /**
     * @var integer
     */
    private $idBeneficio;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var integer
     */
    private $registrante;

    /**
     * @var boolean
     */
    private $cartaoLuma;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var integer
     */
    private $registranteEdicao;

    /**
     * @var \DateTime
     */
    private $dataEdicao;

    /**
     * @var string
     */
    private $motivoEdicao;


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
     * Set nome
     *
     * @param string $nome
     * @return RhBeneficio
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhBeneficio
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhBeneficio
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
     * Set registrante
     *
     * @param integer $registrante
     * @return RhBeneficio
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
     * Set cartaoLuma
     *
     * @param boolean $cartaoLuma
     * @return RhBeneficio
     */
    public function setCartaoLuma($cartaoLuma)
    {
        $this->cartaoLuma = $cartaoLuma;

        return $this;
    }

    /**
     * Get cartaoLuma
     *
     * @return boolean 
     */
    public function getCartaoLuma()
    {
        return $this->cartaoLuma;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhBeneficio
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
     * Set registranteEdicao
     *
     * @param integer $registranteEdicao
     * @return RhBeneficio
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
     * Set dataEdicao
     *
     * @param \DateTime $dataEdicao
     * @return RhBeneficio
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
     * Set motivoEdicao
     *
     * @param string $motivoEdicao
     * @return RhBeneficio
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
}
