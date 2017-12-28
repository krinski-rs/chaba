<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidoproduto
 */
class Pedidoproduto
{
    /**
     * @var integer
     */
    private $pediprodCodigoid;

    /**
     * @var float
     */
    private $pediprodQuantidade;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidoprodutostatus
     */
    private $pediprodstatCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedido
     */
    private $pediCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get pediprodCodigoid
     *
     * @return integer 
     */
    public function getPediprodCodigoid()
    {
        return $this->pediprodCodigoid;
    }

    /**
     * Set pediprodQuantidade
     *
     * @param float $pediprodQuantidade
     * @return Pedidoproduto
     */
    public function setPediprodQuantidade($pediprodQuantidade)
    {
        $this->pediprodQuantidade = $pediprodQuantidade;

        return $this;
    }

    /**
     * Get pediprodQuantidade
     *
     * @return float 
     */
    public function getPediprodQuantidade()
    {
        return $this->pediprodQuantidade;
    }

    /**
     * Set pediprodstatCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidoprodutostatus $pediprodstatCodigoid
     * @return Pedidoproduto
     */
    public function setPediprodstatCodigoid(\Servicos\LumaBundle\Entity\Pedidoprodutostatus $pediprodstatCodigoid = null)
    {
        $this->pediprodstatCodigoid = $pediprodstatCodigoid;

        return $this;
    }

    /**
     * Get pediprodstatCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedidoprodutostatus 
     */
    public function getPediprodstatCodigoid()
    {
        return $this->pediprodstatCodigoid;
    }

    /**
     * Set pediCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedido $pediCodigoid
     * @return Pedidoproduto
     */
    public function setPediCodigoid(\Servicos\LumaBundle\Entity\Pedido $pediCodigoid = null)
    {
        $this->pediCodigoid = $pediCodigoid;

        return $this;
    }

    /**
     * Get pediCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedido 
     */
    public function getPediCodigoid()
    {
        return $this->pediCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Pedidoproduto
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
