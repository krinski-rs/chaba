<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CloseTicketEquipe
 */
class CloseTicketEquipe
{
    /**
     * @var integer
     */
    private $closeTicketEquipeId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao
     */
    private $closetSoclicitacao;


    /**
     * Get closeTicketEquipeId
     *
     * @return integer 
     */
    public function getCloseTicketEquipeId()
    {
        return $this->closeTicketEquipeId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return CloseTicketEquipe
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set closetSoclicitacao
     *
     * @param \Servicos\GcdbBundle\Entity\CloseTicketSoclicitacao $closetSoclicitacao
     * @return CloseTicketEquipe
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
