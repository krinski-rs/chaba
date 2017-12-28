<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhTipoAtributo
 */
class RhTipoAtributo
{
    /**
     * @var integer
     */
    private $idTipoAtributo;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var string
     */
    private $ativo;


    /**
     * Get idTipoAtributo
     *
     * @return integer 
     */
    public function getIdTipoAtributo()
    {
        return $this->idTipoAtributo;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhTipoAtributo
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
     * Set ativo
     *
     * @param string $ativo
     * @return RhTipoAtributo
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
