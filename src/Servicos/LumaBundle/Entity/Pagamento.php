<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagamento
 */
class Pagamento
{
    /**
     * @var integer
     */
    private $pagCodigoid;

    /**
     * @var integer
     */
    private $ordeCodigoid;

    /**
     * @var integer
     */
    private $pagParcela;

    /**
     * @var string
     */
    private $pagValorprevisto;

    /**
     * @var \DateTime
     */
    private $pagDatainc;

    /**
     * @var \DateTime
     */
    private $pagDataprevisto;

    /**
     * @var \DateTime
     */
    private $pagDataefetivo;

    /**
     * @var string
     */
    private $pagValorefetivo;


    /**
     * Get pagCodigoid
     *
     * @return integer 
     */
    public function getPagCodigoid()
    {
        return $this->pagCodigoid;
    }

    /**
     * Set ordeCodigoid
     *
     * @param integer $ordeCodigoid
     * @return Pagamento
     */
    public function setOrdeCodigoid($ordeCodigoid)
    {
        $this->ordeCodigoid = $ordeCodigoid;

        return $this;
    }

    /**
     * Get ordeCodigoid
     *
     * @return integer 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }

    /**
     * Set pagParcela
     *
     * @param integer $pagParcela
     * @return Pagamento
     */
    public function setPagParcela($pagParcela)
    {
        $this->pagParcela = $pagParcela;

        return $this;
    }

    /**
     * Get pagParcela
     *
     * @return integer 
     */
    public function getPagParcela()
    {
        return $this->pagParcela;
    }

    /**
     * Set pagValorprevisto
     *
     * @param string $pagValorprevisto
     * @return Pagamento
     */
    public function setPagValorprevisto($pagValorprevisto)
    {
        $this->pagValorprevisto = $pagValorprevisto;

        return $this;
    }

    /**
     * Get pagValorprevisto
     *
     * @return string 
     */
    public function getPagValorprevisto()
    {
        return $this->pagValorprevisto;
    }

    /**
     * Set pagDatainc
     *
     * @param \DateTime $pagDatainc
     * @return Pagamento
     */
    public function setPagDatainc($pagDatainc)
    {
        $this->pagDatainc = $pagDatainc;

        return $this;
    }

    /**
     * Get pagDatainc
     *
     * @return \DateTime 
     */
    public function getPagDatainc()
    {
        return $this->pagDatainc;
    }

    /**
     * Set pagDataprevisto
     *
     * @param \DateTime $pagDataprevisto
     * @return Pagamento
     */
    public function setPagDataprevisto($pagDataprevisto)
    {
        $this->pagDataprevisto = $pagDataprevisto;

        return $this;
    }

    /**
     * Get pagDataprevisto
     *
     * @return \DateTime 
     */
    public function getPagDataprevisto()
    {
        return $this->pagDataprevisto;
    }

    /**
     * Set pagDataefetivo
     *
     * @param \DateTime $pagDataefetivo
     * @return Pagamento
     */
    public function setPagDataefetivo($pagDataefetivo)
    {
        $this->pagDataefetivo = $pagDataefetivo;

        return $this;
    }

    /**
     * Get pagDataefetivo
     *
     * @return \DateTime 
     */
    public function getPagDataefetivo()
    {
        return $this->pagDataefetivo;
    }

    /**
     * Set pagValorefetivo
     *
     * @param string $pagValorefetivo
     * @return Pagamento
     */
    public function setPagValorefetivo($pagValorefetivo)
    {
        $this->pagValorefetivo = $pagValorefetivo;

        return $this;
    }

    /**
     * Get pagValorefetivo
     *
     * @return string 
     */
    public function getPagValorefetivo()
    {
        return $this->pagValorefetivo;
    }
}
