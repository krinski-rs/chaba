<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multas
 */
class Multas
{
    /**
     * @var integer
     */
    private $multCodigoid;

    /**
     * @var string
     */
    private $multAtraso;

    /**
     * @var string
     */
    private $multJuro;

    /**
     * @var string
     */
    private $multMora;

    /**
     * @var string
     */
    private $multDowngrade;

    /**
     * @var string
     */
    private $multRecisao;

    /**
     * @var boolean
     */
    private $multCobrardesconto;

    /**
     * @var boolean
     */
    private $multCobrardescontofuturo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $contrato;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contrato = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get multCodigoid
     *
     * @return integer 
     */
    public function getMultCodigoid()
    {
        return $this->multCodigoid;
    }

    /**
     * Set multAtraso
     *
     * @param string $multAtraso
     * @return Multas
     */
    public function setMultAtraso($multAtraso)
    {
        $this->multAtraso = $multAtraso;

        return $this;
    }

    /**
     * Get multAtraso
     *
     * @return string 
     */
    public function getMultAtraso()
    {
        return $this->multAtraso;
    }

    /**
     * Set multJuro
     *
     * @param string $multJuro
     * @return Multas
     */
    public function setMultJuro($multJuro)
    {
        $this->multJuro = $multJuro;

        return $this;
    }

    /**
     * Get multJuro
     *
     * @return string 
     */
    public function getMultJuro()
    {
        return $this->multJuro;
    }

    /**
     * Set multMora
     *
     * @param string $multMora
     * @return Multas
     */
    public function setMultMora($multMora)
    {
        $this->multMora = $multMora;

        return $this;
    }

    /**
     * Get multMora
     *
     * @return string 
     */
    public function getMultMora()
    {
        return $this->multMora;
    }

    /**
     * Set multDowngrade
     *
     * @param string $multDowngrade
     * @return Multas
     */
    public function setMultDowngrade($multDowngrade)
    {
        $this->multDowngrade = $multDowngrade;

        return $this;
    }

    /**
     * Get multDowngrade
     *
     * @return string 
     */
    public function getMultDowngrade()
    {
        return $this->multDowngrade;
    }

    /**
     * Set multRecisao
     *
     * @param string $multRecisao
     * @return Multas
     */
    public function setMultRecisao($multRecisao)
    {
        $this->multRecisao = $multRecisao;

        return $this;
    }

    /**
     * Get multRecisao
     *
     * @return string 
     */
    public function getMultRecisao()
    {
        return $this->multRecisao;
    }

    /**
     * Set multCobrardesconto
     *
     * @param boolean $multCobrardesconto
     * @return Multas
     */
    public function setMultCobrardesconto($multCobrardesconto)
    {
        $this->multCobrardesconto = $multCobrardesconto;

        return $this;
    }

    /**
     * Get multCobrardesconto
     *
     * @return boolean 
     */
    public function getMultCobrardesconto()
    {
        return $this->multCobrardesconto;
    }

    /**
     * Set multCobrardescontofuturo
     *
     * @param boolean $multCobrardescontofuturo
     * @return Multas
     */
    public function setMultCobrardescontofuturo($multCobrardescontofuturo)
    {
        $this->multCobrardescontofuturo = $multCobrardescontofuturo;

        return $this;
    }

    /**
     * Get multCobrardescontofuturo
     *
     * @return boolean 
     */
    public function getMultCobrardescontofuturo()
    {
        return $this->multCobrardescontofuturo;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Multas
     */
    public function addContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato[] = $contrato;

        return $this;
    }

    /**
     * Remove contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     */
    public function removeContrato(\Servicos\FinanceiroBundle\Entity\Contrato $contrato)
    {
        $this->contrato->removeElement($contrato);
    }

    /**
     * Get contrato
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getContrato()
    {
        return $this->contrato;
    }
}
