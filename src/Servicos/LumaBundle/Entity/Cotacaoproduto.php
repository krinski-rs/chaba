<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cotacaoproduto
 */
class Cotacaoproduto
{
    /**
     * @var integer
     */
    private $cotaprodCodigoid;

    /**
     * @var string
     */
    private $cotaprodQuantidade;

    /**
     * @var \Servicos\LumaBundle\Entity\Cotacao
     */
    private $cotaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;


    /**
     * Get cotaprodCodigoid
     *
     * @return integer 
     */
    public function getCotaprodCodigoid()
    {
        return $this->cotaprodCodigoid;
    }

    /**
     * Set cotaprodQuantidade
     *
     * @param string $cotaprodQuantidade
     * @return Cotacaoproduto
     */
    public function setCotaprodQuantidade($cotaprodQuantidade)
    {
        $this->cotaprodQuantidade = $cotaprodQuantidade;

        return $this;
    }

    /**
     * Get cotaprodQuantidade
     *
     * @return string 
     */
    public function getCotaprodQuantidade()
    {
        return $this->cotaprodQuantidade;
    }

    /**
     * Set cotaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid
     * @return Cotacaoproduto
     */
    public function setCotaCodigoid(\Servicos\LumaBundle\Entity\Cotacao $cotaCodigoid = null)
    {
        $this->cotaCodigoid = $cotaCodigoid;

        return $this;
    }

    /**
     * Get cotaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Cotacao 
     */
    public function getCotaCodigoid()
    {
        return $this->cotaCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Cotacaoproduto
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
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Cotacaoproduto
     */
    public function setTipoCodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoCodigoid = null)
    {
        $this->tipoCodigoid = $tipoCodigoid;

        return $this;
    }

    /**
     * Get tipoCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoCodigoid()
    {
        return $this->tipoCodigoid;
    }
}
