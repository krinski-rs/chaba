<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CloseTicket
 */
class CloseTicket
{
    /**
     * @var integer
     */
    private $closeTicketId;

    /**
     * @var integer
     */
    private $closeTicketUserId;

    /**
     * @var integer
     */
    private $closeTicketResponsavel;

    /**
     * @var integer
     */
    private $viaturaid;

    /**
     * @var \DateTime
     */
    private $closeTicketDataInc;

    /**
     * @var \DateTime
     */
    private $closeTicketIndisponibilidadeInicio;

    /**
     * @var \DateTime
     */
    private $closeTicketIndisponibilidadeFim;

    /**
     * @var \DateTime
     */
    private $closeTicketEscalonamentoInicio;

    /**
     * @var \DateTime
     */
    private $closeTicketEscalonamentoFim;

    /**
     * @var string
     */
    private $closeTicketProblema;

    /**
     * @var \Servicos\GcdbBundle\Entity\Tickets
     */
    private $ticket;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $closestTicketProblema;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->closestTicketProblema = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get closeTicketId
     *
     * @return integer 
     */
    public function getCloseTicketId()
    {
        return $this->closeTicketId;
    }

    /**
     * Set closeTicketUserId
     *
     * @param integer $closeTicketUserId
     * @return CloseTicket
     */
    public function setCloseTicketUserId($closeTicketUserId)
    {
        $this->closeTicketUserId = $closeTicketUserId;

        return $this;
    }

    /**
     * Get closeTicketUserId
     *
     * @return integer 
     */
    public function getCloseTicketUserId()
    {
        return $this->closeTicketUserId;
    }

    /**
     * Set closeTicketResponsavel
     *
     * @param integer $closeTicketResponsavel
     * @return CloseTicket
     */
    public function setCloseTicketResponsavel($closeTicketResponsavel)
    {
        $this->closeTicketResponsavel = $closeTicketResponsavel;

        return $this;
    }

    /**
     * Get closeTicketResponsavel
     *
     * @return integer 
     */
    public function getCloseTicketResponsavel()
    {
        return $this->closeTicketResponsavel;
    }

    /**
     * Set viaturaid
     *
     * @param integer $viaturaid
     * @return CloseTicket
     */
    public function setViaturaid($viaturaid)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return integer 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }

    /**
     * Set closeTicketDataInc
     *
     * @param \DateTime $closeTicketDataInc
     * @return CloseTicket
     */
    public function setCloseTicketDataInc($closeTicketDataInc)
    {
        $this->closeTicketDataInc = $closeTicketDataInc;

        return $this;
    }

    /**
     * Get closeTicketDataInc
     *
     * @return \DateTime 
     */
    public function getCloseTicketDataInc()
    {
        return $this->closeTicketDataInc;
    }

    /**
     * Set closeTicketIndisponibilidadeInicio
     *
     * @param \DateTime $closeTicketIndisponibilidadeInicio
     * @return CloseTicket
     */
    public function setCloseTicketIndisponibilidadeInicio($closeTicketIndisponibilidadeInicio)
    {
        $this->closeTicketIndisponibilidadeInicio = $closeTicketIndisponibilidadeInicio;

        return $this;
    }

    /**
     * Get closeTicketIndisponibilidadeInicio
     *
     * @return \DateTime 
     */
    public function getCloseTicketIndisponibilidadeInicio()
    {
        return $this->closeTicketIndisponibilidadeInicio;
    }

    /**
     * Set closeTicketIndisponibilidadeFim
     *
     * @param \DateTime $closeTicketIndisponibilidadeFim
     * @return CloseTicket
     */
    public function setCloseTicketIndisponibilidadeFim($closeTicketIndisponibilidadeFim)
    {
        $this->closeTicketIndisponibilidadeFim = $closeTicketIndisponibilidadeFim;

        return $this;
    }

    /**
     * Get closeTicketIndisponibilidadeFim
     *
     * @return \DateTime 
     */
    public function getCloseTicketIndisponibilidadeFim()
    {
        return $this->closeTicketIndisponibilidadeFim;
    }

    /**
     * Set closeTicketEscalonamentoInicio
     *
     * @param \DateTime $closeTicketEscalonamentoInicio
     * @return CloseTicket
     */
    public function setCloseTicketEscalonamentoInicio($closeTicketEscalonamentoInicio)
    {
        $this->closeTicketEscalonamentoInicio = $closeTicketEscalonamentoInicio;

        return $this;
    }

    /**
     * Get closeTicketEscalonamentoInicio
     *
     * @return \DateTime 
     */
    public function getCloseTicketEscalonamentoInicio()
    {
        return $this->closeTicketEscalonamentoInicio;
    }

    /**
     * Set closeTicketEscalonamentoFim
     *
     * @param \DateTime $closeTicketEscalonamentoFim
     * @return CloseTicket
     */
    public function setCloseTicketEscalonamentoFim($closeTicketEscalonamentoFim)
    {
        $this->closeTicketEscalonamentoFim = $closeTicketEscalonamentoFim;

        return $this;
    }

    /**
     * Get closeTicketEscalonamentoFim
     *
     * @return \DateTime 
     */
    public function getCloseTicketEscalonamentoFim()
    {
        return $this->closeTicketEscalonamentoFim;
    }

    /**
     * Set closeTicketProblema
     *
     * @param string $closeTicketProblema
     * @return CloseTicket
     */
    public function setCloseTicketProblema($closeTicketProblema)
    {
        $this->closeTicketProblema = $closeTicketProblema;

        return $this;
    }

    /**
     * Get closeTicketProblema
     *
     * @return string 
     */
    public function getCloseTicketProblema()
    {
        return $this->closeTicketProblema;
    }

    /**
     * Set ticket
     *
     * @param \Servicos\GcdbBundle\Entity\Tickets $ticket
     * @return CloseTicket
     */
    public function setTicket(\Servicos\GcdbBundle\Entity\Tickets $ticket = null)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get ticket
     *
     * @return \Servicos\GcdbBundle\Entity\Tickets 
     */
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Add closestTicketProblema
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicketProblema $closestTicketProblema
     * @return CloseTicket
     */
    public function addClosestTicketProblema(\Servicos\GcdbBundle\Entity\CloseTicketProblema $closestTicketProblema)
    {
        $this->closestTicketProblema[] = $closestTicketProblema;

        return $this;
    }

    /**
     * Remove closestTicketProblema
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicketProblema $closestTicketProblema
     */
    public function removeClosestTicketProblema(\Servicos\GcdbBundle\Entity\CloseTicketProblema $closestTicketProblema)
    {
        $this->closestTicketProblema->removeElement($closestTicketProblema);
    }

    /**
     * Get closestTicketProblema
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClosestTicketProblema()
    {
        return $this->closestTicketProblema;
    }
}
