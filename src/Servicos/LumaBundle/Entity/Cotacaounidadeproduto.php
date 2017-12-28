<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaounidadeproduto
 */
class Cotacaounidadeproduto
{
    /**
     * @var integer
     */
    private $cotaunidprodCodigoid;

    /**
     * @var \DateTime
     */
    private $cotaunidprodDatainc;

    /**
     * @var string
     */
    private $cotaunidprodQuantidade;

    /**
     * @var string
     */
    private $cotaunidprodValorunitario;

    /**
     * @var string
     */
    private $cotaunidprodValortotal;

    /**
     * @var string
     */
    private $cotaunidprodFrete;

    /**
     * @var string
     */
    private $cotaunidprodTipofrete;

    /**
     * @var boolean
     */
    private $cotaunidprodSubstituicaotributaria;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacaounidade
     */
    private $cotaunidCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get cotaunidprodCodigoid
     *
     * @return integer 
     */
    public function getCotaunidprodCodigoid()
    {
        return $this->cotaunidprodCodigoid;
    }

    /**
     * Set cotaunidprodDatainc
     *
     * @param \DateTime $cotaunidprodDatainc
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodDatainc($cotaunidprodDatainc)
    {
        $this->cotaunidprodDatainc = $cotaunidprodDatainc;

        return $this;
    }

    /**
     * Get cotaunidprodDatainc
     *
     * @return \DateTime 
     */
    public function getCotaunidprodDatainc()
    {
        return $this->cotaunidprodDatainc;
    }

    /**
     * Set cotaunidprodQuantidade
     *
     * @param string $cotaunidprodQuantidade
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodQuantidade($cotaunidprodQuantidade)
    {
        $this->cotaunidprodQuantidade = $cotaunidprodQuantidade;

        return $this;
    }

    /**
     * Get cotaunidprodQuantidade
     *
     * @return string 
     */
    public function getCotaunidprodQuantidade()
    {
        return $this->cotaunidprodQuantidade;
    }

    /**
     * Set cotaunidprodValorunitario
     *
     * @param string $cotaunidprodValorunitario
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodValorunitario($cotaunidprodValorunitario)
    {
        $this->cotaunidprodValorunitario = $cotaunidprodValorunitario;

        return $this;
    }

    /**
     * Get cotaunidprodValorunitario
     *
     * @return string 
     */
    public function getCotaunidprodValorunitario()
    {
        return $this->cotaunidprodValorunitario;
    }

    /**
     * Set cotaunidprodValortotal
     *
     * @param string $cotaunidprodValortotal
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodValortotal($cotaunidprodValortotal)
    {
        $this->cotaunidprodValortotal = $cotaunidprodValortotal;

        return $this;
    }

    /**
     * Get cotaunidprodValortotal
     *
     * @return string 
     */
    public function getCotaunidprodValortotal()
    {
        return $this->cotaunidprodValortotal;
    }

    /**
     * Set cotaunidprodFrete
     *
     * @param string $cotaunidprodFrete
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodFrete($cotaunidprodFrete)
    {
        $this->cotaunidprodFrete = $cotaunidprodFrete;

        return $this;
    }

    /**
     * Get cotaunidprodFrete
     *
     * @return string 
     */
    public function getCotaunidprodFrete()
    {
        return $this->cotaunidprodFrete;
    }

    /**
     * Set cotaunidprodTipofrete
     *
     * @param string $cotaunidprodTipofrete
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodTipofrete($cotaunidprodTipofrete)
    {
        $this->cotaunidprodTipofrete = $cotaunidprodTipofrete;

        return $this;
    }

    /**
     * Get cotaunidprodTipofrete
     *
     * @return string 
     */
    public function getCotaunidprodTipofrete()
    {
        return $this->cotaunidprodTipofrete;
    }

    /**
     * Set cotaunidprodSubstituicaotributaria
     *
     * @param boolean $cotaunidprodSubstituicaotributaria
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidprodSubstituicaotributaria($cotaunidprodSubstituicaotributaria)
    {
        $this->cotaunidprodSubstituicaotributaria = $cotaunidprodSubstituicaotributaria;

        return $this;
    }

    /**
     * Get cotaunidprodSubstituicaotributaria
     *
     * @return boolean 
     */
    public function getCotaunidprodSubstituicaotributaria()
    {
        return $this->cotaunidprodSubstituicaotributaria;
    }

    /**
     * Set cotaunidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacaounidade $cotaunidCodigoid
     * @return Cotacaounidadeproduto
     */
    public function setCotaunidCodigoid(\Servicos\LumaBundle\Entity\Cotacaounidade $cotaunidCodigoid = null)
    {
        $this->cotaunidCodigoid = $cotaunidCodigoid;

        return $this;
    }

    /**
     * Get cotaunidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacaounidade 
     */
    public function getCotaunidCodigoid()
    {
        return $this->cotaunidCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Cotacaounidadeproduto
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
