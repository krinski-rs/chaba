<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CloseTicketSoclicitacao
 */
class CloseTicketSoclicitacao
{
    /**
     * @var integer
     */
    private $closetSoclicitacaoId;

    /**
     * @var string
     */
    private $closetSoclicitacaoNumero;

    /**
     * @var \DateTime
     */
    private $closeTicketDataInc;

    /**
     * @var \DateTime
     */
    private $closeTicketSoclicitacaoInicio;

    /**
     * @var \DateTime
     */
    private $closeTicketSoclicitacaoAlocacao;

    /**
     * @var integer
     */
    private $closeTicketSoclicitacaoUserId;

    /**
     * @var \Servicos\GcdbBundle\Entity\CloseTicket
     */
    private $closeTicketCloseTicket;


    /**
     * Get closetSoclicitacaoId
     *
     * @return integer 
     */
    public function getClosetSoclicitacaoId()
    {
        return $this->closetSoclicitacaoId;
    }

    /**
     * Set closetSoclicitacaoNumero
     *
     * @param string $closetSoclicitacaoNumero
     * @return CloseTicketSoclicitacao
     */
    public function setClosetSoclicitacaoNumero($closetSoclicitacaoNumero)
    {
        $this->closetSoclicitacaoNumero = $closetSoclicitacaoNumero;

        return $this;
    }

    /**
     * Get closetSoclicitacaoNumero
     *
     * @return string 
     */
    public function getClosetSoclicitacaoNumero()
    {
        return $this->closetSoclicitacaoNumero;
    }

    /**
     * Set closeTicketDataInc
     *
     * @param \DateTime $closeTicketDataInc
     * @return CloseTicketSoclicitacao
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
     * Set closeTicketSoclicitacaoInicio
     *
     * @param \DateTime $closeTicketSoclicitacaoInicio
     * @return CloseTicketSoclicitacao
     */
    public function setCloseTicketSoclicitacaoInicio($closeTicketSoclicitacaoInicio)
    {
        $this->closeTicketSoclicitacaoInicio = $closeTicketSoclicitacaoInicio;

        return $this;
    }

    /**
     * Get closeTicketSoclicitacaoInicio
     *
     * @return \DateTime 
     */
    public function getCloseTicketSoclicitacaoInicio()
    {
        return $this->closeTicketSoclicitacaoInicio;
    }

    /**
     * Set closeTicketSoclicitacaoAlocacao
     *
     * @param \DateTime $closeTicketSoclicitacaoAlocacao
     * @return CloseTicketSoclicitacao
     */
    public function setCloseTicketSoclicitacaoAlocacao($closeTicketSoclicitacaoAlocacao)
    {
        $this->closeTicketSoclicitacaoAlocacao = $closeTicketSoclicitacaoAlocacao;

        return $this;
    }

    /**
     * Get closeTicketSoclicitacaoAlocacao
     *
     * @return \DateTime 
     */
    public function getCloseTicketSoclicitacaoAlocacao()
    {
        return $this->closeTicketSoclicitacaoAlocacao;
    }

    /**
     * Set closeTicketSoclicitacaoUserId
     *
     * @param integer $closeTicketSoclicitacaoUserId
     * @return CloseTicketSoclicitacao
     */
    public function setCloseTicketSoclicitacaoUserId($closeTicketSoclicitacaoUserId)
    {
        $this->closeTicketSoclicitacaoUserId = $closeTicketSoclicitacaoUserId;

        return $this;
    }

    /**
     * Get closeTicketSoclicitacaoUserId
     *
     * @return integer 
     */
    public function getCloseTicketSoclicitacaoUserId()
    {
        return $this->closeTicketSoclicitacaoUserId;
    }

    /**
     * Set closeTicketCloseTicket
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicket $closeTicketCloseTicket
     * @return CloseTicketSoclicitacao
     */
    public function setCloseTicketCloseTicket(\Servicos\GcdbBundle\Entity\CloseTicket $closeTicketCloseTicket = null)
    {
        $this->closeTicketCloseTicket = $closeTicketCloseTicket;

        return $this;
    }

    /**
     * Get closeTicketCloseTicket
     *
     * @return \Servicos\GcdbBundle\Entity\CloseTicket 
     */
    public function getCloseTicketCloseTicket()
    {
        return $this->closeTicketCloseTicket;
    }
}
