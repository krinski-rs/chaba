<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Industrializacaoestoqueproduto
 */
class Industrializacaoestoqueproduto
{
    /**
     * @var integer
     */
    private $induestoprodCodigoid;

    /**
     * @var float
     */
    private $induestoprodQuantidade;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoqueproduto
     */
    private $estoprodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Industrializacao
     */
    private $induCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Lote
     */
    private $loteCodigoid;


    /**
     * Get induestoprodCodigoid
     *
     * @return integer 
     */
    public function getInduestoprodCodigoid()
    {
        return $this->induestoprodCodigoid;
    }

    /**
     * Set induestoprodQuantidade
     *
     * @param float $induestoprodQuantidade
     * @return Industrializacaoestoqueproduto
     */
    public function setInduestoprodQuantidade($induestoprodQuantidade)
    {
        $this->induestoprodQuantidade = $induestoprodQuantidade;

        return $this;
    }

    /**
     * Get induestoprodQuantidade
     *
     * @return float 
     */
    public function getInduestoprodQuantidade()
    {
        return $this->induestoprodQuantidade;
    }

    /**
     * Set estoprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Estoqueproduto $estoprodCodigoid
     * @return Industrializacaoestoqueproduto
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
     * Set induCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Industrializacao $induCodigoid
     * @return Industrializacaoestoqueproduto
     */
    public function setInduCodigoid(\Servicos\LumaBundle\Entity\Industrializacao $induCodigoid = null)
    {
        $this->induCodigoid = $induCodigoid;

        return $this;
    }

    /**
     * Get induCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Industrializacao 
     */
    public function getInduCodigoid()
    {
        return $this->induCodigoid;
    }

    /**
     * Set loteCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Lote $loteCodigoid
     * @return Industrializacaoestoqueproduto
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
}
