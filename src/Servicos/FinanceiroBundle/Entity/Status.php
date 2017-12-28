<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Status
 */
class Status
{
    /**
     * @var integer
     */
    private $statCodigoid;

    /**
     * @var string
     */
    private $statNome;

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
     * Get statCodigoid
     *
     * @return integer 
     */
    public function getStatCodigoid()
    {
        return $this->statCodigoid;
    }

    /**
     * Set statNome
     *
     * @param string $statNome
     * @return Status
     */
    public function setStatNome($statNome)
    {
        $this->statNome = $statNome;

        return $this;
    }

    /**
     * Get statNome
     *
     * @return string 
     */
    public function getStatNome()
    {
        return $this->statNome;
    }

    /**
     * Add contrato
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contrato
     * @return Status
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
