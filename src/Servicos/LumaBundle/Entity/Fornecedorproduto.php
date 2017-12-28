<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fornecedorproduto
 */
class Fornecedorproduto
{
    /**
     * @var integer
     */
    private $fornprodCodigoid;

    /**
     * @var boolean
     */
    private $fornprodAtivo;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get fornprodCodigoid
     *
     * @return integer 
     */
    public function getFornprodCodigoid()
    {
        return $this->fornprodCodigoid;
    }

    /**
     * Set fornprodAtivo
     *
     * @param boolean $fornprodAtivo
     * @return Fornecedorproduto
     */
    public function setFornprodAtivo($fornprodAtivo)
    {
        $this->fornprodAtivo = $fornprodAtivo;

        return $this;
    }

    /**
     * Get fornprodAtivo
     *
     * @return boolean 
     */
    public function getFornprodAtivo()
    {
        return $this->fornprodAtivo;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Fornecedorproduto
     */
    public function setProdCodigoid(\Servicos\LumaBundle\Entity\Produto $prodCodigoid = null)
    {
        $this->prodCodigoid = $prodCodigoid;

        return $this;
    }

    /**
     * Get prodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Produto 
     */
    public function getProdCodigoid()
    {
        return $this->prodCodigoid;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Fornecedorproduto
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
}
