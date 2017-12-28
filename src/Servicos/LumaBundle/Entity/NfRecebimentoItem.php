<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * NfRecebimentoItem
 */
class NfRecebimentoItem
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $prodCodigoid;

    /**
     * @var float
     */
    private $quantidade;

    /**
     * @var float
     */
    private $valorTotal;

    /**
     * @var \Servicos\LumaBundle\Entity\NfRecebimento
     */
    private $nfRecebimento;


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
     * Set prodCodigoid
     *
     * @param integer $prodCodigoid
     * @return NfRecebimentoItem
     */
    public function setProdCodigoid($prodCodigoid)
    {
        $this->prodCodigoid = $prodCodigoid;

        return $this;
    }

    /**
     * Get prodCodigoid
     *
     * @return integer 
     */
    public function getProdCodigoid()
    {
        return $this->prodCodigoid;
    }

    /**
     * Set quantidade
     *
     * @param float $quantidade
     * @return NfRecebimentoItem
     */
    public function setQuantidade($quantidade)
    {
        $this->quantidade = $quantidade;

        return $this;
    }

    /**
     * Get quantidade
     *
     * @return float 
     */
    public function getQuantidade()
    {
        return $this->quantidade;
    }

    /**
     * Set valorTotal
     *
     * @param float $valorTotal
     * @return NfRecebimentoItem
     */
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    /**
     * Get valorTotal
     *
     * @return float 
     */
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Set nfRecebimento
     *
     * @param \Servicos\LumaBundle\Entity\NfRecebimento $nfRecebimento
     * @return NfRecebimentoItem
     */
    public function setNfRecebimento(\Servicos\LumaBundle\Entity\NfRecebimento $nfRecebimento = null)
    {
        $this->nfRecebimento = $nfRecebimento;

        return $this;
    }

    /**
     * Get nfRecebimento
     *
     * @return \Servicos\LumaBundle\Entity\NfRecebimento 
     */
    public function getNfRecebimento()
    {
        return $this->nfRecebimento;
    }
}
