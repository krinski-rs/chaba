<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProdutoSimilar
 */
class ProdutoSimilar
{
    /**
     * @var integer
     */
    private $produtoSimilarCodigoid;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \DateTime
     */
    private $dataInc;


    /**
     * Get produtoSimilarCodigoid
     *
     * @return integer 
     */
    public function getProdutoSimilarCodigoid()
    {
        return $this->produtoSimilarCodigoid;
    }

    /**
     * Set nome
     *
     * @param string $nome
     * @return ProdutoSimilar
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return ProdutoSimilar
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
