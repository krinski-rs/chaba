<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributoproduto
 */
class Atributoproduto
{
    /**
     * @var integer
     */
    private $atriprodCodigoid;

    /**
     * @var string
     */
    private $atriprodValor;

    /**
     * @var \Servicos\LumaBundle\Entity\Atributo
     */
    private $atriCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Produto
     */
    private $prodCodigoid;


    /**
     * Get atriprodCodigoid
     *
     * @return integer 
     */
    public function getAtriprodCodigoid()
    {
        return $this->atriprodCodigoid;
    }

    /**
     * Set atriprodValor
     *
     * @param string $atriprodValor
     * @return Atributoproduto
     */
    public function setAtriprodValor($atriprodValor)
    {
        $this->atriprodValor = $atriprodValor;

        return $this;
    }

    /**
     * Get atriprodValor
     *
     * @return string 
     */
    public function getAtriprodValor()
    {
        return $this->atriprodValor;
    }

    /**
     * Set atriCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Atributo $atriCodigoid
     * @return Atributoproduto
     */
    public function setAtriCodigoid(\Servicos\LumaBundle\Entity\Atributo $atriCodigoid = null)
    {
        $this->atriCodigoid = $atriCodigoid;

        return $this;
    }

    /**
     * Get atriCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Atributo 
     */
    public function getAtriCodigoid()
    {
        return $this->atriCodigoid;
    }

    /**
     * Set prodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Produto $prodCodigoid
     * @return Atributoproduto
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
