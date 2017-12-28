<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrdemNfEntrada
 */
class OrdemNfEntrada
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nfDoc;

    /**
     * @var string
     */
    private $nfSerie;

    /**
     * @var string
     */
    private $nfStatus;

    /**
     * @var \DateTime
     */
    private $nfEmissao;

   /**
     * @var datetime $nfQuantidade
     */
    private $nfQuantidade;

    /**
     * @var Luma\Entity\Ordem
     */
    private $ordeCodigoid;

    /**
     * @var Luma\Entity\Produto
     */
    private $prodCodigoid;


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
     * Set nfDoc
     *
     * @param integer $nfDoc
     * @return OrdemNfEntrada
     */
    public function setNfDoc($nfDoc)
    {
        $this->nfDoc = $nfDoc;

        return $this;
    }

    /**
     * Get nfDoc
     *
     * @return integer 
     */
    public function getNfDoc()
    {
        return $this->nfDoc;
    }

    /**
     * Set nfSerie
     *
     * @param string $nfSerie
     * @return OrdemNfEntrada
     */
    public function setNfSerie($nfSerie)
    {
        $this->nfSerie = $nfSerie;

        return $this;
    }

    /**
     * Get nfSerie
     *
     * @return string 
     */
    public function getNfSerie()
    {
        return $this->nfSerie;
    }

    /**
     * Set nfStatus
     *
     * @param string $nfStatus
     * @return OrdemNfEntrada
     */
    public function setNfStatus($nfStatus)
    {
        $this->nfStatus = $nfStatus;

        return $this;
    }

    /**
     * Get nfStatus
     *
     * @return string 
     */
    public function getNfStatus()
    {
        return $this->nfStatus;
    }

    /**
     * Set nfEmissao
     *
     * @param \DateTime $nfEmissao
     * @return OrdemNfEntrada
     */
    public function setNfEmissao($nfEmissao)
    {
        $this->nfEmissao = $nfEmissao;

        return $this;
    }

    /**
     * Get nfEmissao
     *
     * @return \DateTime 
     */
    public function getNfEmissao()
    {
        return $this->nfEmissao;
    }

    /**
     * Set nfQuantidade
     *
     * @param float $nfQuantidade
     * @return OrdemNfEntrada
     */
    public function setNfQuantidade($nfQuantidade)
    {
        $this->nfQuantidade = $nfQuantidade;
        return $this;
    }

    /**
     * Get nfQuantidade
     *
     * @return datetime 
     */
    public function getNfQuantidade()
    {
        return $this->nfQuantidade;
    }


    /**
     * Set ordeCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Ordem $ordeCodigoid
     * @return OrdemNfEntrada
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

    
    /**
     * Set prodCodigoid
     *
     * @param Luma\Entity\Produto $prodCodigoid
     * @return OrdemNfEntrada
     */
    public function setProdCodigoid(\Servicos\LumaBundle\Entity\Produto $prodCodigoid = null)
    {
        $this->prodCodigoid = $prodCodigoid;
        return $this;
    }

    /**
     * Get prodCodigoid
     *
     * @return Luma\Entity\Produto 
     */
    public function getProdCodigoid()
    {
        return $this->prodCodigoid;
    }
}
