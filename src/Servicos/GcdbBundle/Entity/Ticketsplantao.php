<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticketsplantao
 */
class Ticketsplantao
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var \DateTime
     */
    private $dt;

    /**
     * @var integer
     */
    private $userIdAlteracao;

    /**
     * @var string
     */
    private $ip;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Ticketsplantao
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
     * Set dt
     *
     * @param \DateTime $dt
     * @return Ticketsplantao
     */
    public function setDt($dt)
    {
        $this->dt = $dt;

        return $this;
    }

    /**
     * Get dt
     *
     * @return \DateTime 
     */
    public function getDt()
    {
        return $this->dt;
    }

    /**
     * Set userIdAlteracao
     *
     * @param integer $userIdAlteracao
     * @return Ticketsplantao
     */
    public function setUserIdAlteracao($userIdAlteracao)
    {
        $this->userIdAlteracao = $userIdAlteracao;

        return $this;
    }

    /**
     * Get userIdAlteracao
     *
     * @return integer 
     */
    public function getUserIdAlteracao()
    {
        return $this->userIdAlteracao;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Ticketsplantao
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
