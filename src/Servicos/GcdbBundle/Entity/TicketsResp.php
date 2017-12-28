<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TicketsResp
 */
class TicketsResp
{
    /**
     * @var integer
     */
    private $tickrespCodigoid;

    /**
     * @var integer
     */
    private $ticketsId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $dataInicial;

    /**
     * @var \DateTime
     */
    private $dataFinal;


    /**
     * Get tickrespCodigoid
     *
     * @return integer 
     */
    public function getTickrespCodigoid()
    {
        return $this->tickrespCodigoid;
    }

    /**
     * Set ticketsId
     *
     * @param integer $ticketsId
     * @return TicketsResp
     */
    public function setTicketsId($ticketsId)
    {
        $this->ticketsId = $ticketsId;

        return $this;
    }

    /**
     * Get ticketsId
     *
     * @return integer 
     */
    public function getTicketsId()
    {
        return $this->ticketsId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return TicketsResp
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
     * Set dataInicial
     *
     * @param \DateTime $dataInicial
     * @return TicketsResp
     */
    public function setDataInicial($dataInicial)
    {
        $this->dataInicial = $dataInicial;

        return $this;
    }

    /**
     * Get dataInicial
     *
     * @return \DateTime 
     */
    public function getDataInicial()
    {
        return $this->dataInicial;
    }

    /**
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return TicketsResp
     */
    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;

        return $this;
    }

    /**
     * Get dataFinal
     *
     * @return \DateTime 
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }
}
