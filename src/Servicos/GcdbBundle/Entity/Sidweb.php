<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sidweb
 */
class Sidweb
{
    /**
     * @var string
     */
    private $sid;

    /**
     * @var string
     */
    private $data;

    /**
     * @var string
     */
    private $customerid;

    /**
     * @var string
     */
    private $ip;


    /**
     * Set sid
     *
     * @param string $sid
     * @return Sidweb
     */
    public function setSid($sid)
    {
        $this->sid = $sid;

        return $this;
    }

    /**
     * Get sid
     *
     * @return string 
     */
    public function getSid()
    {
        return $this->sid;
    }

    /**
     * Set data
     *
     * @param string $data
     * @return Sidweb
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return string 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set customerid
     *
     * @param string $customerid
     * @return Sidweb
     */
    public function setCustomerid($customerid)
    {
        $this->customerid = $customerid;

        return $this;
    }

    /**
     * Get customerid
     *
     * @return string 
     */
    public function getCustomerid()
    {
        return $this->customerid;
    }

    /**
     * Set ip
     *
     * @param string $ip
     * @return Sidweb
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
