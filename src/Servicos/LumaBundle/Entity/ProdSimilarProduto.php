<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdSimilarProduto
 */
class ProdSimilarProduto
{
    /**
     * @var integer
     */
    private $prodSimilaCodigoid;

    /**
     * @var integer
     */
    private $similarCodigoid;

    /**
     * @var integer
     */
    private $prodCodigoid;

    /**
     * @var \DateTime
     */
    private $dataInc;


    /**
     * Get prodSimilaCodigoid
     *
     * @return integer 
     */
    public function getProdSimilaCodigoid()
    {
        return $this->prodSimilaCodigoid;
    }

    /**
     * Set similarCodigoid
     *
     * @param integer $similarCodigoid
     * @return ProdSimilarProduto
     */
    public function setSimilarCodigoid($similarCodigoid)
    {
        $this->similarCodigoid = $similarCodigoid;

        return $this;
    }

    /**
     * Get similarCodigoid
     *
     * @return integer 
     */
    public function getSimilarCodigoid()
    {
        return $this->similarCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param integer $prodCodigoid
     * @return ProdSimilarProduto
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
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return ProdSimilarProduto
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }
}
