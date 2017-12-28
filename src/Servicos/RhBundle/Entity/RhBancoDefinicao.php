<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBancoDefinicao
 */
class RhBancoDefinicao
{
    /**
     * @var integer
     */
    private $idBancoDefinicao;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var string
     */
    private $ativo;


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
     * Set descricao
     *
     * @param string $descricao
     * @return RhBancoDefinicao
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
     * @return RhBancoDefinicao
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
     * @param string $ativo
     * @return RhBancoDefinicao
     */
    public function setAtivo($ativo)
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get ativo
     *
     * @return string 
     */
    public function getAtivo()
    {
        return $this->ativo;
    }
}
