<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CloseTicketProblema
 */
class CloseTicketProblema
{
    /**
     * @var integer
     */
    private $closestTicketProblemaId;

    /**
     * @var string
     */
    private $closestTicketDescricao;

    /**
     * @var \Servicos\GcdbBundle\Entity\ClosestTicketTipoProblema
     */
    private $closestTicketTipoProblema;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $closeTicket;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->closeTicket = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get closestTicketProblemaId
     *
     * @return integer 
     */
    public function getClosestTicketProblemaId()
    {
        return $this->closestTicketProblemaId;
    }

    /**
     * Set closestTicketDescricao
     *
     * @param string $closestTicketDescricao
     * @return CloseTicketProblema
     */
    public function setClosestTicketDescricao($closestTicketDescricao)
    {
        $this->closestTicketDescricao = $closestTicketDescricao;

        return $this;
    }

    /**
     * Get closestTicketDescricao
     *
     * @return string 
     */
    public function getClosestTicketDescricao()
    {
        return $this->closestTicketDescricao;
    }

    /**
     * Set closestTicketTipoProblema
     *
     * @param \Servicos\GcdbBundle\Entity\ClosestTicketTipoProblema $closestTicketTipoProblema
     * @return CloseTicketProblema
     */
    public function setClosestTicketTipoProblema(\Servicos\GcdbBundle\Entity\ClosestTicketTipoProblema $closestTicketTipoProblema = null)
    {
        $this->closestTicketTipoProblema = $closestTicketTipoProblema;

        return $this;
    }

    /**
     * Get closestTicketTipoProblema
     *
     * @return \Servicos\GcdbBundle\Entity\ClosestTicketTipoProblema 
     */
    public function getClosestTicketTipoProblema()
    {
        return $this->closestTicketTipoProblema;
    }

    /**
     * Add closeTicket
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicket $closeTicket
     * @return CloseTicketProblema
     */
    public function addCloseTicket(\Servicos\GcdbBundle\Entity\CloseTicket $closeTicket)
    {
        $this->closeTicket[] = $closeTicket;

        return $this;
    }

    /**
     * Remove closeTicket
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicket $closeTicket
     */
    public function removeCloseTicket(\Servicos\GcdbBundle\Entity\CloseTicket $closeTicket)
    {
        $this->closeTicket->removeElement($closeTicket);
    }

    /**
     * Get closeTicket
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCloseTicket()
    {
        return $this->closeTicket;
    }
}
