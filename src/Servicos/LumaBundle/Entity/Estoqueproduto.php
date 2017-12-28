<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoqueproduto
 */
class Estoqueproduto
{
    /**
     * @var integer
     */
    private $estoprodCodigoid;

    /**
     * @var float
     */
    private $estoprodMinimo;

    /**
     * @var float
     */
    private $estoprodNormal;

    /**
     * @var string
     */
    private $estoprodTotal;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoque
     */
    private $estoCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get estoprodCodigoid
     *
     * @return integer 
     */
    public function getEstoprodCodigoid()
    {
        return $this->estoprodCodigoid;
    }

    /**
     * Set estoprodMinimo
     *
     * @param float $estoprodMinimo
     * @return Estoqueproduto
     */
    public function setEstoprodMinimo($estoprodMinimo)
    {
        $this->estoprodMinimo = $estoprodMinimo;

        return $this;
    }

    /**
     * Get estoprodMinimo
     *
     * @return float 
     */
    public function getEstoprodMinimo()
    {
        return $this->estoprodMinimo;
    }

    /**
     * Set estoprodNormal
     *
     * @param float $estoprodNormal
     * @return Estoqueproduto
     */
    public function setEstoprodNormal($estoprodNormal)
    {
        $this->estoprodNormal = $estoprodNormal;

        return $this;
    }

    /**
     * Get estoprodNormal
     *
     * @return float 
     */
    public function getEstoprodNormal()
    {
        return $this->estoprodNormal;
    }

    /**
     * Set estoprodTotal
     *
     * @param string $estoprodTotal
     * @return Estoqueproduto
     */
    public function setEstoprodTotal($estoprodTotal)
    {
        $this->estoprodTotal = $estoprodTotal;

        return $this;
    }

    /**
     * Get estoprodTotal
     *
     * @return string 
     */
    public function getEstoprodTotal()
    {
        return $this->estoprodTotal;
    }

    /**
     * Set estoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Estoque $estoCodigoid
     * @return Estoqueproduto
     */
    public function setEstoCodigoid(\Servicos\LumaBundle\Entity\Estoque $estoCodigoid = null)
    {
        $this->estoCodigoid = $estoCodigoid;

        return $this;
    }

    /**
     * Get estoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Estoque 
     */
    public function getEstoCodigoid()
    {
        return $this->estoCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Estoqueproduto
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
}
