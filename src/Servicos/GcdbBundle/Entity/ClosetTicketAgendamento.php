<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClosetTicketAgendamento
 */
class ClosetTicketAgendamento
{
    /**
     * @var integer
     */
    private $closetTicketAgendamentoId;

    /**
     * @var \DateTime
     */
    private $closetTicketChegadaPrevisao;

    /**
     * @var \DateTime
     */
    private $closetTicketChegada;

    /**
     * @var \DateTime
     */
    private $closetTicketReparo;

    /**
     * @var \DateTime
     */
    private $closetTicketFuncionamento;

    /**
     * @var \Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao
     */
    private $closetSoclicitacao;


    /**
     * Get closetTicketAgendamentoId
     *
     * @return integer 
     */
    public function getClosetTicketAgendamentoId()
    {
        return $this->closetTicketAgendamentoId;
    }

    /**
     * Set closetTicketChegadaPrevisao
     *
     * @param \DateTime $closetTicketChegadaPrevisao
     * @return ClosetTicketAgendamento
     */
    public function setClosetTicketChegadaPrevisao($closetTicketChegadaPrevisao)
    {
        $this->closetTicketChegadaPrevisao = $closetTicketChegadaPrevisao;

        return $this;
    }

    /**
     * Get closetTicketChegadaPrevisao
     *
     * @return \DateTime 
     */
    public function getClosetTicketChegadaPrevisao()
    {
        return $this->closetTicketChegadaPrevisao;
    }

    /**
     * Set closetTicketChegada
     *
     * @param \DateTime $closetTicketChegada
     * @return ClosetTicketAgendamento
     */
    public function setClosetTicketChegada($closetTicketChegada)
    {
        $this->closetTicketChegada = $closetTicketChegada;

        return $this;
    }

    /**
     * Get closetTicketChegada
     *
     * @return \DateTime 
     */
    public function getClosetTicketChegada()
    {
        return $this->closetTicketChegada;
    }

    /**
     * Set closetTicketReparo
     *
     * @param \DateTime $closetTicketReparo
     * @return ClosetTicketAgendamento
     */
    public function setClosetTicketReparo($closetTicketReparo)
    {
        $this->closetTicketReparo = $closetTicketReparo;

        return $this;
    }

    /**
     * Get closetTicketReparo
     *
     * @return \DateTime 
     */
    public function getClosetTicketReparo()
    {
        return $this->closetTicketReparo;
    }

    /**
     * Set closetTicketFuncionamento
     *
     * @param \DateTime $closetTicketFuncionamento
     * @return ClosetTicketAgendamento
     */
    public function setClosetTicketFuncionamento($closetTicketFuncionamento)
    {
        $this->closetTicketFuncionamento = $closetTicketFuncionamento;

        return $this;
    }

    /**
     * Get closetTicketFuncionamento
     *
     * @return \DateTime 
     */
    public function getClosetTicketFuncionamento()
    {
        return $this->closetTicketFuncionamento;
    }

    /**
     * Set closetSoclicitacao
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao $closetSoclicitacao
     * @return ClosetTicketAgendamento
     */
    public function setClosetSoclicitacao(\Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao $closetSoclicitacao = null)
    {
        $this->closetSoclicitacao = $closetSoclicitacao;

        return $this;
    }

    /**
     * Get closetSoclicitacao
     *
     * @return \Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao 
     */
    public function getClosetSoclicitacao()
    {
        return $this->closetSoclicitacao;
    }
}
