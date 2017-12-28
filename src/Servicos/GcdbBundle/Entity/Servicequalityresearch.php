<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicequalityresearch
 */
class Servicequalityresearch
{
    /**
     * @var integer
     */
    private $ticketid;

    /**
     * @var \DateTime
     */
    private $dtResposta;

    /**
     * @var integer
     */
    private $p1Cordialidade;

    /**
     * @var integer
     */
    private $p2Tempo;

    /**
     * @var integer
     */
    private $p3Avaliacao;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $customerid;

    /**
     * @var string
     */
    private $ip;


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
     * Set dtResposta
     *
     * @param \DateTime $dtResposta
     * @return Servicequalityresearch
     */
    public function setDtResposta($dtResposta)
    {
        $this->dtResposta = $dtResposta;

        return $this;
    }

    /**
     * Get dtResposta
     *
     * @return \DateTime 
     */
    public function getDtResposta()
    {
        return $this->dtResposta;
    }

    /**
     * Set p1Cordialidade
     *
     * @param integer $p1Cordialidade
     * @return Servicequalityresearch
     */
    public function setP1Cordialidade($p1Cordialidade)
    {
        $this->p1Cordialidade = $p1Cordialidade;

        return $this;
    }

    /**
     * Get p1Cordialidade
     *
     * @return integer 
     */
    public function getP1Cordialidade()
    {
        return $this->p1Cordialidade;
    }

    /**
     * Set p2Tempo
     *
     * @param integer $p2Tempo
     * @return Servicequalityresearch
     */
    public function setP2Tempo($p2Tempo)
    {
        $this->p2Tempo = $p2Tempo;

        return $this;
    }

    /**
     * Get p2Tempo
     *
     * @return integer 
     */
    public function getP2Tempo()
    {
        return $this->p2Tempo;
    }

    /**
     * Set p3Avaliacao
     *
     * @param integer $p3Avaliacao
     * @return Servicequalityresearch
     */
    public function setP3Avaliacao($p3Avaliacao)
    {
        $this->p3Avaliacao = $p3Avaliacao;

        return $this;
    }

    /**
     * Get p3Avaliacao
     *
     * @return integer 
     */
    public function getP3Avaliacao()
    {
        return $this->p3Avaliacao;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Servicequalityresearch
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
     * Set customerid
     *
     * @param integer $customerid
     * @return Servicequalityresearch
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return integer 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Servicequalityresearch
     */
    public function setIp($ip)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }
}
