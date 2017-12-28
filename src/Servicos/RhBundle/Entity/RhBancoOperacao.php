<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBancoOperacao
 */
class RhBancoOperacao
{
    /**
     * @var integer
     */
    private $idBancoOperacao;

    /**
     * @var string
     */
    private $operacao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $ativo;


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
     * Set operacao
     *
     * @param string $operacao
     * @return RhBancoOperacao
     */
    public function setOperacao($operacao)
    {
        $this->operacao = $operacao;

        return $this;
    }

    /**
     * Get operacao
     *
     * @return string 
     */
    public function getOperacao()
    {
        return $this->operacao;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhBancoOperacao
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
     * @return RhBancoOperacao
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
