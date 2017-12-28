<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhDocumentoTipo
 */
class RhDocumentoTipo
{
    /**
     * @var integer
     */
    private $idDocumentoTipo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idDocumentoTipo
     *
     * @return integer 
     */
    public function getIdDocumentoTipo()
    {
        return $this->idDocumentoTipo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhDocumentoTipo
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
     * @return RhDocumentoTipo
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
     * @return RhDocumentoTipo
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
