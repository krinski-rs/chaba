<?php

namespace Servicos\RhBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhProdGrupo
 */
class RhProdGrupo
{
    /**
     * @var integer
     */
    private $idProdGrupo;

    /**
     * @var integer
     */
    private $produtoSimilarCodigoid;

    /**
     * @var boolean
     */
    private $ativo;

    /**
     * @var \Servicos\RhBundle\Entity\RhGrupoMaterial
     */
    private $idCargoMaterial;


    /**
     * Get idProdGrupo
     *
     * @return integer 
     */
    public function getIdProdGrupo()
    {
        return $this->idProdGrupo;
    }

    /**
     * Set produtoSimilarCodigoid
     *
     * @param integer $produtoSimilarCodigoid
     * @return RhProdGrupo
     */
    public function setProdutoSimilarCodigoid($produtoSimilarCodigoid)
    {
        $this->produtoSimilarCodigoid = $produtoSimilarCodigoid;

        return $this;
    }

    /**
     * Get produtoSimilarCodigoid
     *
     * @return integer 
     */
    public function getProdutoSimilarCodigoid()
    {
        return $this->produtoSimilarCodigoid;
    }

    /**
     * Set ativo
     *
     * @param boolean $ativo
     * @return RhProdGrupo
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
     * Set idCargoMaterial
     *
     * @param \Servicos\RhBundle\Entity\RhGrupoMaterial $idCargoMaterial
     * @return RhProdGrupo
     */
    public function setIdCargoMaterial(\Servicos\RhBundle\Entity\RhGrupoMaterial $idCargoMaterial = null)
    {
        $this->idCargoMaterial = $idCargoMaterial;

        return $this;
    }

    /**
     * Get idCargoMaterial
     *
     * @return \Servicos\RhBundle\Entity\RhGrupoMaterial 
     */
    public function getIdCargoMaterial()
    {
        return $this->idCargoMaterial;
    }
}
