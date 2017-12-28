<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Estoqueprodutohistorico
 */
class Estoqueprodutohistorico
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $minimo;

    /**
     * @var string
     */
    private $total;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $idProduto;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoquehistorico
     */
    private $idEstoquehistorico;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set minimo
     *
     * @param float $minimo
     * @return Estoqueprodutohistorico
     */
    public function setMinimo($minimo)
    {
        $this->minimo = $minimo;

        return $this;
    }

    /**
     * Get minimo
     *
     * @return float 
     */
    public function getMinimo()
    {
        return $this->minimo;
    }

    /**
     * Set total
     *
     * @param string $total
     * @return Estoqueprodutohistorico
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set idProduto
     *
     * @param \Servicos\LumaBundle\Entity\Produto $idProduto
     * @return Estoqueprodutohistorico
     */
    public function setIdProduto(\Servicos\LumaBundle\Entity\Produto $idProduto = null)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get idProduto
     *
     * @return \Servicos\LumaBundle\Entity\Produto 
     */
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set idEstoquehistorico
     *
     * @param \Servicos\LumaBundle\Entity\Estoquehistorico $idEstoquehistorico
     * @return Estoqueprodutohistorico
     */
    public function setIdEstoquehistorico(\Servicos\LumaBundle\Entity\Estoquehistorico $idEstoquehistorico = null)
    {
        $this->idEstoquehistorico = $idEstoquehistorico;

        return $this;
    }

    /**
     * Get idEstoquehistorico
     *
     * @return \Servicos\LumaBundle\Entity\Estoquehistorico 
     */
    public function getIdEstoquehistorico()
    {
        return $this->idEstoquehistorico;
    }
}
