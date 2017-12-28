<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhGrupoMaterial
 */
class RhGrupoMaterial
{
    /**
     * @var integer
     */
    private $idCargoMaterial;

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
     * Get idCargoMaterial
     *
     * @return integer 
     */
    public function getIdCargoMaterial()
    {
        return $this->idCargoMaterial;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhGrupoMaterial
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
     * @return RhGrupoMaterial
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
     * @return RhGrupoMaterial
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
