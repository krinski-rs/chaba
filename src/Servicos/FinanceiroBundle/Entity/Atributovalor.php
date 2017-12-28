<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributovalor
 */
class Atributovalor
{
    /**
     * @var integer
     */
    private $atrivaloCodigoid;

    /**
     * @var string
     */
    private $atrivaloValor;

    /**
     * @var string
     */
    private $mask;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Atributo
     */
    private $atriCodigoid;


    /**
     * Get atrivaloCodigoid
     *
     * @return integer 
     */
    public function getAtrivaloCodigoid()
    {
        return $this->atrivaloCodigoid;
    }

    /**
     * Set atrivaloValor
     *
     * @param string $atrivaloValor
     * @return Atributovalor
     */
    public function setAtrivaloValor($atrivaloValor)
    {
        $this->atrivaloValor = $atrivaloValor;

        return $this;
    }

    /**
     * Get atrivaloValor
     *
     * @return string 
     */
    public function getAtrivaloValor()
    {
        return $this->atrivaloValor;
    }

    /**
     * Set mask
     *
     * @param string $mask
     * @return Atributovalor
     */
    public function setMask($mask)
    {
        $this->mask = $mask;

        return $this;
    }

    /**
     * Get mask
     *
     * @return string 
     */
    public function getMask()
    {
        return $this->mask;
    }

    /**
     * Set atriCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Atributo $atriCodigoid
     * @return Atributovalor
     */
    public function setAtriCodigoid(\Servicos\FinanceiroBundle\Entity\Atributo $atriCodigoid = null)
    {
        $this->atriCodigoid = $atriCodigoid;

        return $this;
    }

    /**
     * Get atriCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Atributo 
     */
    public function getAtriCodigoid()
    {
        return $this->atriCodigoid;
    }
}
