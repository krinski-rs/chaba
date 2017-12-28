<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BirthdayEmail
 */
class BirthdayEmail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $userAgent;

    /**
     * @var string
     */
    private $referer;

    /**
     * @var \DateTime
     */
    private $dateRead;

    /**
     * @var \DateTime
     */
    private $dateSent;

    /**
     * @var \Servicos\GcdbBundle\Entity\Birthday
     */
    private $birthday;


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
     * Set ip
     *
     * @param string $ip
     * @return BirthdayEmail
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

    /**
     * Set userAgent
     *
     * @param string $userAgent
     * @return BirthdayEmail
     */
    public function setUserAgent($userAgent)
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    /**
     * Get userAgent
     *
     * @return string 
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * Set referer
     *
     * @param string $referer
     * @return BirthdayEmail
     */
    public function setReferer($referer)
    {
        $this->referer = $referer;

        return $this;
    }

    /**
     * Get referer
     *
     * @return string 
     */
    public function getReferer()
    {
        return $this->referer;
    }

    /**
     * Set dateRead
     *
     * @param \DateTime $dateRead
     * @return BirthdayEmail
     */
    public function setDateRead($dateRead)
    {
        $this->dateRead = $dateRead;

        return $this;
    }

    /**
     * Get dateRead
     *
     * @return \DateTime 
     */
    public function getDateRead()
    {
        return $this->dateRead;
    }

    /**
     * Set dateSent
     *
     * @param \DateTime $dateSent
     * @return BirthdayEmail
     */
    public function setDateSent($dateSent)
    {
        $this->dateSent = $dateSent;

        return $this;
    }

    /**
     * Get dateSent
     *
     * @return \DateTime 
     */
    public function getDateSent()
    {
        return $this->dateSent;
    }

    /**
     * Set birthday
     *
     * @param \Servicos\GcdbBundle\Entity\Birthday $birthday
     * @return BirthdayEmail
     */
    public function setBirthday(\Servicos\GcdbBundle\Entity\Birthday $birthday = null)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \Servicos\GcdbBundle\Entity\Birthday 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
}
