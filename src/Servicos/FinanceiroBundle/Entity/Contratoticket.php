<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratoticket
 */
class Contratoticket
{
    /**
     * @var integer
     */
    private $conttickCodigoid;

    /**
     * @var integer
     */
    private $tickCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var \Servicos\GcdbBundle\Entity\Tickets
     */
    private $tickets;


    /**
     * Get conttickCodigoid
     *
     * @return integer 
     */
    public function getConttickCodigoid()
    {
        return $this->conttickCodigoid;
    }

    /**
     * Set tickCodigoid
     *
     * @param integer $tickCodigoid
     * @return Contratoticket
     */
    public function setTickCodigoid($tickCodigoid)
    {
        $this->tickCodigoid = $tickCodigoid;

        return $this;
    }

    /**
     * Get tickCodigoid
     *
     * @return integer 
     */
    public function getTickCodigoid()
    {
        return $this->tickCodigoid;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Contratoticket
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }


    /**
     * Get tickets
     *
     * @return \Servicos\GcdbBundle\Entity\Tickets
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * Set tickets
     *
     * @param \Servicos\GcdbBundle\Entity\Tickets $tickets
     * @return Contratoticket
     */
    public function setTickets(\Servicos\GcdbBundle\Entity\Tickets $tickets)
    {
        $this->tickCodigoid = $tickets->getTicketid();
        $this->tickets = $tickets;
        
        return $this;
    }
}
