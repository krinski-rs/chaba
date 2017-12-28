<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prioridade
 */
class Prioridade
{
    /**
     * @var integer
     */
    private $prioridadeid;

    /**
     * @var string
     */
    private $nivel;

    /**
     * @var Customers
     */
    private $customerid;


    /**
     * Get prioridadeid
     *
     * @return integer
     */
    public function getPrioridadeid()
    {
        return $this->prioridadeid;
    }

    /**
     * Set customerid
     *
     * @param Customers $customerid
     * @return Prioridade
     */
    public function setCustomerid(\Servicos\GcdbBundle\Entity\Customers $customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return Customers
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set nivel
     *
     * @param string $nivel
     * @return Prioridade
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Get nivel
     *
     * @return string
     */
    public function getNivel()
    {
        return $this->nivel;
    }
}
