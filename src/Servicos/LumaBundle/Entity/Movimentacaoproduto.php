<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Movimentacaoproduto
 */
class Movimentacaoproduto
{
    const STATUS_NAO_INTEGRADO = 0;
    const STATUS_AGUARDANDO_INTEGRACAO = 1;
    const STATUS_INTEGRADO = 2;

    /**
     * @var integer
     */
    private $moviprodCodigoid;

    /**
     * @var float
     */
    private $moviprodQuantidade;

    /**
     * @var string
     */
    private $moviprodValor;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoqueproduto
     */
    private $estoprodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Lote
     */
    private $loteCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Movimentacao
     */
    private $moviCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto
     */
    private $ordecotaunidprodCodigoid;


    /**
     * Get moviprodCodigoid
     *
     * @return integer
     */
    public function getMoviprodCodigoid()
    {
        return $this->moviprodCodigoid;
    }

    /**
     * Set moviprodQuantidade
     *
     * @param float $moviprodQuantidade
     * @return Movimentacaoproduto
     */
    public function setMoviprodQuantidade($moviprodQuantidade)
    {
        $this->moviprodQuantidade = $moviprodQuantidade;

        return $this;
    }

    /**
     * Get moviprodQuantidade
     *
     * @return float
     */
    public function getMoviprodQuantidade()
    {
        return $this->moviprodQuantidade;
    }

    /**
     * Set moviprodValor
     *
     * @param string $moviprodValor
     * @return Movimentacaoproduto
     */
    public function setMoviprodValor($moviprodValor)
    {
        $this->moviprodValor = $moviprodValor;

        return $this;
    }

    /**
     * Get moviprodValor
     *
     * @return string
     */
    public function getMoviprodValor()
    {
        return $this->moviprodValor;
    }

    /**
     * Set estoprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Estoqueproduto $estoprodCodigoid
     * @return Movimentacaoproduto
     */
    public function setEstoprodCodigoid(\Servicos\LumaBundle\Entity\Estoqueproduto $estoprodCodigoid = null)
    {
        $this->estoprodCodigoid = $estoprodCodigoid;

        return $this;
    }

    /**
     * Get estoprodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Estoqueproduto
     */
    public function getEstoprodCodigoid()
    {
        return $this->estoprodCodigoid;
    }

    /**
     * Set loteCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Lote $loteCodigoid
     * @return Movimentacaoproduto
     */
    public function setLoteCodigoid(\Servicos\LumaBundle\Entity\Lote $loteCodigoid = null)
    {
        $this->loteCodigoid = $loteCodigoid;

        return $this;
    }

    /**
     * Get loteCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Lote
     */
    public function getLoteCodigoid()
    {
        return $this->loteCodigoid;
    }

    /**
     * Set moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return Movimentacaoproduto
     */
    public function setMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid = null)
    {
        $this->moviCodigoid = $moviCodigoid;

        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Movimentacao
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }

    /**
     * Set ordecotaunidprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto $ordecotaunidprodCodigoid
     * @return Movimentacaoproduto
     */
    public function setOrdecotaunidprodCodigoid(\Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto $ordecotaunidprodCodigoid = null)
    {
        $this->ordecotaunidprodCodigoid = $ordecotaunidprodCodigoid;

        return $this;
    }

    /**
     * Get ordecotaunidprodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto
     */
    public function getOrdecotaunidprodCodigoid()
    {
        return $this->ordecotaunidprodCodigoid;
    }
}
