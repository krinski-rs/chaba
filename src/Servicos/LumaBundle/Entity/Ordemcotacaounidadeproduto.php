<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordemcotacaounidadeproduto
 */
class Ordemcotacaounidadeproduto
{
    /**
     * @var integer
     */
    private $ordecotaunidprod;

    /**
     * @var string
     */
    private $ordecotaunidprodQuantidade;

    /**
     * @var string
     */
    private $ordecotaunidprodPedida;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacaounidadeproduto
     */
    private $cotaunidprodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordem
     */
    private $ordeCodigoid;


    /**
     * Get ordecotaunidprod
     *
     * @return integer 
     */
    public function getOrdecotaunidprod()
    {
        return $this->ordecotaunidprod;
    }

    /**
     * Set ordecotaunidprodQuantidade
     *
     * @param string $ordecotaunidprodQuantidade
     * @return Ordemcotacaounidadeproduto
     */
    public function setOrdecotaunidprodQuantidade($ordecotaunidprodQuantidade)
    {
        $this->ordecotaunidprodQuantidade = $ordecotaunidprodQuantidade;

        return $this;
    }

    /**
     * Get ordecotaunidprodQuantidade
     *
     * @return string 
     */
    public function getOrdecotaunidprodQuantidade()
    {
        return $this->ordecotaunidprodQuantidade;
    }

    /**
     * Set ordecotaunidprodPedida
     *
     * @param string $ordecotaunidprodPedida
     * @return Ordemcotacaounidadeproduto
     */
    public function setOrdecotaunidprodPedida($ordecotaunidprodPedida)
    {
        $this->ordecotaunidprodPedida = $ordecotaunidprodPedida;

        return $this;
    }

    /**
     * Get ordecotaunidprodPedida
     *
     * @return string 
     */
    public function getOrdecotaunidprodPedida()
    {
        return $this->ordecotaunidprodPedida;
    }

    /**
     * Set cotaunidprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacaounidadeproduto $cotaunidprodCodigoid
     * @return Ordemcotacaounidadeproduto
     */
    public function setCotaunidprodCodigoid(\Servicos\LumaBundle\Entity\Cotacaounidadeproduto $cotaunidprodCodigoid = null)
    {
        $this->cotaunidprodCodigoid = $cotaunidprodCodigoid;

        return $this;
    }

    /**
     * Get cotaunidprodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacaounidadeproduto 
     */
    public function getCotaunidprodCodigoid()
    {
        return $this->cotaunidprodCodigoid;
    }

    /**
     * Set ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return Ordemcotacaounidadeproduto
     */
    public function setOrdeCodigoid(\Servicos\LumaBundle\Entity\Ordem $ordeCodigoid = null)
    {
        $this->ordeCodigoid = $ordeCodigoid;

        return $this;
    }

    /**
     * Get ordeCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Ordem 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }
}
