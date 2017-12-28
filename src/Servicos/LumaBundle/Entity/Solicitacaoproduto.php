<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicitacaoproduto
 */
class Solicitacaoproduto
{
    /**
     * @var integer
     */
    private $soliprodCodigoid;

    /**
     * @var float
     */
    private $soliprodQuantidade;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Solicitacao
     */
    private $soliCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoCodigoid;


    /**
     * Get soliprodCodigoid
     *
     * @return integer 
     */
    public function getSoliprodCodigoid()
    {
        return $this->soliprodCodigoid;
    }

    /**
     * Set soliprodQuantidade
     *
     * @param float $soliprodQuantidade
     * @return Solicitacaoproduto
     */
    public function setSoliprodQuantidade($soliprodQuantidade)
    {
        $this->soliprodQuantidade = $soliprodQuantidade;

        return $this;
    }

    /**
     * Get soliprodQuantidade
     *
     * @return float 
     */
    public function getSoliprodQuantidade()
    {
        return $this->soliprodQuantidade;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Solicitacaoproduto
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
     * Set soliCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Solicitacao $soliCodigoid
     * @return Solicitacaoproduto
     */
    public function setSoliCodigoid(\Servicos\LumaBundle\Entity\Solicitacao $soliCodigoid = null)
    {
        $this->soliCodigoid = $soliCodigoid;

        return $this;
    }

    /**
     * Get soliCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Solicitacao 
     */
    public function getSoliCodigoid()
    {
        return $this->soliCodigoid;
    }

    /**
     * Set tipoCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoCodigoid
     * @return Solicitacaoproduto
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
