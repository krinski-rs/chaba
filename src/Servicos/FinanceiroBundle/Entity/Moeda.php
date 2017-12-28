<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Moeda
 */
class Moeda
{
    /**
     * @var integer
     */
    private $moedCodigoid;

    /**
     * @var string
     */
    private $moedNome;

    /**
     * @var string
     */
    private $moedValor;

    /**
     * @var string
     */
    private $moedSigla;

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
     * Get moedCodigoid
     *
     * @return integer 
     */
    public function getMoedCodigoid()
    {
        return $this->moedCodigoid;
    }

    /**
     * Set moedNome
     *
     * @param string $moedNome
     * @return Moeda
     */
    public function setMoedNome($moedNome)
    {
        $this->moedNome = $moedNome;

        return $this;
    }

    /**
     * Get moedNome
     *
     * @return string 
     */
    public function getMoedNome()
    {
        return $this->moedNome;
    }

    /**
     * Set moedValor
     *
     * @param string $moedValor
     * @return Moeda
     */
    public function setMoedValor($moedValor)
    {
        $this->moedValor = $moedValor;

        return $this;
    }

    /**
     * Get moedValor
     *
     * @return string 
     */
    public function getMoedValor()
    {
        return $this->moedValor;
    }

    /**
     * Set moedSigla
     *
     * @param string $moedSigla
     * @return Moeda
     */
    public function setMoedSigla($moedSigla)
    {
        $this->moedSigla = $moedSigla;

        return $this;
    }

    /**
     * Get moedSigla
     *
     * @return string 
     */
    public function getMoedSigla()
    {
        return $this->moedSigla;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Moeda
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
