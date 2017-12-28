<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhBeneficioAtributo
 */
class RhBeneficioAtributo
{
    /**
     * @var integer
     */
    private $idBeneficioAtributo;

    /**
     * @var integer
     */
    private $idBeneficio;

    /**
     * @var integer
     */
    private $idBeneficioTipoAtributo;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idBeneficioAtributo
     *
     * @return integer 
     */
    public function getIdBeneficioAtributo()
    {
        return $this->idBeneficioAtributo;
    }

    /**
     * Set idBeneficio
     *
     * @param integer $idBeneficio
     * @return RhBeneficioAtributo
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
     * Set idBeneficioTipoAtributo
     *
     * @param integer $idBeneficioTipoAtributo
     * @return RhBeneficioAtributo
     */
    public function setIdBeneficioTipoAtributo($idBeneficioTipoAtributo)
    {
        $this->idBeneficioTipoAtributo = $idBeneficioTipoAtributo;

        return $this;
    }

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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return RhBeneficioAtributo
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
     * @return RhBeneficioAtributo
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
