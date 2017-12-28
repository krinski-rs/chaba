<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lote
 */
class Lote
{
    /**
     * @var integer
     */
    private $loteCodigoid;

    /**
     * @var string
     */
    private $loteQuantidade;

    /**
     * @var string
     */
    private $loteMarcaelotefabricacao;

    /**
     * @var \DateTime
     */
    private $loteDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Estoqueproduto
     */
    private $estoprodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto
     */
    private $ordecotaunidprod;


    /**
     * Get loteCodigoid
     *
     * @return integer 
     */
    public function getLoteCodigoid()
    {
        return $this->loteCodigoid;
    }

    /**
     * Set loteQuantidade
     *
     * @param string $loteQuantidade
     * @return Lote
     */
    public function setLoteQuantidade($loteQuantidade)
    {
        $this->loteQuantidade = $loteQuantidade;

        return $this;
    }

    /**
     * Get loteQuantidade
     *
     * @return string 
     */
    public function getLoteQuantidade()
    {
        return $this->loteQuantidade;
    }

    /**
     * Set loteMarcaelotefabricacao
     *
     * @param string $loteMarcaelotefabricacao
     * @return Lote
     */
    public function setLoteMarcaelotefabricacao($loteMarcaelotefabricacao)
    {
        $this->loteMarcaelotefabricacao = $loteMarcaelotefabricacao;

        return $this;
    }

    /**
     * Get loteMarcaelotefabricacao
     *
     * @return string 
     */
    public function getLoteMarcaelotefabricacao()
    {
        return $this->loteMarcaelotefabricacao;
    }

    /**
     * Set loteDatainc
     *
     * @param \DateTime $loteDatainc
     * @return Lote
     */
    public function setLoteDatainc($loteDatainc)
    {
        $this->loteDatainc = $loteDatainc;

        return $this;
    }

    /**
     * Get loteDatainc
     *
     * @return \DateTime 
     */
    public function getLoteDatainc()
    {
        return $this->loteDatainc;
    }

    /**
     * Set estoprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Estoqueproduto $estoprodCodigoid
     * @return Lote
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
     * Set ordecotaunidprod
     *
     * @param \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto $ordecotaunidprod
     * @return Lote
     */
    public function setOrdecotaunidprod(\Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto $ordecotaunidprod = null)
    {
        $this->ordecotaunidprod = $ordecotaunidprod;

        return $this;
    }

    /**
     * Get ordecotaunidprod
     *
     * @return \Servicos\LumaBundle\Entity\Ordemcotacaounidadeproduto 
     */
    public function getOrdecotaunidprod()
    {
        return $this->ordecotaunidprod;
    }
}
