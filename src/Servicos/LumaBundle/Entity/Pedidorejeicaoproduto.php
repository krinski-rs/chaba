<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pedidorejeicaoproduto
 */
class Pedidorejeicaoproduto
{
    /**
     * @var integer
     */
    private $pedirejeprodCodigoid;

    /**
     * @var float
     */
    private $pedirejeprodQuantidade;

    /**
     * @var \Servicos\LumaBundle\Entity\Pedidorejeicao
     */
    private $pedirejeCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get pedirejeprodCodigoid
     *
     * @return integer 
     */
    public function getPedirejeprodCodigoid()
    {
        return $this->pedirejeprodCodigoid;
    }

    /**
     * Set pedirejeprodQuantidade
     *
     * @param float $pedirejeprodQuantidade
     * @return Pedidorejeicaoproduto
     */
    public function setPedirejeprodQuantidade($pedirejeprodQuantidade)
    {
        $this->pedirejeprodQuantidade = $pedirejeprodQuantidade;

        return $this;
    }

    /**
     * Get pedirejeprodQuantidade
     *
     * @return float 
     */
    public function getPedirejeprodQuantidade()
    {
        return $this->pedirejeprodQuantidade;
    }

    /**
     * Set pedirejeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Pedidorejeicao $pedirejeCodigoid
     * @return Pedidorejeicaoproduto
     */
    public function setPedirejeCodigoid(\Servicos\LumaBundle\Entity\Pedidorejeicao $pedirejeCodigoid = null)
    {
        $this->pedirejeCodigoid = $pedirejeCodigoid;

        return $this;
    }

    /**
     * Get pedirejeCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Pedidorejeicao 
     */
    public function getPedirejeCodigoid()
    {
        return $this->pedirejeCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Pedidorejeicaoproduto
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
