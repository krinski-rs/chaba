<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketCircuito
 */
class TicketCircuito
{
    /**
     * @var integer
     */
    private $tickcircCodigoid;

    /**
     * @var integer
     */
    private $ticketid;

    /**
     * @var integer
     */
    private $unidCodigoid;

    /**
     * @var integer
     */
    private $circCodigoid;

    /**
     * @var integer
     */
    private $popId;


    /**
     * Get tickcircCodigoid
     *
     * @return integer 
     */
    public function getTickcircCodigoid()
    {
        return $this->tickcircCodigoid;
    }

    /**
     * Set ticketid
     *
     * @param integer $ticketid
     * @return TicketCircuito
     */
    public function setTicketid($ticketid)
    {
        $this->ticketid = $ticketid;

        return $this;
    }

    /**
     * Get ticketid
     *
     * @return integer 
     */
    public function getTicketid()
    {
        return $this->ticketid;
    }

    /**
     * Set unidCodigoid
     *
     * @param integer $unidCodigoid
     * @return TicketCircuito
     */
    public function setUnidCodigoid($unidCodigoid)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return integer 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }

    /**
     * Set circCodigoid
     *
     * @param integer $circCodigoid
     * @return TicketCircuito
     */
    public function setCircCodigoid($circCodigoid)
    {
        $this->circCodigoid = $circCodigoid;

        return $this;
    }

    /**
     * Get circCodigoid
     *
     * @return integer 
     */
    public function getCircCodigoid()
    {
        return $this->circCodigoid;
    }

    /**
     * Set popId
     *
     * @param integer $popId
     * @return TicketCircuito
     */
    public function setPopId($popId)
    {
        $this->popId = $popId;

        return $this;
    }

    /**
     * Get popId
     *
     * @return integer 
     */
    public function getPopId()
    {
        return $this->popId;
    }
}
