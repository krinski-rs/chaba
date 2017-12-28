<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhTipoColaborador
 */
class RhTipoColaborador
{
    /**
     * @var integer
     */
    private $idTipoColaborador;

    /**
     * @var string
     */
    private $descricao;

    /**
     * @var boolean
     */
    private $ativo;


    /**
     * Get idTipoColaborador
     *
     * @return integer 
     */
    public function getIdTipoColaborador()
    {
        return $this->idTipoColaborador;
    }

    /**
     * Set descricao
     *
     * @param string $descricao
     * @return RhTipoColaborador
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
     * @param boolean $ativo
     * @return RhTipoColaborador
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
