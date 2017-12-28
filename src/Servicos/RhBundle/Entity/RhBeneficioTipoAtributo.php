<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBeneficioTipoAtributo
 */
class RhBeneficioTipoAtributo
{
    /**
     * @var integer
     */
    private $idBeneficioTipoAtributo;

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
    private $mascara;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idBeneficioTipoAtributo
     *
     * @return integer 
     */
    public function getIdBeneficioTipoAtributo()
    {
        return $this->idBeneficioTipoAtributo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhBeneficioTipoAtributo
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
     * @return RhBeneficioTipoAtributo
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
     * Set mascara
     *
     * @param integer $mascara
     * @return RhBeneficioTipoAtributo
     */
    public function setMascara($mascara)
    {
        $this->mascara = $mascara;

        return $this;
    }

    /**
     * Get mascara
     *
     * @return integer 
     */
    public function getMascara()
    {
        return $this->mascara;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhBeneficioTipoAtributo
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
